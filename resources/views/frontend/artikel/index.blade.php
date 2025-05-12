@extends('frontend.layouts.app')

@section('title', 'Artikel - Budaya Langagedha')
@section('description', 'Baca artikel menarik tentang kebudayaan Desa Langagedha, Nusa Tenggara Timur')

@push('styles')
    <style>
        .article-card {
            transition: transform 0.3s ease;
        }

        .article-card:hover {
            transform: translateY(-5px);
        }

        .article-date {
            background: linear-gradient(135deg, #2d5e43 0%, #4a7c59 100%);
        }

        .auto-height {
            height: 250px;
            background-size: cover !important;
            background-position: center;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 500;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 4px;
            background-color: #4a7c59;
            /* Match your theme */
            color: #fff;
            margin-right: 4px;
            margin-bottom: 4px;
        }
    </style>
@endpush

@section('content')

    <div id="top"></div>

    <section id="subheader" class="relative jarallax text-light">
        <img src="{{ asset('assets/images/background/bg4.png') }}" class="jarallax-img" alt="">
        <div class="container relative z-index-1000">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="crumb">
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="active">Artikel</li>
                    </ul>
                    <h1 class="text-uppercase">Artikel</h1>
                    <p class="col-lg-10 lead">Jelajahi artikel menarik tentang kebudayaan dan kehidupan masyarakat Desa
                        Langagedha</p>
                </div>
            </div>
        </div>
        <div class="de-gradient-edge-top dark"></div>
        <div class="de-overlay"></div>
    </section>

    <section>
        <div class="container">
            <div class="row g-4">
                @forelse($artikels as $artikel)
                    <div class="col-lg-6">
                        <div class="article-card rounded-1 bg-light overflow-hidden">
                            <div class="row g-2">
                                <div class="col-sm-6">
                                    <a href="{{ route('artikel.show', $artikel->slug) }}">
                                        <div class="auto-height relative"
                                            style="background-image: url('{{ $artikel->gambar ? asset('storage/' . $artikel->gambar) : asset('assets/images/background/bg1.png') }}')">
                                            <div
                                                class="abs start-0 top-0 article-date text-white p-3 pb-2 m-3 text-center fw-600 rounded-5px">
                                                <div class="fs-36 mb-0">{{ $artikel->published_at->format('d') }}</div>
                                                <span>{{ $artikel->published_at->locale('id')->format('M') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 relative">
                                    <div class="p-30 pb-60">
                                        <h4>
                                            <a class="text-dark" href="{{ route('artikel.show', $artikel->slug) }}"
                                                style="text-decoration: none;">
                                                {{ $artikel->judul }}
                                            </a>
                                        </h4>
                                        <p class="mb-0">
                                            {{ Str::limit($artikel->ringkasan ?: strip_tags($artikel->konten), 100) }}</p>

                                        <!-- Meta Keywords as Badges -->
                                        @if ($artikel->meta_keywords && ($keywords = json_decode($artikel->meta_keywords, true)))
                                            <div class="mb-2">
                                                @foreach ($keywords as $keyword)
                                                    <span
                                                        class="badge bg-secondary text-white me-1 mb-1 fs-12">{{ $keyword }}</span>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="abs bottom-0 pb-20">
                                            <div class="d-inline fs-14 fw-600 me-3">
                                                <i class="fa fa-eye id-color-2 me-2"></i>{{ $artikel->view_count ?: 0 }}
                                                Views
                                            </div>
                                            @if ($artikel->kategori)
                                                <div class="d-inline fs-14 fw-600">
                                                    <i
                                                        class="fa fa-tag id-color-2 me-2"></i>{{ $artikel->kategori->nama_master_artikel }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h3>Belum Ada Artikel</h3>
                        <p class="text-muted">Artikel belum tersedia saat ini. Silakan kembali lagi nanti.</p>
                    </div>
                @endforelse

                <!-- pagination begin -->
                @if ($artikels->hasPages())
                    <div class="col-lg-12 pt-4 text-center">
                        <div class="d-inline-block">
                            <nav aria-label="Page navigation">
                                {{ $artikels->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                @endif
                <!-- pagination end -->
            </div>
        </div>
    </section>

@endsection

@push('scripts')
@endpush
