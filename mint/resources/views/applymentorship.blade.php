@extends('layouts.app')
@section('content')
@section('css')
<link href="{{ asset('css/applymentorship.css') }}" rel="stylesheet">
@endsection
<div class="container">
    <h3>Apply To Mintor</h3>
    <div class="picnname">
        <img src="{{ asset('img/') }}/{{ $mentor->profile_image }}" class="image circle">
        <h5 class="name"> {{ $mentor->firstname }} {{ $mentor->lastname }}</h5>
    </div>
    <h5>Pitch : </h5>
    <p class="pitch">{{ $mentor->pitch }}</p>



    @if(!$writeMsg)
    <form action="" method="POST">
        @csrf
        <input name="mentor_id" type="hidden" value="{{$mentor->id}}" />
        <input name="mentee_id" type="hidden" value="{{Auth::user()->id}}" />

        <h5>Send Your Request message</h5>
        <label for="request_msg"></label>
        <textarea class="textarea" name="request_msg" id="request_msg" cols="20" rows="10"></textarea>
        <input name="status_rqs" type="hidden" value="pending" />
        <button class="waves-effect waves-light btn" type="submit" name="submit">submit</button>
    </form>
    @endif
    <button class="waves-effect waves-light btn goback" type="submit" name="backtomentorprofile" value="{{$mentor->id}}">Go Back</button>
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