@extends('layouts.app')
@section('content')
@section('css')
<link href="{{ asset('css/applymentorship.css') }}" rel="stylesheet">
@endsection
<div class="container">
    <h2>Apply to Mintor</h2>
    <!--<img src="{{ asset('img/') }}/{{ $mentor->profile_image }}" width="400" height="300">-->
    <h4>FirstName : {{ $mentor->firstname }}</h4>
    <h4>LastName :{{ $mentor->lastname }}</h4>
    <h4>Pitch : {{ $mentor->pitch }}</h4>
    <hr>

    <form action="" method="POST">

        @csrf

        <input name="mentor_id" type="hidden" value="{{$mentor->id}}" />
        <input name="mentee_id" type="hidden" value="{{Auth::user()->id}}" />
        <h4>Send Your Request message</h4>
        <label for="request_msg"></label>
        <textarea name="request_msg" id="request_msg" cols="20" rows="10"></textarea>

        <input name="status_rqs" type="hidden" value="pending" />

        <button class="waves-effect waves-light btn" type="submit" name="submit">submit</button>

        <button class="waves-effect waves-light btn" type="submit" name="backtomentorprofile" value="{{$mentor->id}}">Go Back</button>

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


        $("button[name='submit']").click(function(e) {
            e.preventDefault();
            $.ajax({
                //url:'/rating',
                method: 'POST',
                data: $('form').serialize(),

                success: function(result) {
                    console.log('data inserted successfully')
                    alert('Your form submitted');
                    location.reload();
                },
                error: function(err) {
                    // If ajax errors happens
                },

            });
        });
    </script>


</div>
@endsection