@extends('frontend.layouts.app')

@section('title', 'Kalender Ritual - Budaya Langagedha')
@section('description', 'Jelajahi kalender ritual tahunan Desa Langagedha dengan berbagai upacara dan tradisi yang dilestarikan dari generasi ke generasi')

@push('styles')
<style>
    .tab-month {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .tab-month:hover {
        background-color: rgba(240, 227, 192, 0.1);
    }
    .tab-month.active {
        background-color: #f0e3c0 !important;
        color: #2D2D2D !important;
    }
    .event-counter {
        background-color: #f0e3c0;
        color: #2D2D2D;
        font-size: 16px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    .ritual-section {
        border-bottom: 1px solid rgba(240, 227, 192, 0.3);
        padding-bottom: 50px;
        margin-bottom: 50px;
    }
    .ritual-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }
    .ritual-image-container {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .ritual-details {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }
    .detail-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
    }
    .detail-item:last-child {
        margin-bottom: 0;
    }
    .detail-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #2d5e43 0%, #4a7c59 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-right: 15px;
        flex-shrink: 0;
    }
    .detail-row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
    }
    .detail-row:last-child {
        margin-bottom: 0;
    }
    .detail-half {
        flex: 1;
        min-width: calc(50% - 7.5px);
    }
    .detail-full {
        width: 100%;
    }
</style>
@endpush

@section('content')

<section id="subheader" class="relative jarallax text-light">
    <img src="{{ asset('assets/images/background/bg1.png') }}" class="jarallax-img" alt="">
    <div class="container relative z-index-1000">
        <div class="row">
            <div class="col-lg-6">
                <ul class="crumb">
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="active">Kalender Ritual</li>
                </ul>
                <h1 class="text-uppercase">Kalender Ritual</h1>
                <p class="col-lg-10 lead">Jelajahi berbagai ritual dan upacara adat yang diselenggarakan sepanjang tahun di Desa Langagedha</p>
            </div>
        </div>
    </div>
    <div class="de-gradient-edge-top dark"></div>
    <div class="de-overlay"></div>
</section>

