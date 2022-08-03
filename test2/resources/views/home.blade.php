@extends('layouts.app')

@section('content')
<div class="container " id=''>
    @if(session('status'))
        {{ session('status') }}
    @endif

    <div class="row justify-content-center">

        <div class="card" style="width: 18rem; margin:10px;">
            <div class="card-body">
                <h5 class="card-title">Presensi</h5>

                <p class="card-text">Presensi Harian</p>
                
                <a href="/presensi" class="btn btn-success">Presensi</a>
                <a href="/izin" class="btn btn-secondary">Ajukan Izin</a>
            </div>
        </div>
    @if($enableButton2)
        <div class="card" style="width: 18rem; margin:10px;">
            <div class="card-body">
                <h5 class="card-title">Laporan Presensi</h5>

                <p class="card-text">Lihat laporan kehadiran pegawai</p>
                <a href="/rekap-presensi" class="btn btn-outline-primary">Laporan Kehadiran</a>
                <p></p>
                <a href="/izin-approval" class="btn btn-outline-primary">Daftar Perizinan</a>
                <p></p>
                <a href="/presensi-addall" class="btn btn-warning">Absenkan Semua Pegawai</a>
            </div>
        </div>
               
    @endif 

    @if($enableButton)

        <div class="card" style="width: 18rem; margin:10px;">
            <div class="card-body">
                <h5 class="card-title">Kelola User</h5>
               
                <p class="card-text">Kelola data pegawai</p>
                <a href="/manage-user" class="btn btn btn btn-outline-primary">Daftar User</a>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
