@extends('layouts.app')
@section('content')
<h1>{{$profile->getFullName()}}</h1>
<h3>{{$profile->type}}</h3>

<hr>
<h3>Pitch:</h3>
<p>{{$profile->pitch}}</p>
<hr>
<h3>Ratings:</h3>
@foreach($profile->receiveRatings as $rating)
<p>{{$rating->writer->getFullName()}}</p>
<p>{{$rating->score}}</p>
<p>{{$rating->comment}}</p>
@endforeach
<hr>

<h3>Messages:</h3>
@foreach($messages as $message)
<p>{{$message->message}}</p>
<p>{{$message->writer->getFullName()}}</p>
@endforeach
<hr>

<form id="form" action="">
    @csrf
    <label id="label" for="">Write a message</label>
    <br>
    <textarea name="" id="textArea" placeholder="Add your text here"></textarea>
    <br>
    <div id="button">
        <input id="submitButton" type="submit" value="Submit">
    </div>
</form>

<section class="comment">
    <div class='cloneComment'>
        <img class="userImage" src="https://randomuser.me/api/portraits/men/29.jpg" alt="" style="width:60px">
        <p class="commentText">Awesome !</p>
    </div>
</section>

<hr>
<a href="/searchmentor/">Look for a mentor</a>
<br>
<a href="#">Modify profile</a>

<!-- mentor part -->
@if(Auth::user()->type == 'mentor')
<a href="">Accept invitation</a>
<br>
<a href="">Decline invitation</a>
<br>

<a href="">Disconnect</a>
@endif

<!-- admin part -->
<hr>
@if(Auth::user()->type == 'admin')
<a href="">Delete profile</a>
@endif


<script>
    const comments = [{
            user: "mentor",
            message: "Hello! My email address is asd@gmail.com"
        },
        {
            user: "friend2",
            message: "Amazing ! I can’t wait to work with you!"
        },
        {
            user: "friend3",
            message: "Wow! so Inspiring ! like my front end teacher !"
        }
    ]


    //clone comments 

    const commentList = document.querySelector('.comment');
    const commentClone = document.querySelector('.cloneComment');

    for (const comment of comments) {

        let newComment = commentClone.cloneNode(true);

        newComment.querySelector('.userImage').src = "https://randomuser.me/api/portraits/men/1.jpg"
        newComment.querySelector('.commentText').textContent = comment.message;

        commentList.append(newComment);
    }
    commentClone.remove();


    //add my comment
    const myComment = document.getElementById('form');
    myComment.addEventListener('submit', addNewComment);


    function addNewComment(event) {
        event.preventDefault();
        let newCom = document.querySelector('#textArea').value;
        comments.push(newCom);

        let writtenComment = commentClone.cloneNode(true);
        writtenComment.querySelector('.commentText').textContent = newCom;
        writtenComment.querySelector('.userImage').src = "{{asset('img/')}}/{{$profile->profile_image}}";
        commentList.append(writtenComment);
        //clean placeholder
        document.getElementById('textArea').value = " ";
    }
</script>
@endsection