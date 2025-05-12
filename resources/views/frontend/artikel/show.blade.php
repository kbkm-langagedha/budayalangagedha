@extends('frontend.layouts.app')

@section('title', $artikel->judul . ' - Budaya Langagedha')
@section('description', Str::limit(strip_tags($artikel->ringkasan ?: $artikel->konten), 160))

@push('styles')
<style>
    .article-card {
        transition: transform 0.3s ease;
    }
    .article-card:hover {
        transform: translateY(-5px);
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
        background-color: #4a7c59; /* Match your theme */
        color: #fff;
        margin-right: 4px;
        margin-bottom: 4px;
    }

    .widget_categories ul li {
        margin-bottom: 8px;
    }
    .widget_categories ul li a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .widget_categories ul li a:hover {
        color: #4a7c59;
    }
    .social-share a {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        color: #fff;
        margin-right: 8px;
        transition: background-color 0.3s ease;
    }
    .social-share .facebook { background-color: #3b5998; }
    .social-share .twitter { background-color: #1da1f2; }
    .social-share .whatsapp { background-color: #25d366; }
    .social-share .linkedin { background-color: #0077b5; }
    .social-share a:hover { opacity: 0.8; }
</style>
@endpush

@section('content')

<section id="subheader" class="relative jarallax text-light">
    <img src="{{ asset('assets/images/background/bg4.png') }}" class="jarallax-img" alt="">
    <div class="container relative z-index-1000">
        <div class="row">
            <div class="col-lg-6">
                <ul class="crumb">
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li><a href="{{ route('artikel') }}">Artikel</a></li>
                    <li class="active">{{ Str::limit($artikel->judul, 30) }}</li>
                </ul>
                <h1 class="text-uppercase">{{ $artikel->judul }}</h1>
            </div>
        </div>
    </div>
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>

<section>
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-8">
                <div class="blog-read">
                    <div class="post-text">
                        <!-- Gambar Utama Artikel -->
                        @if($artikel->gambar)
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="w-100 rounded-1 mb-4" alt="{{ $artikel->judul }}">
                        @else
                            <img src="{{ asset('assets/images/background/bg1.png') }}" class="w-100 rounded-1 mb-4" alt="{{ $artikel->judul }}">
                        @endif

                        <!-- Konten Artikel -->
                        {!! $artikel->konten !!}

                        
                    </div>
                </div>

                <div class="spacer-single"></div>
            </div>

            <div class="col-lg-4">
                <!-- Widget Recent Posts -->
                <div class="widget widget-post">
                    <h4>Artikel Terbaru</h4>
                    <ul class="de-bloglist-type-1">
                        @forelse($recentPosts as $post)
                            <li>
                                <div class="d-image">
                                    <img src="{{ $post->gambar ? asset('storage/' . $post->gambar) : asset('assets/images/background/bg1.png') }}" alt="{{ $post->judul }}">
                                </div>
                                <div class="d-content">
                                    <a href="{{ route('artikel.show', $post->slug) }}"><h4>{{ $post->judul }}</h4></a>
                                    <div class="d-date">{{ $post->published_at->locale('id')->translatedFormat('d F Y') }}</div>
                                </div>
                            </li>
                        @empty
                            <li><p>Tidak ada artikel terbaru.</p></li>
                        @endforelse
                    </ul>
                </div>

                <!-- Kategori -->
                @if($artikel->kategori)
                    <h4>Kategori</h4>
                    <p class="badge bg-secondary mb-4"> {{ $artikel->kategori->nama_master_artikel }}</p>
                @endif

                <!-- Widget Share to Social Media -->
                <div class="widget widget_share">
                    <h4>Bagikan</h4>
                    <div class="social-share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" class="facebook" target="_blank" title="Bagikan ke Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($artikel->judul) }}" class="twitter" target="_blank" title="Bagikan ke Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($artikel->judul . ' ' . url()->current()) }}" class="whatsapp" target="_blank" title="Bagikan ke WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($artikel->judul) }}" class="linkedin" target="_blank" title="Bagikan ke LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Widget Tags (Meta Keywords) -->
                @if($artikel->meta_keywords && $keywords = json_decode($artikel->meta_keywords, true))
                    <div class="widget widget_tags">
                        <h4>Tag Populer</h4>
                        <ul>
                            @foreach($keywords as $keyword)
                                <li><a href="#">{{ $keyword }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
@endpush