@extends('frontend::layouts.app')
@section('title', 'AQI')
@section('content')
<div id="pageWrapper">
    <section class="MainSlide">
        <div id="Screen5" class="Screens">
            <div class="ScreenBG">
                <figure><img src="{{ asset('frontend/images/Screen5BG.jpg') }}" alt="Background">
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
                        <div class="BoxTitle">noise</div>
                        <div class="Box Noise">
                            <div class="GaugeSec">
                                <figure>
                                    <img src="{{ asset('frontend/images/Noise.svg') }}" width="226" height="117"
                                        alt="Background">
                                </figure>
                                <div class="NeedleWrp">
                                    <div class="Needle noise-percentage" data-value="0"></div>
                                    <div class="GuageValueWrp">
                                        <div class="IndexValue noise-level-color"
                                            style="align-items: flex-end;color: var(--level1)">
                                            <div class="Count noise-value" data-count="0">0</div>
                                            <div class="Symbol">dB</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="LevelsOfConcern noise-level-name noise-level-background"
                                style="background: var(--level1)">
                                Quiet
                            </div>
                        </div>
                    </div>
                    <div class="Col">
                        <div class="BoxTitle">pressure</div>
                        <div class="Box Pressure">
                            <div class="GaugeSec">
                                <figure>
                                    <img src="{{ asset('frontend/images/Pressure.svg') }}" width="226" height="117"
                                        alt="Background">
                                </figure>
                                <div class="NeedleWrp">
                                    <div class="Needle pressure-percentage" data-value="0"></div>
                                    <div class="GuageValueWrp">
                                        <div class="IndexValue pressure-level-color"
                                            style="align-items: flex-end;color: var(--level1)">
                                            <div class="Count pressure-value" data-count="0">0</div>
                                            <div class="Symbol">
                                                hPA
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="LevelsOfConcern pressure-level-name pressure-level-background"
                                style="background: var(--level1)">
                                Very Low
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
                                                src="{{ asset('frontend/images/Screen5Slide1.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen5Slide1.jpg') }} 300w, {{ asset('frontend/images/Screen5Slide1.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Quiet please, Kochi's ears need rest: Say no to noise pollution
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="DFleX">
                                        <div class="ImgBoX">
                                            <img decoding="async" fetchpriority="low"
                                                src="{{ asset('frontend/images/Screen5Slide2.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen5Slide2.jpg') }} 300w, {{ asset('frontend/images/Screen5Slide2.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Turn down the volume, Kochi: Let's silence noise pollution
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="DFleX">
                                        <div class="ImgBoX">
                                            <img decoding="async" fetchpriority="low"
                                                src="{{ asset('frontend/images/Screen5Slide3.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen5Slide3.jpg') }} 300w, {{ asset('frontend/images/Screen5Slide3.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Less honking, more harmony: A plea for peaceful streets
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

    function animateCount() {
        $('.IndexValue .Count').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');

            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(Math.floor(this
                        .countNum)); // Ensure the count ends with a whole number
                }
            });
        });
    }

    animateCount();

    // Update count to 0 for non-active slides
    $('.IndexValue .Count').text(0);

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