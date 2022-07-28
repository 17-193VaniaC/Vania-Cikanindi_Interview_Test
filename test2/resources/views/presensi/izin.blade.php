@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Izin Absen') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/izin-add')}}">
                        @csrf
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
                        <div class="row mb-3">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Izin') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" required autocomplete="tanggal">

                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- Jenis Izin -->
                        <div class="row mb-3">
                            <label for="jenis" class="col-md-4 col-form-label text-md-end">{{ __('Izin') }}</label>

                            <div class="col-md-6">
                            <div class="form-check form-check-inline col-md-3">
                                <label class="radio-inline"><input type="radio" value="izin" name="jenis" checked>Izin</label>
                            </div>
                            <div class="form-check form-check-inline col-md-3">
                                <label class="radio-inline"><input type="radio" value="sakit" name="jenis">Sakit</label>
                            </div>
                            
                                @error('jenis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajukan Izin') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
