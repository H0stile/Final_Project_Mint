@extends('layouts.app')
@section('content')
<img src="{{asset('img/')}}/{{$profile->profile_image}}" style="width:60px">
<h1>{{$profile->getFullName()}}</h1>
<h3>You are a {{$profile->type}}</h3>
@if(Auth::check())
<p>Hello {{Auth::user()->getFullName()}}</p>
@endif

<hr>
<h3>Pitch:</h3>
<p>{{$profile->pitch}}</p>
<hr>
<h3>Ratings:</h3>
@foreach($profile->receiveRatings as $rating)
<p>{{$rating->writer->getFullName()}}</p>
<p>{{$rating->score}}</p>
<p>{{$rating->comment}}</p>
@endforeach
<hr>

<h3>Messages:</h3>
@foreach($messages as $message)
<p>{{$message->message}}</p>
<p>{{$message->writer->getFullName()}}</p>
@endforeach
<hr>

<form id="form" action="">
    @csrf
    <label id="label" for="">Write a message</label>
    <br>
    <textarea name="" id="textArea" placeholder="Add your text here"></textarea>
    <br>
    <div id="button">
        <input id="submitButton" type="submit" value="Submit">
    </div>
</form>

<section class="comment">
    <div class='cloneComment'>
        <img class="userImage" src="https://randomuser.me/api/portraits/men/29.jpg" alt="" style="width:60px">
        <p class="commentText">Awesome !</p>
    </div>
</section>

<hr>
<a href="#">Look for a mentor</a>
<br>
<a href="#">Modify profile</a>

<!-- admin part -->
<hr>
@if(Auth::user()->type == 'admin')
<a href="">Delete profile</a>
@endif


<!-- mentor part -->
@if(Auth::user()->type == 'mentor')
<a href="">Accept invitation</a>
<a href="">Decline invitation</a>

<a href="">Disconnect</a>
@endif


@endsection