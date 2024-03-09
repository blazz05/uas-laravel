@extends('adminlte::page')
@section('title', 'Form Edit Buku Tamu')
@section('content_header')
    <h1>Data Buku Tamu</h1>
@stop
@section('content')
 <!-- Ini Konten Form Edit Buku Tamu  -->
 @php
$rs1 = App\Models\Tamu::all();
$rs2 = App\Models\Jabatan::all();
@endphp
@foreach($data as $rs)
    <form method="POST" action="{{ route('buku_tamu.update',$rs->id) }}">
@csrf 
<!-- security untuk menghindari dari serangan pada saat input form -->
@method('put') 
<!--  method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit buku  -->
<div class="form-group">
        <label>Nama</label>
        <select class="form-control" name="tamu_id">
            <option value="">-- Pilih Nama --</option>
            @foreach($rs1 as $t)
                @php
                    $sel1 = ($t->id == $rs->tamu_id) ? 'selected' : '';
                @endphp
                <option value="{{ $t->id }}" {{ $sel1 }}>{{ $t->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Jabatan</label>
        <select class="form-control" name="jabatan_id">
            <option value="">-- Pilih Jabatan --</option>
            @foreach($rs2 as $j)
                @php
                    $sel2 = ($j->id == $rs->jabatan_id) ? 'selected' : '';
                @endphp
                <option value="{{ $j->id }}" {{ $sel2 }}>{{ $j->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Tanggal Dan Waktu</label>
        <input type="text" name="tgl_bertamu" value="{{ $rs->tgl_bertamu }}" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Keperluan</label>
        <input type="text" name="keperluan" value="{{ $rs->keperluan }}" class="form-control"/>
    </div>
    <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
    <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    <a class="btn btn-info float-right" href="{{ url('/buku_tamu') }}" role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>

</form>
@endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@stop
@section('js')
    <!-- <script> console.log('Hi!'); </script> -->

<script>
    $(function () {
    $("#example1").DataTable({
    "responsive": true, "lengthChange": true, "autoWidth": true,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); 
    });
</script>

    <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
@stop