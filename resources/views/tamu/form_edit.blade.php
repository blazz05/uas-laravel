@extends('adminlte::page')
@section('title', 'Form Edit Tamu')
@section('content_header')
    <h1>Edit Data Tamu</h1>
@stop
@section('content')
 <!-- Ini Konten Form Edit Tamu  -->
@foreach($data as $rs)
    <form method="POST" action="{{ route('tamu.update',$rs->id) }}">
@csrf 
<!-- security untuk menghindari dari serangan pada saat input form -->
@method('put') 
<!--  method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit buku  -->
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Gender</label><br>
        <input type="radio" name="gender" value="Laki-laki"> Laki-laki<br>
        <input type="radio" name="gender" value="Perempuan">  Perempuan
    </div>
    <div class="form-group">
        <label>No HP</label>
        <input type="text" name="no_hp" value="{{ $rs->no_hp }}" class="form-control"/>
    </div>
    <div class="form-group">
    <label>Alamat</label>
    <textarea type="longtext" rows="3" name="alamat" class="form-control">{{ $rs->alamat }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
    <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    <a class="btn btn-info float-right" href="{{ url('/tamu') }}" role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>

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