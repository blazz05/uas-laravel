@extends('adminlte::page')
@section('title', 'Form Jabatan')
@section('content_header')
    <h1>Form Jabatan</h1>
@stop
@section('content')


    <!-- <p>Welcome to this beautiful admin panel.</p> -->

   <!-- general form elements -->
   <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"> Data Jabatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('jabatan.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nama">Jabatan</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama">
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
                  <a class="btn btn-info float-right" href="../jabatan"  role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>
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