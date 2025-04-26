@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">Anggota Team</h4>
                <a href="{{ route('anggota-team.create') }}" class="btn btn-primary btn-sm">
                    <i class="ti-plus"></i>
                    Tambah Anggota
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                    <th>Photo</th>
                                    <th>Nomor HP</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Social Media</th>
                                    <th>Lainnya</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($anggotaTeams as $index => $anggota)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $anggota->nama }}</td>
                                        <td>{{ $anggota->posisi ?? '-' }}</td>
                                        <td>
                                            @if($anggota->photo)
                                                <img src="{{ asset('storage/' . $anggota->photo) }}" width="50" class="img-thumbnail" alt="Team Photo">
                                            @else
                                                No Photo
                                            @endif
                                        </td>
                                        <td>{{ $anggota->nomor_hp ?? '-' }}</td>
                                        <td>{{ $anggota->alamat ?? '-' }}</td>
                                        <td>
                                            @if($anggota->tanggal_lahir)
                                                {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d/m/Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($anggota->instagram)
                                                <a href="{{ $anggota->instagram }}" target="_blank">
                                                    <i class="fab fa-instagram fa-lg text-danger"></i>
                                                </a>
                                            @endif
                                            
                                            @if($anggota->linkedin)
                                                <a href="{{ $anggota->linkedin }}" target="_blank">
                                                    <i class="fab fa-linkedin fa-lg text-primary"></i>
                                                </a>
                                            @endif
                                            
                                            @if(!$anggota->instagram && !$anggota->linkedin)
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $anggota->lainnya ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('anggota-team.edit', $anggota->id) }}" class="text-warning me-2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('anggota-team.destroy', $anggota->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger border-0 bg-transparent" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Tidak ada data anggota team</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection