@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold">Artikel</h4>
            @can('create admin/data-artikel')
                <a href="{{ route('data-artikel.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Artikel
                </a>
            @endcan
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-bordered dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Tanggal Publish</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @push('js')
        <script>
            $(function() {
                var table = $('.dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('data-artikel.index') }}",
                    columns: [
                        {
                            data: 'id',
                            name: 'id',
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'judul',
                            name: 'judul'
                        },
                        {
                            data: 'kategori',
                            name: 'kategori'
                        },
                        {
                            data: 'author',
                            name: 'author'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data) {
                                return `<span class="badge ${data === 'Aktif' ? 'bg-success' : 'bg-warning'}">${data}</span>`;
                            }
                        },
                        {
                            data: 'view_count',
                            name: 'view_count'
                        },
                        {
                            data: 'published_at',
                            name: 'published_at',
                            render: function(data) {
                                return data ? moment(data).format('DD/MM/YYYY HH:mm') : '-';
                            }
                        },
                        {
                            data: 'id',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                console.log('ID:', data); // Debugging: Pastikan `data` adalah ID artikel
                                let actions = '<div class="d-flex gap-1">';
                                
                                let showBaseUrl = "{{ url('admin/data-artikel') }}/"; // Base URL untuk show
                                let showUrl = showBaseUrl + data;
                                console.log('Show URL:', showUrl); // Debugging: Pastikan URL benar
                                actions += `
                                    <a href="${showUrl}" class="btn btn-info btn-sm me-1" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>`;
                                
                                @can('update admin/data-artikel')
                                let editBaseUrl = "{{ url('admin/data-artikel') }}/";
                                let editUrl = editBaseUrl + data + '/edit';
                                console.log('Edit URL:', editUrl); // Debugging: Pastikan URL benar
                                actions += `
                                    <a href="${editUrl}" class="btn btn-warning btn-sm me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>`;
                                @endcan

                                @can('delete admin/data-artikel')
                                let destroyBaseUrl = "{{ url('admin/data-artikel') }}/";
                                let destroyUrl = destroyBaseUrl + data;
                                console.log('Destroy URL:', destroyUrl); // Debugging: Pastikan URL benar
                                actions += `
                                    <form action="${destroyUrl}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>`;
                                @endcan
                                
                                actions += '</div>';
                                return actions;
                            }
                        }
                    ]
                });
            });
        </script>
    @endpush
@endsection