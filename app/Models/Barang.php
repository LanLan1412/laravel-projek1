<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PesananDetail;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function scopeFilter($query, array $filters) {
    //     $query->when($filters['search'] ?? false, function($query, $search) {
    //         return $query->where(function($query) use ($search) {
    //             $query->where('nama_barang', 'like', '%' . $search . '%')
    //             ->orWhere('keterangan', 'like', '%' . $search . '%');
    //         });
    //     });
    // }
    

    public function pesanan_detail() {
        return $this->hasMany(PesananDetail::class, 'barang_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'nama_barang';
    }
}
