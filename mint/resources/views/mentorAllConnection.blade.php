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
            <div>
                <img src="{{asset('img/')}}/{{$menteeRequest->mentee->profile_image}}" style="width:60px">
                <p>{{$menteeRequest->mentee->firstname}} {{$menteeRequest->mentee->lastname}}</p>
                <button type="submit" name="getIdMentee" value="{{$menteeRequest->mentee->id}}">View profile</button>
                <button type="submit" name="getIdCollab" value="{{$menteeRequest->id}}">Disconnect</button>
            </div>
            <hr>
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
                        success: function (result) {
                            location.reload();
                        }
                    })
                }
            });
        });
    </script>
</body>
</html>