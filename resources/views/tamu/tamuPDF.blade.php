@php
$ar_judul = ['No','Nama','Gender','Alamat'];
$no = 1; 
@endphp
     <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 align="center">Data Table Nama</h3>
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
                  @foreach($ar_tamu as $tamu)
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>{{ $tamu->nama }}</td>
                        <td>{{ $tamu->gender }}</td>
                        <td>{{ $tamu->alamat }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>



