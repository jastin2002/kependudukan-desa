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
                        <div class="mb-3">
                            <a href="{{ route('surat-disposisi.create') }}" class="btn btn-success" title="Tambah"><i class="fas fa-plus"></i> Tambah Surat</a>
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
        <div class="card animate-up shadow">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                     <table class="table table-hover table-sm table-striped table-bordered">
                        <thead>
                            <th class="text-center">#</th>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal Masuk</th>
                            <th class="text-center">Asal</th>
                            <th class="text-center">No Surat</th>
                            <th class="text-center">Perihal</th>
                            <th class="text-center">Waktu Upload</th>
                        </thead>
                        <tbody>
                            @foreach($data as $surat)
                            <tr>
                                <td>
                                    <a href="{{ route("surat-disposisi.edit", $surat->id) }}"
                                        class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" data-action="{{ route("surat-disposisi.destroy", $surat->id) }}" data-toggle="modal" href="#modal-hapus" title="Hapus" ><i class="fas fa-trash"></i></a>
                                </td>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ date('d F Y', $surat->tanggal_masuk) }}</td>
                                <td class="text-center">{{ $surat->asal }}</td>
                                <td class="text-center">{{ $surat->no_surat }}</td>
                                <td class="text-center">{{ $surat->perihal }}</td>
                                {{-- <th><span class="badge badge-success">{{ $surat->tingkat_keamanan }}</span></th> --}}
                                <td class="text-center">{{ $surat->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                     </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Surat?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus surat akan menghapus semua data yang dimilikinya</p>
                    <p><strong id="nama-hapus"></strong></p>
                </div>

            </div>

            <div class="modal-footer">
                <form id="form-hapus" action="{{ route("surat-disposisi.destroy", $surat->id) }}" method="POST" >
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-white">Yakin</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tidak</button>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $.noConflict();
        var table = $('#data').DataTable();
    });

</script>

@endsection
