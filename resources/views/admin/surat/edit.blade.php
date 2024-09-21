@extends('layouts.app')


@section('title', 'Surat Masuk')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    .ikon {
        font-family: fontAwesome;
    }
    .animate-up:hover {
        top: -5px;
    }
</style>
@endsection

@section('content-header')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/datatables.min.css" />
<link rel="stylesheet" href="{{asset('css/body.css')}}">

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/datatables.min.js"></script>

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url({{ asset('/img/desa.jpg') }}); background-size: cover; background-position: center top;">
    <span class="mask bg-primary opacity-6"></span>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow h-100">
                <div class="card-header border-0">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                        <div class="mb-3">
                            <h2 class="mb-0">Disposisi Surat</h2>
                            <p class="mb-0 text-sm">Kelola Disposisi Surat</p>
                        </div>
                        <div class="float-right">
                            <a href="{{ route("surat-disposisi.index") }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('content')
@include('layouts.components.alert')

    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card shadow">
                <div class="card-header"><h4>EDIT SURAT</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route("surat-disposisi.update", $mailList->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="tanggal_masuk" value="{{ $mailList->tanggal_masuk }}">

                        <div class="form-group">
                            <label>Asal Surat</label>
                            <input autocomplete="off" type="text" name="asal" class="form-control" value="{{ $mailList->asal }}" required>
                        </div>

                        <div class="form-group">
                            <label>No Surat</label>
                            <input autocomplete="off" type="text" name="no_surat" class="form-control" value="{{ $mailList->no_surat }}" required>
                        </div>

                        <div class="form-group">
                            <label>Tingkat Keamanan</label>
                            <select name="tingkat_keamanan" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="SR" {{ ($mailList->tingkat_keamanan == "SR") ? 'selected' : ''  }}>Sangat Rahasia</option>
                                <option value="R" {{ ($mailList->tingkat_keamanan == "R") ? 'selected' : ''  }}>Rahasia</option>
                                <option value="K" {{ ($mailList->tingkat_keamanan == "K") ? 'selected' : ''  }}>Konfidensial</option>
                                <option value="B" {{ ($mailList->tingkat_keamanan == "B") ? 'selected' : ''  }}>Biasa</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Perihal</label>
                            <input autocomplete="off" type="text" name="perihal" class="form-control" value="{{ $mailList->perihal }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN PERUBAHAN</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
