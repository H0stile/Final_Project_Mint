<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{$profile->getFullName()}}</h1>
    <hr>
    <h3>Pitch:</h3>
    <p>{{$profile->pitch}}</p>
    <hr>
    <h3>Review:</h3>
    @foreach($profile->receiveRatings as $rating)
    <p>{{$rating->writer->getFullName()}}</p>
    <p>{{$rating->score}}</p>
    <p>{{$rating->comment}}</p>
    @endforeach
    <hr>
</body>

</html>