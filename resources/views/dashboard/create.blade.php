<form action="/dashboard" method="post" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="nama_barang">Name Product</label>
    <input type="text" name="nama_barang" id="nama_barang" placeholder="Baju Bayi Keren" required value="{{ old('nama_barang') }}">
  </div>
  <div>
    <label for="harga">Price</label>
    <input type="number" name="harga" id="harga" placeholder="200000" required value="{{ old('harga') }}">
  </div>
  <div>
    <label for="stok">Stock</label>
    <input type="number" name="stok" id="stok" placeholder="100" required value="{{ old('stok') }}">
  </div>
  <div>
    <label for="category">Kategori</label>
    <input type="text" name="category" id="category" placeholder="Baju" required value="{{ old('category') }}">
  </div>
  <div>
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" id="keterangan" required placeholder="Masukkan Keterangan" value="{{ old('keterangan') }}">
  </div>
  <div>
    <img class="img-preview">
    <label for="image">Gambar</label>
    <input onchange="previewImage()" type="file" name="image" id="image" required>
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
@error('gambar')
  {{ $message }}
@enderror

<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview')

    imgPreview.style.display =  'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>