$(document).ready(function () {
    // Function to fetch the latest device data from the server
    function getLatestDevicesData() {
        var delayTime = 60000; // 1 minute
        $.ajax({
            url: '/get-latest-devices-data',
            type: "get",
            dataType: "json",
            success: function (response) {
                if (response && response.error) {
                    // Handle response error
                    console.error('Server responded with an error:', response.error);
                } else {
                    // Update data for each sensor
                    const sensors = [
                        { type: 'aqi', data: response.data.aqi },
                        { type: 'humidity', data: response.data.humidity },
                        { type: 'temperature', data: response.data.temperature },
                        { type: 'pm25', data: response.data.pm25 },
                        { type: 'pm10', data: response.data.pm10 },
                        { type: 'pm1', data: response.data.pm1 },
                        { type: 'pm100', data: response.data.pm100 },
                        { type: 'co', data: response.data.co },
                        { type: 'co2', data: response.data.co2 },
                        { type: 'noise', data: response.data.noise },
                        { type: 'pressure', data: response.data.pressure },
                        { type: 'uv', data: response.data.uv },
                        { type: 'light_intensity', data: response.data.light_intensity }
                    ];

                    // Loop through each sensor and update its data
                    sensors.forEach(sensor => {
                        updateSensorData(sensor.type, sensor.data);
                    });

                    // Animate the update of each sensor value
                    $('.IndexValue .Count').each(function () {
                        var $this = $(this),
                            countTo = $this.attr('data-count');

                        $this.attr('aria-live', 'polite');
                        $this.attr('aria-busy', 'true');

                        $({
                            countNum: $this.text()
                        }).animate({
                            countNum: countTo
                        }, {
                            duration: 2000,
                            easing: 'linear',
                            step: function () {
                                if ($this.hasClass('co-value') || $this.hasClass('uv-value')) {
                                    $this.text(parseFloat(this.countNum).toFixed(2));
                                } else {
                                    $this.text(Math.round(parseFloat(this.countNum)));
                                }
                            },
                            complete: function () {
                                if ($this.hasClass('co-value') || $this.hasClass('uv-value')) {
                                    if (this.countNum % 1 === 0) {
                                        $this.text(parseInt(this.countNum, 10));
                                    } else {
                                        $this.text(parseFloat(this.countNum).toFixed(2));
                                    }
                                } else {
                                    $this.text(Math.round(parseFloat(this.countNum)));
                                }
                                $this.attr('aria-busy', 'false');
                            }
                        });
                    });
                }
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error('Error fetching latest device data:', error);
                // Reload the page after the specified delay time in case of error
                setTimeout(function () {
                    location.reload();
                }, delayTime);
            },
            complete: function () {
                // Fetch the latest device data again after the specified delay time
                setTimeout(function () {
                    getLatestDevicesData();
                }, delayTime);
            }
        });
    }

    // Initial call to fetch the latest device data
    getLatestDevicesData();

    // Define a generic function to handle the repetitive tasks for updating sensor data
    function updateSensorData(sensorType, data) {
        $(`.${sensorType}-value`).attr('data-count', data.value);
        $(`.${sensorType}-percentage`).attr('data-value', data.percentage);
        setStylesBasedOnLevel(data.level_number, sensorType);
        $(`.${sensorType}-level-name`).text(data.level_name);
    }

    // Function to set styles (background, color, fill) based on the level number
    function setStylesBasedOnLevel(levelNumber, sensorType) {
        var levelColors = {
            1: 'var(--level1)',
            2: 'var(--level2)',
            3: 'var(--level3)',
            4: 'var(--level4)',
            5: 'var(--level5)',
            6: 'var(--level6)',
            default: 'var(--default-color)'
        };
        var color = levelColors[levelNumber] || levelColors.default;

        // Set the background color of the element
        $(`.${sensorType}-level-background`).css('background', color);
        // Set the color of the element
        $(`.${sensorType}-level-color`).css('color', color);
        // Set the fill color of the element, if it exists
        if ($(`.${sensorType}-level-fill`).length) {
            $(`.${sensorType}-level-fill`).css('fill', color);
        }
    }
});