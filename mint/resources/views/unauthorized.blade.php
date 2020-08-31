@extends('layouts.app')
@section('css')
<link href="{{ asset('css/unautorized.css') }}" rel="stylesheet">
@endsection
@section('content')
<div style="text-align:center ; margin-top: 200px">
    <img src="{{asset('img/')}}/unautorize.png" alt="unautorized page" id="error-pic">
    <h5 id="error-text">
        You are not authorized to access this page.
    </h5>
    <button class="waves-effect waves-light btn" id="error-button" onclick="goBack()">Go back</button>
</div>
@endsection
@section('script')
<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection
