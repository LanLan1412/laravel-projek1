@extends('layouts.main')

@section('main')
@foreach ($barangs as $produk)
<div class="card">
  <img src="" alt="">
  <div>
    <h2>{{ $produk->nama_barang }}</h2>
    <div>
      <span><strong>Rp:</strong> {{ $produk->harga }}.000</span><br>
      <span>{{ $produk->stok }}</span>
    </div>
    <p>{{ $produk->keterangan }}</p>
    <form action="">
      
    </form>
    <a href="/pesan/{{ $produk->nama_barang }}">Order Now!</a>
  </div>
</div>
@endforeach
@endsection