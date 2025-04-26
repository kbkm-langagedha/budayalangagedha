@extends('admin.layout.master')

@section('content')
    <div class="container-fluid px-4">
        <!-- Page Header -->

        <!-- Form Card -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">Form Tambah Modul</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('modul-pembelajaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Basic Information -->
                            <div class="mb-4">
                                <h6 class="text-primary fw-bold mb-3">Informasi Dasar</h6>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">
                                                <i class="fas fa-heading me-1"></i> Judul <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" value="{{ old('title') }}"
                                                placeholder="Masukkan judul modul" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">
                                                <i class="fas fa-align-left me-1"></i> Deskripsi
                                            </label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5"
                                                placeholder="Masukkan deskripsi modul">{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="duration" class="form-label">
                                                <i class="fas fa-clock me-1"></i> Durasi
                                            </label>
                                            <input type="text"
                                                class="form-control @error('duration') is-invalid @enderror" id="duration"
                                                name="duration" value="{{ old('duration') }}"
                                                placeholder="Contoh: 1 jam 30 menit">
                                            @error('duration')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="meta_keyword" class="form-label">
                                                <i class="fas fa-tags me-1"></i> Meta Keywords
                                            </label>
                                            <input type="text"
                                                class="form-control @error('meta_keyword') is-invalid @enderror"
                                                id="meta_keyword" name="meta_keyword" value="{{ old('meta_keyword') }}"
                                                placeholder="Masukkan kata kunci, pisahkan dengan koma">
                                            <div class="form-text">Contoh: pembelajaran, modul, edukasi</div>
                                            @error('meta_keyword')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Media Section -->
                            <div class="mb-4">
                                <h6 class="text-primary fw-bold mb-3">Media</h6>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="thumbnail" class="form-label">
                                                <i class="fas fa-image me-1"></i> Thumbnail
                                            </label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('thumbnail') is-invalid @enderror"
                                                    id="thumbnail" name="thumbnail" accept="image/*">
                                                <label class="input-group-text" for="thumbnail">Browse</label>
                                            </div>
                                            <div class="form-text">Format: JPG, PNG, GIF. Ukuran maksimal: 2MB</div>
                                            @error('thumbnail')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                            <div id="thumbnailPreview" class="mt-2 d-none">
                                                <img src="" class="img-thumbnail" style="max-height: 150px;">
                                            </div>
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label for="video_path" class="form-label">
                                                <i class="fas fa-film me-1"></i> Upload Video
                                            </label>
                                            <div class="input-group">
                                                <input type="file"
                                                    class="form-control @error('video_path') is-invalid @enderror"
                                                    id="video_path" name="video_path" accept="video/*">
                                                <label class="input-group-text" for="video_path">Browse</label>
                                            </div>
                                            <div class="form-text">Format: MP4, WebM. Ukuran maksimal: 100MB</div>
                                            @error('video_path')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        <div class="mb-0">
                                            <label for="url_video" class="form-label">
                                                <i class="fas fa-link me-1"></i> URL Video
                                            </label>
                                            <input type="url"
                                                class="form-control @error('url_video') is-invalid @enderror" id="url_video"
                                                name="url_video" value="{{ old('url_video') }}"
                                                placeholder="https://www.youtube.com/watch?v=...">
                                            <div class="form-text">Masukkan URL YouTube atau platform video lainnya</div>
                                            @error('url_video')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Publishing Options -->
                            <div class="mb-4">
                                <h6 class="text-primary fw-bold mb-3">Pengaturan Publikasi</h6>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="is_active" class="form-label">
                                                <i class="fas fa-toggle-on me-1"></i> Status <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <select class="form-select @error('is_active') is-invalid @enderror"
                                                id="is_active" name="is_active" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="aktif"
                                                    {{ old('is_active') == 'aktif' ? 'selected' : '' }}>
                                                    Aktif
                                                </option>
                                                <option value="tidak_aktif"
                                                    {{ old('is_active') == 'tidak_aktif' ? 'selected' : '' }}>
                                                    Tidak Aktif
                                                </option>
                                                <option value="draft"
                                                    {{ old('is_active') == 'draft' ? 'selected' : '' }}>
                                                    Draft
                                                </option>
                                            </select>
                                            @error('is_active')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-0">
                                            <label for="published_at" class="form-label">
                                                <i class="fas fa-calendar-alt me-1"></i> Tanggal Publikasi
                                            </label>
                                            <input type="datetime-local"
                                                class="form-control @error('published_at') is-invalid @enderror"
                                                id="published_at" name="published_at" value="{{ old('published_at') }}">
                                            @error('published_at')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mb-4">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-1"></i> Simpan
                                            </button>
                                            <a href="{{ route('modul-pembelajaran.index') }}"
                                                class="btn btn-outline-secondary">
                                                <i class="fas fa-arrow-left me-1"></i> Kembali
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            // Preview thumbnail image
            document.getElementById('thumbnail').addEventListener('change', function(e) {
                const preview = document.getElementById('thumbnailPreview');
                const previewImage = preview.querySelector('img');

                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        preview.classList.remove('d-none');
                    }

                    reader.readAsDataURL(this.files[0]);
                } else {
                    preview.classList.add('d-none');
                }
            });

            // Initialize text editor for description
            $(document).ready(function() {
                if (typeof CKEDITOR !== 'undefined') {
                    CKEDITOR.replace('deskripsi', {
                        height: 200,
                        toolbarGroups: [{
                                name: 'basicstyles',
                                groups: ['basicstyles', 'cleanup']
                            },
                            {
                                name: 'paragraph',
                                groups: ['list', 'indent', 'blocks', 'align']
                            },
                            {
                                name: 'links'
                            },
                            {
                                name: 'insert'
                            },
                            {
                                name: 'styles'
                            },
                            {
                                name: 'colors'
                            },
                            {
                                name: 'tools'
                            }
                        ]
                    });
                }
            });
        </script>
    @endpush
@endsection