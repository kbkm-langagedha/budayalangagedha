@extends('frontend.layouts.app')

@section('title', 'Objek Pemajuan Kebudayaan - Budaya Langagedha')
@section('description', 'Jelajahi 10 Objek Pemajuan Kebudayaan Desa Langagedha, Nusa Tenggara Timur')

@push('styles')
<style>
    .opk-card {
        height: 400px; /* Fixed height for all cards */
    }
    .opk-card img {
        height: 100%;
        object-fit: cover; /* Maintain aspect ratio while covering entire area */
    }
    .hover {
        transition: all 0.3s ease;
    }
</style>
@endpush

@section('content')

<section id="subheader" class="relative jarallax text-light">
    <img src="{{ asset('assets/images/background/bg3.png') }}" class="jarallax-img" alt="">
    <div class="container relative z-index-1000">
        <div class="row">
            <div class="col-lg-6">
                <ul class="crumb">
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="active">Objek Pemajuan Kebudayaan</li>
                </ul>
                <h1 class="text-uppercase">Objek Pemajuan Kebudayaan</h1>
                <p class="col-lg-10 lead">Temukan kekayaan warisan budaya yang dilestarikan oleh masyarakat Desa Langagedha</p>
            </div>
        </div>
    </div>
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>

<section class="p-4">
    <div class="container-fluid">
        <div class="row g-4">

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".3s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk1.jpg') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Tuturan yang diwariskan secara turun-temurun oleh masyarakat contohnya seperti sejarah lisan, dongeng, rapalan, pantun...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Tradisi Lisan</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".6s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk2.png') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Tata cara pelaksanaan upacara atau kegiatan yang didasarkan pada nilai tertentu dan dilakukan oleh kelompok masyarakat...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Pengetahuan Tradisional</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".3s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk3.png') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Naskah beserta segala informasi yang terkandung di dalamnya, seperti serat, babad, kitab dan catatan lokal lainnya...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Manuskrip</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".6s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk4.png') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Permainan yang didasarkan pada nilai tertentu dan dilakukan kelompok masyarakat yang bertujuan untuk menghibur diri...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Permainan Tradisional</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".3s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk7.jpg') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Tata cara pelaksanaan upacara atau kegiatan yang didasarkan pada nilai tertentu dan dilakukan oleh kelompok masyarakat secara terus menerus...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Ritus</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".6s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk5.jpg') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Kebiasaan yang didasarkan pada nilai tertentu dan dilakukan oleh kelompok masyarakat secara terus-menerus dan diwariskan pada generasi berikutnya...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Adat Istiadat</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".3s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk8.png') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Berbagai aktivitas fisik dan/atau mental yang bertujuan untuk menyehatkan diri dan meningkatkan daya tahan tubuh...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Olahraga Tradisional</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".6s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk9.png') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Ide dalam masyarakat yang mengandung nilai-nilai setempat sebagai hasil pengalaman nyata dalam berinteraksi dengan lingkungan...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Bahasa</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".3s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk10.png') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Sarana untuk menyediakan sesuatu yang diperlukan bagi kelangsungan atau kenyamanan hidup manusia...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Teknologi Tradisional</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="opk-card hover rounded-1 overflow-hidden relative text-light wow fadeInRight" data-wow-delay=".6s">
                    <a href="#" class="abs w-100 h-100 z-5"></a>
                    <img src="{{ asset('assets/images/opk/opk6.jpg') }}" class="hover-scale-1-1 w-100" alt="">
                    <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                        <div class="mb-3">Warisan budaya maupun berbasis kreativitas penciptaan baru yang terwujud dalam berbagai bentuk kegiatan...</div>
                    </div>
                    <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                    <div class="abs z-2 bottom-0 w-100 hover-op-0">
                        <div class="bg-blur d-flex m-4 p-3 px-4 rounded-1 justify-content-between align-items-center">
                            <div class="d-flex">
                                <div class="me-5">
                                    Objek
                                    <h5>Seni</h5>
                                </div>
                                <div>
                                    Kategori
                                    <h5>Warisan Budaya</h5>
                                </div>
                            </div>

                            <div class="w-40px">
                                <img src="{{ asset('template/images/misc/right-arrow.webp') }}" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="gradient-trans-color-bottom abs w-100 h-40 bottom-0"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    
@endpush