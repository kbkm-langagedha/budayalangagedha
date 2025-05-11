<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Budaya Langagedha - Nusa Tenggara Timur</title>
    <link rel="icon" href="{{ asset('assets/images/icon.webp') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Budaya Langagedha - Nusa Tenggara Timur" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('template/css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/swiper.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/coloring.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/custom.css') }}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="{{ asset('template/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css">

    <style>
        #map-canvas {
            width: 100%;
            height: 500px;
            /* Adjust height as needed */
            border-radius: 8px;
            overflow: hidden;
            background: #eee9da;
            /* Fallback background */
        }

        @media (max-width: 768px) {
            #map-canvas {
                height: 300px;
                /* Smaller height for mobile */
            }
        }
    </style>

</head>

<body>
    <div id="wrapper">
        <a href="#" id="back-to-top"></a>

        <!-- preloader begin -->
        <div id="de-loader"></div>
        <!-- preloader end -->

        <!-- header begin -->
        <header class="transparent">
            <!-- Keep topbar with zero height but preserving structure -->
            <div id="topbar" style="height: 0; overflow: hidden; padding: 0; margin: 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between xs-hide">
                                <div class="d-flex">
                                    <!-- Empty but preserved structure -->
                                </div>
                                <div class="d-flex">
                                    <!-- Empty but preserved structure -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="index.html">
                                        <img class="logo-main" style="width: 30%;"
                                            src="{{ asset('assets/images/icon.png') }}" alt="">
                                        <img class="logo-mobile" style="width: 30%;"
                                            src="{{ asset('assets/images/icon.png') }}" alt="">
                                    </a>
                                </div>
                                <!-- logo end -->
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainemenu begin -->
                                <ul id="mainmenu">
                                    <li><a class="menu-item" style="color: #F2E3BB;" href="#">Home</a>
                                    </li>
                                    <li><a class="menu-item" style="color: #F2E3BB;" href="#">Modul</a>
                                    </li>
                                    <li><a class="menu-item" style="color: #F2E3BB;" href="#">Objek Kebudayaan</a>
                                    </li>
                                    <li><a class="menu-item" style="color: #F2E3BB;" href="#">Peta</a>
                                        <ul>
                                            <li><a href="#">Peta Budaya</a></li>
                                            <li><a href="#">Peta 3D</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="menu-item" style="color: #F2E3BB;" href="#">Blog</a>
                                    <li><a class="menu-item" style="color: #F2E3BB;" href="#">Tentang</a>
                                        <ul>
                                            <li><a href="#">Tentang Desa</a></li>
                                            <li><a href="#">Kalender Budaya</a></li>
                                            <li><a href="#">Gallery</a></li>
                                            <li><a href="#">Kontak</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- mainmenu end -->
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    <span id="menu-btn"></span>
                                </div>

                                <div id="btn-extra">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">

            <div id="top"></div>

            <section id="section-intro" class="text-light no-top no-bottom relative overflow-hidden z-1000">
                <div class="h-30 de-gradient-edge-top op-5 dark z-2"></div>
                <div class="social-icons-vertical abs end-0 top-50 me-5 z-1000 hide-on-mobile">
                    <div class="mb-4 social-icon-circle">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                    <div class="mb-4 social-icon-circle">
                        <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                    <div class="social-icon-circle">
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="v-center relative">

                    <div class="abs abs-centered z-1000 w-100">
                        <div class="container">
                            <div class="row g-4 justify-content-between align-items-center">
                                <div class="col-lg-8">
                                    <h1 class="wow fadeInUp" style="color: #F2E3BB;" data-wow-delay=".3s">
                                        <span class="fs-40 bg-blur px-3 py-2 rounded-1 d-inline-block mb-2"
                                            style="color: #f0e3c0;">Gerbang
                                            Menuju</span> <br>
                                        Budaya Langagedha
                                    </h1>
                                    <p class="col-lg-10 wow fadeInUp" data-wow-delay=".6s">
                                        Jelajahi keindahan warisan budaya Langagedha dari Nusa Tenggara Timur. Tempat
                                        dimana tradisi, kesenian, dan kearifan lokal tetap hidup dan terjaga. Mari
                                        melestarikan dan mengenal lebih dekat kekayaan budaya yang menjadi identitas
                                        bangsa.
                                    </p>
                                    <div class="spacer-single"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="swiper-inner"
                                    data-bgimage="url('{{ asset('assets/images/background/bg1.png') }}')">
                                    <div class="sw-overlay op-2"></div>
                                </div>
                            </div>
                            <!-- Slides -->

                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="swiper-inner"
                                    data-bgimage="url('{{ asset('assets/images/background/bg2.png') }}')">
                                    <div class="sw-overlay op-2"></div>
                                </div>
                            </div>
                            <!-- Slides -->

                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="swiper-inner"
                                    data-bgimage="url('{{ asset('assets/images/background/bg3.png') }}')">
                                    <div class="sw-overlay op-2"></div>
                                </div>
                            </div>
                            <!-- Slides -->

                        </div>

                    </div>
                </div>
            </section>

            <section style="background: #ffff;">
                <div class="container relative z-1">
                    <div class="row g-4 gx-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="row g-4">
                                <div class="col-sm-6">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class=" rounded-1 overflow-hidden wow zoomIn">
                                                <img src="{{ asset('assets/images/template/temp3.jpg') }}"
                                                    class="w-100 wow scaleIn" alt="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row g-4">
                                        <div class="spacer-single sm-hide"></div>

                                        <div class="col-lg-12">
                                            <div class=" rounded-1 overflow-hidden wow zoomIn" data-wow-delay=".3s">
                                                <img src="{{ asset('assets/images/template/temp1.jpg') }}"
                                                    class="w-100 wow scaleIn" alt="" data-wow-delay=".3s">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            {{-- <div class="subtitle id-color wow fadeInUp" data-wow-delay=".2s">tES</div> --}}
                            <h2 class="text-uppercase wow fadeInUp" data-wow-delay=".4s">Desa <span
                                    class="id-color-2">Langagedha</span></h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum
                                dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur
                                adipisicing elitLorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum
                                dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur
                                adipisicing elit</p>
                            <a class="btn-main wow fadeInUp" href="services.html" data-wow-delay=".6s"
                                style="color: #F2E3BB;">Selengkapnya</a>
                        </div>
                    </div>
                </div>

            </section>

            <section class="opk-section">
                <div class="de-overlay"></div>
                <div class="container relative z-2">
                    <div class="row g-4 mb-3 align-items-center justify-content-center">
                        <div class="col-lg-6 text-center">
                            <img src="{{ asset('assets/images/huruf/huruf1.webp') }}" class="w-100" alt="">
                            <h2 class="text-uppercase wow fadeInUp" data-wow-delay=".2s">Objek Pemajuan <span
                                    class="id-color-2">Kebudayaan</span></h2>
                            <p style="color: #2D2D2D">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem
                                ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur
                                adipisicing elit Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                        </div>
                    </div>

                    <div class="container relative z-2">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <div class="owl-4-cols owl-carousel owl-theme wow fadeInUp">
                                    <!-- Card 1 -->
                                    <div class="item">
                                        <div class="bg-color text-light rounded-1 overflow-hidden">
                                            <div class="hover relative overflow-hidden text-light text-center">
                                                <img src="{{ asset('assets/images/opk/opk1.jpg') }}"
                                                    class="hover-scale-1-1 w-100" alt="">
                                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                                    <a class="btn-line" href="service-single.html">View Details</a>
                                                </div>
                                                <div class="abs z-2 top-0 w-100 h-100 hover-op-1"></div>
                                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                                    <h4 class="mb-3">Tradisi Lisan</h4>
                                                </div>
                                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0 Z-1">
                                                </div>
                                            </div>
                                            <div class="p-4 py-2">
                                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Tempora mollitia placeat veritatis iusto enim error nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 2 -->
                                    <div class="item">
                                        <div class="bg-color text-light rounded-1 overflow-hidden">
                                            <div class="hover relative overflow-hidden text-light text-center">
                                                <img src="{{ asset('assets/images/opk/opk2.png') }}"
                                                    class="hover-scale-1-1 w-100" alt="">
                                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                                    <a class="btn-line" href="service-single.html">View Details</a>
                                                </div>
                                                <div class="abs z-2 top-0 w-100 h-100 hover-op-1"></div>
                                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                                    <h4 class="mb-3">Garden Maintenance</h4>
                                                </div>
                                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0 Z-1">
                                                </div>
                                            </div>
                                            <div class="p-4 py-2">
                                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Tempora mollitia placeat veritatis iusto enim error nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 3 -->
                                    <div class="item">
                                        <div class="bg-color text-light rounded-1 overflow-hidden">
                                            <div class="hover relative overflow-hidden text-light text-center">
                                                <img src="{{ asset('assets/images/opk/opk3.png') }}"
                                                    class="hover-scale-1-1 w-100" alt="">
                                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                                    <a class="btn-line" href="service-single.html">View Details</a>
                                                </div>
                                                <div class="abs z-2 top-0 w-100 h-100 hover-op-1"></div>
                                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                                    <h4 class="mb-3">Decking and Patio</h4>
                                                </div>
                                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0 Z-1">
                                                </div>
                                            </div>
                                            <div class="p-4 py-2">
                                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Tempora mollitia placeat veritatis iusto enim error nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 4 -->
                                    <div class="item">
                                        <div class="bg-color text-light rounded-1 overflow-hidden">
                                            <div class="hover relative overflow-hidden text-light text-center">
                                                <img src="{{ asset('assets/images/opk/opk4.png') }}"
                                                    class="hover-scale-1-1 w-100" alt="">
                                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                                    <a class="btn-line" href="service-single.html">View Details</a>
                                                </div>
                                                <div class="abs z-2 top-0 w-100 h-100 hover-op-1"></div>
                                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                                    <h4 class="mb-3">Plant Selection</h4>
                                                </div>
                                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0 Z-1">
                                                </div>
                                            </div>
                                            <div class="p-4 py-2">
                                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Tempora mollitia placeat veritatis iusto enim error nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 5 -->
                                    <div class="item">
                                        <div class="bg-color text-light rounded-1 overflow-hidden">
                                            <div class="hover relative overflow-hidden text-light text-center">
                                                <img src="{{ asset('assets/images/opk/opk5.jpg') }}"
                                                    class="hover-scale-1-1 w-100" alt="">
                                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                                    <a class="btn-line" href="service-single.html">View Details</a>
                                                </div>
                                                <div class="abs z-2 top-0 w-100 h-100 hover-op-1"></div>
                                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                                    <h4 class="mb-3">Plant Selection 5</h4>
                                                </div>
                                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0 Z-1">
                                                </div>
                                            </div>
                                            <div class="p-4 py-2">
                                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Tempora mollitia placeat veritatis iusto enim error nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 6 -->
                                    <div class="item">
                                        <div class="bg-color text-light rounded-1 overflow-hidden">
                                            <div class="hover relative overflow-hidden text-light text-center">
                                                <img src="{{ asset('assets/images/opk/opk6.jpg') }}"
                                                    class="hover-scale-1-1 w-100" alt="">
                                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                                    <a class="btn-line" href="service-single.html">View Details</a>
                                                </div>
                                                <div class="abs z-2 top-0 w-100 h-100 hover-op-1"></div>
                                                <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                                    <h4 class="mb-3">Plant Selection 6</h4>
                                                </div>
                                                <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0 Z-1">
                                                </div>
                                            </div>
                                            <div class="p-4 py-2">
                                                <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Tempora mollitia placeat veritatis iusto enim error nulla.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <img src="{{ asset('assets/images/background/shape3.webp') }}" class="w-100"
                alt="Motif Tradisional Ngada">
            <section class="jarallax text-light relative">

                <img src="{{ asset('assets/images/background/bg9.JPG') }}" class="jarallax-img" alt="">
                <div class="de-overlay"></div>
                <div class="container relative z-1">
                    <div class="row g-4 gx-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="subtitle wow fadeInUp mb-3">Warisan Leluhur</div>
                            <h2 class="text-uppercase wow fadeInUp" data-wow-delay=".2s">Kalender Ritual &
                                <span class="bg-blur px-3 py-2 rounded-1 d-inline-block mb-2"
                                    style="color: #f0e3c0;">Upacara Adat</span>
                            </h2>
                            <p class="wow fadeInUp">Desa Langagedha melestarikan berbagai ritual dan upacara adat yang
                                diwariskan dari generasi ke generasi. Reba, upacara terpenting masyarakat Ngada,
                                dirayakan sebagai wujud syukur atas panen yang berlimpah dan memohon berkat untuk tahun
                                yang akan datang. Perayaan ini biasanya berlangsung dari Desember hingga Februari,
                                dengan puncak acara di bulan Januari.
                            </p>

                            <a class="btn-main wow fadeInUp" href="rituals.html" data-wow-delay=".6s"
                                style="color: #F2E3BB;">Lihat Selengkapnya</a>
                        </div>

                        <div class="col-lg-6">
                            <div class="custom-calendar bg-blur rounded-3 p-4 mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="m-0" style="color: #f0e3c0;">Kalender Ritual Tahunan</h4>
                                    <div class="small px-3 py-1 rounded"
                                        style="background: rgba(240, 227, 192, 0.3);">2025</div>
                                </div>

                                <div class="ritual-timeline"
                                    style="height: 260px; overflow-y: auto; scrollbar-width: thin; scrollbar-color: #f0e3c0 rgba(0,0,0,0.2);">
                                    <!-- Timeline item 1 -->
                                    <div class="ritual-item d-flex mb-3 wow fadeInUp" data-wow-delay=".1s">
                                        <div class="ritual-date text-center me-3">
                                            <div class="month fs-14 fw-bold" style="color: #f0e3c0;">DES</div>
                                            <div class="day bg-dark-2 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">27</div>
                                        </div>
                                        <div class="ritual-content p-2 rounded-2 w-100"
                                            style="background: rgba(0,0,0,0.3);">
                                            <h5 class="mb-0">Reba di Bena</h5>
                                            <p class="mb-0 small">Awal perayaan Reba di desa tertua Ngada</p>
                                        </div>
                                    </div>

                                    <!-- Timeline item 2 -->
                                    <div class="ritual-item d-flex mb-3 wow fadeInUp" data-wow-delay=".2s">
                                        <div class="ritual-date text-center me-3">
                                            <div class="month fs-14 fw-bold" style="color: #f0e3c0;">JAN</div>
                                            <div class="day bg-dark-2 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">14</div>
                                        </div>
                                        <div class="ritual-content p-2 rounded-2 w-100"
                                            style="background: rgba(0,0,0,0.3);">
                                            <h5 class="mb-0">Reba di Langagedha</h5>
                                            <p class="mb-0 small">Puncak perayaan Reba dengan Tarian Besa Uwi</p>
                                        </div>
                                    </div>

                                    <!-- Timeline item 3 -->
                                    <div class="ritual-item d-flex mb-3 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="ritual-date text-center me-3">
                                            <div class="month fs-14 fw-bold" style="color: #f0e3c0;">MAR</div>
                                            <div class="day bg-dark-2 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">20</div>
                                        </div>
                                        <div class="ritual-content p-2 rounded-2 w-100"
                                            style="background: rgba(0,0,0,0.3);">
                                            <h5 class="mb-0">Ka Sa'o</h5>
                                            <p class="mb-0 small">Pemberkatan rumah adat baru</p>
                                        </div>
                                    </div>

                                    <!-- Timeline item 4 -->
                                    <div class="ritual-item d-flex mb-3 wow fadeInUp" data-wow-delay=".4s">
                                        <div class="ritual-date text-center me-3">
                                            <div class="month fs-14 fw-bold" style="color: #f0e3c0;">MEI</div>
                                            <div class="day bg-dark-2 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">15</div>
                                        </div>
                                        <div class="ritual-content p-2 rounded-2 w-100"
                                            style="background: rgba(0,0,0,0.3);">
                                            <h5 class="mb-0">Etu</h5>
                                            <p class="mb-0 small">Tradisi adu ketangkasan masyarakat Ngada</p>
                                        </div>
                                    </div>

                                    <!-- Timeline item 5 -->
                                    <div class="ritual-item d-flex mb-3 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="ritual-date text-center me-3">
                                            <div class="month fs-14 fw-bold" style="color: #f0e3c0;">JUN</div>
                                            <div class="day bg-dark-2 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">10</div>
                                        </div>
                                        <div class="ritual-content p-2 rounded-2 w-100"
                                            style="background: rgba(0,0,0,0.3);">
                                            <h5 class="mb-0">Sagi</h5>
                                            <p class="mb-0 small">Upacara syukur atas hasil panen</p>
                                        </div>
                                    </div>

                                    <!-- Timeline item 6 -->
                                    <div class="ritual-item d-flex mb-3 wow fadeInUp" data-wow-delay=".6s">
                                        <div class="ritual-date text-center me-3">
                                            <div class="month fs-14 fw-bold" style="color: #f0e3c0;">AGT</div>
                                            <div class="day bg-dark-2 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">07</div>
                                        </div>
                                        <div class="ritual-content p-2 rounded-2 w-100"
                                            style="background: rgba(0,0,0,0.3);">
                                            <h5 class="mb-0">Sa Ngaza</h5>
                                            <p class="mb-0 small">Tradisi lisan dalam upacara musim tanam</p>
                                        </div>
                                    </div>

                                    <!-- Timeline item 7 -->
                                    <div class="ritual-item d-flex mb-3 wow fadeInUp" data-wow-delay=".7s">
                                        <div class="ritual-date text-center me-3">
                                            <div class="month fs-14 fw-bold" style="color: #f0e3c0;">SEP</div>
                                            <div class="day bg-dark-2 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">22</div>
                                        </div>
                                        <div class="ritual-content p-2 rounded-2 w-100"
                                            style="background: rgba(0,0,0,0.3);">
                                            <h5 class="mb-0">Ritus Panen</h5>
                                            <p class="mb-0 small">Upacara awal musim panen</p>
                                        </div>
                                    </div>

                                    <!-- Timeline item 8 -->
                                    <div class="ritual-item d-flex mb-3 wow fadeInUp" data-wow-delay=".8s">
                                        <div class="ritual-date text-center me-3">
                                            <div class="month fs-14 fw-bold" style="color: #f0e3c0;">NOV</div>
                                            <div class="day bg-dark-2 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">15</div>
                                        </div>
                                        <div class="ritual-content p-2 rounded-2 w-100"
                                            style="background: rgba(0,0,0,0.3);">
                                            <h5 class="mb-0">Persiapan Reba</h5>
                                            <p class="mb-0 small">Ritual persiapan menjelang perayaan Reba</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="ritual-stat text-center p-3 bg-blur rounded-3 me-2" style="flex: 1;">
                                    <div class="ritual-icon mb-2">
                                        <img src="{{ asset('template/images/icons/tree.png') }}" class="w-50px"
                                            alt="">
                                    </div>
                                    <h3 class="fs-24 mb-0">12+</h3>
                                    <p class="mb-0 small">Ritual Tahunan</p>
                                </div>

                                <div class="ritual-stat text-center p-3 bg-blur rounded-3 ms-2" style="flex: 1;">
                                    <div class="ritual-icon mb-2">
                                        <img src="{{ asset('template/images/icons/happy.png') }}" class="w-50px"
                                            alt="">
                                    </div>
                                    <h3 class="fs-24 mb-0">6</h3>
                                    <p class="mb-0 small">Klan di Langagedha</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <img src="{{ asset('assets/images/background/shape3.webp') }}" class="w-100"
                alt="Motif Tradisional Ngada">


            <section class="position-relative overflow-hidden">
                <img src="{{ asset('assets/images/background/shape4.webp') }}" 
                    class="position-absolute start-0 top-0 z-1 hide-on-mobile" 
                    style="max-width: 300px; opacity: 0.8;" 
                    alt="Decorative Shape">
                <div class="container">
                    <div class="row g-4 mb-3 align-items-center justify-content-center">
                        <div class="col-xl-6 text-center">
                            <div class="subtitle wow fadeInUp">Peta 3D</div>
                            <h2 class="text-uppercase wow fadeInUp" data-wow-delay=".2s">Peta Desa <span
                                    class="id-color-2">Langagedha</span></h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">Jelajahi peta 3D interaktif Desa Langagedha
                                untuk melihat detail geografis dan budaya secara mendalam.</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="wow fadeInUp" data-wow-delay=".6s">
                                <canvas id="map-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Shape image positioned at bottom right -->
                <img src="{{ asset('assets/images/background/shape4.webp') }}" 
                    class="position-absolute end-0 bottom-0 z-1 hide-on-mobile" 
                    style="max-width: 300px; opacity: 0.8;" 
                    alt="Decorative Shape">
            </section>

            <section>
                <div class="container">
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col-lg-6 text-center">
                            <div class="subtitle wow fadeInUp">Konten Kami</div>
                            <h2 class="text-uppercase mb-4 wow fadeInUp" data-wow-delay=".2s">AYO JELAJAHI <span
                                    class="id-color-2">BATA LANGA</span></h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">Temukan berbagai informasi menarik tentang
                                kekayaan budaya dan kehidupan masyarakat Desa Langagedha, Nusa Tenggara Timur</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('assets/images/icons/opk-icon.webp') }}" class="w-50px mb-3"
                                    alt="Objek Pemajuan Kebudayaan">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">01</div>
                                <div>
                                    <h4>Objek Pemajuan Kebudayaan</h4>
                                    <p>Jelajahi 10 Objek Pemajuan Kebudayaan di Desa Langagedha,
                                        mulai dari tradisi lisan, adat istiadat, ritus, pengetahuan tradisional,
                                        hingga seni dan permainan rakyat.</p>
                                    <div class="spacer-10"></div>
                                    <a href="#" class="btn-line">Selengkapnya</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('assets/images/icons/modul-icon.webp') }}" class="w-50px mb-3"
                                    alt="Modul Tradisional">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">02</div>
                                <div>
                                    <h4>Modul Tradisional</h4>
                                    <p>Pelajari nilai-nilai kearifan lokal masyarakat Ngada melalui
                                        modul-modul pendidikan budaya yang disusun bersama tetua adat dan akademisi.
                                    </p>
                                    <div class="spacer-10"></div>
                                    <a href="#" class="btn-line">Selengkapnya</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('assets/images/icons/calendar-icon.webp') }}"
                                    class="w-50px mb-3" alt="Kalender Ritual">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">03</div>
                                <div>
                                    <h4>Kalender Ritual & Upacara Adat</h4>
                                    <p>Temukan jadwal lengkap ritual dan upacara adat seperti Reba,
                                        Ka Sa'o, Etu, Sagi, dan tradisi lainnya yang masih dilestarikan di Desa
                                        Langagedha.</p>
                                    <div class="spacer-10"></div>
                                    <a href="#" class="btn-line">Selengkapnya</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('assets/images/icons/nature-icon.webp') }}"
                                    class="w-50px mb-3" alt="Komoditas dan Alam">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">04</div>
                                <div>
                                    <h4>Komoditas & Alam Desa</h4>
                                    <p>Eksplorasi kekayaan alam dan komoditas unggulan Desa
                                        Langagedha seperti kopi, madu, kemiri, dan kain tenun yang menjadi penopang
                                        ekonomi lokal masyarakat.</p>
                                    <div class="spacer-10"></div>
                                    <a href="#" class="btn-line">Selengkapnya</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('assets/images/icons/map-icon.webp') }}" class="w-50px mb-3"
                                    alt="Peta Interaktif">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">05</div>
                                <div>
                                    <h4>Peta 2D & 3D Interaktif</h4>
                                    <p>Jelajahi tata ruang kampung adat Langagedha melalui peta
                                        interaktif 2D dan 3D yang menampilkan lokasi rumah adat, megalit, dan situs
                                        budaya penting di desa.</p>
                                    <div class="spacer-10"></div>
                                    <a href="#" class="btn-line">Selengkapnya</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('assets/images/icons/village-icon.webp') }}"
                                    class="w-50px mb-3" alt="Tentang Desa">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">06</div>
                                <div>
                                    <h4>Tentang Desa Langagedha</h4>
                                    <p>Kenali lebih dalam sejarah, demografi, dan keunikan Desa
                                        Langagedha sebagai salah satu kampung adat yang masih melestarikan budaya
                                        asli suku Ngada di Flores.</p>
                                    <div class="spacer-10"></div>
                                    <a href="#" class="btn-line">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="py-4">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Thank You Message -->
                        <div class="col-lg-6">
                            <div class="wow fadeInUp">
                                <h2 class="fw-bold">Terimakasih suport dan dukungannya</h2>
                            </div>
                        </div>
                        
                        <!-- Logos in Single Row -->
                        <div class="col-lg-6">
                            <div class="row g-3 align-items-center">
                                <!-- Logo 1 -->
                                <div class="col-3 text-center wow fadeInUp" data-wow-delay=".1s">
                                    <img src="{{ asset('assets/images/logos/kbkm.webp') }}" class="img-fluid" style="max-height: 120px;" alt="KBKM">
                                </div>
                                
                                <!-- Logo 2 -->
                                <div class="col-3 text-center wow fadeInUp" data-wow-delay=".2s">
                                    <img src="{{ asset('assets/images/logos/kemdikbuj.webp') }}" class="img-fluid" style="max-height: 120px;" alt="Kemdikbud">
                                </div>
                                
                                <!-- Logo 3 -->
                                <div class="col-3 text-center wow fadeInUp" data-wow-delay=".3s">
                                    <img src="{{ asset('assets/images/logos/langagedha.webp') }}" class="img-fluid" style="max-height: 120px;" alt="Langagedha">
                                </div>
                                
                                <!-- Logo 4 -->
                                <div class="col-3 text-center wow fadeInUp" data-wow-delay=".4s">
                                    <img src="{{ asset('assets/images/logos/disdik.webp') }}" class="img-fluid" style="max-height: 120px;" alt="Disdik">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- content end -->

        <!-- footer begin -->
        <footer class="section-dark">
            <div class="container relative z-2">
                <div class="row gx-5">
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{ asset('assets/images/logo.webp') }}" class="w-300px" alt="">
                        <div class="spacer-20"></div>
                        <p style="font-size: 20px">“Bata Langa” adalah website arsip budaya yang melestarikan kebudayaan Ngada, khususnya Desa Langagedha.</p>

                        <div class="social-icons mb-sm-30">
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 order-lg-2 order-sm-1">
                    </div>
                    <div class="col-lg-4 col-sm-6 order-lg-2 order-sm-1">
                        <div class="widget">

                            <div class="spacer-20"></div>

                            <div class="fw-bold text-white"><i class="icofont-location-pin me-2 id-color-2"></i>
                                Location</div>
                            Desa Langagedha, Nusa Tenggara Timur, Indonesia

                            <div class="spacer-20"></div>

                            <div class="fw-bold text-white"><i class="icofont-envelope me-2 id-color-2"></i>Send a
                                Message</div>
                            contact@gmail.com
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    Copyright 2025 - Budaya Langagedha
                                </div>
                                <ul class="menu-simple">
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/images/background/shape5.png') }}" style="width: 100% ; height: 120px" alt="" class="abs bottom-0 op-3"
                alt="">
        </footer>
        <!-- footer end -->
    </div>

    <!-- overlay content begin -->
    <div id="extra-wrap" class="text-light">
        <div id="btn-close">
            <span></span>
            <span></span>
        </div>

        <div id="extra-content">
            <img src="{{ asset('assets/images/logo.webp') }}" class="w-250px" alt="">

            <div class="spacer-30-line"></div>

            <ul class="no-style">
                <li><a href="#">Home</a></li>
                <li><a href="#">Modul</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Peta Budaya</a></li>
                <li><a href="#">Peta 3D</a></li>
                <li><a href="#">Tentang Desa</a></li>
                <li><a href="#">Contact</a></li>
            </ul>

            <div class="spacer-30-line"></div>

            <h5>Contact Us</h5>
            <div><i class="icofont-location-pin me-2 op-5"></i>Langagedha, Nusa Yenggara Timur </div>
            <div><i class="icofont-envelope me-2 op-5"></i>langagedha@gmail.com</div>

            <div class="spacer-30-line"></div>

            <h5>About Us</h5>
            <p>“Bata Langa” adalah website arsip budaya yang melestarikan kebudayaan Ngada, khususnya Desa Langagedha.
            </p>

            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
    <!-- overlay content end -->


    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('template/js/plugins.js') }}"></script>
    <script src="{{ asset('template/js/designesia.js') }}"></script>
    <script src="{{ asset('template/js/swiper.js') }}"></script>
    <script src="{{ asset('template/js/custom-swiper-3.js') }}"></script>
    <script src="{{ asset('template/js/custom-marquee.js') }}"></script>

    <!-- Three.js and GLTFLoader -->
    <!-- Three.js and GLTFLoader -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>
    <!-- 3D Map Script -->
    <script>
        // Initialize Three.js scene
        const canvas = document.getElementById('map-canvas');
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, canvas.clientWidth / canvas.clientHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({
            canvas: canvas,
            antialias: true,
            alpha: true
        });
        renderer.setSize(canvas.clientWidth, canvas.clientHeight);
        renderer.setPixelRatio(window.devicePixelRatio);

        // Set canvas background to #f0e3c0
        renderer.setClearColor(0xeee9da, 1);

        // Enhanced lighting for brighter ground
        // Strong ambient light
        const ambientLight = new THREE.AmbientLight(0xffffff, 1.0); // Max intensity
        scene.add(ambientLight);

        // Multiple directional lights
        const directionalLight1 = new THREE.DirectionalLight(0xffffff, 0.9); // High intensity
        directionalLight1.position.set(10, 30, 10); // Higher position for ground coverage
        scene.add(directionalLight1);
        const directionalLight2 = new THREE.DirectionalLight(0xffffff, 0.7);
        directionalLight2.position.set(-10, 30, -10);
        scene.add(directionalLight2);

        // Hemisphere light for natural outdoor effect
        const hemiLight = new THREE.HemisphereLight(0xffffff, 0xaaaaaa, 0.9); // Brighter ground color
        hemiLight.position.set(0, 30, 0);
        scene.add(hemiLight);

        // Load GLB model
        const loader = new THREE.GLTFLoader();
        loader.load(
            '{{ asset('assets/map/3D-Map.glb') }}',
            (gltf) => {
                console.log('GLB loaded successfully:', gltf);
                const model = gltf.scene;

                // Traverse model to inspect and fix materials
                model.traverse((child) => {
                    if (child.isMesh && child.material) {
                        console.log('Mesh:', child.name, 'Material:', child.material);
                        // Only apply fallback if material is invalid or untextured
                        if (!child.material.isMaterial || child.material.opacity === 0) {
                            child.material = new THREE.MeshStandardMaterial({
                                color: 0xcccccc, // Lighter gray fallback for visibility
                                metalness: 0.5,
                                roughness: 0.5
                            });
                            console.log('Applied fallback material to:', child.name);
                        } else if (child.material.map) {
                            // Ensure texture is loaded correctly
                            child.material.map.needsUpdate = true;
                            console.log('Texture found for:', child.name);
                        }
                        // Brighten ground material if it’s too dark
                        if (child.name.toLowerCase().includes('ground') || child.name.toLowerCase().includes(
                                'terrain')) {
                            if (child.material.color) {
                                child.material.color.multiplyScalar(1.2); // Boost brightness by 20%
                                console.log('Brightened ground material for:', child.name);
                            }
                        }
                    }
                });

                scene.add(model);

                // Center and scale the model
                const box = new THREE.Box3().setFromObject(model);
                const center = box.getCenter(new THREE.Vector3());
                const size = box.getSize(new THREE.Vector3());
                const maxDim = Math.max(size.x, size.y, size.z);
                const scale = 10 / maxDim; // Adjust scale to fit view
                model.scale.set(scale, scale, scale);
                model.position.sub(center.multiplyScalar(scale));

                // Zoom in by setting closer camera position
                camera.position.z = maxDim * scale * 0.8; // Closer than before (was 1.5)
            },
            (xhr) => {
                console.log((xhr.loaded / xhr.total * 100) + '% loaded');
            },
            (error) => {
                console.error('Error loading GLB:', error);
            }
        );

        // Add OrbitControls with adjusted distance limits
        const controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.05;
        controls.screenSpacePanning = false;
        controls.minDistance = 0.5; // Allow closer zoom
        controls.maxDistance = 50; // Limit max zoom out
        controls.target.set(0, 0, 0); // Center on model

        // Handle window resize
        window.addEventListener('resize', () => {
            camera.aspect = canvas.clientWidth / canvas.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(canvas.clientWidth, canvas.clientHeight);
        });

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            controls.update();
            renderer.render(scene, camera);
        }
        animate();
    </script>
</body>

</html>
