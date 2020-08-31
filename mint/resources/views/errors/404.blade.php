@extends('layouts.app')
@section('css')
<link href="{{ asset('css/404.css') }}" rel="stylesheet">
@endsection
@section('content')
<div style="text-align:center ; margin-top: 200px">
    <img src="img\404.png" alt="error 404" id="error-pic">
    <h5 id="error-text">
        We are sorry but the page you are looking for is not available ...
    </h5>
    <button class="waves-effect waves-light btn" id="error-button" onclick="goBack()">Go back</button>

</div>

<!-- To do :
maybe put a half transparent logo ?
button to go back ?
-->
@endsection
@section('script')
<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection
