<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Helpers\FrontendHelper;
use Illuminate\Routing\Controller;

class FrontendController extends Controller
{
    /**
     * Displays home page.
     * 
     * @author Sooryajith
     */
    public function index()
    {
        return view('frontend::frontend.index');
    }

    /**
     * Displays screen 1 page.
     * 
     * @author Sooryajith
     */
    public function screen1()
    {
        return view('frontend::frontend.screen-1');
    }

    /**
     * Displays screen 2 page.
     * 
     * @author Sooryajith
     */
    public function screen2()
    {
        return view('frontend::frontend.screen-2');
    }

    /**
     * Displays screen 3 page.
     * 
     * @author Sooryajith
     */
    public function screen3()
    {
        return view('frontend::frontend.screen-3');
    }

    /**
     * Displays screen 4 page.
     * 
     * @author Sooryajith
     */
    public function screen4()
    {
        return view('frontend::frontend.screen-4');
    }

    /**
     * Displays screen 5 page.
     * 
     * @author Sooryajith
     */
    public function screen5()
    {
        return view('frontend::frontend.screen-5');
    }

    /**
     * Displays screen 6 page.
     * 
     * @author Sooryajith
     */
    public function screen6()
    {
        return view('frontend::frontend.screen-6');
    }

    /**
     * Fetches the latest environmental data from the device, processes the metrics to determine 
     * their percentage, level names, and level numbers, and returns the result as a JSON response.
     * 
     * @return \Illuminate\Http\JsonResponse The JSON response containing the processed data.
     * @author Sooryajith
     */
    public function getLatestDevicesData()
    {
        $data = FrontendHelper::getData();

        // Define metrics to be analyzed with their respective ranges and descriptive names
        $metrics = [
            'aqi' => [
                'value' => $data[0]['aqi'] ?? 0,
                'ranges' => [50, 100, 200, 300, 400, 500],
                'names' => ['Good', 'Satisfactory', 'Moderate', 'Poor', 'Very Poor', 'Severe']
            ],
            'humidity' => [
                'value' => $data[0]['payload']['d']['hum'] ?? 0,
                'ranges' => [30, 50, 65, 80, 90, 100],
                'names' => ['Very Dry', 'Dry', 'Comfortable', 'Sticky', 'Muggy', 'Oppressive']
            ],
            'temperature' => [
                'value' => $data[0]['payload']['d']['temp'] ?? 0,
                'ranges' => [20, 25, 30, 35, 40, 45],
                'names' => ['Cold', 'Below Average', 'Normal', 'Above Average', 'Sweltering', 'Scorching']
            ],
            'pm25' => [
                'value' => $data[0]['payload']['d']['p1'] ?? 0,
                'ranges' => [30, 60, 90, 120, 250, 480],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'pm10' => [
                'value' => $data[0]['payload']['d']['p2'] ?? 0,
                'ranges' => [50, 100, 250, 350, 430, 510],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'pm1' => [
                'value' => $data[0]['payload']['d']['p3'] ?? 0,
                'ranges' => [30, 60, 90, 120, 250, 480],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'pm100' => [
                'value' => $data[0]['payload']['d']['p4'] ?? 0,
                'ranges' => [50, 100, 250, 350, 430, 510],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'co' => [
                'value' => $data[0]['payload']['d']['g2'] ?? 0,
                'ranges' => [1, 2, 10, 20, 34, 49],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'co2' => [
                'value' => $data[0]['payload']['d']['g1'] ?? 0,
                'ranges' => [300, 400, 500, 650, 850, 1100],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'noise' => [
                'value' => $data[0]['payload']['d']['leq'] ?? 0,
                'ranges' => [40, 60, 80, 100, 120, 140],
                'names' => ['Quiet', 'Moderate', 'Loud', 'Very Loud', 'Extreme', 'Painful']
            ],
            'pressure' => [
                'value' => $data[0]['payload']['d']['pr'] ?? 0,
                'ranges' => [996, 1009, 1016, 1022, 1032, 1046],
                'names' => ['Very Low', 'Low', 'Normal', 'Above Average', 'High', 'Very High']
            ],
            'uv' => [
                'value' => $data[0]['payload']['d']['uv'] ?? 0,
                'ranges' => [2, 3, 5, 7, 10, 14],
                'names' => ['Very Low', 'Low', 'Moderate', 'High', 'Very High', 'Extreme']
            ],
            'light_intensity' => [
                'value' => $data[0]['payload']['d']['light'] ?? 0,
                'ranges' => [100, 500, 2000, 10000, 25000, 62500],
                'names' => ['Dim', 'Low', 'Moderate', 'Bright', 'Very Bright', 'Extreme']
            ]
        ];

        $result = [];

        // Process each metric to calculate the percentage and level information
        foreach ($metrics as $key => $metric) {
            $info = FrontendHelper::getGaugeInfo($metric['value'], $metric['ranges'], $metric['names']);
            $result[$key] = [
                'value' => $metric['value'],
                'percentage' => $info['percentage'],
                'level_name' => $info['name'],
                'level_number' => $info['number']
            ];
        }

        $result['time'] = $data[0]['payload']['d']['t'] ?? 0;
        $result['battery_percentage'] = $data[0]['payload']['d']['bs'] ?? 0;

        return response()->json(['data' => $result]);
    }
}
