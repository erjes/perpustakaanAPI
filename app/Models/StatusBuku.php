<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'No_Induk',
        'Judul',
        'KondisiBuku',
        'TanggalKonfirmasi',
    ];
}
