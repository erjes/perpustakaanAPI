<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuInduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'No_Induk',
        'Judul',
        'Klasifikasi',
        'NamaPengarang',
        'TempatTerbit',
        'JumlahBuku',
    ];
}
