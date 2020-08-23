<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor all connection page</title>
</head>
<body>
    <section class="askedCard">
        @foreach($menteeRequests as $menteeRequest)
            <div>
                <img src="{{asset('img/')}}/{{$menteeRequest->mentee->profile_image}}" style="width:60px">
                <p>{{$menteeRequest->mentee->firstname}} {{$menteeRequest->mentee->lastname}}</p>
                <button type="submit" name="getIdMentee" value="{{$menteeRequest->mentee->id}}">View profile</button>
                <button type="submit" name="getIdCollab" value="{{$menteeRequest->id}}">Disconnect</button>
            </div>
            <hr>
        @endforeach
    </section>
    <!-- IMPORT JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- MY SCRIPT -->
    <script>
        $(document).ready(function(){
            //? Button to go to profile
            $("button[name='getIdMentee']").click(function(event){
                event.preventDefault();
                routeUrl = "{{url('')}}/profile/"+$(this).val();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: routeUrl,
                    method: 'GET',
                    dataType: 'json',
                    success: function(result){

                    }
                })
            });
            //? Button to break the connection
            $("button[name='getIdCollab']").click(function(event){
                event.preventDefault();
                routeUrl = "{{url('')}}/disconnect/"+$(this).val();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: routeUrl,
                    method: 'GET',
                    dataType: 'json',
                    success: function(result){
                        location.reload();
                    }
                })
            });
        });
    </script>
</body>
</html>