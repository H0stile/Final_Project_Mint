@extends('layouts.app')
@section('content')
@section('css')
<link href="{{ asset('css/mentorprofile.css') }}" rel="stylesheet">
@endsection
<div class="container">

    <!-- <img src="{{ asset('img/') }}/{{ $mentor->profile_image }}" width="400" height="300">-->
    <h2>Fresh Mintor Profile</h2>
    <hr>
    <h4>FirstName : {{ $mentor->firstname }}</h4>
    <h4>LastName : {{ $mentor->lastname }}</h4>
    <h4>Pitch : {{ $mentor->pitch }}</h4>
    <h4>Linkedin : {{ $mentor->linkedin }}</h4>

    <!-- <label for="checkboxyes">Available for mentorship</label>
    <input type="checkbox" id="checkbox" name="available" value="{{ $mentor->availability}}"> -->

    @foreach($skills as $skill)
    <h4>Skills : {{$skill->skill}}</h4>
    @endforeach

    <hr>

    @if(Auth::user()->type == 'mentor')

    <h4>Available For Mentorship :<b> {{ $mentorAvailable }}</b></h4>

    <button class="waves-effect waves-light btn" name="editbtn" value="{{$mentor->id}}">Edit My Profile</button>
    <button class="waves-effect waves-light btn" name="seeallinvitationbtn" value="{{$mentor->id}}">Mentorships Request</button>
    <button class="waves-effect waves-light btn" name="seeallconnectionbtn" value="{{$mentor->id}}">Connected Mintees</button>

    @endif

    @if(Auth::user()->type == 'admin')

    <button name='deletebyadmin' class='deletebtn waves-effect waves-light btn' value="{{$mentor->id}}">Delete the profile</button>


    @endif
    @if(Auth::user()->type == 'mentee')

    <h4>Available for mentorship : {{ $mentorAvailable }}</h4>


    <button class="waves-effect waves-light btn" name='applymentorship' value="{{$mentor->id}}">Apply for the mentorship</button>

    <hr>
    <h2>Ratings</h2>
    @foreach($ratingsWithName as $rating)
    <h5>Mintee Name : {{$rating[0]}}</h5>
    <h5>Rating : {{$rating[1]}} / 5</h5>
    <h5>Msg : {{$rating[2]}}</h5>
    <hr>
    @endforeach

    @if(!$ratingExists)
    <form action="" method=" POST">

        @csrf
        <input name="writer_id" type="hidden" value="{{Auth::user()->id}}" />
        <input name="target_id" type="hidden" value="{{$mentor->id}}" />

        <label for="comment">Msg To Your Mintee</label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <label for="score">Ratings:</label>
        <select id="score" name="score" class="browser-default">
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
        <br>
        <input class="waves-effect waves-light btn" type="submit" id="submit" value="submit">


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
                    alert('Your final rating submitted');
                    location.reload();

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

</div>
@endsection