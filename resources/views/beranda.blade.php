@extends('layouts.main')

@section('main')
<main>
  <div class="container">
    @foreach ($barangs as $produk)
    <div class="card">
      <a href="/pesan/{{ $produk->nama_barang }}">
        <img src="img/1.jpg" alt="{{ $produk->nama_barang }}">
        <div>
          <h2>{{ $produk->nama_barang }}</h2>
          <div>
            <p><small>Rp.</small>{{ $produk->harga }}.000</p>
            <small>stok {{ $produk->stok }}</small>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</main>
@endsection