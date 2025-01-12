<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    Protected $fillable = [
        'NoPeminjaman',
        'NIS',
        'No_Induk',
        'TanggalPeminjaman',
        'TanggalPengembalian',
    ];
}
