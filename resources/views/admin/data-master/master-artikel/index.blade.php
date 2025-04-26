@extends('admin.layout.master')

@section('content')
    <div class="container mt-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Master Artikel</h4>
            <div class="d-flex gap-2">
                <a href="{{ route('data-master') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#createMasterArtikelModal">
                    <i class="bi bi-plus"></i> Tambah Master Artikel
                </button>
            </div>
        </div>

        <!-- Modal Tambah Master Artikel -->
        <div class="modal fade" id="createMasterArtikelModal" tabindex="-1" aria-labelledby="createMasterArtikelModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createMasterArtikelModalLabel">Tambah Master Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('master-artikel.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_master_artikel" class="form-label">Nama Master Artikel</label>
                                <input type="text"
                                    class="form-control @error('nama_master_artikel') is-invalid @enderror"
                                    id="nama_master_artikel" name="nama_master_artikel"
                                    value="{{ old('nama_master_artikel') }}" required>
                                @error('nama_master_artikel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                    id="keterangan" name="keterangan"
                                    rows="3">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Master Artikel -->
        <div class="modal fade" id="editMasterArtikelModal" tabindex="-1" aria-labelledby="editMasterArtikelModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMasterArtikelModalLabel">Edit Master Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" id="editMasterArtikelForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_nama_master_artikel" class="form-label">Nama Master Artikel</label>
                                <input type="text"
                                    class="form-control @error('nama_master_artikel') is-invalid @enderror"
                                    id="edit_nama_master_artikel" name="nama_master_artikel" required>
                                @error('nama_master_artikel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="edit_keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                    id="edit_keterangan" name="keterangan" rows="3"></textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Table Master Artikel -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Master Artikel</th>
                        <th>Keterangan</th>
                        <th>Dibuat Pada</th>
                        <th>Id</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($masterArtikels as $index => $masterArtikel)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $masterArtikel->nama_master_artikel }}</td>
                            <td>{{ $masterArtikel->keterangan ?? '-' }}</td>
                            <td>{{ $masterArtikel->created_at->format('d-m-Y H:i') }}</td>
                            <td>{{ $masterArtikel->id }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm mb-2"
                                    onclick="editMasterArtikel({
                                        id: {{ $masterArtikel->id }},
                                        nama_master_artikel: '{{ addslashes($masterArtikel->nama_master_artikel) }}',
                                        keterangan: '{{ addslashes($masterArtikel->keterangan ?? '') }}'
                                    })" data-bs-toggle="modal" data-bs-target="#editMasterArtikelModal">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('master-artikel.destroy', $masterArtikel->id) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-2"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('js')
        <script>
            function editMasterArtikel(masterArtikel) {
                // Populate modal fields
                document.getElementById('edit_nama_master_artikel').value = masterArtikel.nama_master_artikel;
                document.getElementById('edit_keterangan').value = masterArtikel.keterangan;
                document.getElementById('editMasterArtikelForm').action = `{{ url('data-master/master-artikel') }}/${masterArtikel.id}`;
            }
        </script>
    @endpush
@endsection