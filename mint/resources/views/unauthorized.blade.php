@extends('layouts.app')
@section('css')
<link href="{{ asset('css/unautorized.css') }}" rel="stylesheet">
@endsection
@section('content')
<div style="text-align:center ; margin-top: 200px">
    <img src="img\404.png" alt="unautorized page" id="error-pic">
    <h5 id="error-text">
        You are not authorized to access this page.
    </h5>
    <a href="/home" class="waves-effect waves-light btn" id="error-button">Go back</a>

</div>
@endsection