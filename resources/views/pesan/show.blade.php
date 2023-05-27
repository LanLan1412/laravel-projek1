@if (session()->has('success'))
    {{ session('success') }}
@endif
<h1>{{ $barang->nama_barang }}</h1>
<h2>{{ $barang->stok }}</h2>
<form action="/pesan" method="post">
  @csrf
  <div>
    <input type="hidden" name="id" value="{{ $barang->id }}">
    <label for="jumlah_pesan">Jumlah Pesanan</label>
    <input type="text" name="jumlah_pesan" id="jumlah_pesan" required value="{{ old('jumlah_pesan') }}">
  </div>
  <button>Buat Product</button>
</form>
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