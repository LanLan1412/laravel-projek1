<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PesananDetail;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal', 'status', 'jumlah_harga'];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function pesanan_detail() {
        return $this->hasMany('App\Models\PesananDetail', 'pesanan_id', 'id');
    }
}
