@extends('admin.layout.master')


@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Detail Artikel</h5>
                        <a href="{{ route('data-artikel.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                @if($dataArtikel->gambar)
                                    <img src="{{ asset('storage/' . $dataArtikel->gambar) }}" alt="{{ $dataArtikel->judul }}" 
                                         class="img-fluid mb-3" style="max-height: 300px; object-fit: cover;">
                                @endif
                            </div>
                        </div>

                        <table class="table">
                            <tr>
                                <th width="200px">Judul</th>
                                <td>{{ $dataArtikel->judul }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $dataArtikel->kategori->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge {{ $dataArtikel->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $dataArtikel->is_active ? 'Aktif' : 'Draft' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Publish</th>
                                <td>{{ $dataArtikel->published_at ? $dataArtikel->published_at->format('d/m/Y H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>View Count</th>
                                <td>{{ $dataArtikel->view_count }}</td>
                            </tr>
                            <tr>
                                <th>Meta Keywords</th>
                                <td>
                                    @php
                                        $keywords = json_decode($dataArtikel->meta_keywords ?? '[]');
                                        $keywords = is_array($keywords) ? $keywords : [];
                                    @endphp
                                    @if(count($keywords) > 0)
                                        @foreach($keywords as $keyword)
                                            <span class="badge bg-secondary me-1">{{ $keyword }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Dibuat Oleh</th>
                                <td>{{ $dataArtikel->creator->name }}</td>
                            </tr>
                            <tr>
                                <th>Diupdate Oleh</th>
                                <td>{{ $dataArtikel->editor ? $dataArtikel->editor->name : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>{{ $dataArtikel->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diupdate Pada</th>
                                <td>{{ $dataArtikel->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>

                        <div class="mt-4">
                            <h6 class="fw-bold">Ringkasan:</h6>
                            <p>{{ $dataArtikel->ringkasan ?: '-' }}</p>
                        </div>

                        <div class="mt-4">
                            <h6 class="fw-bold">Konten:</h6>
                            <div>{!! $dataArtikel->konten !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection