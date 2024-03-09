@extends('adminlte::page')
@section('title', 'Form Buku Tamu')
@section('content_header')
    <h1>Data Buku Tamu</h1>
@stop
@section('content')
    @foreach($ar_buku_tamu as $buku_tamu)
    <div class="media">
            <div class="media-body">
                <h3><u>{{ $buku_tamu->tm}}</u></h3>
                <p>
                    Jabatan : {{ $buku_tamu->jtn }}
                    <br>Tanggal Bertamu : {{ $buku_tamu->tgl_bertamu }} <br>Keperluan : {{ $buku_tamu->keperluan }}
                </p>
                <hr><a href="{{ url('/buku_tamu') }}" class="btn btn-primary">Go Back</a>
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