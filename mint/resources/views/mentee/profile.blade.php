@extends('layouts.app')
@section('content')
<h1>{{$profile->getFullName()}}</h1>
<h4>{{$profile->type}}</h4>

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

@if(Auth::user()->type == 'mentor')
@if($collabRequestStatus == 'connected')

<form id="form" action="{{route('rating.create')}}" method="POST">
    @csrf
    <input type="hidden" name="target" value="{{$profile->id}}">
    <input type="hidden" name="writer" value="{{Auth::user()->id}}">

    <p>
        <select name="score" style="display: initial;">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </p>

    <label id="label" for="comment">Add a rating</label>
    <br>
    <textarea name="comment" id="textArea" placeholder="Add your text here"></textarea>
    <br>
    <div id="button">
        <input id="submitButton" type="submit" value="Submit">
    </div>
</form>
<br><br>
@endif
@endif

<!-- message part part -->
@if(Auth::user()->type == 'mentor')

<h3>Messages:</h3>
<form id="form2" action="{{route('message.create')}}" method="POST">
    @csrf
    {{ csrf_field() }}
    <input type="hidden" name="target" value="{{$profile->id}}">
    <input type="hidden" name="writer" value="{{Auth::user()->id}}">

    <label id="labelMessage" for="message">Write a message</label>
    <br>
    <textarea name="message" id="textAreaMessage" placeholder="Write your message here"></textarea>
    <br>
    <div id="button">
        <input id="submitButton2" type="submit" value="Send" name="form2">
    </div>
</form>
<br><br>


@foreach($messages as $message)
<p>{{$message->message}}</p>
<p>{{$message->writer->getFullName()}}</p>
@endforeach
<hr>
@endif

<!-- mentee part -->
@if(Auth::user()->type == 'mentee')
<hr>
<a href="#">Look for a mentor</a>
<br>
<a href="#">Modify profile</a>

<div>
    <h2>Job list</h2>

    @foreach($jobsData as $job)
    <li>Job title: {{$job['title']}}</li>
    <li>Company: {{$job['company_name']}}</li>
    <li><a href="{{$job['url']}}">Details</a></li>
    <hr>
    @endforeach
</div>
@endif

<!-- mentor part -->
@if(Auth::user()->type == 'mentor')
@if($collabRequestStatus == 'pending')
<form action="" method="get">
    @csrf
    <button name="accept-request">Accept invitation</button>
</form>
<form action="{{route('mentor.connection.destroy', $collabRequestId)}}" method="post">
    @csrf
    @method('DELETE')
    <button name="decline-request">Decline invitation</button>
</form>
@else
<form action="{{route('mentor.connection.destroy', $collabRequestId)}}" method="post">
    @csrf
    @method('DELETE')
    <button name="disconnect">Disconnect</button>
</form>

@endif
@endif

<!-- admin part -->
<hr>
@if(Auth::user()->type == 'admin')

<form action="{{route('mentee.destroy', $profile->id)}}" method="post">
    @csrf
    @method('DELETE')

    <input type="hidden" value="{{$profile->id}}">
    <button>Delete profile</button>
</form>
@endif

@if(Auth::user()->type == 'mentor' || Auth::user()->type == 'mentee')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        function deleteCollaboration() {
            routeUrl = "{{route('mentor.connection.destroy', $collabRequestId)}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: routeUrl,
                method: 'DELETE',
                dataType: 'json',
                success: function(result) {
                    window.location.replace("{{route('mentorprofile', Auth::user()->id)}}");
                }
            })
        }

        //? Button to accept invitation
        $("button[name='accept-request']").click(function(event) {
            event.preventDefault();
            if (confirm("Are you sure to accept this invitation?")) {
                routeUrl = "{{route('mentor.invitation.accept', $collabRequestId)}}";
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

        //? Button to decline collaboration request
        $("button[name='decline-request']").click(function(event) {
            event.preventDefault();
            if (confirm("Are you sure to decline invitation?")) {
                deleteCollaboration();
            }
        });
        //? Button to break the connection
        $("button[name='disconnect']").click(function(event) {
            event.preventDefault();
            if (confirm("Are you sure to disconnect from this mentee?")) {
                deleteCollaboration();
            }
        });
    });
</script>
@endif
@endsection