<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="keywords" content="">

      <title>Source | Dashboard</title>

      <!-- CSS -->
      <link rel="stylesheet" href="{{ asset('css/dashboardIndex.css') }}">
      <style>
        img {
          width: 100px
        }
      </style>

      <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
      </head>
  <body>
    <h1>Dashboard</h1>
    <h2>Welcome back, {{ auth()->user()->name }}</h2>
    <a href="/dashboard/create">Create new product</a>
    <a href="/pesanan">Pesanan</a>
    @if (session()->has('success'))
      {{ session('success') }}
    @endif

    <table>
      <thead>
        <th>No</th>
        <th>Gambar<br>Produk</th>
        <th>Nama<br>Produk</th>
        <th>Stok</th>
        <th>Harga<br>Produk</th>
        <th>Keterangan<br>Produk</th>
        <th>Aksi</th>
      </thead>
      @foreach ($products as $produk)
      <tbody>
        <td>1</td>
        <td><img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->nama_barang }}"></td>
        <td>{{ $produk->nama_barang }}</td>
        <td>{{ $produk->stok }}</td>
        <td><small>Rp. </small>{{ number_format($produk->harga, 0, ',', '.') }}</td>
        <td>{{ $produk->keterangan }}</td>
        <td>
          <form action="/dashboard/{{ $produk->id }}" method="post">
            @method('delete')
            @csrf
            <button onclick="return confirm('Are you sure?')">delete produk</button>
          </form>
          <a href="/dashboard/{{ $produk->nama_barang }}/edit">edit produk</a>
        </td>
      </tbody>
      @endforeach
    </table>
  </body>
</html>