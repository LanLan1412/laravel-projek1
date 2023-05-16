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
    public function store(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (empty($pesanan_baru)) {
            $pesanan['user_id'] = Auth::user()->id;
            $pesanan['tanggal'] = Carbon::now();
            $pesanan['status'] = 0;
            $pesanan['jumlah_harga'] = 0;
            Pesanan::create($pesanan);
        }

        
        
        $pesanan_detail['barang_id'] = $barang->id;
        $pesanan_detail['pesanan_id'] = $pesanan_baru->id;
        $pesanan_detail['jumlah'] = $request->jumlah_pesan;
        $pesanan_detail['jumlah_harga'] = $barang->harga * $pesanan_detail['jumlah'];
        PesananDetail::create($pesanan_detail);
        
        return redirect('/')->with('success', 'berhasil menambahkan kekeranjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang, $nama_barang)
    {

        return $barang::where('nama_barang', $nama_barang)->first();
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
