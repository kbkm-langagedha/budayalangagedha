@extends('frontend.layouts.app')

@section('title', 'Budaya Langagedha - Nusa Tenggara Timur')
@section('description',
    'Jelajahi keindahan warisan budaya Langagedha dari Nusa Tenggara Timur. Tempat dimana tradisi,
    kesenian, dan kearifan lokal tetap hidup dan terjaga.')

    @push('styles')
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
    @endpush

@section('content')
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
                    <!-- Dynamic Slides -->
                    @foreach ($images as $image)
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url('{{ Storage::url($image->image) }}')">
                                <div class="sw-overlay op-2"></div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Fallback if no images -->
                    @if ($images->isEmpty())
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url('{{ asset('assets/images/background/bg1.png') }}')">
                                <div class="sw-overlay op-2"></div>
                            </div>
                        </div>
                    @endif
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
                                        <img src="{{ asset('assets/images/template/temp3.jpg') }}" class="w-100 wow scaleIn"
                                            alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row g-4">
                                <div class="spacer-single sm-hide"></div>

                                <div class="col-lg-12">
                                    <div class=" rounded-1 overflow-hidden wow zoomIn" data-wow-delay=".3s">
                                        <img src="{{ asset('assets/images/template/temp1.jpg') }}" class="w-100 wow scaleIn"
                                            alt="" data-wow-delay=".3s">
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
                    <a class="btn-main wow fadeInUp" href="#" data-wow-delay=".6s"
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
                    <p style="color: #2D2D2D">Desa Langagedha melestarikan sepuluh objek pemajuan kebudayaan sebagai warisan budaya yang diturunkan dari generasi ke generasi, menjadi bagian integral dari identitas dan kehidupan masyarakat adat Ngada.</p>
                </div>
            </div>

            <div class="container relative z-2">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="owl-4-cols owl-carousel owl-theme wow fadeInUp">
                            @php
                            $opkData = [
                                [
                                    'image' => 'opk/opk1.jpg',
                                    'title' => 'Tradisi Lisan',
                                    'description' => 'Tuturan yang diwariskan secara turun-temurun oleh masyarakat contohnya seperti sejarah lisan, dongeng, rapalan, pantun, cerita rakyat, atau ekspresi lisan lainnya',
                                    'link' => '#'
                                ],
                                [
                                    'image' => 'opk/opk2.png',
                                    'title' => 'Pengetahuan Tradisional',
                                    'description' => 'Tata cara pelaksanaan upacara atau kegiatan yang didasarkan pada nilai tertentu dan dilakukan oleh kelompok masyarakat secara terus menerus dan dapat diwariskan.',
                                    'link' => '#'
                                ],
                                [
                                    'image' => 'opk/opk3.png',
                                    'title' => 'Manuskrip',
                                    'description' => 'Naskah beserta segala informasi yang terkandung di dalamnya, seperti serat, babad, kitab dan catatan lokal lainnya.',
                                    'link' => '#'
                                ],
                                [
                                    'image' => 'opk/opk4.png',
                                    'title' => 'Permainan Tradisional',
                                    'description' => 'Permainan yang didasarkan pada nilai tertentu dan dilakukan kelompok masyarakat yang bertujuan untuk menghibur diri',
                                    'link' => '#'
                                ],
                                [
                                    'image' => 'opk/opk7.jpg',
                                    'title' => 'Ritus',
                                    'description' => 'Tata cara pelaksanaan upacara atau kegiatan yang didasarkan pada nilai tertentu dan dilakukan oleh kelompok masyarakat secara terus menerus dan dapat diwariskan',
                                    'link' => '#'
                                ],
                                [
                                    'image' => 'opk/opk5.jpg',
                                    'title' => 'Adat Istiadat',
                                    'description' => 'Kebiasaan yang didasarkan pada nilai tertentu dan dilakukan oleh kelompok masyarakat secara terus-menerus dan diwariskan pada generasi berikutnya',
                                    'link' => '#'
                                ],
                                [
                                    'image' => 'opk/opk8.png',
                                    'title' => 'Olahraga Tradisional',
                                    'description' => 'Berbagai aktivitas fisik dan/atau mental yang bertujuan untuk menyehatkan diri dan meningkatkan daya tahan tubuh.',
                                    'link' => '#'
                                ],
                                [
                                    'image' => 'opk/opk9.png',
                                    'title' => 'Bahasa',
                                    'description' => 'Ide dalam masyarakat yang mengandung nilai-nilai setempat sebagai hasil nyata dalam berinteraksi dengan...',
                                    'link' => '#'
                                ],
                                [
                                    'image' => 'opk/opk10.png',
                                    'title' => 'Teknologi Tradisional',
                                    'description' => 'Sarana untuk menyediakan sesuatu yang diperlukan bagi kelangsungan atau kenyamanan hidup manusia.',
                                    'link' => '#'
                                ],
                                [
                                    'image' => 'opk/opk6.jpg',
                                    'title' => 'Seni',
                                    'description' => 'Warisan budaya maupun berbasis kreativitas penciptaan baru yang terwujud dalam berbagai bentuk kegiatan.',
                                    'link' => '#'
                                ]
                            ];
                        @endphp

                        @foreach($opkData as $index => $item)
                        <!-- Card {{ $index + 1 }} -->
                        <div class="item">
                            <div class="bg-color text-light rounded-1 overflow-hidden">
                                <div class="hover relative overflow-hidden text-light text-center">
                                    <img src="{{ asset('assets/images/' . $item['image']) }}" class="hover-scale-1-1 w-100" alt="">
                                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                        <a class="btn-line" href="{{ $item['link'] }}">View Details</a>
                                    </div>
                                    <div class="abs z-2 top-0 w-100 h-100 hover-op-1"></div>
                                    <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                                        <h4 class="mb-3">{{ $item['title'] }}</h4>
                                    </div>
                                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0 Z-1"></div>
                                </div>
                                <div class="p-4 py-2">
                                    <p class="mt-3">{{ Str::words($item['description'], 14, '...') }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <img src="{{ asset('assets/images/background/shape3.webp') }}" class="w-100" alt="Motif Tradisional Ngada">
    <section class="jarallax text-light relative">
        <img src="{{ asset('assets/images/background/bg9.JPG') }}" class="jarallax-img" alt="">
        <div class="de-overlay"></div>
        <div class="container relative z-1">
            <div class="row g-4 gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="subtitle wow fadeInUp mb-3">Warisan Leluhur</div>
                    <h2 class="text-uppercase wow fadeInUp" data-wow-delay=".2s">Kalender Ritual &
                        <span class="bg-blur px-3 py-2 rounded-1 d-inline-block mb-2" style="color: #f0e3c0;">Upacara
                            Adat</span>
                    </h2>
                    <p class="wow fadeInUp">Desa Langagedha melestarikan berbagai ritual dan upacara adat yang
                        diwariskan dari generasi ke generasi. Reba, upacara terpenting masyarakat Ngada,
                        dirayakan sebagai wujud syukur atas panen yang berlimpah dan memohon berkat untuk tahun
                        yang akan datang. Perayaan ini biasanya berlangsung dari Desember hingga Februari,
                        dengan puncak acara di bulan Januari.
                    </p>

                    <a class="btn-main wow fadeInUp" href="#" data-wow-delay=".6s" style="color: #F2E3BB;">Lihat
                        Selengkapnya</a>
                </div>

                <div class="col-lg-6">
                    <div class="custom-calendar bg-blur rounded-3 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="m-0" style="color: #f0e3c0;">Kalender Ritual Tahunan</h4>
                            <div class="small px-3 py-1 rounded" style="background: rgba(240, 227, 192, 0.3);">
                                {{ date('Y') }}</div>
                        </div>

                        <div class="ritual-timeline"
                            style="height: 260px; overflow-y: auto; scrollbar-width: thin; scrollbar-color: #f0e3c0 rgba(0,0,0,0.2);">
                            @if ($kalenderRituals->isNotEmpty())
                                @foreach ($kalenderRituals as $index => $ritual)
                                    <!-- Timeline item {{ $index + 1 }} -->
                                    <div class="ritual-item d-flex mb-3 wow fadeInUp"
                                        data-wow-delay="{{ ($index + 1) * 0.1 }}s">
                                        <div class="ritual-date text-center me-3">
                                            <div class="month fs-14 fw-bold" style="color: #f0e3c0;">
                                                {{ strtoupper(substr($ritual->bulan_text, 0, 3)) }}
                                            </div>
                                            <div class="day bg-dark-2 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px;">{{ $ritual->tanggal }}</div>
                                        </div>
                                        <div class="ritual-content p-2 rounded-2 w-100"
                                            style="background: rgba(0,0,0,0.3);">
                                            <h5 class="mb-0">{{ $ritual->nama_ritual }}</h5>
                                            <p class="mb-0 small">{{ $ritual->lokasi }}</p>
                                            {{-- @if ($ritual->keterangan)
                                                <p class="mb-0 small text-muted">{{ Str::limit($ritual->keterangan, 50) }}
                                                </p>
                                            @endif --}}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <p class="text-muted">Belum ada data ritual yang tersedia</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="ritual-stat text-center p-3 bg-blur rounded-3 me-2" style="flex: 1;">
                            <div class="ritual-icon mb-2">
                                <img src="{{ asset('template/images/icons/tree.png') }}" class="w-50px" alt="">
                            </div>
                            <h3 class="fs-24 mb-0">{{ $totalRituals }}+</h3>
                            <p class="mb-0 small">Ritual Tahunan</p>
                        </div>

                        <div class="ritual-stat text-center p-3 bg-blur rounded-3 ms-2" style="flex: 1;">
                            <div class="ritual-icon mb-2">
                                <img src="{{ asset('template/images/icons/happy.png') }}" class="w-50px" alt="">
                            </div>
                            <h3 class="fs-24 mb-0">6</h3>
                            <p class="mb-0 small">Klan di Langagedha</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <img src="{{ asset('assets/images/background/shape3.webp') }}" class="w-100" alt="Motif Tradisional Ngada">

    <section class="position-relative overflow-hidden">
        <img src="{{ asset('assets/images/background/shape4.webp') }}"
            class="position-absolute start-0 top-0 z-1 hide-on-mobile" style="max-width: 300px; opacity: 0.8;"
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
            class="position-absolute end-0 bottom-0 z-1 hide-on-mobile" style="max-width: 300px; opacity: 0.8;"
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
                        <i class="fa fa-history fa-2x mb-3" style="color: #F2E3BB;"></i>
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
                        <i class="fa fa-book fa-2x mb-3" style="color: #F2E3BB;"></i>
                        <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">02</div>
                        <div>
                            <h4>Modul Tradisional</h4>
                            <p>Pelajari nilai-nilai kearifan lokal masyarakat Ngada melalui
                                modul-modul pendidikan budaya yang disusun bersama tetua adat dan akademisi.
                            </p>
                            <div class="spacer-10"></div>
                            <a href="{{ route('modul') }}" class="btn-line">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="relative h-100 bg-color text-light padding30 rounded-1">
                        <i class="fa fa-calendar-alt fa-2x mb-3" style="color: #F2E3BB;"></i>
                        <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">03</div>
                        <div>
                            <h4>Kalender Ritual & Upacara Adat</h4>
                            <p>Temukan jadwal lengkap ritual dan upacara adat seperti Reba,
                                Ka Sa'o, Etu, Sagi, dan tradisi lainnya yang masih dilestarikan di Desa
                                Langagedha.</p>
                            <div class="spacer-10"></div>
                            <a href="{{ route('kalender-ritual') }}" class="btn-line">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp">
                    <div class="relative h-100 bg-color text-light padding30 rounded-1">
                        <i class="fa fa-leaf fa-2x mb-3" style="color: #F2E3BB;"></i>
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
                        <i class="fa fa-map-marked-alt fa-2x mb-3" style="color: #F2E3BB;"></i>
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
                        <i class="fa fa-home fa-2x mb-3" style="color: #F2E3BB;"></i>
                        <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">06</div>
                        <div>
                            <h4>Tentang Desa Langagedha</h4>
                            <p>Kenali lebih dalam sejarah, demografi, dan keunikan Desa
                                Langagedha sebagai salah satu kampung adat yang masih melestarikan budaya
                                asli suku Ngada di Flores.</p>
                            <div class="spacer-10"></div>
                            <a href="{{ route('tentang-desa') }}" class="btn-line">Selengkapnya</a>
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
                            <img src="{{ asset('assets/images/logos/kbkm.webp') }}" class="img-fluid"
                                style="max-height: 120px;" alt="KBKM">
                        </div>

                        <!-- Logo 2 -->
                        <div class="col-3 text-center wow fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('assets/images/logos/kemdikbuj.webp') }}" class="img-fluid"
                                style="max-height: 120px;" alt="Kemdikbud">
                        </div>

                        <!-- Logo 3 -->
                        <div class="col-3 text-center wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('assets/images/logos/langagedha.webp') }}" class="img-fluid"
                                style="max-height: 120px;" alt="Langagedha">
                        </div>

                        <!-- Logo 4 -->
                        <div class="col-3 text-center wow fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('assets/images/logos/disdik.webp') }}" class="img-fluid"
                                style="max-height: 120px;" alt="Disdik">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
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
                        // Brighten ground material if it's too dark
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
@endpush
