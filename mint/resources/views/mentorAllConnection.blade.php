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
<div class="globalWidth">
    <div>
        <section id="scroll" class="height">
                @foreach($menteeRequests as $menteeRequest)
                <div>
                    <div class="cardBGC flex">
                        <div class="flex3">
                            <div>
                                <img id="img" class="margin" src="{{asset('img/')}}/{{$menteeRequest->mentee->profile_image}}">
                            </div>
                            <div>
                                <p class="fontSize margin">{{$menteeRequest->mentee->firstname}} {{$menteeRequest->mentee->lastname}}</p>
                            </div>
                        </div>
                        <div class="flex2">
                            <button class="waves-effect waves-light btn buttonColorVP margin" type="submit" name="getIdMentee" value="{{$menteeRequest->mentee->id}}">View profile</button>
                            <button class="waves-effect waves-light btn buttonColorDC margin" type="submit" name="getIdCollab" value="{{$menteeRequest->id}}">Disconnect</button>
                        </div>
                    </div>
                </div>
                @endforeach
        </section>
        <div class="globalWidth">
            <div class="flex spacer">
                <button class="waves-effect waves-light btn buttonColorVP margin2" type="submit" name="goBackMentorView" value="{{Auth::user()->id}}">Go back to profile</button>
            </div>
        </div>
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
