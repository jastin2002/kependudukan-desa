<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $fileable = [
        'tanggal_masuk', 'asal', 'no_surat', 'tingkat_keamanan', 'perihal'
    ];
}
