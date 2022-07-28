@extends('layouts.app')

@section('content')
<div class="container " id=''>
        <div class="card text-center">
        {{ session('izin') }}
                <div class="card-body">
                    <h4 class="card-title">Presensi</h4>
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif    
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                    
                            </div>
                        @endif 
                        <p class="card-text">Klik tombol dibawah untuk melakukan presensi.</p>
                        <a href="/presensi-hadir" class="btn btn-primary">Hadir</a>
                        <br><br>
                </div>
          
                <div class="card-footer text-muted">
                    <a href="/izin" class="btn btn-secondary">Ajukan Izin</a>
                </div>      
           
        </div>

</div>
@endsection
