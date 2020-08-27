@extends('layouts.app')
@section('content')
<img src="{{ asset('img/') }}/{{ $mentor->profile_image }}" width="400" height="300">
<h1>FirstName : {{ $mentor->firstname }}</h1>
<h1>LastName :{{ $mentor->lastname }}</h1>
<h1>Pitch : {{ $mentor->pitch }}</h1>

<form action="" method="POST">

    @csrf

    <input name="mentor_id" type="hidden" value="{{Auth::user()->id}}" />
    <input name="mentee_id" type="hidden" value="{{$mentor->id}}" />

    <label for="msgtomentor">Request Message</label>
    <textarea name="request_msg" id="request_msg" cols="30" rows="10"></textarea>

    <input name="status_rqs" type="hidden" value="pending" />

    <input type="submit" name="submit" value="submit">

    <button type="submit" name="backtomentorprofile" value="{{$mentor->id}}">Go Back</button>

</form>
@endsection

@section('script')

<script type="text/javascript">
    $("button[name='backtomentorprofile']").click(function(event) {
        event.preventDefault();
        routeUrl = "{{url('')}}/mentor/" + $(this).val();
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
                console.log('data inserted successfully')
                alert('Your form submitted');
            },
            error: function(err) {
                // If ajax errors happens
            },

        });
    });
</script>



@endsection