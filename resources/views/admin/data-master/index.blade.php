@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">{{ $title }}</h4>
            </div>
            <div class="row same-height mt-3 mb-3">
                <div class="col-md-4">
                    <a href="{{ route('master-images.index') }}" class="text-decoration-none">
                        <div class="card border-primary mb-3">
                            <div class="card-body text-center">
                                <i class="ti-image h1 text-primary"></i>
                                <h5 class="card-title mt-3">Master Gambar</h5>
                                <p class="card-text">Mengatur sub kategori gambar untuk view di halaman Utama.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card border-primary mb-3">
                            <div class="card-body text-center">
                                <i class="ti-book h1 text-primary"></i>
                                <h5 class="card-title mt-3">Master Artikel/Blog</h5>
                                <p class="card-text">Mengatur sub kategori artikel untuk mengorganizir artikel.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card border-primary mb-3">
                            <div class="card-body text-center">
                                <i class="ti-layers-alt h1 text-primary"></i>
                                <h5 class="card-title mt-3">Master Modul</h5>
                                <p class="card-text">Mengatur kategori dan sub-sub modul untuk mengorganizir modul.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
