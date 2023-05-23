<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PesanController extends Controller
{
    public function index($barang) {
        $barang = Barang::where('nama_barang', $barang)->first();
        return view('pesan.index', [
            'barang' => $barang
        ]);
    }
    
    public function pesan(Request $request, $id) {
    $barang = Barang::where('id', $id)->first();
    $tanggal = Carbon::new();

    //    simpan ke database pesanan
    $pesanan = new Pesanan;
    $pesanan->user_id = Auth::user()->id;
    $pesanan->tanggal = $tanggal;
    $pesanan->status = 0;
    $pesanan->jumlah_harga = $barang->harga * $request->jumlah_pesan;;
    $pesanan->save();

    // simpan ke database pesanan detail
    $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

    $pesanan_detail = new PesananDetail();
    $pesanan_detail->barang_id = $barang->id;
    $pesanan_detail->pesanan_id = $pesanan_baru->id;
    $pesanan_detail->jumlah = $request->jumlah_pesan;
    $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
    $pesanan_detail->save();

    
    return redirect('/');
    }

    
}
