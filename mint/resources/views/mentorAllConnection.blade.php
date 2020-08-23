<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor all connection page</title>
</head>
<body>
    @foreach($menteeRequests as $menteeRequest)
        <div class="askedCard">
            <img src="{{asset('img/')}}/{{$menteeRequest->mentee->profile_image}}" style="width:60px">
            <p>{{$menteeRequest->mentee->firstname}} {{$menteeRequest->mentee->lastname}}</p>
            <button type="submit" name="getIdMentee" value="{{$menteeRequest->mentee->id}}">View profile</button>
            <button type="submit" name="getIdCollab" value="{{$menteeRequest->id}}">Disconnect</button>
        </div>
    @endforeach
</body>
</html>