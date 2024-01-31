<?php

namespace App\Http\Controllers;
use App\Desa;
use App\PelaporanModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use PDF; //library pdf

class PelaporanController extends Controller
{
    public function index(){
        //menampilkan halaman laporan
        return view('pelaporan');
    }

    public function export(){
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database
        $data = PDF::loadview('pelaporan_pdf', ['data' => 'ini adalah contoh laporan PDF']);
        //mendownload laporan.pdf
    	return $data->download('pelaporan.pdf');
    }



    //UNTUK CETAK PENDUDUK//
    public function cetakpenduduk(){
        $penduduk = PelaporanModel::select('*')
            ->get();
            $desa = Desa::find(1);
            $image = (string) Image::make(public_path(Storage::url($desa->logo)))->encode('jpg');
            $logo = (string) Image::make($image)->encode('data-url');
            $tanggal = tgl(date('Y-m-d'));
    

        $pdf = PDF::loadView('cetakpenduduk', ['penduduk' => $penduduk])->setPaper('f4', 'landscape');
        return $pdf->stream('Laporan-Data-Penduduk.pdf');
    }
    
}