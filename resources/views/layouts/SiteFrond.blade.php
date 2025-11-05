<!DOCTYPE html>
<html lang="en">
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDPI - @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('./image/image.png') }}">
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyP7o1+0R4kNYFk1YI2B5w2mJt0B/r2a4R/j5l9A/9w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
</head>

<body>

    <body>
        <nav class="navbar">
            <div class="container">
                <div class="navbar__logo">
                    <a href="{{Route('index')}}">
                        <img src="{{ asset('./image/logo.jpg') }}" alt="Logo" />
                    </a>
                    <span><b>@lang('words.gdpi')</b> @lang('words.bsh')</span>
                </div>
                <div class="navbar__toggle" id="mobile-menu">&#9776;</div>
                <div class="navbar__menu">
                    <ul class="navbar__links">
                        <li class="dropdown">
                            <button class="dropbtn">@lang('words.masofa') ▾</button>
                            <div class="dropdown-content">
                                <a id="content_a" href="{{Route('yuzm')}}">100m</a>
                                <a id="content_a" href="{{ Route('ikkiyuzm') }}">200m</a>
                                <a id="content_a" href="{{ Route('tortyuzm') }}">400m</a>
                                <a id="content_a" href="{{ Route('sakkizyuzm') }}">800m</a>
                                <a id="content_a" href="{{ Route('birmingbeshyuzm') }}">1500m</a>
                                <a id="content_a" href="{{ Route('uchmingm') }}">3000m</a>
                                <a id="content_a" href="{{ Route('beshmingm') }}">5000m</a>
                            </div>
                        </li>
                        <li><a href="{{ Route('uzunlikka_sakrash') }}">@lang('words.uzunlikka_sakrash')</a></li>
                        <li><a href="{{ Route('balandikka_sakrash') }}">@lang('words.balandlikka_sakrash')</a></li>
                        <li><a href="{{ Route('yadro_itqidish') }}">@lang('words.yadro-itqidish')</a></li>
                        <div class="language-dropdown">
                            <button class="dropdown-toggle">{{ \App::getLocale() }}</button>
                            <ul class="dropdown-menu">
                                <li><a href="/lang/ru">Ru</a></li>
                                <li><a href="/lang/uz">Uz</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>

            </div>
        </nav>

        @yield('content')

        <!-- ================================= 
                             FOOTER 
             ================================ -->

        <footer>
            <div class="footer-container">
                <div class="footer-box">
                    <h3>@lang('words.biz_haqimizda')</h3>
                    <p>@lang('words.biz')</p>
                </div>

                <div class="footer-box">
                    <h3>@lang('words.foydali_havolalar')</h3>
                    <a href="#">@lang('words.joylashuv')</a>
                    <a href="#">@lang('words.telegram')</a>
                    <a href="#">@lang('words.Instagram')</a>
                    <!-- <a href="#">Aloqa</a> -->
                </div>

                <div class="footer-box">
                    <h3>@lang('words.aloqa')</h3>
                    <p><i class="fas fa-map-marker-alt"></i> @lang('words.sirvil')</p>
                    <p><i class="fas fa-phone-alt"></i> +998 91 103 39 13</p>
                    <p><i class="fas fa-envelope"></i> cleysekriti@gmail.com</p>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; 2025 @lang('words.huquq')
                <a href="https://t.me/Rayimjonov_eldorbek">@lang('words.eldorbek')</a>
            </div>
        </footer>


        <style>
            /* Konteyner: ochiladigan ro'yxatning joylashish nuqtasi */
            .language-dropdown {
                position: relative;
                /* Ichidagi ro'yxatni unga nisbatan joylashtirish uchun shart */
                display: inline-block;
                /* Konteyner kengligini ichidagi elementga moslashtirish */
            }

            /* Asosiy ko'rsatuvchi tugma (hozirgi til) */
            .dropdown-toggle {
                background-color: #f1f1f1;
                color: #333;
                padding: 10px 15px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                border-radius: 5px;
            }

            .dropdown-toggle:hover {
                background-color: #ddd;
            }

            /* Ochiluvchi ro'yxat (dropdown) */
            .dropdown-menu {
                position: absolute;
                /* .language-dropdown ga nisbatan joylashish */
                top: 100%;
                /* Tugmaning tagidan boshlash */
                left: 0;
                z-index: 1000;
                /* Boshqa elementlardan ustun turishi uchun */

                /* Tashqi ko'rinish */
                min-width: 100px;
                background-color: white;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                /* Soya berish */
                border: 1px solid #ccc;
                border-radius: 0 0 5px 5px;
                /* Pastki burchaklarni yumaloqlash */

                /* Ro'yxat uslublarini olib tashlash */
                list-style-type: none;
                padding: 0;
                margin: 0;

                /* Yashirish uslublari */
                display: none;
                /* Standart holatda ro'yxat yashirilgan */
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
            }

            /* Ro'yxatdagi elementlar */
            .dropdown-menu li a {
                color: black;
                padding: 8px 15px;
                text-decoration: none;
                display: block;
                /* To'liq qatorni bosiladigan qilish */
                font-size: 14px;
            }

            .dropdown-menu li a:hover {
                background-color: #f1f1f1;
            }

            /* ================================================= */
            /* DROPDOWN NI OCHISH (ASOSIY QISM) */
            /* ================================================= */

            /* Agar sichqoncha asosiy konteyner ustiga kelsa, ro'yxatni ko'rsatish */
            .language-dropdown:hover .dropdown-menu {
                display: block;
                /* Ko'rsatish */
                opacity: 1;
                /* Effekt bilan ko'rsatish */
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
        <script src="{{ asset('./js/script.js') }}"></script>
    </body>
<!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->
</html>