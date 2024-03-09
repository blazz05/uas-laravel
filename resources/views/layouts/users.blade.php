@extends('adminlte::page')
@section('content')
@if(Auth::user()->role == 'admin')
<div class="jumbotron">
    <h1 class="display-4">Kelola User</h1>
    <p class="lead">Ini Halaman Kelola User</p>
</div>
@else
    @include('layouts.accessDenied')
@endif
@endsection