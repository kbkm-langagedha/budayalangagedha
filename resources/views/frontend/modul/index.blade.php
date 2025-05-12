@extends('frontend.layouts.app')

@section('title', 'Modul Pembelajaran - Budaya Langagedha')
@section('description', 'Jelajahi berbagai modul pembelajaran tentang kebudayaan Desa Langagedha, Nusa Tenggara Timur')

@push('styles')
    <style>
        .modul-card {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #2d5e43 0%, #596a5a 100%);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .modul-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .modul-image {
            border-radius: 12px;
            overflow: hidden;
            height: 250px;
        }

        .modul-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modul-content {
            color: white;
        }

        .modul-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: white;
        }

        .modul-description {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #f0f0f0;
        }

        .btn-tonton-video {
            position: relative;
            overflow: hidden;
            /* Ensure ripple stays within button */
            background-color: #d4b894;
            color: #2d5e43;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-tonton-video:hover {
            background-color: #b8a082;
        }

        /* Override ripple-wave styles */
        .btn-tonton-video .ripple-wave {
            display: none !important;
            /* Disable ripple effect */
            /* OR customize if you want to keep the effect */
            /* position: absolute;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                pointer-events: none;
                animation: none; */
        }

        /* Ensure button doesn't expand */
        .btn-tonton-video:active,
        .btn-tonton-video:focus {
            outline: none;
            box-shadow: none;
            padding: 10px 20px;
            /* Maintain padding */
            transform: none;
            /* Prevent any transform issues */
        }

        .duration-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(240, 227, 192, 0.9);
            color: #2D2D2D;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }

        /* Modal styles for video popup */
        .video-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .video-modal-content {
            position: relative;
            margin: auto;
            padding: 0;
            width: 80%;
            max-width: 900px;
            top: 50%;
            transform: translateY(-50%);
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .close-video {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-video:hover {
            color: #f0e3c0;
        }

        @media (max-width: 768px) {
            .modul-title {
                font-size: 1.5rem;
            }

            .video-modal-content {
                width: 95%;
            }
        }
    </style>
@endpush

@section('content')

    <section id="subheader" class="relative jarallax text-light">
        <img src="{{ asset('assets/images/background/bg1.png') }}" class="jarallax-img" alt="">
        <div class="container relative z-index-1000">
            <div class="row">
                <div class="col-lg-8">
                    <ul class="crumb">
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="active">Modul Pembelajaran</li>
                    </ul>
                    <h1 class="text-uppercase">Modul Pembelajaran</h1>
                    <p class="col-lg-10 lead">Pelajari kebudayaan Langagedha melalui modul pembelajaran yang interaktif dan
                        menarik!</p>
                </div>
            </div>
        </div>
        <div class="de-gradient-edge-top dark"></div>
        <div class="de-overlay"></div>
    </section>

    <section class="p-4">
        <div class="container">
            @if ($moduls->count() > 0)
                @foreach ($moduls as $index => $modul)
                    <!-- Modul item begin -->
                    <div class="row modul-card wow fadeInUp" data-wow-delay="{{ $index * 0.1 }}s">
                        <div class="col-md-4">
                            <div class="modul-image position-relative">
                                @if ($modul->thumbnail)
                                    <img src="{{ asset('storage/' . $modul->thumbnail) }}" alt="{{ $modul->title }}">
                                @else
                                    <img src="{{ asset('assets/images/background/bg1.png') }}" alt="{{ $modul->title }}">
                                @endif
                                @if ($modul->duration)
                                    <span class="duration-badge">{{ $modul->duration }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="modul-content">
                                <h2 class="modul-title">{{ $modul->title }}</h2>
                                @if ($modul->deskripsi)
                                    <p class="modul-description">{{ strip_tags($modul->deskripsi) }}</p>
                                @endif

                                <!-- Meta Keywords (Tags) -->
                                @if ($modul->meta_keyword && count($modul->meta_keyword) > 0)
                                    <div class="mb-3">
                                        @foreach ($modul->meta_keyword as $keyword)
                                            <span class="badge"
                                                style="background-color: #f0e3c0; color: #2D2D2D; margin-right: 8px; margin-bottom: 5px; padding: 6px 12px; border-radius: 15px;">{{ $keyword }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Action Buttons -->
                                @if ($modul->url_video)
                                    <button class="btn btn-tonton-video"
                                        onclick="openVideoModal('{{ $modul->url_video }}', {{ $modul->id }})">
                                        <i class="fa fa-play me-2"></i>Tonton Video
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Modul item end -->
                @endforeach
            @else
                <!-- No Modules Available -->
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="p-5">
                            <h3>Belum Ada Modul</h3>
                            <p class="text-muted">Modul pembelajaran sedang dalam tahap pengembangan. Silakan kembali lagi
                                nanti.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Video Modal -->
    <div id="videoModal" class="video-modal">
        <div class="video-modal-content">
            <span class="close-video" onclick="closeVideoModal()">&times;</span>
            <div class="video-container">
                <iframe id="youtubeFrame" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        function getYouTubeVideoId(url) {
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);
            return (match && match[2].length === 11) ? match[2] : null;
        }

        function openVideoModal(videoUrl, modulId) {
            const videoId = getYouTubeVideoId(videoUrl);
            if (videoId) {
                // Increment view count via AJAX
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.post(`{{ url('/modul/increment-view') }}/${modulId}`)
                    .done(function(response) {
                        console.log('View count updated:', response);
                    })
                    .fail(function(xhr, status, error) {
                        console.error('Error updating view count:', error);
                    });

                const modal = document.getElementById('videoModal');
                const iframe = document.getElementById('youtubeFrame');
                iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('youtubeFrame');
            iframe.src = '';
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('videoModal');
            if (event.target === modal) {
                closeVideoModal();
            }
        }

        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeVideoModal();
            }
        });
    </script>
@endpush
