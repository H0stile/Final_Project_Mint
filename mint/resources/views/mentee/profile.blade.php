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
<!-- mentee part -->
@if(Auth::user()->type == 'mentee')
<hr>
<a href="/searchmentor/">Look for a mentor</a>
<br>
<a href="#">Modify profile</a>
@endif

<!-- mentor part -->
@if(Auth::user()->type == 'mentor')
@if($collabRequestStatus == 'pending')
<form action="{{route('mentor.invitation.accept', $collabRequestId)}}" method="get">
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
                    window.location.replace("{{route('mentor.profile', Auth::user()->id)}}");
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