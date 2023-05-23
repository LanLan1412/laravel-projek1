<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PesananDetail;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pesanan_detail() {
        return $this->hasMany('App\Models\PesananDetail', 'barang_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'nama_barang';
    }
}
