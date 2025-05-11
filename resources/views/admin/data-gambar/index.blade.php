@extends('admin.layout.master')

@section('content')
    <div class="row">
        <h4 class="fw-bold">Images</h4>

        <div class="row mt-3 align-items-center">
            <!-- Filter Kategori on the left -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="filterMasterImage" class="form-label">Filter Kategori</label>
                    <select class="form-select" id="filterMasterImage">
                        <option value="all">All Master Images</option>
                        @foreach ($masterImages as $masterImage)
                            <option value="{{ $masterImage->id }}">{{ $masterImage->nama_master_img }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Tambah Image button on the right -->
            <div class="col-md-6 text-end">
                @can('create admin/data-gambar')
                    <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal"
                        data-bs-target="#createImageModal">
                        Tambah Image
                    </button>
                @endcan
            </div>
        </div>

        <!-- Table Images -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered" id="imagesTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Kategori Image</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $index => $image)
                        <tr data-master-id="{{ $image->id_master }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $image->title }}</td>
                            <td><img src="{{ Storage::url($image->image) }}" alt="Image" width="100"></td>
                            <td>{{ $image->masterImages->nama_master_img ?? '-' }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                @can('update admin/data-gambar')
                                    <button type="button" class="btn btn-warning btn-sm"
                                        onclick="editImage({{ $image }})" data-bs-toggle="modal"
                                        data-bs-target="#editImageModal">Edit</button>
                                @endcan

                                <!-- Tombol Hapus -->
                                @can('delete admin/data-gambar')
                                    <form action="{{ route('data-gambar.destroy', $image->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.data-gambar.create')
    @include('admin.data-gambar.edit')

    @push('js')
        <script>
            // Function to edit image data in modal
            function editImage(image) {
                const form = document.getElementById('editImageForm');
                form.action = "{{ route('data-gambar.update', 0) }}".replace('/0', '/' + image.id);

                document.getElementById('edit_title').value = image.title;
                document.getElementById('edit_id_master').value = image.id_master;
            }

            // Function to filter images by Master Image
            document.getElementById('filterMasterImage').addEventListener('change', function() {
                const selectedMasterId = this.value;
                const rows = document.querySelectorAll('#imagesTable tbody tr');

                rows.forEach(row => {
                    const rowMasterId = row.getAttribute('data-master-id');
                    if (selectedMasterId === 'all' || rowMasterId === selectedMasterId) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    @endpush
@endsection
