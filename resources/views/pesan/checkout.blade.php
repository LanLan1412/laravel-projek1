<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="keywords" content="">

      <title>Source | CheckOut</title>

      <!-- CSS -->
      <link rel="stylesheet" href="{{ asset('css/pesanCekout.css') }}">

      <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
      </head>
  <body>
    <main>
      <section class="card">
        @if (!empty($pesanan))
          <i>{{ $pesanan->tanggal }}</i>
        @foreach ($pesanan_details as $pesanan_detail)
          <img src="{{ asset('storage/' . $pesanan_detail->barang->image) }}" alt="{{ $pesanan_detail->barang->nama_barang }}">
          <h2>{{ $pesanan_detail->barang->nama_barang }}</h2>
          <p>Jumlah Barang : </p>{{ $pesanan_detail->jumlah }}
          <p>Harga Barang : </p>{{ number_format($pesanan_detail->barang->harga, 0, ',', '.') }}
          <p>Total Harga : </p>{{ number_format($pesanan_detail->jumlah_harga, 0, ',', '.') }}
          <form action="/pesan/{{ $pesanan_detail->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('apakah anda yakin?')" class="delete">hapus</button>
          </form>
        @endforeach
        {{ number_format($pesanan->jumlah_harga, 0, ',', '.') }}
        <a href="/checkout-confirm" class="order">Pesan</a>
      </section>
    </main>
    @else
    <div class="nulls">
      <p class="null">{{ $null }}</p>
    </div>
    @endif
  </body>
</html>