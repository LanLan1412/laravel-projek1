<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect('/');
        }
    
        return view('dashboard.index',[
            'products' => Barang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_barang' => 'required|max:255',
            'harga' => 'required',
            'stok' => 'required',
            'category' => 'required',
            'image' => 'image|file|max:2048',
            'keterangan' => 'required'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('product-images');
        }

        Barang::create($validateData);

        return redirect('/dashboard')->with('success', 'New product has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($barang)
    {
        return view('dashboard.edit', [
            'barang' => Barang::where('nama_barang', $barang)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validateData = $request->validate([
            'nama_barang' => 'required|max:255',
            'harga' => 'required',
            'stok' => 'required',
            'category' => 'required',
            'image' => 'image|file|max:2048',
            'keterangan' => 'required'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('product-images');
        }

        Barang::where('id', $request->id)->update($validateData);
        return redirect('/dashboard')->with('success', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::where('id', $id)->first();
        if ($barang->image) {
            Storage::delete($barang->image);
        }
        Barang::destroy($id);
        return redirect('/dashboard')->with('success', 'Product has been deleted!');
    }
}
