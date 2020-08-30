@extends('layouts.app')
@section('content')
<div class="container">
    <form  method="Post" action="{{ url('')}}/contactUser" class="col 6">
        @csrf
            <div class="row">
                <div class="input-field col s6">
                    <label for="email">Email address</label>
                    <input type="text" id="email" name="email" value="{{$user->email}}">
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <label for="text">text</label>
                    <input type="text" id="text" name="text">    
                </div>
            </div>
        <button class="btn waves-effect waves-light" type="submit">Submit</button>      
    </form>
</div>
@endsection
