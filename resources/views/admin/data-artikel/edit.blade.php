@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <h5 class="card-title">Edit Artikel</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('data-artikel.update', $dataArtikel->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                name="judul" value="{{ old('judul', $dataArtikel->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="master_artikel_id" class="form-label">Kategori</label>
                            <select class="form-select @error('master_artikel_id') is-invalid @enderror"
                                name="master_artikel_id" id="master_artikel_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('master_artikel_id', $dataArtikel->master_artikel_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama_master_artikel }}
                                    </option>
                                @endforeach
                            </select>
                            @error('master_artikel_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ringkasan" class="form-label">Ringkasan</label>
                            <textarea class="form-control @error('ringkasan') is-invalid @enderror" id="ringkasan" name="ringkasan" rows="3">{{ old('ringkasan', $dataArtikel->ringkasan) }}</textarea>
                            @error('ringkasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea class="form-control @error('konten') is-invalid @enderror" id="konten" name="konten" rows="10">{{ old('konten', $dataArtikel->konten) }}</textarea>
                            @error('konten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            @if ($dataArtikel->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $dataArtikel->gambar) }}" alt="Current Image"
                                        class="img-thumbnail" style="max-height: 200px">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                name="gambar">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                                id="meta_keywords" name="meta_keywords" 
                                value="{{ old('meta_keywords', is_string($dataArtikel->meta_keywords) ? $dataArtikel->meta_keywords : (is_array(json_decode($dataArtikel->meta_keywords, true)) ? implode(', ', json_decode($dataArtikel->meta_keywords, true)) : '')) }}"
                                placeholder="Contoh: keyword1, keyword2, keyword3">
                            <small class="text-muted">Pisahkan keyword dengan koma (,)</small>
                            @error('meta_keywords')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="published_at" class="form-label">Tanggal Publish</label>
                            <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                                id="published_at" name="published_at"
                                value="{{ old('published_at', $dataArtikel->published_at ? date('Y-m-d\TH:i', strtotime($dataArtikel->published_at)) : '') }}">
                            @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Artikel</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="is_active_1" name="is_active"
                                    value="1" {{ old('is_active', $dataArtikel->is_active) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active_1">
                                    Active
                                </label>
                                <small class="d-block text-muted ms-4">
                                    Artikel akan langsung dipublikasikan dan dapat dilihat oleh pengunjung website sesuai
                                    tanggal publish yang ditentukan.
                                </small>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" id="is_active_0" name="is_active"
                                    value="0" {{ old('is_active', $dataArtikel->is_active) == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active_0">
                                    Draft
                                </label>
                                <small class="d-block text-muted ms-4">
                                    Artikel disimpan sebagai draft dan tidak akan ditampilkan di website hingga status
                                    diubah menjadi Active.
                                </small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('data-artikel.index') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            ClassicEditor
                .create(document.querySelector('#konten'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
@endsection