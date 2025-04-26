@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Modul Pembelajaran</h5>
                    <a href="{{ route('modul-pembelajaran.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- Kolom Kiri --}}
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Judul</th>
                                    <td>{{ $modulPembelajaran->title }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $modulPembelajaran->deskripsi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Meta Keywords</th>
                                    <td>
                                        @php
                                            $keywords = json_decode($modulPembelajaran->meta_keyword, true);
                                        @endphp
                                        {{ is_array($keywords) && !empty($keywords) ? implode(', ', $keywords) : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($modulPembelajaran->is_active === 'aktif')
                                            <span class="badge bg-success">Aktif</span>
                                        @elseif ($modulPembelajaran->is_active === 'tidak_aktif')
                                            <span class="badge bg-danger">Tidak Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jumlah View</th>
                                    <td>{{ number_format($modulPembelajaran->view) }}</td>
                                </tr>
                                <tr>
                                    <th>Durasi</th>
                                    <td>{{ $modulPembelajaran->duration ?? '-' }} menit</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Publikasi</th>
                                    <td>{{ $modulPembelajaran->published_at ? $modulPembelajaran->published_at->format('d-m-Y H:i') : '-' }}
                                    </td>
                                </tr>
                            </table>
                        </div>

                        {{-- Kolom Kanan --}}
                        <div class="col-md-4">
                            <div class="side-content">
                                {{-- Thumbnail --}}
                                <div class="card mb-3">
                                    <div class="card-header py-2">
                                        <h6 class="mb-0">Thumbnail</h6>
                                    </div>
                                    <div class="card-body text-center p-2">
                                        @if ($modulPembelajaran->thumbnail)
                                            <img src="{{ Storage::url($modulPembelajaran->thumbnail) }}"
                                                class="img-fluid rounded">
                                        @else
                                            <p class="text-muted small mb-0">Tidak ada thumbnail</p>
                                        @endif
                                    </div>
                                </div>

                                {{-- Video --}}
                                <div class="card">
                                    <div class="card-header py-2">
                                        <h6 class="mb-0">Video</h6>
                                    </div>
                                    <div class="card-body p-2">
                                        @if ($modulPembelajaran->url_video)
                                            <div class="ratio ratio-16x9">
                                                @php
                                                    $videoUrl = $modulPembelajaran->url_video;
                                                    if (str_contains($videoUrl, 'youtube.com/watch?v=')) {
                                                        $videoId = explode('v=', $videoUrl)[1];
                                                        if (str_contains($videoId, '&')) {
                                                            $videoId = explode('&', $videoId)[0];
                                                        }
                                                        $videoUrl = "https://www.youtube.com/embed/{$videoId}";
                                                    }
                                                @endphp

                                                <iframe src="{{ $videoUrl }}" class="rounded" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen>
                                                </iframe>
                                            </div>
                                        @else
                                            <p class="text-muted small mb-0">Tidak ada video</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 0.5rem;
        }

        .card-header {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .table th {
            width: 200px;
        }
    </style>
@endsection