<section>
    <div class="container">
        <div class="row g-4 gx-5">
            <div class="col-lg-3">
                <div class="me-lg-3">
                    <h3 class="mb-4" style="color: #2D2D2D;">Pilih Bulan</h3>
                    
                    @php
                        $namaBluan = [
                            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                        ];
                    @endphp

                    @foreach($kalenderPerBulan as $bulanNum => $data)
                        <a href="javascript:void(0)" 
                           class="tab-month bg-light d-flex justify-content-between align-items-center p-4 px-4 rounded-10px mb-3 text-decoration-none" 
                           data-bulan="{{ $bulanNum }}" 
                           onclick="loadRitualsByMonth({{ $bulanNum }}, '{{ $namaBluan[$bulanNum] }}')">
                            <h3 class="mb-0 text-dark">{{ $namaBluan[$bulanNum] }}</h3>
                            <span class="event-counter">{{ $data['count'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-9">
                <div id="ritual-content">
                    @if($firstMonth && $firstMonthData->count() > 0)
                        @foreach($firstMonthData as $index => $ritual)
                            <div class="ritual-section">
                                <div class="row g-4 gx-5">
                                    <div class="col-lg-6">
                                        <h2>
                                            <span class="id-color-2">{{ $ritual->nama_ritual }}</span>
                                        </h2>
                                        <p class="lead" style="text-align: justify;">{{ $ritual->deskripsi }}</p>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="ritual-image-container">
                                            @if($ritual->gambar)
                                                <img src="{{ asset('storage/ritual/' . $ritual->gambar) }}" class="w-100 wow zoomIn" style="height: 400px; object-fit: cover;" alt="{{ $ritual->nama_ritual }}">
                                            @else
                                                <img src="{{ asset('assets/images/background/bg1.png') }}" class="w-100 wow zoomIn" style="height: 400px; object-fit: cover;" alt="{{ $ritual->nama_ritual }}">
                                            @endif
                                        </div>
                                        
                                        <div class="ritual-details">
                                            <!-- Tanggal dan Lokasi - Bersampingan -->
                                            <div class="detail-row">
                                                <div class="detail-half">
                                                    <div class="detail-item">
                                                        <div class="detail-icon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-1">Tanggal</h5>
                                                            <p class="mb-0 text-muted">{{ $ritual->tanggal }} {{ $ritual->bulan_text }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="detail-half">
                                                    <div class="detail-item">
                                                        <div class="detail-icon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-1">Lokasi</h5>
                                                            <p class="mb-0 text-muted">{{ $ritual->lokasi }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Keterangan - Full width -->
                                            @if($ritual->keterangan)
                                                <div class="detail-row">
                                                    <div class="detail-full">
                                                        <div class="detail-item">
                                                            <div class="detail-icon">
                                                                <i class="fa fa-info-circle"></i>
                                                            </div>
                                                            <div>
                                                                <h5 class="mb-1">Keterangan</h5>
                                                                <p class="mb-0 text-muted">{{ $ritual->keterangan }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Empty state if no data -->
                        <div class="row g-4 gx-5">
                            <div class="col-lg-6">
                                <h2><span class="id-color-2">Belum Ada</span> Data Ritual di Desa <span class="id-color-2">Langagedha</span></h2>
                                <p>Data ritual dan upacara adat untuk bulan ini belum tersedia. Silakan kembali lagi nanti atau pilih bulan lain yang tersedia.</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-center py-5">
                                    <h4 class="mt-3" style="color: #7f8c8d;">Data Belum Tersedia</h4>
                                    <p style="color: #bdc3c7;">Pilih bulan lain di sidebar kiri</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Loading spinner template -->
<template id="loading-template">
    <div class="text-center py-5">
        <div class="spinner-border" style="color: #2d5e43;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-2">Memuat data ritual...</p>
    </div>
</template>

@endsection

@push('scripts')
<script>
    // Add CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Function to load rituals by month
    function loadRitualsByMonth(bulan, namaBulan) {
        // Update active tab
        $('.tab-month').removeClass('active');
        $(`[data-bulan="${bulan}"]`).addClass('active');

        // Show loading
        const loadingHtml = $('#loading-template').html();
        $('#ritual-content').html(loadingHtml);

        // AJAX request to get rituals
        $.get(`{{ url('/kalender-ritual/month') }}/${bulan}`)
            .done(function(response) {
                displayRituals(response.rituals, bulan, namaBulan);
            })
            .fail(function(xhr, status, error) {
                console.error('AJAX Error:', error);
                $('#ritual-content').html(`
                    <div class="text-center py-5">
                        <h4 class="text-danger">Error memuat data</h4>
                        <p>Silakan coba lagi nanti. Error: ${error}</p>
                    </div>
                `);
            });
    }

    // Function to display rituals
    function displayRituals(rituals, bulan, namaBulan) {
        if (rituals.length === 0) {
            $('#ritual-content').html(`
                <div class="row g-4 gx-5">
                    <div class="col-lg-6">
                        <h2><span class="id-color-2">Belum Ada</span> Data Ritual Bulan ${namaBulan} di Desa <span class="id-color-2">Langagedha</span></h2>
                        <p>Data ritual dan upacara adat untuk bulan ${namaBulan} belum tersedia. Silakan kembali lagi nanti atau pilih bulan lain yang tersedia.</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center py-5">
                            <h4 class="mt-3" style="color: #7f8c8d;">Data Belum Tersedia</h4>
                            <p style="color: #bdc3c7;">Pilih bulan lain di sidebar kiri</p>
                        </div>
                    </div>
                </div>
            `);
            return;
        }

        let html = '';
        
        // Loop each ritual
        rituals.forEach(function(ritual, index) {
            html += `
                <div class="ritual-section">
                    <div class="row g-4 gx-5">
                        <div class="col-lg-6">
                            <h2>
                                <span class="id-color-2">${ritual.nama_ritual}</span>
                            </h2>
                            <p class="lead">${ritual.deskripsi}</p>
                        </div>

                        <div class="col-lg-6">
                            <div class="ritual-image-container">
            `;
            
            const image = ritual.gambar 
                ? `{{ asset('storage/ritual/') }}/${ritual.gambar}`
                : `{{ asset('assets/images/background/bg1.png') }}`;
            
            html += `
                                <img src="${image}" class="w-100 wow zoomIn" style="height: 400px; object-fit: cover;" alt="${ritual.nama_ritual}">
                            </div>
                            
                            <div class="ritual-details">
                                <!-- Tanggal dan Lokasi - Bersampingan -->
                                <div class="detail-row">
                                    <div class="detail-half">
                                        <div class="detail-item">
                                            <div class="detail-icon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-1">Tanggal</h5>
                                                <p class="mb-0 text-muted">${ritual.tanggal} ${ritual.bulan_text}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-half">
                                        <div class="detail-item">
                                            <div class="detail-icon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-1">Lokasi</h5>
                                                <p class="mb-0 text-muted">${ritual.lokasi}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            `;
            
            if (ritual.keterangan) {
                html += `
                                <!-- Keterangan - Full width -->
                                <div class="detail-row">
                                    <div class="detail-full">
                                        <div class="detail-item">
                                            <div class="detail-icon">
                                                <i class="fa fa-info-circle"></i>
                                            </div>
                                            <div>
                                                <h5 class="mb-1">Keterangan</h5>
                                                <p class="mb-0 text-muted">${ritual.keterangan}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                `;
            }
            
            html += `
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        
        $('#ritual-content').html(html);
        
        // Trigger animations if WOW.js is available
        if (typeof WOW !== 'undefined') {
            new WOW().init();
        }
    }

    // Auto-active first month tab on page load
    $(document).ready(function() {
        @if($firstMonth)
            // Set first month tab as active
            $(`[data-bulan="{{ $firstMonth }}"]`).addClass('active');
        @endif
    });
</script>
@endpush