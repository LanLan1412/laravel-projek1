@foreach ($pesanans->map(function ($pesanan, $key) {
  $pesanan->nomor = $key + 1;
  return $pesanan;
}) as $pesanan)
  <table>
      <thead>
          <tr>
              <th>No</th>
              <th>Tanggal Pesan</th>
              <th>Total Harga</th>
              <th>Status</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>{{ $pesanan->nomor }}</td>
              <td>{{ $pesanan->tanggal }}</td>
              <td><small>Rp. </small>{{ number_format($pesanan->jumlah_harga + $pesanan->kode, 0, ',', '.') }}</td>
              <td>
                  @if ($pesanan->status == 1)
                      <i>Sudah pesan & belum dibayar</i>
                  @elseif ($pesanan->status == 2)
                      <i>Sudah dibayar</i>
                  @endif
              </td>
              <td><a href="/history/{{ $pesanan->id }}">History Detail</a></td>
          </tr>
      </tbody>
  </table>
@endforeach
