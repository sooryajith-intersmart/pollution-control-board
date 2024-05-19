$(document).ready(function () {
    // Function to fetch the latest device data from the server
    function getLatestDevicesData() {
        var delayTime = 60000; // 1 minute
        $.ajax({
            url: '/get-latest-devices-data',
            type: "get",
            dataType: "json",
            success: function (response) {
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
        setBackgroundBasedOnLevel(data.level_number, `.${sensorType}-level-background`);
        setColorBasedOnLevel(data.level_number, `.${sensorType}-level-color`);
        if ($(`.${sensorType}-level-fill`).length) {
            setFillBasedOnLevel(data.level_number, `.${sensorType}-level-fill`);
        }
        $(`.${sensorType}-level-name`).text(data.level_name);
    }

    // Function to set background color based on the level number
    function setBackgroundBasedOnLevel(levelNumber, elementClass) {
        var backgroundColor;
        switch (levelNumber) {
            case 1:
                backgroundColor = 'var(--level1)';
                break;
            case 2:
                backgroundColor = 'var(--level2)';
                break;
            case 3:
                backgroundColor = 'var(--level3)';
                break;
            case 4:
                backgroundColor = 'var(--level4)';
                break;
            case 5:
                backgroundColor = 'var(--level5)';
                break;
            case 6:
                backgroundColor = 'var(--level6)';
                break;
            default:
                backgroundColor = 'var(--default-color)';
        }
        // Set the background color of the element
        $(elementClass).css('background', backgroundColor);
    }

    // Function to set color based on the level number
    function setColorBasedOnLevel(levelNumber, elementClass) {
        var color;
        switch (levelNumber) {
            case 1:
                color = 'var(--level1)';
                break;
            case 2:
                color = 'var(--level2)';
                break;
            case 3:
                color = 'var(--level3)';
                break;
            case 4:
                color = 'var(--level4)';
                break;
            case 5:
                color = 'var(--level5)';
                break;
            case 6:
                color = 'var(--level6)';
                break;
            default:
                color = 'var(--default-color)';
        }
        // Set the color of the element
        $(elementClass).css('color', color);
    }

    // Function to set fill color based on the level number
    function setFillBasedOnLevel(levelNumber, elementClass) {
        var fill;
        switch (levelNumber) {
            case 1:
                fill = 'var(--level1)';
                break;
            case 2:
                fill = 'var(--level2)';
                break;
            case 3:
                fill = 'var(--level3)';
                break;
            case 4:
                fill = 'var(--level4)';
                break;
            case 5:
                fill = 'var(--level5)';
                break;
            case 6:
                fill = 'var(--level6)';
                break;
            default:
                fill = 'var(--default-fill)';
        }
        // Set the fill of the element
        $(elementClass).css('fill', fill);
    }
});