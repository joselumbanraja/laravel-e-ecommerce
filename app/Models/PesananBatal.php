<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananBatal extends Model
{
    use HasFactory;
    protected $table = 'pesanan_batal';

    protected $fillable = [
        'nomor_meja',
        'waktu_booking',
        'menu_dipesan',
    ];
}
