@extends('admin.layout.master')

@section('content')
    <div class="container mt-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Master Images</h4>
            <div class="d-flex gap-2">
                <a href="{{ route('data-master') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMasterImageModal">
                    <i class="bi bi-plus"></i> Tambah Master Image
                </button>
            </div>
        </div>

        <!-- Modal Tambah Master Image -->
        <div class="modal fade" id="createMasterImageModal" tabindex="-1" aria-labelledby="createMasterImageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createMasterImageModalLabel">Tambah Master Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('master-images.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_master_img" class="form-label">Nama Master Image</label>
                                <input type="text" class="form-control" id="nama_master_img" name="nama_master_img"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
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

        <!-- Modal Edit Master Image -->
        <div class="modal fade" id="editMasterImageModal" tabindex="-1" aria-labelledby="editMasterImageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMasterImageModalLabel">Edit Master Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" id="editMasterImageForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_nama_master_img" class="form-label">Nama Master Image</label>
                                <input type="text" class="form-control" id="edit_nama_master_img" name="nama_master_img"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="edit_keterangan" name="keterangan" rows="3"></textarea>
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

        <!-- Table Master Images -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Master Image</th>
                        <th>Keterangan</th>
                        <th>Dibuat Pada</th>
                        <th>Id</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($masterImages as $index => $masterImage)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $masterImage->nama_master_img }}</td>
                            <td>{{ $masterImage->keterangan }}</td>
                            <td>{{ $masterImage->created_at->format('d-m-Y H:i') }}</td>
                            <td>{{ $masterImage->id }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm"
                                    onclick="editMasterImage({{ $masterImage }})" data-bs-toggle="modal"
                                    data-bs-target="#editMasterImageModal">Edit</button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('master-images.destroy', $masterImage->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function editMasterImage(masterImage) {
            // Isi data pada modal edit
            document.getElementById('edit_nama_master_img').value = masterImage.nama_master_img;
            document.getElementById('edit_keterangan').value = masterImage.keterangan;
            document.getElementById('editMasterImageForm').action = `/data-master/master-images/${masterImage.id}`;
        }
    </script>
@endsection