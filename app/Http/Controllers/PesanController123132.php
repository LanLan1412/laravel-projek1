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

        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if($request->jumlah_pesan > $barang->stok) {
            return redirect('/');
        }

        if (empty($cek_pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $tanggal = Carbon::now();
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
        }

        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $cek_pesanan->id)->first();
        $pesanan_detail = new PesananDetail;
        if(empty($cek_pesanan_detail)) {   
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $cek_pesanan->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail->jumlah =  $pesanan_detail->jumlah + $request->jumlah_pesan;
            $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru ;
            $pesanan_detail->update();
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('/');
    }
}
