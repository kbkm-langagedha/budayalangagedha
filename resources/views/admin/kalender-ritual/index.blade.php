@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">{{ $title }}</h4>

                <div>
                    <button class="btn btn-outline-secondary btn-sm me-2" id="prevMonth">
                        <i class="ti-angle-left"></i> Bulan Sebelumnya
                    </button>
                    <span class="fw-bold" id="currentMonthDisplay"></span>
                    <button class="btn btn-outline-secondary btn-sm ms-2" id="nextMonth">
                        Bulan Berikutnya <i class="ti-angle-right"></i>
                    </button>

                    @can('create admin/kalender-ritual')
                        <a href="{{ route('kalender-ritual.create') }}" class="btn btn-primary btn-sm ms-3">
                            <i class="ti-plus"></i> Tambah Data
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Tampilan Kalender -->
                    <div class="calendar-container">
                        <div class="calendar-header mb-3">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 id="monthYearLabel"></h3>
                                </div>
                            </div>
                            <div class="row">
                                @foreach(['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day)
                                    <div class="col day-header">{{ $day }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="calendar-body" id="calendarBody">
                            <!-- Kalender akan di-render dengan JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Ritual -->
    <div class="modal fade" id="ritualDetailModal" tabindex="-1" aria-labelledby="ritualDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ritualDetailModalLabel">Detail Ritual</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="ritualDetailBody">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Ritual Tahunan -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="fw-bold mb-0">Daftar Ritual Tahunan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th width="50px">No</th>
                                    <th>Nama Ritual</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th width="120px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
    .calendar-container {
        max-width: 100%;
        margin: 0 auto;
    }
    
    .day-header {
        text-align: center;
        font-weight: bold;
        padding: 10px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
    }
    
    .calendar-day {
        min-height: 120px;
        padding: 5px;
        border: 1px solid #ddd;
        vertical-align: top;
        position: relative;
    }
    
    .calendar-date {
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 14px;
    }
    
    .calendar-day.faded {
        background-color: #f9f9f9;
        color: #aaa;
    }
    
    .event-dot {
        display: block;
        margin-bottom: 3px;
        border-radius: 4px;
        padding: 4px 6px;
        font-size: 12px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: pointer;
        color: white;
        background-color: #3490dc;
        transition: all 0.2s;
    }
    
    .event-dot:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .more-events {
        font-size: 11px;
        color: #888;
        cursor: pointer;
        text-align: center;
    }
    
    .today {
        background-color: #fffeee;
        border: 2px solid #ffc107;
    }
    
    @media (max-width: 768px) {
        .calendar-day {
            min-height: 80px;
        }
        
        .event-dot {
            font-size: 10px;
            padding: 2px 4px;
        }
    }
    
    .ritual-image {
        max-height: 300px;
        object-fit: contain;
        width: 100%;
    }
</style>
@endpush

@push('js')
<script type="text/javascript">
    $(function() {
        // Data ritual global
        let allRituals = [];
        
        // Tanggal saat ini
        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();
        
        // Inisialisasi DataTable
        var table = $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('kalender-ritual.index') }}",
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
                    data: 'nama_ritual',
                    name: 'nama_ritual'
                },
                {
                    data: 'tanggal_lengkap',
                    name: 'tanggal'
                },
                {
                    data: 'lokasi',
                    name: 'lokasi'
                },
                {
                    data: 'gambar',
                    name: 'gambar',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'status_badge',
                    name: 'status',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            createdRow: function(row, data, dataIndex) {
                // Tambahkan event click pada baris untuk menampilkan modal
                $(row).css('cursor', 'pointer');
                $(row).on('click', function(e) {
                    // Jika yang diklik adalah tombol atau link, jangan tampilkan modal
                    if ($(e.target).is('button, a, i')) {
                        return;
                    }
                    showRitualDetail(data.id);
                });
            }
        });

        // Mengambil data ritual untuk kalender
        function fetchRituals() {
            $.ajax({
                url: "{{ route('kalender-ritual.index') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    allRituals = response.data;
                    renderCalendar(currentMonth, currentYear);
                },
                error: function(error) {
                    console.error("Error fetching rituals:", error);
                    showToast('error', 'Gagal mengambil data ritual');
                }
            });
        }
        
        // Merender kalender
        function renderCalendar(month, year) {
            const firstDay = new Date(year, month, 1);
            const startingDay = firstDay.getDay(); // 0 = Minggu, 1 = Senin, ...
            const monthLength = new Date(year, month + 1, 0).getDate(); // Jumlah hari dalam bulan
            
            const prevMonthLength = new Date(year, month, 0).getDate(); // Jumlah hari di bulan sebelumnya
            
            // Update label bulan dan tahun
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                            "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            $('#monthYearLabel').text(monthNames[month] + ' ' + year);
            $('#currentMonthDisplay').text(monthNames[month] + ' ' + year);
            
            let html = '';
            let day = 1;
            let nextMonthDay = 1;
            
            // Tandai hari ini
            const today = new Date();
            const isCurrentMonth = today.getMonth() === month && today.getFullYear() === year;
            const todayDate = today.getDate();
            
            // Memfilter ritual untuk bulan ini
            const monthRituals = allRituals.filter(ritual => 
                parseInt(ritual.bulan) === month + 1 // Bulan dalam database dimulai dari 1
            );
            
            // Buat baris kalender (maksimal 6 baris)
            for (let i = 0; i < 6; i++) {
                html += '<div class="row">';
                
                // Buat kolom untuk setiap hari dalam seminggu
                for (let j = 0; j < 7; j++) {
                    // Hari dari bulan sebelumnya
                    if (i === 0 && j < startingDay) {
                        const prevDay = prevMonthLength - (startingDay - j - 1);
                        html += `<div class="col calendar-day faded">
                                    <div class="calendar-date">${prevDay}</div>
                                </div>`;
                    }
                    // Hari dari bulan berikutnya
                    else if (day > monthLength) {
                        html += `<div class="col calendar-day faded">
                                    <div class="calendar-date">${nextMonthDay}</div>
                                </div>`;
                        nextMonthDay++;
                    }
                    // Hari dari bulan ini
                    else {
                        // Cek apakah hari ini
                        const isToday = isCurrentMonth && day === todayDate;
                        const todayClass = isToday ? 'today' : '';
                        
                        // Cari ritual untuk hari ini
                        const dayRituals = monthRituals.filter(ritual => 
                            parseInt(ritual.tanggal) === day
                        );
                        
                        html += `<div class="col calendar-day ${todayClass}">
                                    <div class="calendar-date">${day}</div>`;
                        
                        // Tampilkan maksimal 3 ritual
                        const maxDisplay = 3;
                        const hasMore = dayRituals.length > maxDisplay;
                        
                        dayRituals.slice(0, maxDisplay).forEach(ritual => {
                            const statusClass = ritual.status == 1 ? 'bg-success' : 'bg-secondary';
                            html += `<div class="event-dot ${statusClass}" 
                                        data-id="${ritual.id}" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#ritualDetailModal">
                                        ${ritual.nama_ritual}
                                    </div>`;
                        });
                        
                        // Tampilkan "more" jika ada lebih banyak ritual
                        if (hasMore) {
                            const moreCount = dayRituals.length - maxDisplay;
                            html += `<div class="more-events" 
                                        data-date="${day}" 
                                        data-month="${month+1}" 
                                        data-year="${year}">
                                        +${moreCount} lainnya
                                    </div>`;
                        }
                        
                        html += `</div>`;
                        day++;
                    }
                }
                
                html += '</div>';
                
                // Hentikan jika sudah melewati bulan
                if (day > monthLength && i >= 4) {
                    break;
                }
            }
            
            // Render ke dalam container
            $('#calendarBody').html(html);
            
            // Inisialisasi event listener untuk detail ritual
            $('.event-dot').on('click', function() {
                const ritualId = $(this).data('id');
                showRitualDetail(ritualId);
            });
            
            // Event listener untuk "more" items
            $('.more-events').on('click', function() {
                const day = $(this).data('date');
                const month = $(this).data('month');
                const year = $(this).data('year');
                
                // Filter rituals untuk tanggal tersebut
                const dateRituals = allRituals.filter(ritual => 
                    parseInt(ritual.tanggal) === day && 
                    parseInt(ritual.bulan) === month
                );
                
                // Tampilkan modal dengan daftar ritual
                showDateRituals(dateRituals, day, month, year);
            });
        }
        
        // Tampilkan daftar ritual untuk tanggal tertentu
        function showDateRituals(rituals, day, month, year) {
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                          "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            
            let html = `
                <h5>Ritual pada tanggal ${day} ${monthNames[month-1]} ${year}</h5>
                <div class="list-group">
            `;
            
            rituals.forEach(ritual => {
                const statusBadge = ritual.status == 1 
                    ? '<span class="badge bg-success ms-2">Aktif</span>' 
                    : '<span class="badge bg-danger ms-2">Nonaktif</span>';
                
                html += `
                    <a href="#" class="list-group-item list-group-item-action" 
                       data-id="${ritual.id}" onclick="event.preventDefault();">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">${ritual.nama_ritual} ${statusBadge}</h5>
                        </div>
                        <p class="mb-1"><strong>Lokasi:</strong> ${ritual.lokasi}</p>
                    </a>
                `;
            });
            
            html += '</div>';
            
            $('#ritualDetailModalLabel').text('Daftar Ritual');
            $('#ritualDetailBody').html(html);
            $('#ritualDetailModal').modal('show');
            
            // Tambahkan event click untuk item ritual
            $('#ritualDetailBody .list-group-item').on('click', function() {
                const ritualId = $(this).data('id');
                showRitualDetail(ritualId);
            });
        }
        
        // Navigasi bulan
        $('#prevMonth').on('click', function() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar(currentMonth, currentYear);
        });
        
        $('#nextMonth').on('click', function() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar(currentMonth, currentYear);
        });
        
        // Menampilkan detail ritual dalam modal
        function showRitualDetail(ritualId) {
            const ritual = allRituals.find(r => r.id === ritualId);
            
            if (ritual) {
                const statusBadge = ritual.status == 1 
                    ? '<span class="badge bg-success">Aktif</span>' 
                    : '<span class="badge bg-danger">Nonaktif</span>';
                
                // Perbaikan tampilan gambar
                const gambar = ritual.gambar 
                    ? `<img src="${asset_url('/storage/ritual/' + ritual.gambar)}" class="ritual-image" alt="${ritual.nama_ritual}">` 
                    : '<div class="alert alert-info">Tidak ada gambar</div>';
                
                // Format tanggal dalam bahasa Indonesia
                const bulanNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                 "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                const tanggalFormat = `${ritual.tanggal} ${bulanNames[ritual.bulan - 1]}`;
                
                let actions = '<div class="d-flex mt-3">';
                @if(auth()->user()->can('update admin/kalender-ritual'))
                    actions += `<a href="{{ url('admin/kalender-ritual') }}/${ritual.id}/edit" class="btn btn-primary btn-sm me-1"><i class="ti-pencil"></i> Edit</a>`;
                @endif
                
                @if(auth()->user()->can('delete admin/kalender-ritual'))
                    actions += `<button type="button" data-id="${ritual.id}" class="btn btn-danger btn-sm deleteKalenderRitual"><i class="ti-trash"></i> Hapus</button>`;
                @endif
                actions += '</div>';
                
                const html = `
                    <div class="row">
                        <div class="col-md-6 text-center mb-3">
                            ${gambar}
                        </div>
                        <div class="col-md-6">
                            <h4>${ritual.nama_ritual} ${statusBadge}</h4>
                            <p><strong>Tanggal:</strong> ${tanggalFormat}</p>
                            <p><strong>Lokasi:</strong> ${ritual.lokasi}</p>
                            <p><strong>Status:</strong> ${ritual.status == 1 ? 'Aktif' : 'Nonaktif'}</p>
                            ${actions}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <h5>Deskripsi</h5>
                            <p>${ritual.deskripsi}</p>
                            ${ritual.keterangan ? `
                                <h5>Keterangan</h5>
                                <p>${ritual.keterangan}</p>
                            ` : ''}
                        </div>
                    </div>
                `;
                
                $('#ritualDetailModalLabel').text('Detail Ritual - ' + ritual.nama_ritual);
                $('#ritualDetailBody').html(html);
                
                // Re-attach delete event
                $('.deleteKalenderRitual').on('click', function() {
                    var ritualId = $(this).data('id');
                    deleteRitual(ritualId);
                    $('#ritualDetailModal').modal('hide');
                });
            } else {
                $('#ritualDetailBody').html('<div class="alert alert-danger">Data ritual tidak ditemukan</div>');
            }
        }
        
        // Fungsi menghapus ritual
        function deleteRitual(ritualId) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#82868',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/kalender-ritual') }}/" + ritualId,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            // Refresh data
                            fetchRituals();
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
        }
        
        // Helper function untuk memformat URL asset
        function asset_url(path) {
            return '{{ asset("") }}' + path.replace(/^\//, '');
        }
        
        // Event handler untuk delete dari tabel
        $('body').on('click', '.deleteKalenderRitual', function() {
            var ritualId = $(this).data('id');
            deleteRitual(ritualId);
        });
        
        // Inisialisasi
        fetchRituals();
    });
</script>
@endpush