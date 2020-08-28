@extends('layouts.app')
@section('content')

<img src="{{ asset('img/') }}/{{ $mentor->profile_image }}" width="400" height="300">
<h1>FirstName : {{ $mentor->firstname }}</h1>
<h1>LastName :{{ $mentor->lastname }}</h1>
<h1>Pitch : {{ $mentor->pitch }}</h1>
<h1>linkedin : {{ $mentor->linkedin }}</h1>

<!-- <label for="checkboxyes">Available for mentorship</label>
    <input type="checkbox" id="checkbox" name="available" value="{{ $mentor->availability}}"> -->
<h1>Skills:</h1>
@foreach($skills as $skill)
<h1>{{$skill->skill}}</h1>
@endforeach

@if(Auth::user()->type == 'mentor')

<h1>Available for mentorship : {{ $mentorAvailable }}</h1>

<button name="editbtn" value="{{$mentor->id}}">Edit the profile page</button>
<button name="seeallinvitationbtn" value="{{$mentor->id}}">See all the invitation-request page</button>
<button name="seeallconnectionbtn" value="{{$mentor->id}}">See all the connection page</button>

@endif

@if(Auth::user()->type == 'admin')

<button name='deletebyadmin' class='deletebtn' value="{{$mentor->id}}">Delete the profile</button>


@endif
@if(Auth::user()->type == 'mentee')

<h1>Available for mentorship : {{ $mentorAvailable }}</h1>


<button name='applymentorship' value="{{$mentor->id}}">Apply for the mentorship</button>


<h2>Ratings</h2>
@foreach($ratingsWithName as $rating)
<h1>{{$rating[0]}}</h1>
<h1>{{$rating[1]}}</h1>
<h1>{{$rating[2]}}</h1>
@endforeach

@if(!$ratingExists)
<form action="" method=" POST">
    @csrf
    <input name="writer_id" type="hidden" value="{{Auth::user()->id}}" />
    <input name="target_id" type="hidden" value="{{$mentor->id}}" />
    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    <label for="score">Ratings:</label>
    <select id="score" name="score" class="browser-default">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <input type="submit" id="submit" value="submit">


</form>
@endif
@endif
@endsection

@section('script')
<!--<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
-->
<script type="text/javascript">
    $("button[name='editbtn']").click(function(event) {
        event.preventDefault();
        routeUrl = "{{url('')}}/mentor/edit/" + $(this).val();
        window.location.href = routeUrl;
    });
    $("button[name='seeallinvitationbtn']").click(function(event) {
        event.preventDefault();
        routeUrl = "{{url('')}}/mentorai/" + $(this).val();
        window.location.href = routeUrl;
    });
    $("button[name='seeallconnectionbtn']").click(function(event) {
        event.preventDefault();
        routeUrl = "{{url('')}}/mentorac/" + $(this).val();
        window.location.href = routeUrl;
    });
    $("button[name='applymentorship']").click(function(event) {
        event.preventDefault();
        routeUrl = "{{url('')}}/mentor/apply/" + $(this).val();
        window.location.href = routeUrl;
    });



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("input[type='submit']").click(function(e) {

        e.preventDefault();

        $.ajax({
            //url:'/rating',
            method: 'POST',
            data: $('form').serialize(),

            success: function(result) {
                console.log('data inserted successfully');
            },

            error: function(err) {
                // If ajax errors happens
            }


        });
    });
</script>


<script>
    $(function() {
        $('.deletebtn').click(function(e) {
            let route = '/mentor/delete/' + $(this).val();
            console.log('Route: ' + route);
            $.ajax({
                url: route,
                type: 'delete',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    console.log(result.message);
                    alert('Mentor Profile deleted');
                    routeUrl = "{{url('')}}/admin/";
                    window.location.href = routeUrl;

                },
                error: function(err) {

                    alert('AJAX ERROR');
                }
            });
        });
    });
</script>

<script>
    $(function() {
        $('.applybtn').click(function(e) {
            let route = '/mentorprofile/apply/' + $(this).val();
            console.log('Route: ' + route);
            $.ajax({
                url: route,
                type: 'get',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    console.log(result.message);

                },
                error: function(err) {

                    alert('AJAX ERROR');
                }
            });
        });
    });
</script>
@endsection