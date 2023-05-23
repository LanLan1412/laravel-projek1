@if (!empty($pesanan))
{{ $pesanan->tanggal }}
@foreach ($pesanan_details as $pesanan_detail)
<div>
  {{ $pesanan_detail->barang->nama_barang }}
  {{ $pesanan_detail->jumlah }}
  {{ number_format($pesanan_detail->barang->harga, 0, ',', '.') }}
  {{ number_format($pesanan_detail->jumlah_harga, 0, ',', '.') }}
  <form action="/pesan/{{ $pesanan_detail->id }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('apakah anda yakin?')">hapus</button>
  </form>
</div>
@endforeach
{{ number_format($pesanan->jumlah_harga, 0, ',', '.') }}
<a href="/checkout-confirm">Pesan</a>
@else
    {{ $null }}
@endif