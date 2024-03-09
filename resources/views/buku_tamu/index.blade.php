@extends('adminlte::page')
@section('title', 'Data Buku Tamu')
@section('content_header')
    <h1>Data Buku Tamu</h1> 
@stop
@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@php
$ar_judul = ['No','Nama', 'Jabatan', 'Tanggal Dan Waktu', 'Keperluan', 'Action'];
$no = 1; 
@endphp
     <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Table Buku Tamu</h3>
                <br/><br/>
                <a class="btn btn-info btn-md" href="form_buku_tamu" role="button">Tambah Buku Tamu  <i class="fa fa-plus"></i></a>
                <a href="{{ url('buku_tamupdf') }}" class="btn btn-danger"> <i class="fas fa-file-pdf"></i></a>
                <a class="btn btn-success" href="{{ url('buku_tamucsv') }}"><i class="fas fa-file-excel"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            
                <table id="example1" class="table table-bordered table-striped">
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
                        <td>
                        <form method="POST" action="{{ route('buku_tamu.destroy', $buku_tamu->id) }}">
                        @csrf {{--security untuk menghindari dari serangan pada saat input form--}}
                        @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                        <a class="btn btn-info" href="{{ route('buku_tamu.show', $buku_tamu->id) }}"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-success" href="{{ route('buku_tamu.edit', $buku_tamu->id) }}"><i class="fa fa-pen"></i></a>
                        <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data diHapus?')"><i class="fa fa-trash"></i></button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->



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
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            });
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
@stop