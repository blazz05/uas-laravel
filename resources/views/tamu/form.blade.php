@extends('adminlte::page')

@section('title', 'Form Tamu')

@section('content_header')
    <h1>Form Tamu</h1>
@stop

@section('content')


<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Data Tamu</h3>
    </div>
    <form action="{{ route('tamu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama">
        </div>
        <div class="form-group">
            <label>Gender</label><br>
            <input type="radio" name="gender" value="Laki-laki"> Laki-laki<br>
            <input type="radio" name="gender" value="Perempuan"> Perempuan
        </div>

        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control" name="no_hp" placeholder="No HP">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea type="longtext" class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
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
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        <a class="btn btn-info float-right" href="../tamu"  role="button">Back&nbsp;&nbsp;<i class="fa fa-arrow-left"></i></a>
    </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
