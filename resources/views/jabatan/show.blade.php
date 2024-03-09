@extends('adminlte::page')
@section('title', 'Form Jabatan')
@section('content_header')
    <h1>Data Jabatan</h1>
@stop
@section('content')
    @foreach($ar_jabatan as $jabatan)
    <div class="media">
            <div class="media-body">
                <h3><u>{{ $jabatan->nama }}</u></h3>
                <hr><a href="{{ url('/jabatan') }}" class="btn btn-primary">Go Back</a>
            </div>
    </div>
    @endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop