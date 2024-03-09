@extends('adminlte::page')
@section('title', 'Form Buku Tamu')
@section('content_header')
    <h1>Form Buku Tamu</h1>
@stop
@section('content')

@php
$rs1 = App\Models\Tamu::all();
$rs2 = App\Models\Jabatan::all();
@endphp
    <!-- <p>Welcome to this beautiful admin panel.</p> -->

   <!-- general form elements -->
   <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"> Data Buku Tamu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('buku_tamu.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
              <div class="form-group">
                <label>Nama</label>
                <select class="form-control" name="tamu_id">
                <option value="">-- Pilih Nama --</option>
                @foreach($rs1 as $t)
                <option value="{{ $t->id }}">{{ $t->nama }}</option>
                @endforeach
                </select>
                </div>
                <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan_id">
                <option value="">-- Pilih Jabatan --</option>
                @foreach($rs2 as $j)
                <option value="{{ $j->id }}">{{ $j->nama }}</option>
                @endforeach
                </select>
                </div>
                <div class="form-group">
                  <label for="nama">Tanggal Dan Waktu </label>
                  <input type="datetime-local" class="form-control" name="tgl_bertamu" placeholder="Tanggal Dan Waktu ">
                </div>
                <div class="form-group">
                  <label for="nama">KEPERLUAN</label>
                  <input type="text" class="form-control" name="keperluan" placeholder="Keperluan">
                </div>
                @if($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <a class="btn btn-info float-right" href="../buku_tamu"  role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>
                </div>
              </form>
            </div>
            
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop