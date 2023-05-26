@foreach ($pesanans as $pesanan)
    <p>{{ $pesanan->tanggal }}</p>
    @if ($pesanan->status == 1)
      <i>Sudah pesan & belum dibayar</i>
    @else
      <i>Sudah dibayar</i>
    @endif
    <p><small>Rp. </small>{{ number_format($pesanan->jumlah_harga + $pesanan->kode, 0, ',', '.') }}</p>
    <a href="/history/{{ $pesanan->id }}">History Detail</a>
@endforeach