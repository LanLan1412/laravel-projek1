<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="keywords" content="">

      <title>Source | Links</title>

      <!-- CSS -->
      <link rel="stylesheet" href="{{ asset('css/pesanShow.css') }}">

      <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
      </head>
  <body>
    <main class="container">
      @if (session()->has('success'))
        {{ session('success') }}
      @endif
      <section class="card">
        <img src="{{ asset('storage/' . $barang->image) }}" alt="{{ $barang->nama_barang }}">
        <div>
          <h1>{{ $barang->nama_barang }}</h1>
          <p>stock : {{ $barang->stok }}</p>
          <p class="keterangan">{{ $barang->keterangan }}</p>
          <form action="/pesan" method="post">
            @csrf
            <div>
              <input type="hidden" name="id" value="{{ $barang->id }}">
              <label for="jumlah_pesan">Jumlah Pesanan : </label>
              <input type="number" name="jumlah_pesan" id="jumlah_pesan" required value="{{ old('jumlah_pesan') }}">
            </div>
            <button class="cart">Masukkan Keranjang</button>
          </form>
        </div>
        @error('nama_barang')
        {{ $message }}
        @enderror
        @error('harga')
        {{ $message }}
        @enderror
        @error('stok')
        {{ $message }}
        @enderror
        @error('keterangan')
        {{ $message }}
        @enderror
      </section>
    </main>
  </body>
</html>