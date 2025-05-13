@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">{{ $title ?? 'Pesan Kontak' }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive text-left">
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Pesan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal untuk melihat pesan -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Detail Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nama:</strong> <span id="modal-name"></span></p>
                            <p><strong>Email:</strong> <span id="modal-email"></span></p>
                            <p><strong>No HP:</strong> <span id="modal-phone"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Tanggal:</strong> <span id="modal-date"></span></p>
                            <p><strong>Status:</strong> <span id="modal-status"></span></p>
                        </div>
                    </div>
                    <hr>
                    <p><strong>Pesan:</strong></p>
                    <div class="bg-light p-3 rounded">
                        <span id="modal-message"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="markAsRead">Tandai Sudah Dibaca</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(function() {
            // ajax table
            var table = $('.dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('data-contact.index') }}",
                columnDefs: [{
                    "targets": "_all",
                    "className": "text-start"
                }],
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: true,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'message',
                        name: 'message',
                        render: function(data, type, full, meta) {
                            if (data.length > 50) {
                                return data.substr(0, 50) + '...';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'is_read',
                        name: 'is_read',
                        render: function(data, type, full, meta) {
                            if (data == 1) {
                                return '<span class="badge bg-success">Sudah Dibaca</span>';
                            } else {
                                return '<span class="badge bg-warning">Belum Dibaca</span>';
                            }
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, full, meta) {
                            return new Date(data).toLocaleDateString('id-ID');
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [[6, 'desc']] // Order by created_at desc
            });

            // View message
            $('body').on('click', '.viewMessage', function() {
                var contactId = $(this).data('id');
                
                $.ajax({
                    url: "{{ route('data-contact.show', ':id') }}".replace(':id', contactId),
                    type: "GET",
                    success: function(response) {
                        $('#modal-name').text(response.name);
                        $('#modal-email').text(response.email);
                        $('#modal-phone').text(response.phone);
                        $('#modal-message').text(response.message);
                        $('#modal-date').text(new Date(response.created_at).toLocaleDateString('id-ID', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        }));
                        $('#modal-status').html(response.is_read ? 
                            '<span class="badge bg-success">Sudah Dibaca</span>' : 
                            '<span class="badge bg-warning">Belum Dibaca</span>'
                        );
                        
                        // Set contact ID for mark as read button
                        $('#markAsRead').data('id', contactId);
                        
                        // Hide mark as read button if already read
                        if (response.is_read) {
                            $('#markAsRead').hide();
                        } else {
                            $('#markAsRead').show();
                        }
                        
                        $('#messageModal').modal('show');
                    }
                });
            });

            // Mark as read
            $('body').on('click', '#markAsRead', function() {
                var contactId = $(this).data('id');
                
                $.ajax({
                    url: "{{ route('data-contact.mark-read', ':id') }}".replace(':id', contactId),
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#messageModal').modal('hide');
                        table.draw();
                        showToast('success', 'Pesan berhasil ditandai sebagai sudah dibaca');
                    },
                    error: function(response) {
                        showToast('error', 'Terjadi kesalahan');
                    }
                });
            });

            // Delete contact
            $('body').on('click', '.deleteContact', function() {
                var contactId = $(this).data('id');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang di hapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#82868',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('data-contact.destroy', ':id') }}".replace(':id', contactId),
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                table.draw();
                                showToast('success', response.message);
                            },
                            error: function(response) {
                                var errorMessage = response.responseJSON.message;
                                showToast('error', errorMessage);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush