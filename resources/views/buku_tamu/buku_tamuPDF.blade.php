@php
$ar_judul = ['No','Nama','Jabatan','Tanggal Dan Waktu','Keperluan'];
$no = 1; 
@endphp
     <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 align="center">Data Table Buku Tamu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table border="1" width="100%" cellspacing="0" align="center">
                  <thead>
                  <tr>
                  @foreach($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                  @endforeach
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($ar_buku_tamu as $buku_tamu)
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>{{ $buku_tamu->tm }}</td>
                        <td>{{ $buku_tamu->jtn }}</td>
                        <td>{{ $buku_tamu->tgl_bertamu }}</td>
                        <td>{{ $buku_tamu->keperluan }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>



