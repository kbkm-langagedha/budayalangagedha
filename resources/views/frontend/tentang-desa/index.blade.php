@extends('frontend.layouts.app')

@section('title', 'Tentang Desa Langagedha - Ngada, NTT')
@section('description', 'Kenali Desa Langagedha, desa yang berada di Kecamatan Bajawa, Kabupaten Ngada, Nusa Tenggara Timur dengan segala potensi dan keunikannya')

@push('styles')
    
@endpush

@section('content')

<section id="subheader" class="relative jarallax text-light">
    <img src="{{ asset('assets/images/background/bg1.png') }}" class="jarallax-img" alt="">
    <div class="container relative z-index-1000">
        <div class="row">
            <div class="col-lg-6">
                <ul class="crumb">
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="active">Tentang Desa</li>
                </ul>
                <h1 class="text-uppercase">Tentang Desa Langagedha</h1>
                <p class="col-lg-10 lead">Mengenal Lebih Dekat Desa di Jantung Bajawa</p>
            </div>
        </div>
    </div>
    <img src="images/logo-wm.webp" class="abs end-0 bottom-0 z-2 w-20" alt="">
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>

<section>
    <div class="container relative z-1">
        <div class="row g-4 gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="subtitle wow fadeInUp mb-3">Sejarah Desa</div>
                <h2 class="text-uppercase wow fadeInUp" data-wow-delay=".2s">Pemekaran <span class="id-color-2">Desa Langagedha</span> Tahun 2007</h2>
                <p class="wow fadeInUp">Desa Langagedha merupakan salah satu Desa di wilayah Kecamatan Bajawa, Kabupaten Ngada yang awal pembentukannya merupakan hasil pemekaran dari Desa Induk Bomari yang dimekarkan pada tahun 2007 dengan pusat desanya ada di dusun Sabiwaja. Yang dikukuhkan dengan PERDA NGADA Nomor: 11 Tahun 2007 pada Tanggal 15 Desember 2007.</p>
            </div>

            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-sm-6">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <img src="{{ asset('assets/images/opk/opk1.jpg') }}" class="w-100 rounded-1 wow zoomIn" alt="">
                            </div>
                            <div class="col-lg-12">
                                <div class="rounded-1 relative bg-color-2 text-light p-4">
                                    <img src="images/icons/tree.png" class="abs abs-middle w-60px" alt="">
                                    <div class="de_count ps-80 wow fadeInUp">
                                        <h2 class="mb-0 fs-32">285</h2>
                                        <span class="op-7">Hektar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="rounded-1 relative bg-color-2 text-light p-4">
                                    <img src="images/icons/happy.png" class="abs abs-middle w-60px" alt="">
                                    <div class="de_count ps-80 wow fadeInUp">
                                        <h2 class="mb-0 fs-32">1200</h2>
                                        <span class="op-7">MDPL</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <img src="{{ asset('assets/images/opk/opk1.jpg') }}" class="w-100 rounded-1 wow zoomIn" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Informasi Detail Desa -->
<section id="info-detail" class="bg-color-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="subtitle wow fadeInUp mb-3">Data Lengkap</div>
                <h2 class="text-uppercase wow fadeInUp" data-wow-delay=".2s">Informasi <span class="id-color-2">Desa Langagedha</span></h2>
            </div>
        </div>
        
        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="card h-100 wow fadeInUp">
                    <div class="card-body text-center">
                        <i class="fas fa-expand-arrows-alt mb-3 fs-48"></i>
                        <h4>Luas Wilayah</h4>
                        <p class="mb-0">Kurang lebih 285 Ha / 2.85 Km²</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 wow fadeInUp" data-wow-delay=".2s">
                    <div class="card-body text-center">
                        <i class="fas fa-mountain mb-3 fs-48"></i>
                        <h4>Ketinggian</h4>
                        <p class="mb-0">1200 MDPL</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 wow fadeInUp" data-wow-delay=".4s">
                    <div class="card-body text-center">
                        <i class="fas fa-angle-double-right mb-3 fs-48"></i>
                        <h4>Kemiringan</h4>
                        <p class="mb-0">Kurang lebih 30° – 50° sebagian melandai hingga rata</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 wow fadeInUp">
                    <div class="card-body text-center">
                        <i class="fas fa-place-of-worship mb-3 fs-48"></i>
                        <h4>Agama</h4>
                        <p class="mb-0">99,9% Katolik</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 wow fadeInUp" data-wow-delay=".2s">
                    <div class="card-body text-center">
                        <i class="fas fa-seedling mb-3 fs-48"></i>
                        <h4>Potensi Desa</h4>
                        <p class="mb-0">Kopi, Kakao, Eucalyptus</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 wow fadeInUp" data-wow-delay=".4s">
                    <div class="card-body text-center">
                        <i class="fas fa-briefcase mb-3 fs-48"></i>
                        <h4>Jenis Pekerjaan</h4>
                        <p class="mb-0">Petani, PNS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="subtitle wow fadeInUp mb-3">Media</div>
                <h2 class="text-uppercase wow fadeInUp" data-wow-delay=".2s">Video <span class="id-color-2">Desa Langagedha</span></h2>
                <p class="lead wow fadeInUp" data-wow-delay=".4s">Saksikan keindahan dan kultur Desa Langagedha</p>
            </div>
        </div>
        
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="video-container wow fadeInUp" data-wow-delay=".6s">
                    <!-- Ganti URL_VIDEO_YOUTUBE dengan URL video YouTube yang sesuai -->
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                            title="Video Desa Langagedha" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen class="rounded-1">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
    .video-container {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
    }
    
    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush