@extends('admin.layout.master')

@section('content')
    <div class="row">
        <h4 class="fw-bold">Modul Pembelajaran</h4>

        <div class="row mt-3 align-items-center">
            <!-- Filter Status -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="filterStatus" class="form-label">Filter Status</label>
                    <select class="form-select" id="filterStatus">
                        <option value="all">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak_aktif">Tidak Aktif</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <!-- Tambah Modul button -->
            <div class="col-md-6 text-end">
                @can('create admin/modul-pembelajaran')
                    <a href="{{ route('modul-pembelajaran.create') }}" class="btn btn-primary mt-4">
                        Tambah Modul
                    </a>
                @endcan
            </div>
        </div>

        <!-- Table Modul Pembelajaran -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered" id="modulTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Published At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($moduls as $index => $modul)
                        <tr data-status="{{ $modul->is_active }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $modul->title }}</td>
                            <td>
                                @if ($modul->thumbnail)
                                    <img src="{{ Storage::url($modul->thumbnail) }}" alt="Thumbnail" width="100">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ ucfirst($modul->is_active) }}</td>
                            <td>{{ $modul->view }}</td>
                            <td>
                                {{ $modul->published_at ? \Carbon\Carbon::parse($modul->published_at)->format('d-m-Y H:i') : '-' }}
                            </td>

                            <td>
                                <a href="{{ route('modul-pembelajaran.show', $modul->id) }}"
                                    class="btn btn-info btn-sm mb-2">Lihat</a>
                                @can('update admin/modul-pembelajaran')
                                    <a href="{{ route('modul-pembelajaran.edit', $modul->id) }}"
                                        class="btn btn-warning btn-sm mb-2">Edit</a>
                                @endcan
                                @can('delete admin/modul-pembelajaran')
                                    <form action="{{ route('modul-pembelajaran.destroy', $modul->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mb-2"
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

    @push('js')
        <script>
            // Filter by Status
            document.getElementById('filterStatus').addEventListener('change', function() {
                const selectedStatus = this.value;
                const rows = document.querySelectorAll('#modulTable tbody tr');

                rows.forEach(row => {
                    const rowStatus = row.getAttribute('data-status');
                    if (selectedStatus === 'all' || rowStatus === selectedStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    @endpush
@endsection
