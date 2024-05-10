<?php

namespace Modules\Frontend\app\Http\Controllers;

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

    public function getLatestDevicesData()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://production.oizom.com/v1/oauth2/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "client_id": "c5958cf6-d739-4d65-a17e-5d1b56a693ec",
            "client_secret": "3OXW8Uabo7LECB8Z6FgPQRsi6XPkXb4V",
            "grant_type": "client_credentials",
            "scope": "view_data"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response_data = json_decode($response, true);

        $access_token = $response_data['access_token'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://production.oizom.com/v1/data/cur',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $access_token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        $humidity = $data[0]['payload']['d']['hum'];
        $humidity_number_range = [30, 50, 65, 80, 90, 100];
        $humidity_percentage = $this->calculatePercentage($humidity, $humidity_number_range);
        $humidity_level_info = $this->getHumidityLevel($humidity);
        $humidity_level_name = $humidity_level_info['name'];
        $humidity_level_number = $humidity_level_info['number'];

        $temperature = $data[0]['payload']['d']['temp'];
        $temperature_number_range = [20, 25, 30, 35, 40, 45];
        $temperature_percentage = $this->calculatePercentage($temperature, $temperature_number_range);
        $temperature_level_info = $this->getTemperatureLevel($temperature);
        $temperature_level_name = $temperature_level_info['name'];
        $temperature_level_number = $temperature_level_info['number'];

        $pm25 = $data[0]['payload']['d']['p1'];
        $pm25_number_range = [30, 60, 90, 120, 250, 480];
        $pm25_percentage = $this->calculatePercentage($pm25, $pm25_number_range);
        $pm25_level_info = $this->getPm25Level($pm25);
        $pm25_level_name = $pm25_level_info['name'];
        $pm25_level_number = $pm25_level_info['number'];

        $pm10 = $data[0]['payload']['d']['p2'];
        $pm10_number_range = [50, 100, 250, 350, 430, 510];
        $pm10_percentage = $this->calculatePercentage($pm10, $pm10_number_range);
        $pm10_level_info = $this->getPm10Level($pm10);
        $pm10_level_name = $pm10_level_info['name'];
        $pm10_level_number = $pm10_level_info['number'];

        $pm1 = $data[0]['payload']['d']['p3'];
        $pm1_number_range = [30, 60, 90, 120, 250, 480];
        $pm1_percentage = $this->calculatePercentage($pm1, $pm1_number_range);
        $pm1_level_info = $this->getPm1Level($pm1);
        $pm1_level_name = $pm1_level_info['name'];
        $pm1_level_number = $pm1_level_info['number'];

        $pm100 = $data[0]['payload']['d']['p4'];
        $pm100_number_range = [50, 100, 250, 350, 430, 510];
        $pm100_percentage = $this->calculatePercentage($pm100, $pm100_number_range);
        $pm100_level_info = $this->getPm100Level($pm100);
        $pm100_level_name = $pm100_level_info['name'];
        $pm100_level_number = $pm100_level_info['number'];

        $co = $data[0]['payload']['d']['g2'];
        $co_number_range = [1, 2, 10, 20, 34, 49];
        $co_percentage = $this->calculatePercentage($co, $co_number_range);
        $co_level_info = $this->getCoLevel($co);
        $co_level_name = $co_level_info['name'];
        $co_level_number = $co_level_info['number'];

        $co2 = $data[0]['payload']['d']['g1'];
        $co2_number_range = [300, 400, 500, 650, 850, 1100];
        $co2_percentage = $this->calculatePercentage($co2, $co2_number_range);
        $co2_level_info = $this->getCo2Level($co2);
        $co2_level_name = $co2_level_info['name'];
        $co2_level_number = $co2_level_info['number'];

        $noise = $data[0]['payload']['d']['leq'];
        $noise_number_range = [40, 60, 80, 100, 120, 140];
        $noise_percentage = $this->calculatePercentage($noise, $noise_number_range);
        $noise_level_info = $this->getNoiseMinLevel($noise);
        $noise_level_name = $noise_level_info['name'];
        $noise_level_number = $noise_level_info['number'];

        $pressure = $data[0]['payload']['d']['pr'];
        $pressure_number_range = [996, 1009, 1016, 1022, 1032, 1046];
        $pressure_percentage = $this->calculatePercentage($pressure, $pressure_number_range);
        $pressure_level_info = $this->getPressureLevel($pressure);
        $pressure_level_name = $pressure_level_info['name'];
        $pressure_level_number = $pressure_level_info['number'];

        $uv = $data[0]['payload']['d']['uv'];
        $uv_number_range = [2, 3, 5, 7, 10, 14];
        $uv_percentage = $this->calculatePercentage($uv, $uv_number_range);
        $uv_level_info = $this->getUvLevel($uv);
        $uv_level_name = $uv_level_info['name'];
        $uv_level_number = $uv_level_info['number'];

        $light_intensity = $data[0]['payload']['d']['light'];
        $light_intensity_number_range = [100, 500, 2000, 10000, 25000, 62500];
        $light_intensity_percentage = $this->calculatePercentage($light_intensity, $light_intensity_number_range);
        $light_intensity_level_info = $this->getLightIntensityLevel($light_intensity);
        $light_intensity_level_name = $light_intensity_level_info['name'];
        $light_intensity_level_number = $light_intensity_level_info['number'];

        $aqi = $data[0]['aqi'];
        $aqi_number_range = [50, 100, 200, 300, 400, 500];
        $aqi_percentage = $this->calculatePercentage($aqi, $aqi_number_range);
        $aqi_level_info = $this->getAqiLevel($aqi);
        $aqi_level_name = $aqi_level_info['name'];
        $aqi_level_number = $aqi_level_info['number'];

        $time = $data[0]['payload']['d']['t'];
        $battery_percentage = $data[0]['payload']['d']['bs'];

        return response()->json([
            "data" => [
                "humidity" => [
                    "value" => $humidity,
                    "percentage" => $humidity_percentage,
                    "level_name" => $humidity_level_name,
                    "level_number" => $humidity_level_number,
                ],
                "temperature" => [
                    "value" => $temperature,
                    "percentage" => $temperature_percentage,
                    "level_name" => $temperature_level_name,
                    "level_number" => $temperature_level_number,
                ],
                "pm25" => [
                    "value" => $pm25,
                    "percentage" => $pm25_percentage,
                    "level_name" => $pm25_level_name,
                    "level_number" => $pm25_level_number,
                ],
                "pm10" => [
                    "value" => $pm10,
                    "percentage" => $pm10_percentage,
                    "level_name" => $pm10_level_name,
                    "level_number" => $pm10_level_number,
                ],
                "pm1" => [
                    "value" => $pm1,
                    "percentage" => $pm1_percentage,
                    "level_name" => $pm1_level_name,
                    "level_number" => $pm1_level_number,
                ],
                "pm100" => [
                    "value" => $pm100,
                    "percentage" => $pm100_percentage,
                    "level_name" => $pm100_level_name,
                    "level_number" => $pm100_level_number,
                ],
                "co" => [
                    "value" => $co,
                    "percentage" => $co_percentage,
                    "level_name" => $co_level_name,
                    "level_number" => $co_level_number,
                ],
                "co2" => [
                    "value" => $co2,
                    "percentage" => $co2_percentage,
                    "level_name" => $co2_level_name,
                    "level_number" => $co2_level_number,
                ],
                "noise" => [
                    "value" => $noise,
                    "percentage" => $noise_percentage,
                    "level_name" => $noise_level_name,
                    "level_number" => $noise_level_number,
                ],
                "pressure" => [
                    "value" => $pressure,
                    "percentage" => $pressure_percentage,
                    "level_name" => $pressure_level_name,
                    "level_number" => $pressure_level_number,
                ],
                "uv" => [
                    "value" => $uv,
                    "percentage" => $uv_percentage,
                    "level_name" => $uv_level_name,
                    "level_number" => $uv_level_number,
                ],
                "light_intensity" => [
                    "value" => $light_intensity,
                    "percentage" => $light_intensity_percentage,
                    "level_name" => $light_intensity_level_name,
                    "level_number" => $light_intensity_level_number,
                ],
                "aqi" => [
                    "value" => $aqi,
                    "percentage" => $aqi_percentage,
                    "level_name" => $aqi_level_name,
                    "level_number" => $aqi_level_number,
                ],
                "time" => $time,
                "battery_percentage" => $battery_percentage,
            ]
        ]);
    }

    private function getHumidityLevel($value)
    {
        $level_names = ['Very Dry', 'Dry', 'Comfortable', 'Sticky', 'Muggy', 'Oppressive'];
        $number_range = [30, 50, 65, 80, 90];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getTemperatureLevel($value)
    {
        $level_names = ['Cold', 'Below Average', 'Normal', 'Above Average', 'Sweltering', 'Scorching'];
        $number_range = [20, 25, 30, 35, 40];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getPm25Level($value)
    {
        $level_names = ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous'];
        $number_range = [30, 60, 90, 120, 250];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getPm10Level($value)
    {
        $level_names = ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous'];
        $number_range = [50, 100, 250, 350, 430];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getPm1Level($value)
    {
        $level_names = ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous'];
        $number_range = [30, 60, 90, 120, 250];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getPm100Level($value)
    {
        $level_names = ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous'];
        $number_range = [50, 100, 250, 350, 430];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getCoLevel($value)
    {
        $level_names = ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous'];
        $number_range = [1, 2, 10, 20, 34];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getCo2Level($value)
    {
        $level_names = ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous'];
        $number_range = [300, 400, 500, 650, 850];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getNoiseMinLevel($value)
    {
        $level_names = ['Quiet', 'Moderate', 'Loud', 'Very Loud', 'Extreme', 'Painful'];
        $number_range = [40, 60, 80, 100, 120];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getPressureLevel($value)
    {
        $level_names = ['Very Low', 'Low', 'Normal', 'Above Average', 'High', 'Very High'];
        $number_range = [996, 1009, 1016, 1022, 1032];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getUvLevel($value)
    {
        $level_names = ['Very Low', 'Low', 'Moderate', 'High', 'Very High', 'Extreme'];
        $number_range = [2, 3, 5, 7, 10];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getLightIntensityLevel($value)
    {
        $level_names = ['Dim', 'Low', 'Moderate', 'Bright', 'Very Bright', 'Extreme'];
        $number_range = [100, 500, 2000, 10000, 25000];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    private function getAqiLevel($value)
    {
        $level_names = ['Good', 'Satisfactory', 'Moderate', 'Poor', 'Very Poor', 'Severe'];
        $number_range = [50, 100, 200, 300, 400];

        $level_number = count($level_names);

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $level_number = $index + 1;
                break;
            }
        }

        $level_name = $level_names[$level_number - 1];

        return ['name' => $level_name, 'number' => $level_number];
    }

    function calculatePercentage($value, $number_range)
    {
        $percentages = 100 / 6;

        // Check if the value exceeds the last range
        if ($value > end($number_range)) {
            $value = end($number_range);
        }

        // Find the range in which the value falls
        $range_index = 0;
        foreach ($number_range as $index => $range) {
            if ($value <= $range) {
                $range_index = $index;
                break;
            }
        }

        // Calculate the percentage within the range
        $lower_bound = $range_index > 0 ? $number_range[$range_index - 1] : 0;
        $upper_bound = $number_range[$range_index];
        $range_percentage = $percentages * $range_index;
        $percentage_within_range = $range_percentage + (($value - $lower_bound) / ($upper_bound - $lower_bound)) * $percentages;

        return $percentage_within_range;
    }
}
