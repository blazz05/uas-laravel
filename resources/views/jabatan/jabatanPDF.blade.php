@php
$ar_judul = ['No','Nama'];
$no = 1; 
@endphp
     <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 align="center">Data Table Jabatan</h3>
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
                  @foreach($ar_jabatan as $jabatan)
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>{{ $jabatan->nama }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>



