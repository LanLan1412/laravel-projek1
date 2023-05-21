<h1>{{ $barang->nama_barang }}</h1>
<form action="/dashboard/{{ $barang->nama_barang }}" method="post">
  @method('put')
  @csrf
  <input type="hidden" name="id" value="{{ $barang->id }}">
  <div>
    <label for="nama_barang">Name Product</label>
    <input type="text" name="nama_barang" id="nama_barang" placeholder="Baju Bayi Keren" required value="{{ old('nama_barang', $barang->nama_barang) }}">
  </div>
  <div>
    <label for="harga">Price</label>
    <input type="number" name="harga" id="harga" placeholder="200000" required value="{{ old('harga') ?? $barang->harga }}">
  </div>
  <div>
    <label for="stok">Stock</label>
    <input type="number" name="stok" id="stok" placeholder="100" required value="{{ old('stok', $barang->stok) }}">
  </div>
  <div>
    <label for="category">Kategori</label>
    <input type="text" name="category" id="category" placeholder="Baju" required value="{{ old('category', $barang->category) }}">
  </div>
  <div>
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" id="keterangan" required placeholder="Masukkan Keterangan" value="{{ old('keterangan', $barang->keterangan) }}">
  </div>
  <button>Update Product</button>
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