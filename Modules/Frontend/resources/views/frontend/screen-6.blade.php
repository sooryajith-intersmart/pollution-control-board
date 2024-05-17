@extends('frontend::layouts.app')
@section('title', 'Enviro Watch : Real-time Pollution Monitoring System')
@section('content')
<div id="pageWrapper">
    <section class="MainSlide">
        <div id="Screen6" class="Screens">
            <div class="ScreenBG">
                <figure><img src="{{ asset('frontend/images/Screen6BG.jpg') }}" alt="Background">
                </figure>
            </div>
            <div class="container">
                <div class="MainHead">Real-time Pollution Monitor</div>
                <div class="Row">
                    <div class="Col">
                        <div class="BoxTitle">AQI</div>
                        <div class="Box AQI">
                            <div class="GaugeSec">
                                <figure>
                                    <img src="{{ asset('frontend/images/AQI.svg') }}" width="226" height="117"
                                        alt="Background">
                                </figure>
                                <div class="NeedleWrp">
                                    <div class="Needle aqi-percentage" data-value="0"></div>
                                    <div class="GuageValueWrp">
                                        <div class="IndexValue aqi-level-color" style="color: var(--level1)">
                                            <div class="Count aqi-value" data-count="0">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="LevelsOfConcern aqi-level-name aqi-level-background"
                                style="background: var(--level1)">
                                Good
                            </div>
                        </div>
                    </div>
                    <div class="Col">
                        <div class="BoxTitle">UV dial</div>
                        <div class="Box UVDial">
                            <div class="GaugeSec">
                                <figure>
                                    <img src="{{ asset('frontend/images/UVdial.svg') }}" width="226" height="117"
                                        alt="Background">
                                </figure>
                                <div class="NeedleWrp">
                                    <div class="Needle uv-percentage" data-value="0"></div>
                                    <div class="GuageValueWrp">
                                        <div class="IndexValue uv-level-color" style="color: var(--level1)">
                                            <div class="Count uv-value" data-count="0">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="LevelsOfConcern uv-level-name uv-level-background"
                                style="background: var(--level1)">
                                Very Low
                            </div>
                        </div>
                    </div>
                    <div class="Col">
                        <div class="BoxTitle">Light intensity </div>
                        <div class="Box Lightintensity ">
                            <div class="GaugeSec">
                                <figure>
                                    <img src="{{ asset('frontend/images/Lightintensityd.svg') }}" width="226"
                                        height="117" alt="Background">
                                </figure>
                                <div class="NeedleWrp">
                                    <div class="Needle light_intensity-percentage" data-value="0"></div>
                                    <div class="GuageValueWrp">
                                        <div class="IndexValue light_intensity-level-color"
                                            style="align-items:flex-end; color: var(--level1)">
                                            <div class="Count light_intensity-value" data-count="0">0</div>
                                            <div class="Symbol">
                                                Lux
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="LevelsOfConcern light_intensity-level-name light_intensity-level-background"
                                style="background: var(--level1)">
                                Dim
                            </div>
                        </div>
                    </div>
                </div>
                <div class="FootBox">
                    <div class="InnerSlide splide" role="group" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <div class="DFleX">
                                        <div class="ImgBoX">
                                            <img decoding="async" fetchpriority="low"
                                                src="{{ asset('frontend/images/Screen6Slide1.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen6Slide1.jpg') }} 300w, {{ asset('frontend/images/Screen6Slide1.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Be mindful of sun damage through UV rays: protect yourself.
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="DFleX">
                                        <div class="ImgBoX">
                                            <img decoding="async" fetchpriority="low"
                                                src="{{ asset('frontend/images/Screen6Slide2.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen6Slide2.jpg') }} 300w, {{ asset('frontend/images/Screen6Slide2.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Shield your skin : Defend against sun damage
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="DFleX">
                                        <div class="ImgBoX">
                                            <img decoding="async" fetchpriority="low"
                                                src="{{ asset('frontend/images/Screen6Slide3.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen6Slide3.jpg') }} 300w, {{ asset('frontend/images/Screen6Slide3.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Wearing UV-protective sunglasses shields your eyes from
                                                harmful rays
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"
    integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link defer rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/splide.min.css"
    integrity="sha512-KhFXpe+VJEu5HYbJyKQs9VvwGB+jQepqb4ZnlhUF/jQGxYJcjdxOTf6cr445hOc791FFLs18DKVpfrQnONOB1g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
document.addEventListener("DOMContentLoaded", function() {
    const arrows = document.querySelectorAll(".Needle");

    arrows.forEach(arrow => {
        animateArrow(arrow, -180, parseInt(arrow.getAttribute("data-value")));
        observeDataValueChanges(arrow);
    });

    var InnerSlide = new Splide('.InnerSlide', {
        type: 'fade',
        rewind: true,
        autoplay: true,
        interval: 5000,
        perPage: 1,
        drag: false,
        pagination: true,
        arrows: false,
        start: 0,
    });

    InnerSlide.mount();

    function animateArrow(arrow, initialValue, finalValue) {
        const duration = 500; // milliseconds
        const startTime = performance.now();

        function updateAnimation(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1);
            const interpolatedValue = initialValue + (finalValue - initialValue) * progress;

            const angle = -180 + (interpolatedValue / 100) * 180;
            arrow.style.transform = `rotate(${angle}deg)`;

            if (progress < 1) {
                requestAnimationFrame(updateAnimation);
            }
        }

        requestAnimationFrame(updateAnimation);
    }

    function observeDataValueChanges(arrow) {
        const observer = new MutationObserver(mutationsList => {
            mutationsList.forEach(mutation => {
                if (mutation.attributeName === "data-value") {
                    const finalValue = parseInt(mutation.target.getAttribute("data-value"));
                    const initialValue = parseInt(mutation.oldValue);
                    animateArrow(arrow, initialValue, finalValue);
                }
            });
        });

        observer.observe(arrow, {
            attributes: true,
            attributeOldValue: true
        });
    }
});
</script>
@endpush