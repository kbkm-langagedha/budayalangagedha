@extends('frontend.layouts.app')

@section('title', 'Gallery Desa Langagedha - Ngada, NTT')
@section('description', 'Galeri foto Desa Langagedha yang menampilkan keindahan dan kehidupan sehari-hari masyarakat desa')

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
                    <li class="active">Galeri</li>
                </ul>
                <h1 class="text-uppercase">Galeri Desa Langagedha</h1>
                <p class="col-lg-10 lead">Nikmati keindahan dan kehidupan sehari-hari masyarakat Desa Langagedha!</p>
            </div>
        </div>
    </div>
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>

<section class="relative">
    <div class="container">
        <div class="row g-4">
            @if($images->count() > 0)
                @foreach($images as $image)
                    <div class="col-lg-4 text-center">
                        <a href="{{ asset('storage/' . $image->image) }}" class="image-popup d-block hover">
                            <div class="relative overflow-hidden rounded-10">
                                <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                    <h4 class="mb-0 hover-scale-in-3">View</h4>
                                </div> 
                                <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                <img src="{{ asset('storage/' . $image->image) }}" 
                                     class="img-fluid hover-scale-1-2" 
                                     alt="{{ $image->title }}"
                                     style="height: 300px; object-fit: cover; width: 100%;">
                            </div>
                        </a>
                        <div class="mt-3">
                            <h5>{{ $image->title }}</h5>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <div class="bg-light p-5 rounded-3">
                        <h4 class="text-muted">Galeri akan segera hadir</h4>
                        <p class="text-muted">Foto-foto menarik dari Desa Langagedha akan ditampilkan di sini.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection

@push('scripts')
    
@endpush