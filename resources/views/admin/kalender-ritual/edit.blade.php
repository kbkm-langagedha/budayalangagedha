@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">{{ $title }}</h4>
                <a href="{{ route('kalender-ritual.index') }}" class="btn btn-secondary btn-sm">
                    <i class="ti-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kalender-ritual.update', $ritual->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_ritual" class="form-label">Nama Ritual <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_ritual') is-invalid @enderror" id="nama_ritual" name="nama_ritual" value="{{ old('nama_ritual', $ritual->nama_ritual) }}" required>
                                    @error('nama_ritual')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $ritual->lokasi) }}" required>
                                    @error('lokasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                    <input type="number" min="1" max="31" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $ritual->tanggal) }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bulan" class="form-label">Bulan <span class="text-danger">*</span></label>
                                    <select class="form-select @error('bulan') is-invalid @enderror" id="bulan" name="bulan" required>
                                        <option value="">Pilih Bulan</option>
                                        <option value="1" {{ old('bulan', $ritual->bulan) == 1 ? 'selected' : '' }}>Januari</option>
                                        <option value="2" {{ old('bulan', $ritual->bulan) == 2 ? 'selected' : '' }}>Februari</option>
                                        <option value="3" {{ old('bulan', $ritual->bulan) == 3 ? 'selected' : '' }}>Maret</option>
                                        <option value="4" {{ old('bulan', $ritual->bulan) == 4 ? 'selected' : '' }}>April</option>
                                        <option value="5" {{ old('bulan', $ritual->bulan) == 5 ? 'selected' : '' }}>Mei</option>
                                        <option value="6" {{ old('bulan', $ritual->bulan) == 6 ? 'selected' : '' }}>Juni</option>
                                        <option value="7" {{ old('bulan', $ritual->bulan) == 7 ? 'selected' : '' }}>Juli</option>
                                        <option value="8" {{ old('bulan', $ritual->bulan) == 8 ? 'selected' : '' }}>Agustus</option>
                                        <option value="9" {{ old('bulan', $ritual->bulan) == 9 ? 'selected' : '' }}>September</option>
                                        <option value="10" {{ old('bulan', $ritual->bulan) == 10 ? 'selected' : '' }}>Oktober</option>
                                        <option value="11" {{ old('bulan', $ritual->bulan) == 11 ? 'selected' : '' }}>November</option>
                                        <option value="12" {{ old('bulan', $ritual->bulan) == 12 ? 'selected' : '' }}>Desember</option>
                                    </select>
                                    @error('bulan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $ritual->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan Tambahan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $ritual->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Ritual</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                            <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            @if($ritual->gambar)
                            <div class="mt-2">
                                <label>Gambar Saat Ini:</label>
                                <div class="position-relative">
                                    <img src="{{ asset('storage/ritual/' . $ritual->gambar) }}" alt="{{ $ritual->nama_ritual }}" class="img-thumbnail mt-2" style="max-height: 200px">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="hapus_gambar" name="hapus_gambar">
                                        <label class="form-check-label" for="hapus_gambar">
                                            Hapus gambar
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" {{ $ritual->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Aktif</label>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Initialize summernote for rich text editor
            $('#deskripsi').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            
            // Initialize image preview
            $('#gambar').change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $('.img-preview').attr('src', event.target.result);
                        $('.img-preview-wrapper').removeClass('d-none');
                    }
                    reader.readAsDataURL(file);
                }
            });
            
            // Handle delete image checkbox
            $('#hapus_gambar').change(function() {
                if(this.checked) {
                    $('.img-thumbnail').css('opacity', '0.5');
                } else {
                    $('.img-thumbnail').css('opacity', '1');
                }
            });
        });
    </script>
@endpush