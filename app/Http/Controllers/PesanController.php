<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\PesananDetail;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::paginate(20);
        return view('beranda', [
            'barangs' => $barangs,
            'title' => 'Home'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $nama_barang)
    {
        $barang = Barang::where('nama_barang', $nama_barang)->first();
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if($request->jumlah_pesan > $barang->stok) {
            return redirect('/pesan/' . $nama_barang)->with('success', 'Berhasil menambahkan ke keranjang');
        }

        // simpan ke database pesanan
        if (empty($cek_pesanan)) {
            $pesanan['user_id'] = Auth::user()->id;
            $pesanan['tanggal'] = Carbon::now();
            $pesanan['status'] = 0;
            $pesanan['jumlah_harga'] = 0;
            Pesanan::create($pesanan);
        }


        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $cek_pesanan_detail)->first();
        // simpan ke pesanan detail
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail['barang_id'] = $barang->id;
            $pesanan_detail['pesanan_id'] = $cek_pesanan->id;
            $pesanan_detail['jumlah'] = $request->jumlah_pesan;
            $pesanan_detail['jumlah_harga'] = $barang->harga * $pesanan_detail['jumlah'];
            PesananDetail::create($pesanan_detail);
        } else {
            $pesanan_detail['jumlah'] = $pesanan_detail['jumlah'] + $request->jumlah_pesan;
            $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail['jumlah_harga'] + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        $barang->jumlah_harga = $pesanan['jumlah_harga'] + $barang->harga * $request->jumlah_pesan;
        $pesanan->update();
        
        return redirect('/')->with('success', 'berhasil menambahkan kekeranjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang, $nama_barang)
    {

        $barang = $barang::where('nama_barang', $nama_barang)->first();
        return view('pesan.index', [
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
