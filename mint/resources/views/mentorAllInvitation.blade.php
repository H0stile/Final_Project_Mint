<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor all invitation page</title>
</head>
<body>
    <section class="invitCard">
        @foreach($menteeRequests as $menteeRequest)
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
        @endforeach
    </section>
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
                            console.log(result);
                            // location.reload();
                        }
                    })
                }
            });
    </script>
</body>
</html>