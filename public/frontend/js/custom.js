$(document).ready(function () {
    $.ajax({
        url: '/get-latest-devices-data',
        type: "get",
        dataType: "json",
        success: function (response) {
            // aqi
            $('.aqi-value').attr('data-count', response.data.aqi.value);
            $('.aqi-percentage').attr('data-value', response.data.aqi.percentage);
            setBackgroundBasedOnLevel(response.data.aqi.level_number, '.aqi-level-background');
            setColorBasedOnLevel(response.data.aqi.level_number, '.aqi-level-color');
            $('.aqi-level-name').text(response.data.aqi.level_name);
            // humidity
            $('.humidity-value').attr('data-count', response.data.humidity.value);
            $('.humidity-percentage').attr('data-value', response.data.humidity.percentage);
            setBackgroundBasedOnLevel(response.data.humidity.level_number,
                '.humidity-level-background');
            setColorBasedOnLevel(response.data.humidity.level_number, '.humidity-level-color');
            $('.humidity-level-name').text(response.data.humidity.level_name);
            // temperature
            $('.temperature-value').attr('data-count', response.data.temperature.value);
            $('.temperature-percentage').attr('data-value', response.data.temperature.percentage);
            setBackgroundBasedOnLevel(response.data.temperature.level_number,
                '.temperature-level-background');
            setColorBasedOnLevel(response.data.temperature.level_number,
                '.temperature-level-color');
            setFillBasedOnLevel(response.data.temperature.level_number,
                '.temperature-level-fill');
            $('.temperature-level-name').text(response.data.temperature.level_name);
            // pm25
            $('.pm25-value').attr('data-count', response.data.pm25.value);
            $('.pm25-percentage').attr('data-value', response.data.pm25.percentage);
            setBackgroundBasedOnLevel(response.data.pm25.level_number, '.pm25-level-background');
            setColorBasedOnLevel(response.data.pm25.level_number, '.pm25-level-color');
            setFillBasedOnLevel(response.data.pm25.level_number,
                '.pm25-level-fill');
            $('.pm25-level-name').text(response.data.pm25.level_name);
            // pm10
            $('.pm10-value').attr('data-count', response.data.pm10.value);
            $('.pm10-percentage').attr('data-value', response.data.pm10.percentage);
            setBackgroundBasedOnLevel(response.data.pm10.level_number, '.pm10-level-background');
            setColorBasedOnLevel(response.data.pm10.level_number, '.pm10-level-color');
            setFillBasedOnLevel(response.data.pm10.level_number,
                '.pm10-level-fill');
            $('.pm10-level-name').text(response.data.pm10.level_name);
            // pm1
            $('.pm1-value').attr('data-count', response.data.pm1.value);
            $('.pm1-percentage').attr('data-value', response.data.pm1.percentage);
            setBackgroundBasedOnLevel(response.data.pm1.level_number, '.pm1-level-background');
            setColorBasedOnLevel(response.data.pm1.level_number, '.pm1-level-color');
            setFillBasedOnLevel(response.data.pm1.level_number,
                '.pm1-level-fill');
            $('.pm1-level-name').text(response.data.pm1.level_name);
            // pm100
            $('.pm100-value').attr('data-count', response.data.pm100.value);
            $('.pm100-percentage').attr('data-value', response.data.pm100.percentage);
            setBackgroundBasedOnLevel(response.data.pm100.level_number, '.pm100-level-background');
            setColorBasedOnLevel(response.data.pm100.level_number, '.pm100-level-color');
            setFillBasedOnLevel(response.data.pm100.level_number,
                '.pm100-level-fill');
            $('.pm100-level-name').text(response.data.pm100.level_name);
            // co
            $('.co-value').attr('data-count', response.data.co.value);
            $('.co-percentage').attr('data-value', response.data.co.percentage);
            setBackgroundBasedOnLevel(response.data.co.level_number, '.co-level-background');
            setColorBasedOnLevel(response.data.co.level_number, '.co-level-color');
            setFillBasedOnLevel(response.data.co.level_number,
                '.co-level-fill');
            $('.co-level-name').text(response.data.co.level_name);
            // co2
            $('.co2-value').attr('data-count', response.data.co2.value);
            $('.co2-percentage').attr('data-value', response.data.co2.percentage);
            setBackgroundBasedOnLevel(response.data.co2.level_number, '.co2-level-background');
            setColorBasedOnLevel(response.data.co2.level_number, '.co2-level-color');
            setFillBasedOnLevel(response.data.co2.level_number,
                '.co2-level-fill');
            $('.co2-level-name').text(response.data.co2.level_name);
            // noise
            $('.noise-value').attr('data-count', response.data.noise.value);
            $('.noise-percentage').attr('data-value', response.data.noise.percentage);
            setBackgroundBasedOnLevel(response.data.noise.level_number,
                '.noise-level-background');
            setColorBasedOnLevel(response.data.noise.level_number, '.noise-level-color');
            $('.noise-level-name').text(response.data.noise.level_name);
            // pressure
            $('.pressure-value').attr('data-count', response.data.pressure.value);
            $('.pressure-percentage').attr('data-value', response.data.pressure.percentage);
            setBackgroundBasedOnLevel(response.data.pressure.level_number,
                '.pressure-level-background');
            setColorBasedOnLevel(response.data.pressure.level_number, '.pressure-level-color');
            $('.pressure-level-name').text(response.data.pressure.level_name);
            // uv
            $('.uv-value').attr('data-count', response.data.uv.value);
            $('.uv-percentage').attr('data-value', response.data.uv.percentage);
            setBackgroundBasedOnLevel(response.data.uv.level_number, '.uv-level-background');
            setColorBasedOnLevel(response.data.uv.level_number, '.uv-level-color');
            $('.uv-level-name').text(response.data.uv.level_name);
            // light_intensity
            $('.light_intensity-value').attr('data-count', response.data.light_intensity.value);
            $('.light_intensity-percentage').attr('data-value', response.data.light_intensity
                .percentage);
            setBackgroundBasedOnLevel(response.data.light_intensity.level_number,
                '.light_intensity-level-background');
            setColorBasedOnLevel(response.data.light_intensity.level_number,
                '.light_intensity-level-color');
            $('.light_intensity-level-name').text(response.data.light_intensity.level_name);
            $('.IndexValue .Count').each(function () {
                var $this = $(this),
                    countTo = $this.attr('data-count');

                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'linear',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(Math.floor(this
                            .countNum
                        )); // Ensure the count ends with a whole number
                    }
                });
            });
        },
    });

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