@extends('frontend::layouts.app')
@section('title', 'AQI')
@section('content')
<div id="pageWrapper">
    <section class="MainSlide">
        <div id="Screen4" class="Screens">
            <div class="ScreenBG">
                <figure><img src="{{ asset('frontend/images/Screen4BG.jpg') }}" alt="Background">
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
                        <div class="BoxTitle">CO</div>
                        <div class="Box CO">
                            <div class="GaugeSec" style="padding-top: 16px;">
                                <figure>
                                    <img src="{{ asset('frontend/images/CO.svg') }}" width="226" height="117"
                                        alt="Background">
                                </figure>
                                <div class="NeedleWrp">
                                    <div class="Needle co-percentage" data-value="0"></div>
                                    <div class="GuageValueWrp">
                                        <div class="IndexValue co-level-color" style="color: var(--level1)">
                                            <div class="Count co-value" data-count="0">0</div>
                                            <div class="Symbol">
                                                <svg id="ugM3" width="40" height="14" viewBox="0 0 40 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path class="co-level-fill"
                                                        d="M37.1855 0.514526C37.6738 0.514526 38.0781 0.637573 38.3984 0.883667C38.7187 1.12585 38.8789 1.45398 38.8789 1.86804C38.8789 2.14148 38.7988 2.37585 38.6387 2.57117C38.4824 2.76648 38.2305 2.92078 37.8828 3.03406V3.10437C38.2773 3.19031 38.5684 3.34656 38.7559 3.57312C38.9473 3.79968 39.043 4.05164 39.043 4.32898C39.043 4.80164 38.8711 5.17468 38.5273 5.44812C38.1836 5.71765 37.6484 5.85242 36.9219 5.85242C36.625 5.85242 36.3477 5.81921 36.0898 5.75281C35.832 5.6864 35.5762 5.58484 35.3223 5.44812V4.32898C35.5801 4.48523 35.8379 4.61218 36.0957 4.70984C36.3535 4.80749 36.625 4.85632 36.9102 4.85632C37.1992 4.85632 37.4102 4.80359 37.543 4.69812C37.6797 4.59265 37.748 4.43835 37.748 4.23523C37.748 4.07507 37.6797 3.93054 37.543 3.80164C37.4102 3.67273 37.1543 3.60828 36.7754 3.60828H36.1191V2.67664H36.6582C37.0645 2.67664 37.3262 2.61023 37.4434 2.47742C37.5605 2.3446 37.6191 2.19812 37.6191 2.03796C37.6191 1.88953 37.5703 1.76648 37.4727 1.66882C37.375 1.57117 37.2266 1.52234 37.0273 1.52234C36.8437 1.52234 36.6699 1.55945 36.5059 1.63367C36.3418 1.70789 36.1484 1.82312 35.9258 1.97937L35.334 1.1532C35.5762 0.969604 35.8437 0.817261 36.1367 0.696167C36.4336 0.575073 36.7832 0.514526 37.1855 0.514526Z"
                                                        fill="var(--level1)" />
                                                    <path class="co-level-fill"
                                                        d="M31.8184 4.07703C32.5605 4.07703 33.1211 4.26843 33.5 4.65125C33.8828 5.03015 34.0742 5.63953 34.0742 6.47937V10.7509H32.2812V6.92468C32.2812 6.45593 32.2012 6.10242 32.041 5.86414C31.8809 5.62585 31.6328 5.50671 31.2969 5.50671C30.8242 5.50671 30.4883 5.67664 30.2891 6.01648C30.0898 6.35242 29.9902 6.83484 29.9902 7.46374V10.7509H28.2031V6.92468C28.2031 6.61218 28.168 6.35046 28.0977 6.13953C28.0273 5.92859 27.9199 5.77039 27.7754 5.66492C27.6309 5.55945 27.4453 5.50671 27.2187 5.50671C26.8867 5.50671 26.625 5.5907 26.4336 5.75867C26.2461 5.92273 26.1113 6.16687 26.0293 6.49109C25.9512 6.8114 25.9121 7.20398 25.9121 7.66882V10.7509H24.125V4.20007H25.4902L25.7305 5.03796H25.8301C25.9629 4.8114 26.1289 4.62781 26.3281 4.48718C26.5312 4.34656 26.7539 4.24304 26.9961 4.17664C27.2383 4.11023 27.4844 4.07703 27.7344 4.07703C28.2148 4.07703 28.6211 4.15515 28.9531 4.3114C29.2891 4.46765 29.5469 4.70984 29.7266 5.03796H29.8848C30.0801 4.70203 30.3555 4.45789 30.7109 4.30554C31.0703 4.1532 31.4395 4.07703 31.8184 4.07703Z"
                                                        fill="var(--level1)" />
                                                    <path class="co-level-fill"
                                                        d="M23.1289 2.18445L19.9355 10.7509H18.3125L21.5059 2.18445L23.1289 2.18445Z"
                                                        fill="var(--level1)" />
                                                    <path class="co-level-fill"
                                                        d="M14.2988 13.6337C13.3848 13.6337 12.6855 13.4735 12.2012 13.1532C11.7207 12.8368 11.4805 12.3915 11.4805 11.8173C11.4805 11.4227 11.6035 11.0927 11.8496 10.827C12.0957 10.5614 12.457 10.3719 12.9336 10.2587C12.75 10.1805 12.5898 10.0536 12.4531 9.87781C12.3164 9.69812 12.248 9.50867 12.248 9.30945C12.248 9.05945 12.3203 8.85242 12.4648 8.68835C12.6094 8.52039 12.8184 8.35632 13.0918 8.19617C12.748 8.04773 12.4746 7.80945 12.2715 7.48132C12.0723 7.1532 11.9727 6.76648 11.9727 6.32117C11.9727 5.8446 12.0762 5.44031 12.2832 5.10828C12.4941 4.77234 12.7988 4.51648 13.1973 4.3407C13.5996 4.16492 14.0879 4.07703 14.6621 4.07703C14.7832 4.07703 14.9238 4.08484 15.084 4.10046C15.2441 4.11609 15.3906 4.13367 15.5234 4.1532C15.6602 4.17273 15.752 4.18835 15.7988 4.20007H18.084V5.10828L17.0586 5.37195C17.1523 5.51648 17.2227 5.67078 17.2695 5.83484C17.3164 5.9989 17.3398 6.17273 17.3398 6.35632C17.3398 7.05945 17.0937 7.60828 16.6016 8.00281C16.1133 8.39343 15.4336 8.58874 14.5625 8.58874C14.3555 8.57703 14.1602 8.5614 13.9766 8.54187C13.8867 8.61218 13.8184 8.6864 13.7715 8.76453C13.7246 8.84265 13.7012 8.92468 13.7012 9.01062C13.7012 9.09656 13.7363 9.16882 13.8066 9.22742C13.8809 9.2821 13.9902 9.32507 14.1348 9.35632C14.2832 9.38367 14.4668 9.39734 14.6855 9.39734H15.7988C16.5176 9.39734 17.0645 9.55164 17.4395 9.86023C17.8184 10.1688 18.0078 10.6219 18.0078 11.2196C18.0078 11.9852 17.6875 12.579 17.0469 13.0009C16.4102 13.4227 15.4941 13.6337 14.2988 13.6337ZM14.375 12.4677C14.8008 12.4677 15.166 12.4266 15.4707 12.3446C15.7793 12.2665 16.0156 12.1532 16.1797 12.0048C16.3437 11.8602 16.4258 11.6864 16.4258 11.4833C16.4258 11.3192 16.377 11.1884 16.2793 11.0907C16.1855 10.9969 16.041 10.9305 15.8457 10.8915C15.6543 10.8524 15.4082 10.8329 15.1074 10.8329H14.1816C13.9629 10.8329 13.7656 10.868 13.5898 10.9384C13.418 11.0087 13.2812 11.1063 13.1797 11.2313C13.0781 11.3602 13.0273 11.5087 13.0273 11.6766C13.0273 11.9227 13.1445 12.1161 13.3789 12.2567C13.6172 12.3973 13.9492 12.4677 14.375 12.4677ZM14.6621 7.4989C14.998 7.4989 15.2441 7.39539 15.4004 7.18835C15.5566 6.98132 15.6348 6.70007 15.6348 6.3446C15.6348 5.95007 15.5527 5.65515 15.3887 5.45984C15.2285 5.26062 14.9863 5.16101 14.6621 5.16101C14.334 5.16101 14.0879 5.26062 13.9238 5.45984C13.7598 5.65515 13.6777 5.95007 13.6777 6.3446C13.6777 6.70007 13.7578 6.98132 13.918 7.18835C14.082 7.39539 14.3301 7.4989 14.6621 7.4989Z"
                                                        fill="var(--level1)" />
                                                    <path class="co-level-fill"
                                                        d="M8.28711 4.07703C9.0293 4.07703 9.58984 4.26843 9.96875 4.65125C10.3516 5.03015 10.543 5.63953 10.543 6.47937V10.7509H8.75V6.92468C8.75 6.45593 8.66992 6.10242 8.50977 5.86414C8.34961 5.62585 8.10156 5.50671 7.76562 5.50671C7.29297 5.50671 6.95703 5.67664 6.75781 6.01648C6.55859 6.35242 6.45898 6.83484 6.45898 7.46374V10.7509H4.67187V6.92468C4.67187 6.61218 4.63672 6.35046 4.56641 6.13953C4.49609 5.92859 4.38867 5.77039 4.24414 5.66492C4.09961 5.55945 3.91406 5.50671 3.6875 5.50671C3.35547 5.50671 3.09375 5.5907 2.90234 5.75867C2.71484 5.92273 2.58008 6.16687 2.49805 6.49109C2.41992 6.8114 2.38086 7.20398 2.38086 7.66882L2.38086 10.7509H0.59375L0.59375 4.20007H1.95898L2.19922 5.03796H2.29883C2.43164 4.8114 2.59766 4.62781 2.79687 4.48718C3 4.34656 3.22266 4.24304 3.46484 4.17664C3.70703 4.11023 3.95312 4.07703 4.20312 4.07703C4.68359 4.07703 5.08984 4.15515 5.42187 4.3114C5.75781 4.46765 6.01562 4.70984 6.19531 5.03796H6.35352C6.54883 4.70203 6.82422 4.45789 7.17969 4.30554C7.53906 4.1532 7.9082 4.07703 8.28711 4.07703Z"
                                                        fill="var(--level1)" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="LevelsOfConcern co-level-name co-level-background"
                                style="background: var(--level1)">
                                Below normal
                            </div>
                        </div>
                    </div>
                    <div class="Col">
                        <div class="BoxTitle">CO2</div>
                        <div class="Box CO2">
                            <div class="GaugeSec">
                                <figure>
                                    <img src="{{ asset('frontend/images/CO2.svg') }}" width="226" height="117"
                                        alt="Background">
                                </figure>
                                <div class="NeedleWrp">
                                    <div class="Needle co2-percentage" data-value="0"></div>
                                    <div class="GuageValueWrp">
                                        <div class="IndexValue co2-level-color" style="color: var(--level1)">
                                            <div class="Count co2-value" data-count="0">0</div>
                                            <div class="Symbol">
                                                <svg id="mgM3" width="35" height="14" viewBox="0 0 35 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path class="co2-level-fill"
                                                        d="M32.8488 0.400543C33.337 0.400543 33.7413 0.52359 34.0616 0.769684C34.382 1.01187 34.5421 1.34 34.5421 1.75406C34.5421 2.0275 34.462 2.26187 34.3019 2.45718C34.1456 2.6525 33.8937 2.80679 33.546 2.92007V2.99039C33.9406 3.07632 34.2316 3.23257 34.4191 3.45914C34.6105 3.6857 34.7062 3.93765 34.7062 4.215C34.7062 4.68765 34.5343 5.0607 34.1906 5.33414C33.8468 5.60367 33.3116 5.73843 32.5851 5.73843C32.2882 5.73843 32.0109 5.70523 31.7531 5.63882C31.4952 5.57242 31.2394 5.47086 30.9855 5.33414V4.215C31.2433 4.37125 31.5011 4.4982 31.7589 4.59586C32.0167 4.69351 32.2882 4.74234 32.5734 4.74234C32.8624 4.74234 33.0734 4.68961 33.2062 4.58414C33.3429 4.47867 33.4113 4.32437 33.4113 4.12125C33.4113 3.96109 33.3429 3.81656 33.2062 3.68765C33.0734 3.55875 32.8175 3.49429 32.4386 3.49429H31.7823V2.56265H32.3214C32.7277 2.56265 32.9894 2.49625 33.1066 2.36343C33.2238 2.23062 33.2823 2.08414 33.2823 1.92398C33.2823 1.77554 33.2335 1.6525 33.1359 1.55484C33.0382 1.45718 32.8898 1.40836 32.6906 1.40836C32.507 1.40836 32.3331 1.44547 32.1691 1.51968C32.005 1.5939 31.8116 1.70914 31.589 1.86539L30.9972 1.03922C31.2394 0.855621 31.507 0.703278 31.7999 0.582184C32.0968 0.46109 32.4464 0.400543 32.8488 0.400543Z"
                                                        fill="var(--level1)" />
                                                    <path class="co2-level-fill"
                                                        d="M27.4816 3.96304C28.2238 3.96304 28.7843 4.15445 29.1632 4.53726C29.546 4.91617 29.7374 5.52554 29.7374 6.36539V10.6369H27.9445V6.8107C27.9445 6.34195 27.8644 5.98843 27.7042 5.75015C27.5441 5.51187 27.296 5.39273 26.9601 5.39273C26.4874 5.39273 26.1515 5.56265 25.9523 5.9025C25.7531 6.23843 25.6534 6.72086 25.6534 7.34976V10.6369H23.8663V6.8107C23.8663 6.4982 23.8312 6.23648 23.7609 6.02554C23.6906 5.81461 23.5831 5.6564 23.4386 5.55093C23.2941 5.44546 23.1085 5.39273 22.882 5.39273C22.5499 5.39273 22.2882 5.47671 22.0968 5.64468C21.9093 5.80875 21.7745 6.05289 21.6925 6.37711C21.6144 6.69742 21.5753 7.09 21.5753 7.55484V10.6369H19.7882V4.08609H21.1534L21.3937 4.92398H21.4933C21.6261 4.69742 21.7921 4.51382 21.9913 4.3732C22.1945 4.23257 22.4171 4.12906 22.6593 4.06265C22.9015 3.99625 23.1476 3.96304 23.3976 3.96304C23.8781 3.96304 24.2843 4.04117 24.6163 4.19742C24.9523 4.35367 25.2101 4.59586 25.3898 4.92398H25.548C25.7433 4.58804 26.0187 4.3439 26.3741 4.19156C26.7335 4.03922 27.1027 3.96304 27.4816 3.96304Z"
                                                        fill="var(--level1)" />
                                                    <path class="co2-level-fill"
                                                        d="M18.7921 2.07047L15.5988 10.6369H13.9757L17.1691 2.07047L18.7921 2.07047Z"
                                                        fill="var(--level1)" />
                                                    <path class="co2-level-fill"
                                                        d="M9.96204 13.5197C9.04797 13.5197 8.34875 13.3595 7.86438 13.0392C7.38391 12.7228 7.14368 12.2775 7.14368 11.7033C7.14368 11.3087 7.26672 10.9787 7.51282 10.713C7.75891 10.4474 8.12024 10.258 8.5968 10.1447C8.41321 10.0666 8.25305 9.93961 8.11633 9.76382C7.97961 9.58414 7.91125 9.39468 7.91125 9.19546C7.91125 8.94546 7.98352 8.73843 8.12805 8.57437C8.27258 8.4064 8.48157 8.24234 8.755 8.08218C8.41125 7.93375 8.13782 7.69546 7.93469 7.36734C7.73547 7.03921 7.63586 6.6525 7.63586 6.20718C7.63586 5.73062 7.73938 5.32632 7.94641 4.99429C8.15735 4.65836 8.46204 4.4025 8.86047 4.22672C9.26282 4.05093 9.7511 3.96304 10.3253 3.96304C10.4464 3.96304 10.587 3.97086 10.7472 3.98648C10.9073 4.00211 11.0538 4.01968 11.1866 4.03922C11.3234 4.05875 11.4152 4.07437 11.462 4.08609H13.7472V4.99429L12.7218 5.25797C12.8156 5.4025 12.8859 5.55679 12.9327 5.72086C12.9796 5.88492 13.0031 6.05875 13.0031 6.24234C13.0031 6.94546 12.757 7.49429 12.2648 7.88882C11.7765 8.27945 11.0968 8.47476 10.2257 8.47476C10.0187 8.46304 9.82336 8.44742 9.63977 8.42789C9.54993 8.4982 9.48157 8.57242 9.43469 8.65054C9.38782 8.72867 9.36438 8.8107 9.36438 8.89664C9.36438 8.98257 9.39954 9.05484 9.46985 9.11343C9.54407 9.16812 9.65344 9.21109 9.79797 9.24234C9.94641 9.26968 10.13 9.28336 10.3488 9.28336H11.462C12.1808 9.28336 12.7277 9.43765 13.1027 9.74625C13.4816 10.0548 13.671 10.508 13.671 11.1056C13.671 11.8712 13.3507 12.465 12.7101 12.8869C12.0734 13.3087 11.1573 13.5197 9.96204 13.5197ZM10.0382 12.3537C10.464 12.3537 10.8292 12.3127 11.1339 12.2306C11.4425 12.1525 11.6788 12.0392 11.8429 11.8908C12.007 11.7462 12.089 11.5724 12.089 11.3693C12.089 11.2052 12.0402 11.0744 11.9425 10.9767C11.8488 10.883 11.7042 10.8166 11.5089 10.7775C11.3175 10.7384 11.0714 10.7189 10.7706 10.7189H9.84485C9.6261 10.7189 9.42883 10.7541 9.25305 10.8244C9.08118 10.8947 8.94446 10.9923 8.8429 11.1173C8.74133 11.2462 8.69055 11.3947 8.69055 11.5627C8.69055 11.8087 8.80774 12.0021 9.04211 12.1427C9.2804 12.2834 9.61243 12.3537 10.0382 12.3537ZM10.3253 7.38492C10.6613 7.38492 10.9073 7.2814 11.0636 7.07437C11.2198 6.86734 11.298 6.58609 11.298 6.23062C11.298 5.83609 11.2159 5.54117 11.0519 5.34586C10.8917 5.14664 10.6495 5.04703 10.3253 5.04703C9.99719 5.04703 9.7511 5.14664 9.58704 5.34586C9.42297 5.54117 9.34094 5.83609 9.34094 6.23062C9.34094 6.58609 9.42102 6.86734 9.58118 7.07437C9.74524 7.2814 9.99329 7.38492 10.3253 7.38492Z"
                                                        fill="var(--level1)" />
                                                    <path class="co2-level-fill"
                                                        d="M6.17102 4.08609V10.6369H4.8175L4.56555 9.75796H4.47766C4.37219 9.97671 4.24915 10.1603 4.10852 10.3087C3.9679 10.4572 3.80774 10.5685 3.62805 10.6427C3.44836 10.7169 3.24329 10.7541 3.01282 10.7541C2.77454 10.7541 2.55774 10.7091 2.36243 10.6193C2.17102 10.5255 2.01282 10.3947 1.88782 10.2267H1.85266C1.86438 10.3087 1.87415 10.4357 1.88196 10.6076C1.88977 10.7755 1.89563 10.9533 1.89954 11.1408C1.90735 11.3322 1.91125 11.5002 1.91125 11.6447V13.5197H0.124146L0.124146 4.08609H1.91125L1.91125 7.91226C1.91125 8.38101 1.99719 8.73453 2.16907 8.97281C2.34094 9.21109 2.61047 9.33023 2.97766 9.33023C3.33313 9.33023 3.61243 9.2482 3.81555 9.08414C4.02258 8.91617 4.16907 8.67203 4.255 8.35171C4.34094 8.0275 4.38391 7.63296 4.38391 7.16812V4.08609H6.17102Z"
                                                        fill="var(--level1)" />
                                                </svg>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="LevelsOfConcern co2-level-name co2-level-background"
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
                                                src="{{ asset('frontend/images/Screen4Slide1.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen4Slide1.jpg') }} 300w, {{ asset('frontend/images/Screen4Slide1.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Electric transport & Solar energy: Kochi breathes fresh
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="DFleX">
                                        <div class="ImgBoX">
                                            <img decoding="async" fetchpriority="low"
                                                src="{{ asset('frontend/images/Screen4Slide2.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen4Slide2.jpg') }} 300w, {{ asset('frontend/images/Screen4Slide2.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Less waste, more reuse: Recycle for Kochi's green future
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="DFleX">
                                        <div class="ImgBoX">
                                            <img decoding="async" fetchpriority="low"
                                                src="{{ asset('frontend/images/Screen4Slide3.jpg') }}" alt="Small Image"
                                                width="156" height="141" loading="lazy"
                                                srcset="{{ asset('frontend/images/Screen4Slide3.jpg') }} 300w, {{ asset('frontend/images/Screen4Slide3.jpg') }} 768w"
                                                sizes="(max-width: 600px) 100vw, (max-width: 1200px) 50vw, 33.3vw">
                                        </div>
                                        <div class="CntnBoX">
                                            <div class="TXT">
                                                Grow green, breathe clean: Plant trees for a healthier Kochi
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