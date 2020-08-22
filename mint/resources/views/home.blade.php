@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
        <div class="card green darken-1">
            <div class="card-content white-text">
                {{ session('status') }}
            </div>
        </div>
        @endif
        <div class="card red lighten-2">
            <div class="card-content white-text">

                <span class="card-title">Dashboard</span>

                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection