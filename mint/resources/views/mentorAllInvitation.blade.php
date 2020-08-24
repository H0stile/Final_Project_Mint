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
        @foreach($menteeRequests as $menteeRequest)
        <section class="invitCard">
            <div>
                <img src="{{asset('img/')}}/{{$menteeRequest->mentee->profile_image}}" style="width:60px">
                <p>{{$menteeRequest->mentee->firstname}} {{$menteeRequest->mentee->lastname}}</p>
                <button type="submit" name="getIdMentee" value="{{$menteeRequest->mentee->id}}">View profile</button>
                <span>Message</span>
                <textarea name="menteePitch" id="" cols="30" rows="5" readonly="true" style="resize:none">{{$menteeRequest->request_msg}}</textarea>
                <button type="submit" name="getIdCollabAcc" value="{{$menteeRequest->id}}">Accept</button>
                <button type="submit" name="getIdCollabDec" value="{{$menteeRequest->id}}">Decline</button>
            </div>
            <hr>
        </section>
        @endforeach
    </div>
</div>
@endsection

<!-- IMPORT JQUERY -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- MY SCRIPT -->
<!-- TODO ASK Simon for this -->
<!-- <script src="{{url('/resources/js/mentorAllConnection.js')}}"></script> -->
<script>
    $(document).ready(function () {
        //? Call Ajax at loading ?


        //? Button to go to profile
        $("button[name='getIdMentee']").click(function (event) {
            event.preventDefault();
            routeUrl = "{{url('')}}/profile/" + $(this).val();
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

                }
            })
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

