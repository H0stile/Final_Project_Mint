@extends('layouts.app')
@section('css')
<link href="{{asset('css/mentorAllinvitation.css')}}" rel="stylesheet">
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
<div class="globalWidth">
    <section id="scroll" class="height">
        @foreach($menteeRequests as $menteeRequest)
        <div class="cardBGC flex">
            <div class="flex3">
                <div>
                    <img class="margin3" src="{{asset('img/')}}/{{$menteeRequest->mentee->profile_image}}" style="width:60px">
                </div>
                <div>
                    <p class="fontSize margin3">{{$menteeRequest->mentee->firstname}} {{$menteeRequest->mentee->lastname}}</p>
                </div>
                <button class="waves-effect waves-light btn buttonColorVP margin3" type="submit" name="getIdMentee" value="{{$menteeRequest->mentee->id}}">View profile</button>
            </div>
                <!-- <p class="fontSize2">Message</p> -->
                <textarea class="fontSize2 margin" name="menteePitch" id="" cols="30" rows="5" readonly="true" style="resize:none">{{$menteeRequest->request_msg}}</textarea>
                <div class="flex2">
                    <button class="waves-effect waves-light btn buttonColorVP margin" type="submit" name="getIdCollabAcc" value="{{$menteeRequest->id}}">Accept</button>
                    <button class="waves-effect waves-light btn buttonColorDC margin" type="submit" name="getIdCollabDec" value="{{$menteeRequest->id}}">Decline</button>
                </div>
        </div>
        @endforeach
    </section class="globalWidth">
    <div class="flex spacer">
        <button class="waves-effect waves-light btn buttonColorVP margin" type="submit" name="goBackMentorView" value="{{Auth::user()->id}}">Go back to profile</button>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        //? Button to go to profile
        $("button[name='goBackMentorView']").click(function (event) {
            event.preventDefault();
            routeUrl = "{{url('')}}/mentor/" + $(this).val();
            window.location.href = routeUrl;
        });
        //? Button to go to profile
        $("button[name='getIdMentee']").click(function (event) {
            event.preventDefault();
            routeUrl = "{{url('')}}/mentee/" + $(this).val();
            window.location.href = routeUrl;
        });
        //? Decline invitation
        $("button[name='getIdCollabDec']").click(function (event) {
            event.preventDefault();
            if(confirm("Are you sure to decline this invitation ?")){
                routeUrl = "{{url('')}}/mentoraidecline/" + $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: routeUrl,
                    method: 'GET',
                    dataType: 'json',
                    success: function (result) {
                        location.reload();
                    }
                })
            }
        });
        //? Accept the invitation
        $("button[name='getIdCollabAcc']").click(function (event) {
            event.preventDefault();
            if(confirm("Are you sure to accept this invitation ?")){
                routeUrl = "{{url('')}}/mentoraiaccept/" + $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: routeUrl,
                    method: 'GET',
                    dataType: 'json',
                    success: function (result) {
                        location.reload();
                    }
                })
            }
        });
    });
</script>
@endsection

