<h1>Dashboard</h1>
<h2>Welcome back, {{ auth()->user()->name }}</h2>
<a href="/dashboard/create">Create new product</a>
@if (session()->has('success'))
  {{ session('success') }}
@endif
@foreach ($products as $produk)
<div class="card">
  <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->nama_barang }}">
  <div>
    <h2>{{ $produk->nama_barang }}</h2>
    <div>
      <span>{{ number_format($produk->harga, 0, ',', '.') }}</span>
      <span>{{ $produk->stok }}</span>
    </div>
      <p>{{ $produk->keterangan }}</p>
      <div>
        <form action="/dashboard/{{ $produk->id }}" method="post">
          @method('delete')
          @csrf
          <button onclick="return confirm('Are you sure?')">delete produk</button>
        </form>
        <a href="/dashboard/{{ $produk->nama_barang }}/edit">edit produk</a>
      </div>
  </div>
</div>
@endforeach