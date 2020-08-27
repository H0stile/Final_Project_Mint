@extends('layouts.app')
@section('content')
<img src="{{ asset('img/') }}/{{$profile->profile_image}}" height="100">
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

@if($canWriteRating)
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



<!-- message part part -->
@if(count($messages) >0)
<h3>Messages:</h3>
@foreach($messages as $message)
<p>{{$message->message}}</p>
<p>{{$message->writer->getFullName()}}</p>
@endforeach
<hr>
@endif

@if($collaborator !== null)
<form id="form2" action="{{route('message.create')}}" method="POST">
    @csrf
    {{ csrf_field() }}
    <input type="hidden" name="writer" value="{{Auth::user()->id}}">
    <input type="hidden" name="target" value="{{$collaborator->id}}">

    <label id="labelMessage" for="message">Write a message</label>
    <br>
    <textarea name="message" id="textAreaMessage" placeholder="Write your message here"></textarea>
    <br>
    <div id="button">
        <input id="submitButton2" type="submit" value="Send" name="form2">
    </div>
</form>
<br>
@endif

<!-- mentee part -->
@if(Auth::user()->type == 'mentee')
<hr>
<a href="{{route('searchmentor', Auth::user()->id)}}">Look for a mentor</a>
<br>
<a href="#">Modify profile</a>

<!-- API part -->
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
    <button name="accept-request" value="{{$collabRequestId}}">Accept invitation</button>
</form>
<form action="{{route('mentor.connection.destroy', $collabRequestId)}}" method="post">
    @csrf
    @method('DELETE')
    <button name="decline-request" value="{{$collabRequestId}}">Decline invitation</button>
</form>
@else
<form action="{{route('mentor.connection.destroy', $collabRequestId)}}" method="post">
    @csrf
    @method('DELETE')
    <button name="disconnect" value="{{$collabRequestId}}">Disconnect</button>
</form>
@endif
@section('script')
<script>
    $(document).ready(function() {
        function deleteCollaboration(collabId) {
            routeUrl = "{{url('')}}/mentoracdisconnect/" + collabId;
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
                deleteCollaboration($(this).val());
            }
        });
        //? Button to break the connection
        $("button[name='disconnect']").click(function(event) {
            event.preventDefault();
            if (confirm("Are you sure to disconnect from this mentee?")) {
                deleteCollaboration($(this).val());
            }
        });
    });
</script>
@endsection
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
@endsection