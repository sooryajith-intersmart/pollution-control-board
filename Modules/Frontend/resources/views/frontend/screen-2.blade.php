@extends('frontend::layouts.app')
@section('title', 'AQI')
@section('content')
<div id="pageWrapper">
    <section class="MainSlide">
        <div id="Screen2" class="Screens">
            <div class="ScreenBG">
                <figure><img src="{{ asset('frontend/images/Screen2BG.jpg') }}" alt="Background">
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
                                    <img src="{{ asset('frontend/images/AQId.svg') }}" width="226" height="117"
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
                        <div class="BoxTitle">PM 2.5</div>
                        <div class="Box PM25">
                            <div class="GaugeSec">
                                <figure>
                                    <img src="{{ asset('frontend/images/PM2point5d.svg') }}" width="226" height="117"
                                        alt="Background">
                                </figure>
                                <div class="NeedleWrp">
                                    <div class="Needle pm25-percentage" data-value="0"></div>
                                    <div class="GuageValueWrp">
                                        <div class="IndexValue pm25-level-color" style="color: var(--level1)">
                                            <div class="Count pm25-value" data-count="0">0</div>
                                            <div class="Symbol">
                                                <svg id="ugM3" width="36" height="14" viewBox="0 0 36 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path class="pm25-level-fill"
                                                        d="M33.252 0.514526C33.7402 0.514526 34.1445 0.637573 34.4648 0.883667C34.7852 1.12585 34.9453 1.45398 34.9453 1.86804C34.9453 2.14148 34.8652 2.37585 34.7051 2.57117C34.5488 2.76648 34.2969 2.92078 33.9492 3.03406V3.10437C34.3437 3.19031 34.6348 3.34656 34.8223 3.57312C35.0137 3.79968 35.1094 4.05164 35.1094 4.32898C35.1094 4.80164 34.9375 5.17468 34.5937 5.44812C34.25 5.71765 33.7148 5.85242 32.9883 5.85242C32.6914 5.85242 32.4141 5.81921 32.1562 5.75281C31.8984 5.6864 31.6426 5.58484 31.3887 5.44812V4.32898C31.6465 4.48523 31.9043 4.61218 32.1621 4.70984C32.4199 4.80749 32.6914 4.85632 32.9766 4.85632C33.2656 4.85632 33.4766 4.80359 33.6094 4.69812C33.7461 4.59265 33.8145 4.43835 33.8145 4.23523C33.8145 4.07507 33.7461 3.93054 33.6094 3.80164C33.4766 3.67273 33.2207 3.60828 32.8418 3.60828H32.1855V2.67664H32.7246C33.1309 2.67664 33.3926 2.61023 33.5098 2.47742C33.627 2.3446 33.6855 2.19812 33.6855 2.03796C33.6855 1.88953 33.6367 1.76648 33.5391 1.66882C33.4414 1.57117 33.293 1.52234 33.0937 1.52234C32.9102 1.52234 32.7363 1.55945 32.5723 1.63367C32.4082 1.70789 32.2148 1.82312 31.9922 1.97937L31.4004 1.1532C31.6426 0.969604 31.9102 0.817261 32.2031 0.696167C32.5 0.575073 32.8496 0.514526 33.252 0.514526Z"
                                                        fill="var(--level1)" />
                                                    <path class="pm25-level-fill"
                                                        d="M27.8848 4.07703C28.627 4.07703 29.1875 4.26843 29.5664 4.65125C29.9492 5.03015 30.1406 5.63953 30.1406 6.47937V10.7509H28.3477V6.92468C28.3477 6.45593 28.2676 6.10242 28.1074 5.86414C27.9473 5.62585 27.6992 5.50671 27.3633 5.50671C26.8906 5.50671 26.5547 5.67664 26.3555 6.01648C26.1562 6.35242 26.0566 6.83484 26.0566 7.46374V10.7509H24.2695V6.92468C24.2695 6.61218 24.2344 6.35046 24.1641 6.13953C24.0937 5.92859 23.9863 5.77039 23.8418 5.66492C23.6973 5.55945 23.5117 5.50671 23.2852 5.50671C22.9531 5.50671 22.6914 5.5907 22.5 5.75867C22.3125 5.92273 22.1777 6.16687 22.0957 6.49109C22.0176 6.8114 21.9785 7.20398 21.9785 7.66882V10.7509H20.1914V4.20007H21.5566L21.7969 5.03796H21.8965C22.0293 4.8114 22.1953 4.62781 22.3945 4.48718C22.5977 4.34656 22.8203 4.24304 23.0625 4.17664C23.3047 4.11023 23.5508 4.07703 23.8008 4.07703C24.2812 4.07703 24.6875 4.15515 25.0195 4.3114C25.3555 4.46765 25.6133 4.70984 25.793 5.03796H25.9512C26.1465 4.70203 26.4219 4.45789 26.7773 4.30554C27.1367 4.1532 27.5059 4.07703 27.8848 4.07703Z"
                                                        fill="var(--level1)" />
                                                    <path class="pm25-level-fill"
                                                        d="M19.1953 2.18445L16.002 10.7509H14.3789L17.5723 2.18445L19.1953 2.18445Z"
                                                        fill="var(--level1)" />
                                                    <path class="pm25-level-fill"
                                                        d="M10.3652 13.6337C9.45117 13.6337 8.75195 13.4735 8.26758 13.1532C7.78711 12.8368 7.54687 12.3915 7.54688 11.8173C7.54688 11.4227 7.66992 11.0927 7.91602 10.827C8.16211 10.5614 8.52344 10.3719 9 10.2587C8.81641 10.1805 8.65625 10.0536 8.51953 9.87781C8.38281 9.69812 8.31445 9.50867 8.31445 9.30945C8.31445 9.05945 8.38672 8.85242 8.53125 8.68835C8.67578 8.52039 8.88477 8.35632 9.1582 8.19617C8.81445 8.04773 8.54102 7.80945 8.33789 7.48132C8.13867 7.1532 8.03906 6.76648 8.03906 6.32117C8.03906 5.8446 8.14258 5.44031 8.34961 5.10828C8.56055 4.77234 8.86523 4.51648 9.26367 4.3407C9.66602 4.16492 10.1543 4.07703 10.7285 4.07703C10.8496 4.07703 10.9902 4.08484 11.1504 4.10046C11.3105 4.11609 11.457 4.13367 11.5898 4.1532C11.7266 4.17273 11.8184 4.18835 11.8652 4.20007H14.1504V5.10828L13.125 5.37195C13.2187 5.51648 13.2891 5.67078 13.3359 5.83484C13.3828 5.9989 13.4062 6.17273 13.4062 6.35632C13.4062 7.05945 13.1602 7.60828 12.668 8.00281C12.1797 8.39343 11.5 8.58874 10.6289 8.58874C10.4219 8.57703 10.2266 8.5614 10.043 8.54187C9.95312 8.61218 9.88477 8.6864 9.83789 8.76453C9.79102 8.84265 9.76758 8.92468 9.76758 9.01062C9.76758 9.09656 9.80273 9.16882 9.87305 9.22742C9.94727 9.2821 10.0566 9.32507 10.2012 9.35632C10.3496 9.38367 10.5332 9.39734 10.752 9.39734H11.8652C12.584 9.39734 13.1309 9.55164 13.5059 9.86023C13.8848 10.1688 14.0742 10.6219 14.0742 11.2196C14.0742 11.9852 13.7539 12.579 13.1133 13.0009C12.4766 13.4227 11.5605 13.6337 10.3652 13.6337ZM10.4414 12.4677C10.8672 12.4677 11.2324 12.4266 11.5371 12.3446C11.8457 12.2665 12.082 12.1532 12.2461 12.0048C12.4102 11.8602 12.4922 11.6864 12.4922 11.4833C12.4922 11.3192 12.4434 11.1884 12.3457 11.0907C12.252 10.9969 12.1074 10.9305 11.9121 10.8915C11.7207 10.8524 11.4746 10.8329 11.1738 10.8329H10.248C10.0293 10.8329 9.83203 10.868 9.65625 10.9384C9.48437 11.0087 9.34766 11.1063 9.24609 11.2313C9.14453 11.3602 9.09375 11.5087 9.09375 11.6766C9.09375 11.9227 9.21094 12.1161 9.44531 12.2567C9.68359 12.3973 10.0156 12.4677 10.4414 12.4677ZM10.7285 7.4989C11.0645 7.4989 11.3105 7.39539 11.4668 7.18835C11.623 6.98132 11.7012 6.70007 11.7012 6.3446C11.7012 5.95007 11.6191 5.65515 11.4551 5.45984C11.2949 5.26062 11.0527 5.16101 10.7285 5.16101C10.4004 5.16101 10.1543 5.26062 9.99023 5.45984C9.82617 5.65515 9.74414 5.95007 9.74414 6.3446C9.74414 6.70007 9.82422 6.98132 9.98437 7.18835C10.1484 7.39539 10.3965 7.4989 10.7285 7.4989Z"
                                                        fill="var(--level1)" />
                                                    <path class="pm25-level-fill"
                                                        d="M6.57422 4.20007V10.7509H5.2207L4.96875 9.87195H4.88086C4.77539 10.0907 4.65234 10.2743 4.51172 10.4227C4.37109 10.5712 4.21094 10.6825 4.03125 10.7567C3.85156 10.8309 3.64648 10.868 3.41602 10.868C3.17773 10.868 2.96094 10.8231 2.76562 10.7333C2.57422 10.6395 2.41602 10.5087 2.29102 10.3407H2.25586C2.26758 10.4227 2.27734 10.5497 2.28516 10.7216C2.29297 10.8895 2.29883 11.0673 2.30273 11.2548C2.31055 11.4462 2.31445 11.6141 2.31445 11.7587V13.6337H0.527344L0.527344 4.20007H2.31445V8.02624C2.31445 8.49499 2.40039 8.84851 2.57227 9.08679C2.74414 9.32507 3.01367 9.44421 3.38086 9.44421C3.73633 9.44421 4.01562 9.36218 4.21875 9.19812C4.42578 9.03015 4.57227 8.78601 4.6582 8.4657C4.74414 8.14148 4.78711 7.74695 4.78711 7.2821V4.20007H6.57422Z"
                                                        fill="var(--level1)" />
                                                </svg>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="LevelsOfConcern pm25-level-name pm25-level-background"
                                style="background: var(--level1)">
                                Below normal
                            </div>
                        </div>
                    </div>
                    <div class="Col">
                        <div class="BoxTitle">PM 10</div>
                        <div class="Box PM10">
                            <div class="GaugeSec">
                                <figure>
                                    <img src="{{ asset('frontend/images/PM10d.svg') }}" width="226" height="117"
                                        alt="Background">
                                </figure>
                                <div class="NeedleWrp">
                                    <div class="Needle pm10-percentage" data-value="0"></div>
                                    <div class="GuageValueWrp">
                                        <div class="IndexValue pm10-level-color" style="color: var(--level1)">
                                            <div class="Count pm10-value" data-count="0">0</div>
                                            <div class="Symbol">
                                                <svg id="ugM3" width="36" height="14" viewBox="0 0 36 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path class="pm10-level-fill"
                                                        d="M33.252 0.514526C33.7402 0.514526 34.1445 0.637573 34.4648 0.883667C34.7852 1.12585 34.9453 1.45398 34.9453 1.86804C34.9453 2.14148 34.8652 2.37585 34.7051 2.57117C34.5488 2.76648 34.2969 2.92078 33.9492 3.03406V3.10437C34.3437 3.19031 34.6348 3.34656 34.8223 3.57312C35.0137 3.79968 35.1094 4.05164 35.1094 4.32898C35.1094 4.80164 34.9375 5.17468 34.5937 5.44812C34.25 5.71765 33.7148 5.85242 32.9883 5.85242C32.6914 5.85242 32.4141 5.81921 32.1562 5.75281C31.8984 5.6864 31.6426 5.58484 31.3887 5.44812V4.32898C31.6465 4.48523 31.9043 4.61218 32.1621 4.70984C32.4199 4.80749 32.6914 4.85632 32.9766 4.85632C33.2656 4.85632 33.4766 4.80359 33.6094 4.69812C33.7461 4.59265 33.8145 4.43835 33.8145 4.23523C33.8145 4.07507 33.7461 3.93054 33.6094 3.80164C33.4766 3.67273 33.2207 3.60828 32.8418 3.60828H32.1855V2.67664H32.7246C33.1309 2.67664 33.3926 2.61023 33.5098 2.47742C33.627 2.3446 33.6855 2.19812 33.6855 2.03796C33.6855 1.88953 33.6367 1.76648 33.5391 1.66882C33.4414 1.57117 33.293 1.52234 33.0937 1.52234C32.9102 1.52234 32.7363 1.55945 32.5723 1.63367C32.4082 1.70789 32.2148 1.82312 31.9922 1.97937L31.4004 1.1532C31.6426 0.969604 31.9102 0.817261 32.2031 0.696167C32.5 0.575073 32.8496 0.514526 33.252 0.514526Z"
                                                        fill="var(--level1)" />
                                                    <path class="pm10-level-fill"
                                                        d="M27.8848 4.07703C28.627 4.07703 29.1875 4.26843 29.5664 4.65125C29.9492 5.03015 30.1406 5.63953 30.1406 6.47937V10.7509H28.3477V6.92468C28.3477 6.45593 28.2676 6.10242 28.1074 5.86414C27.9473 5.62585 27.6992 5.50671 27.3633 5.50671C26.8906 5.50671 26.5547 5.67664 26.3555 6.01648C26.1562 6.35242 26.0566 6.83484 26.0566 7.46374V10.7509H24.2695V6.92468C24.2695 6.61218 24.2344 6.35046 24.1641 6.13953C24.0937 5.92859 23.9863 5.77039 23.8418 5.66492C23.6973 5.55945 23.5117 5.50671 23.2852 5.50671C22.9531 5.50671 22.6914 5.5907 22.5 5.75867C22.3125 5.92273 22.1777 6.16687 22.0957 6.49109C22.0176 6.8114 21.9785 7.20398 21.9785 7.66882V10.7509H20.1914V4.20007H21.5566L21.7969 5.03796H21.8965C22.0293 4.8114 22.1953 4.62781 22.3945 4.48718C22.5977 4.34656 22.8203 4.24304 23.0625 4.17664C23.3047 4.11023 23.5508 4.07703 23.8008 4.07703C24.2812 4.07703 24.6875 4.15515 25.0195 4.3114C25.3555 4.46765 25.6133 4.70984 25.793 5.03796H25.9512C26.1465 4.70203 26.4219 4.45789 26.7773 4.30554C27.1367 4.1532 27.5059 4.07703 27.8848 4.07703Z"
                                                        fill="var(--level1)" />
                                                    <path class="pm10-level-fill"
                                                        d="M19.1953 2.18445L16.002 10.7509H14.3789L17.5723 2.18445L19.1953 2.18445Z"
                                                        fill="var(--level1)" />
                                                    <path class="pm10-level-fill"
                                                        d="M10.3652 13.6337C9.45117 13.6337 8.75195 13.4735 8.26758 13.1532C7.78711 12.8368 7.54687 12.3915 7.54688 11.8173C7.54688 11.4227 7.66992 11.0927 7.91602 10.827C8.16211 10.5614 8.52344 10.3719 9 10.2587C8.81641 10.1805 8.65625 10.0536 8.51953 9.87781C8.38281 9.69812 8.31445 9.50867 8.31445 9.30945C8.31445 9.05945 8.38672 8.85242 8.53125 8.68835C8.67578 8.52039 8.88477 8.35632 9.1582 8.19617C8.81445 8.04773 8.54102 7.80945 8.33789 7.48132C8.13867 7.1532 8.03906 6.76648 8.03906 6.32117C8.03906 5.8446 8.14258 5.44031 8.34961 5.10828C8.56055 4.77234 8.86523 4.51648 9.26367 4.3407C9.66602 4.16492 10.1543 4.07703 10.7285 4.07703C10.8496 4.07703 10.9902 4.08484 11.1504 4.10046C11.3105 4.11609 11.457 4.13367 11.5898 4.1532C11.7266 4.17273 11.8184 4.18835 11.8652 4.20007H14.1504V5.10828L13.125 5.37195C13.2187 5.51648 13.2891 5.67078 13.3359 5.83484C13.3828 5.9989 13.4062 6.17273 13.4062 6.35632C13.4062 7.05945 13.1602 7.60828 12.668 8.00281C12.1797 8.39343 11.5 8.58874 10.6289 8.58874C10.4219 8.57703 10.2266 8.5614 10.043 8.54187C9.95312 8.61218 9.88477 8.6864 9.83789 8.76453C9.79102 8.84265 9.76758 8.92468 9.76758 9.01062C9.76758 9.09656 9.80273 9.16882 9.87305 9.22742C9.94727 9.2821 10.0566 9.32507 10.2012 9.35632C10.3496 9.38367 10.5332 9.39734 10.752 9.39734H11.8652C12.584 9.39734 13.1309 9.55164 13.5059 9.86023C13.8848 10.1688 14.0742 10.6219 14.0742 11.2196C14.0742 11.9852 13.7539 12.579 13.1133 13.0009C12.4766 13.4227 11.5605 13.6337 10.3652 13.6337ZM10.4414 12.4677C10.8672 12.4677 11.2324 12.4266 11.5371 12.3446C11.8457 12.2665 12.082 12.1532 12.2461 12.0048C12.4102 11.8602 12.4922 11.6864 12.4922 11.4833C12.4922 11.3192 12.4434 11.1884 12.3457 11.0907C12.252 10.9969 12.1074 10.9305 11.9121 10.8915C11.7207 10.8524 11.4746 10.8329 11.1738 10.8329H10.248C10.0293 10.8329 9.83203 10.868 9.65625 10.9384C9.48437 11.0087 9.34766 11.1063 9.24609 11.2313C9.14453 11.3602 9.09375 11.5087 9.09375 11.6766C9.09375 11.9227 9.21094 12.1161 9.44531 12.2567C9.68359 12.3973 10.0156 12.4677 10.4414 12.4677ZM10.7285 7.4989C11.0645 7.4989 11.3105 7.39539 11.4668 7.18835C11.623 6.98132 11.7012 6.70007 11.7012 6.3446C11.7012 5.95007 11.6191 5.65515 11.4551 5.45984C11.2949 5.26062 11.0527 5.16101 10.7285 5.16101C10.4004 5.16101 10.1543 5.26062 9.99023 5.45984C9.82617 5.65515 9.74414 5.95007 9.74414 6.3446C9.74414 6.70007 9.82422 6.98132 9.98437 7.18835C10.1484 7.39539 10.3965 7.4989 10.7285 7.4989Z"
                                                        fill="var(--level1)" />
                                                    <path class="pm10-level-fill"
                                                        d="M6.57422 4.20007V10.7509H5.2207L4.96875 9.87195H4.88086C4.77539 10.0907 4.65234 10.2743 4.51172 10.4227C4.37109 10.5712 4.21094 10.6825 4.03125 10.7567C3.85156 10.8309 3.64648 10.868 3.41602 10.868C3.17773 10.868 2.96094 10.8231 2.76562 10.7333C2.57422 10.6395 2.41602 10.5087 2.29102 10.3407H2.25586C2.26758 10.4227 2.27734 10.5497 2.28516 10.7216C2.29297 10.8895 2.29883 11.0673 2.30273 11.2548C2.31055 11.4462 2.31445 11.6141 2.31445 11.7587V13.6337H0.527344L0.527344 4.20007H2.31445V8.02624C2.31445 8.49499 2.40039 8.84851 2.57227 9.08679C2.74414 9.32507 3.01367 9.44421 3.38086 9.44421C3.73633 9.44421 4.01562 9.36218 4.21875 9.19812C4.42578 9.03015 4.57227 8.78601 4.6582 8.4657C4.74414 8.14148 4.78711 7.74695 4.78711 7.2821V4.20007H6.57422Z"
                                                        fill="var(--level1)" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="LevelsOfConcern pm10-level-name pm10-level-background"
                                style="background: var(--level1)">
                                Below normal
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
                                                src="{{ asset('frontend/images/Screen2Slide1.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen2Slide1.jpg') }} 300w, {{ asset('frontend/images/Screen2Slide1.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Clear the air, breathe easy: fight Particulate Matter
                                                pollution
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="DFleX">
                                        <div class="ImgBoX">
                                            <img decoding="async" fetchpriority="low"
                                                src="{{ asset('frontend/images/Screen2Slide2.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen2Slide2.jpg') }} 300w, {{ asset('frontend/images/Screen2Slide2.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Pledge for purer air and a brighter future
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="DFleX">
                                        <div class="ImgBoX">
                                            <img decoding="async" fetchpriority="low"
                                                src="{{ asset('frontend/images/Screen2Slide3.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen2Slide3.jpg') }} 300w, {{ asset('frontend/images/Screen2Slide3.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Drive less, go green : beat Particulate Matter pollution
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