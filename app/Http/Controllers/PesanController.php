<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\PesananDetail;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pesan() {
        return redirect('/');
    }

    public function historyDetail($id) {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        return view('pesan.historyDetail', compact('pesanan', 'pesanan_details'));
    }

    public function history() {
        // $expired = Carbon::now()->subDays(2);
        // $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->get();
        return view('pesan.history', compact('pesanans'));
    }

    public function checkout() {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('pesan.checkout', compact('pesanan', 'pesanan_details'));
        } else {
            return view('pesan.checkout', [
                'null' => 'Tidak Ada Barang di Keranjang'
            ]);
        }
    }

    public function konfirmasi() {
        $user = User::where('id', Auth::user()->id)->first();

        if (empty($user->alamat) && empty($user->nohp)) {
            return redirect('/profile');
        }
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang   = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok - $pesanan_detail->jumlah;
            $barang->update();
        }
        $pesanan->update();
        return redirect('/history/' . $pesanan->id);
    }

    public function index()
    {
        $barangs = Barang::latest();
        if (request('search')) {
            $barangs->where('nama_barang', 'like', '%' . request('search') . '%')->orWhere('keterangan', 'like', '%' . request('search') . '%');
        }
        if (auth()->user() === null) {
            return view('pesan.index', [
                'barangs' => $barangs->paginate(2),
                'notif' => '0',
                'title' => 'Home',
                'css' => 'pesanIndex'
            ]);
        } else {
            $pesanan_utama = Pesanan::where('user_id', auth()->user()->id)->where('status', 0)->first();
            if (!empty($pesanan_utama)) {
                $notif = PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                return view('pesan.index', [
                    'barangs' => $barangs->paginate(2),
                    'notif' => $notif,
                    'title' => 'Home',
                    'css' => 'pesanIndex'
                ]);
            } else {
                $notif = 0;
                return view('pesan.index', [
                    'barangs' => $barangs->paginate(2),
                    'notif' => $notif,
                    'title' => 'Home',
                    'css' => 'pesanIndex'
                ]);
            }
        }
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
    public function store(Request $request)
    {
        if (!Auth::user()) {
            return redirect('/login');
        }
        $id = $request->id;
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        // validasi apakah melebihi stok
        if ($request->jumlah_pesan > $barang->stok) {
            return redirect('/pesan/' . $barang->nama_barang);
        }

        // cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //    simpan ke database pesanan
        if (empty($cek_pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100,999);
            $pesanan->save();
        }

        // simpan ke database pesanan detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail();
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

            // harga sekarang
            $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        // jumlah pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('/home')->with('success', 'berhasil menambahkan kekeranjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang, $nama_barang)
    {

        $barang = $barang::where('nama_barang', $nama_barang)->first();
        return view('pesan.show', [
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
    public function destroy($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();
        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        return redirect('/checkout');
    }
}
