<?php

namespace App\Helpers;

class FrontendHelper
{
    /**
     * Retrieves an access token from the OAuth2 token endpoint of the specified API.
     * 
     * This function sends a POST request with client credentials to obtain an access token
     * which is necessary for making authorized API requests.
     * 
     * @return string The access token retrieved from the API.
     * @author Sooryajith
     */
    public static function getAccessToken()
    {
        $url = 'https://production.oizom.com/v1/oauth2/token';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
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
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($httpCode === 200) {
            curl_close($curl);

            $response_data = json_decode($response, true);
            return $response_data['access_token'];
        } else {
            $error = curl_error($curl);
            $error_code = curl_errno($curl);
            curl_close($curl);
            // Handle the error appropriately, e.g., log it
            error_log("Error fetching data from $url: $error (Error code: $error_code)");
            return false;
        }
    }

    /**
     * Retrieves the latest environmental data from the specified API endpoint.
     * 
     * This function first obtains an access token using the getAccessToken method.
     * It then sends a GET request to the API endpoint using the retrieved access token
     * for authorization and returns the response data as an associative array.
     * 
     * @return array The decoded JSON response containing the latest environmental data.
     * @author Sooryajith
     */
    public static function getData()
    {
        $access_token = FrontendHelper::getAccessToken();
        if (!$access_token)
            return null;
        $url = 'https://production.oizom.com/v1/data/cur';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
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
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($httpCode === 200) {
            curl_close($curl);

            return json_decode($response, true);
        } else {
            $error = curl_error($curl);
            $error_code = curl_errno($curl);
            curl_close($curl);
            // Handle the error appropriately, e.g., log it
            error_log("Error fetching data from $url: $error (Error code: $error_code)");
            return null;
        }
    }

    /**
     * Defines the metrics to be analyzed with their respective ranges and descriptive names.
     * 
     * @param array $data The raw data from the device.
     * @return array The defined metrics.
     * @author Sooryajith
     */
    public static function defineMetrics($data)
    {
        return [
            'aqi' => [
                'value' => $data['aqi'] ?? 0,
                'ranges' => [50, 100, 200, 300, 400, 500],
                'names' => ['Good', 'Satisfactory', 'Moderate', 'Poor', 'Very Poor', 'Severe']
            ],
            'humidity' => [
                'value' => $data['payload']['d']['hum'] ?? 0,
                'ranges' => [30, 50, 65, 80, 90, 100],
                'names' => ['Very Dry', 'Dry', 'Comfortable', 'Sticky', 'Muggy', 'Oppressive']
            ],
            'temperature' => [
                'value' => $data['payload']['d']['temp'] ?? 0,
                'ranges' => [20, 25, 30, 35, 40, 45],
                'names' => ['Cold', 'Below Average', 'Normal', 'Above Average', 'Sweltering', 'Scorching']
            ],
            'pm25' => [
                'value' => $data['payload']['d']['p1'] ?? 0,
                'ranges' => [30, 60, 90, 120, 250, 480],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'pm10' => [
                'value' => $data['payload']['d']['p2'] ?? 0,
                'ranges' => [50, 100, 250, 350, 430, 510],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'pm1' => [
                'value' => $data['payload']['d']['p3'] ?? 0,
                'ranges' => [30, 60, 90, 120, 250, 480],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'pm100' => [
                'value' => $data['payload']['d']['p4'] ?? 0,
                'ranges' => [50, 100, 250, 350, 430, 510],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'co' => [
                'value' => $data['payload']['d']['g2'] ?? 0,
                'ranges' => [1, 2, 10, 20, 34, 49],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'co2' => [
                'value' => $data['payload']['d']['g1'] ?? 0,
                'ranges' => [300, 400, 500, 650, 850, 1100],
                'names' => ['Below normal', 'Normal', 'High', 'Very High', 'Dangerous', 'Hazardous']
            ],
            'noise' => [
                'value' => $data['payload']['d']['leq'] ?? 0,
                'ranges' => [40, 60, 80, 100, 120, 140],
                'names' => ['Quiet', 'Moderate', 'Loud', 'Very Loud', 'Extreme', 'Painful']
            ],
            'pressure' => [
                'value' => $data['payload']['d']['pr'] ?? 0,
                'ranges' => [996, 1009, 1016, 1022, 1032, 1046],
                'names' => ['Very Low', 'Low', 'Normal', 'Above Average', 'High', 'Very High']
            ],
            'uv' => [
                'value' => $data['payload']['d']['uv'] ?? 0,
                'ranges' => [2, 3, 5, 7, 10, 14],
                'names' => ['Very Low', 'Low', 'Moderate', 'High', 'Very High', 'Extreme']
            ],
            'light_intensity' => [
                'value' => $data['payload']['d']['light'] ?? 0,
                'ranges' => [100, 500, 2000, 10000, 25000, 62500],
                'names' => ['Dim', 'Low', 'Moderate', 'Bright', 'Very Bright', 'Extreme']
            ]
        ];
    }

    /**
     * Processes a single metric to calculate the percentage, level name, and level number.
     * 
     * @param array $metric The metric data including value, ranges, and names.
     * @return array The processed metric data including value, percentage, level name, and level number.
     * @author Sooryajith
     */
    public static function processMetric($metric)
    {
        $info = FrontendHelper::getGaugeInfo($metric['value'], $metric['ranges'], $metric['names']);
        return [
            'value' => $metric['value'],
            'percentage' => $info['percentage'],
            'level_name' => $info['name'],
            'level_number' => $info['number']
        ];
    }

    /**
     * Get gauge information based on a value within a specified range.
     *
     * This function calculates the gauge level of the value based on the provided number range
     * and returns the level name, level number, and the percentage representation
     * of the value within the range.
     *
     * @param float $value The value to be evaluated.
     * @param array $number_range An array defining the ranges for different levels.
     * @param array $level_names An array containing the names corresponding to each level.
     * @return array An associative array containing gauge information: name, number, and percentage.
     * @author Sooryajith
     */
    public static function getGaugeInfo($value, $number_range, $level_names)
    {
        $percentages = 100 / count($number_range);
        $range_index = 0;

        // Adjust value if it exceeds the last range or is negative
        $value = max(0, min(end($number_range), $value));

        // Find the range in which the value falls
        foreach ($number_range as $index => $range) {
            if ($value <= $range) {
                $range_index = $index;
                break;
            }
        }

        // Determine the level name based on the range index
        $level_name = $level_names[$range_index];
        // Calculate the level number by adding 1 to the range index
        $level_number = $range_index + 1;

        // Calculate the percentage within the range
        $lower_bound = $range_index > 0 ? $number_range[$range_index - 1] : 0;
        $upper_bound = $number_range[$range_index];
        $range_percentage = $percentages * $range_index;
        $percentage_within_range = $range_percentage + (($value - $lower_bound) / ($upper_bound - $lower_bound)) * $percentages;

        return [
            'name' => $level_name,
            'number' => $level_number,
            'percentage' => $percentage_within_range
        ];
    }
}
