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

    <form id="form" action="/mentee/{id}">
        @csrf
        <label id="label" for="">Write a message</label>
        <br>
        <textarea name="" id="textArea" placeholder="Add your text here"></textarea>
        <br>
        <div id="button">
            <input id="submitButton" type="submit" value="Submit">
        </div>
    </form>



    <a href="#">Look for a mentor</a>
    <br>
    <a href="#">Modify profile</a>
</body>

</html>