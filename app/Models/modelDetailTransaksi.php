<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelDetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksis';
    public $timestamps = true;
    protected $fillable = [
        'id_transaksi',
        'id_barang',
        'qty',
        'price',
        'status',
        'nama_product',
    ];

    public function transaksi()
    {
        return $this->hasOne(transaksi::class, 'id_transaksi', 'nama_product', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id_barang');
    }
}
