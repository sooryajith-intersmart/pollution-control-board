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

        if (is_null($data) || !isset($data[0]))
            return response()->json(['error' => 'No data available'], 404);

        $metrics = FrontendHelper::defineMetrics($data[0]);

        $result = [];
        foreach ($metrics as $key => $metric) {
            $result[$key] = FrontendHelper::processMetric($metric);
        }

        $result['time'] = $data[0]['payload']['d']['t'] ?? 0;
        $result['battery_percentage'] = $data[0]['payload']['d']['bs'] ?? 0;

        return response()->json(['data' => $result]);
    }
}
