<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Helpers\FrontendHelper;
use App\Mail\EnquiryMail;
use App\Models\About;
use App\Models\Enquiry;
use App\Models\Home;
use App\Models\Business;
use App\Models\Blog;
use App\Models\Slider;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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

        $humidity_max = 90;
        $humidity = $data[0]['payload']['d']['hum'];
        $humidity_percentage = $this->getHumidityLevelPercentage($humidity);
        $humidity_level_info = $this->getHumidityLevel($humidity);
        $humidity_level_name = $humidity_level_info['name'];
        $humidity_level_number = $humidity_level_info['number'];

        $temperature_max = 40;
        $temperature = $data[0]['payload']['d']['temp'];
        $temperature_percentage = $this->getTemperatureLevelPercentage($temperature);
        $temperature_level_info = $this->getTemperatureLevel($temperature);
        $temperature_level_name = $temperature_level_info['name'];
        $temperature_level_number = $temperature_level_info['number'];

        $pm25_max = 250;
        $pm25 = $data[0]['payload']['d']['p1'];
        $pm25_percentage = min(($pm25 / $pm25_max) * 100, 100);
        $pm25_level_info = $this->getPm25Level($pm25);
        $pm25_level_name = $pm25_level_info['name'];
        $pm25_level_number = $pm25_level_info['number'];

        $pm10_max = 430;
        $pm10 = $data[0]['payload']['d']['p2'];
        $pm10_percentage = min(($pm10 / $pm10_max) * 100, 100);
        $pm10_level_info = $this->getPm10Level($pm10);
        $pm10_level_name = $pm10_level_info['name'];
        $pm10_level_number = $pm10_level_info['number'];

        $pm1_max = 250;
        $pm1 = $data[0]['payload']['d']['p3'];
        $pm1_percentage = min(($pm1 / $pm1_max) * 100, 100);
        $pm1_level_info = $this->getPm1Level($pm1);
        $pm1_level_name = $pm1_level_info['name'];
        $pm1_level_number = $pm1_level_info['number'];

        $pm100_max = 430;
        $pm100 = $data[0]['payload']['d']['p4'];
        $pm100_percentage = min(($pm100 / $pm100_max) * 100, 100);
        $pm100_level_info = $this->getPm100Level($pm100);
        $pm100_level_name = $pm100_level_info['name'];
        $pm100_level_number = $pm100_level_info['number'];

        $co_max = 34;
        $co = $data[0]['payload']['d']['g2'];
        $co_percentage = min(($co / $co_max) * 100, 100);
        $co_level_info = $this->getCoLevel($co);
        $co_level_name = $co_level_info['name'];
        $co_level_number = $co_level_info['number'];

        $co2_max = 850;
        $co2 = $data[0]['payload']['d']['g1'];
        $co2_percentage = min(($co2 / $co2_max) * 100, 100);
        $co2_level_info = $this->getCo2Level($co2);
        $co2_level_name = $co2_level_info['name'];
        $co2_level_number = $co2_level_info['number'];

        $noise_min_max = 120;
        $noise_min = $data[0]['payload']['d']['lmin'];
        $noise_min_percentage = min(($noise_min / $noise_min_max) * 100, 100);
        $noise_min_level_info = $this->getNoiseMinLevel($noise_min);
        $noise_min_level_name = $noise_min_level_info['name'];
        $noise_min_level_number = $noise_min_level_info['number'];

        // $noise_max = $data[0]['payload']['d']['lmax'];
        // $noise_leq = $data[0]['payload']['d']['leq'];

        $pressure_max = 1032;
        $pressure = $data[0]['payload']['d']['pr'];
        $pressure_percentage = min(($pressure / $pressure_max) * 100, 100);
        $pressure_level_info = $this->getPressureLevel($pressure);
        $pressure_level_name = $pressure_level_info['name'];
        $pressure_level_number = $pressure_level_info['number'];

        $uv_max = 10;
        $uv = $data[0]['payload']['d']['uv'];
        $uv_percentage = min(($uv / $uv_max) * 100, 100);
        $uv_level_info = $this->getUvLevel($uv);
        $uv_level_name = $uv_level_info['name'];
        $uv_level_number = $uv_level_info['number'];

        $light_intensity_max = 25000;
        $light_intensity = $data[0]['payload']['d']['light'];
        $light_intensity_percentage = min(($light_intensity / $light_intensity_max) * 100, 100);
        $light_intensity_level_info = $this->getLightIntensityLevel($light_intensity);
        $light_intensity_level_name = $light_intensity_level_info['name'];
        $light_intensity_level_number = $light_intensity_level_info['number'];

        $aqi_max = 25000;
        $aqi = $data[0]['aqi'];
        $aqi_percentage = $this->getPercentage($aqi, 0, 500);
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
                "noise_min" => [
                    "value" => $noise_min,
                    "percentage" => $noise_min_percentage,
                    "level_name" => $noise_min_level_name,
                    "level_number" => $noise_min_level_number,
                ],
                // "noise_max" => $noise_max,
                // "noise_leq" => $noise_leq,
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

    private function getHumidityLevelPercentage($value)
    {
        $number_range = [30, 50, 65, 80, 90];

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $lower_threshold = $index > 0 ? $number_range[$index - 1] : 0;
                $percentage = ($value - $lower_threshold) / ($threshold - $lower_threshold) * 100;
                return round($percentage, 2);
            }
        }

        // If the value exceeds the highest threshold
        $percentage = 100;
        return $percentage;
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

    private function getTemperatureLevelPercentage($value)
    {
        $number_range = [20, 25, 30, 35, 40];

        foreach ($number_range as $index => $threshold) {
            if ($value < $threshold) {
                $lower_threshold = $index > 0 ? $number_range[$index - 1] : 0;
                $percentage = ($value - $lower_threshold) / ($threshold - $lower_threshold) * 100;
                return round($percentage, 2);
            }
        }

        $percentage = 100;
        return $percentage;
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

    private function getPercentage($value, $minRange, $maxRange)
    {
        return (($value - $minRange) / ($maxRange - $minRange)) * 100;
    }
}
