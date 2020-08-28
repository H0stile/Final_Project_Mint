@extends('layouts.app')
@section('css')
<link href="{{asset('css/mentorAllConnection.css')}}" rel="stylesheet">
@endsection
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
    </div>
</div>
<div class="container">
    <section class="container height">
        <div>
            @foreach($menteeRequests as $menteeRequest)
            <div class="cardBGC">
                <div class="row valign-wrapper">
                    <div class="center-align">
                        <img class="responsive-img" src="{{asset('img/')}}/{{$menteeRequest->mentee->profile_image}}">
                    </div>
                    <div class="left-align">
                        <p class="fontSize">{{$menteeRequest->mentee->firstname}} {{$menteeRequest->mentee->lastname}}</p>
                    </div>
                </div>
                <div class="buttonBelow">
                    <button class="waves-effect waves-light btn buttonColorVP" type="submit" name="getIdMentee" value="{{$menteeRequest->mentee->id}}">View profile</button>
                    <button class="waves-effect waves-light btn buttonColorDC" type="submit" name="getIdCollab" value="{{$menteeRequest->id}}">Disconnect</button>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <div class="container">
        <button class="waves-effect waves-light btn buttonColorVP margin" type="submit" name="goBackMentorView" value="{{Auth::user()->id}}">Go back to profile</button>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        //? Button to go to profile
        $("button[name='getIdMentee']").click(function (event) {
            event.preventDefault();
            routeUrl = "{{url('')}}/mentee/" + $(this).val();
            window.location.href = routeUrl;
        });
        //? Button to break the connection
        $("button[name='getIdCollab']").click(function (event) {
            event.preventDefault();
            if(confirm("Are you sure to disconnect from this mentee ?")){
                routeUrl = "{{url('')}}/mentoracdisconnect/" + $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: routeUrl,
                    method: 'GET',
                    dataType: 'json',
                    success: function(result) {
                        location.reload();
                    }
                })
            }
        });
        //? Button to go to profile
        $("button[name='goBackMentorView']").click(function (event) {
            event.preventDefault();
            routeUrl = "{{url('')}}/mentor/" + $(this).val();
            window.location.href = routeUrl;
        });
    });
</script>
@endsection
