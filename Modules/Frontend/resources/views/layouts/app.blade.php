<!doctype html>
<html lang="en" dir="ltr">
<!-- <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script> -->
<!-- 
 ██╗███╗░░██╗████████╗███████╗██████╗░░██████╗███╗░░░███╗░█████╗░██████╗░████████╗
 ██║████╗░██║╚══██╔══╝██╔════╝██╔══██╗██╔════╝████╗░████║██╔══██╗██╔══██╗╚══██╔══╝
 ██║██╔██╗██║░░░██║░░░█████╗░░██████╔╝╚█████╗░██╔████╔██║███████║██████╔╝░░░██║░░░
 ██║██║╚████║░░░██║░░░██╔══╝░░██╔══██╗░╚═══██╗██║╚██╔╝██║██╔══██║██╔══██╗░░░██║░░░
 ██║██║░╚███║░░░██║░░░███████╗██║░░██║██████╔╝██║░╚═╝░██║██║░░██║██║░░██║░░░██║░░░
 ╚═╝╚═╝░░╚══╝░░░╚═╝░░░╚══════╝╚═╝░░╚═╝╚═════╝░╚═╝░░░░░╚═╝╚═╝░░╚═╝╚═╝░░╚═╝░░░╚═╝░░░
 -->

<head>
    <title>@yield('title')</title>
    <style>
        /* Inline critical CSS here */
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon"> -->
    <meta name="description" itemprop="description" content="">
    <link rel="canonical" href="">

    <meta name="keywords" itemprop="keywords" content="Home">
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token" content="E4DghxYW3Gt8dec_9UV3TyEK_kfhikX92nxw5mSwSyxD0anze3KIBzMYuFaWNU8-TH_MIqf9fLiOKkeIJ4U6ew==">
    <!-- <meta name="robots" content="noindex, nofollow"> -->

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <!-- <meta property="og:image" content="space.webp" />
    <meta property="og:image:width" content="2334">
    <meta property="og:image:height" content="1646">
    <meta property="og:image:type" content="image/webp"> -->
    <meta property="og:site_name" content="Real-time Pollution Monitor" />

    <meta name="robots" content="max-image-preview:large" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="og_img.png" />
    <meta name="twitter:image:alt" content="AQI" />


    <meta name="mobile-web-app-capable" content="yes">

    <!-- <link rel="manifest" href="manifest.webmanifest" /> -->

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#000000">

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "Real-time Pollution Monitor",
            "description": ""
        }
    </script>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- INCLUDES -->
    <!-- <link rel="stylesheet preload" type="text/css" href="{{ asset('frontend/css/app.min.css') }}" as="style" media="all"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/app.min.css') }}">
    @stack('css')
</head>

<body>

    <div id="viewport">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js" integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/splide.min.css" integrity="sha512-KhFXpe+VJEu5HYbJyKQs9VvwGB+jQepqb4ZnlhUF/jQGxYJcjdxOTf6cr445hOc791FFLs18DKVpfrQnONOB1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script>

            const process_txt = document.querySelector('.process');
            const success_txt = document.querySelector('.success');
    
            setTimeout(() => {
                process_txt.classList.add('active');
            }, 0)
    
            setTimeout(toggleMsg, 1600);
    
            function toggleMsg() {
                process_txt.classList.remove('active');
                success_txt.classList.add('active');
            }
    
        </script> -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const arrows = document.querySelectorAll(".Needle");

            arrows.forEach(arrow => {
                animateArrow(arrow, -180, parseInt(arrow.getAttribute("data-value")));
                observeDataValueChanges(arrow);
            });

            var MainSlide = new Splide('.MainSlide', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                interval: 15000,
                speed: 1000,
                perPage: 1,
                pagination: false,
                arrows: false,
                cover: true,
                keyboard: true,
                pauseOnHover: false,
                pauseOnFocus: false,
            });

            var InnerSlide = new Splide('.InnerSlide', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                interval: 1666,
                perPage: 1,
                drag: false,
                pagination: true,
                arrows: false,
                start: 0,
            });

            var InnerSlide2 = new Splide('.InnerSlide2', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                interval: 1666,
                perPage: 1,
                drag: false,
                pagination: true,
                arrows: false,
                start: 0,
            });

            var InnerSlide3 = new Splide('.InnerSlide3', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                interval: 1666,
                perPage: 1,
                drag: false,
                pagination: true,
                arrows: false,
                start: 0,
            });

            var InnerSlide4 = new Splide('.InnerSlide4', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                interval: 1666,
                perPage: 1,
                drag: false,
                pagination: true,
                arrows: false,
                start: 0,
            });

            var InnerSlide5 = new Splide('.InnerSlide5', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                interval: 1666,
                perPage: 1,
                drag: false,
                pagination: true,
                arrows: false,
                start: 0,
            });

            var InnerSlide6 = new Splide('.InnerSlide6', {
                type: 'fade',
                rewind: true,
                autoplay: true,
                interval: 1666,
                perPage: 1,
                drag: false,
                pagination: true,
                arrows: false,
                start: 0,
            });

            MainSlide.mount();
            InnerSlide.mount();
            InnerSlide2.mount();
            InnerSlide3.mount();
            InnerSlide4.mount();
            InnerSlide5.mount();
            InnerSlide6.mount();

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
                            $this.text(Math.floor(this.countNum)); // Ensure the count ends with a whole number
                        }
                    });
                });
            }

            animateCount();

            // Update count to 0 for non-active slides
            $('.IndexValue .Count').text(0);

            MainSlide.on('moved', function(newIndex) {
                InnerSlide.go(0);
                InnerSlide2.go(0);
                InnerSlide3.go(0);
                InnerSlide4.go(0);
                InnerSlide5.go(0);
                InnerSlide6.go(0);
                const slides = MainSlide.Components.Elements.slides; // Get all slides
                slides.forEach((slide, index) => {
                    const arrows = document.querySelectorAll(".Needle");
                    arrows.forEach(arrow => {
                        animateArrow(arrow, -180, parseInt(arrow.getAttribute("data-value")));
                        observeDataValueChanges(arrow);
                    });
                });
                $('.IndexValue .Count').text(0);
                animateCount();
            });

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
    <script async type="text/javascript" src="{{ asset('frontend/js/app.js') }}"></script>
    @stack('js')
</body>

</html>