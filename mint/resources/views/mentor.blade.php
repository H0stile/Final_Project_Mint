<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>mentor</title>
</head>
<body>
<!--Include the NAVBAR-->

<!--Profile block

 Picture
 Firstname - lastname
 Skills
 Pitch
 Button to look the invitations (route to see all the invitation page)
 Button to see all the connections (route to the see all connection page)
 Modify profile (route to the edit profile page)

Add rules for displaying the different functions depending of the viewer

 As Admin :
 Have a button to delete the profile
 As Mentee
 applying for mentorship
 Add the form to have a new ratings
 Show the availability-->

 <section>

 
 
 </section>


    <img src="{{ asset('img/') }}/{{ $mentor->profile_image }}" width="400" height="300">
    <h1>FirstName : {{ $mentor->firstname }}</h1>
    <h1>LastName :{{ $mentor->lastname }}</h1>
    <h1>Pitch : {{ $mentor->pitch }}</h1>
    <h1>linkedin : {{ $mentor->linkedin }}</h1>
    <h1>Available for mentorship : {{ $mentorAvailable }}</h1>
   <!-- <label for="checkboxyes">Available for mentorship</label>
    <input type="checkbox" id="checkbox" name="available" value="{{ $mentor->availability}}"> -->
    
    @foreach($skills as $skill)
       <h1>{{$skill->skill}}</h1> 
    @endforeach

@if(Auth::user()->type == 'mentor')
    <button>Edit the profile page</button>
    <button>See all the invitation-request page</button>
    <button>See all the connection page</button>
@endif

@if(Auth::user()->type == 'admin')

    <button>Delete the profile</button>

@endif   
@if(Auth::user()->type == 'mentee')
 
 <button>Apply for the mentorship</button>
    <h2>Ratings</h2>    
    @foreach($ratingsWithName as $rating)
        <h1>{{$rating[0]}}</h1> 
        <h1>{{$rating[1]}}</h1> 
        <h1>{{$rating[2]}}</h1> 
    @endforeach
  
@if(!$ratingExists)
    <form action="" method="POST">
        @csrf
        <input name="writer_id" type="hidden" value="{{Auth::user()->id}}"/>
        <input name="target_id" type="hidden" value="{{$mentor->id}}"/>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <label for="rating">Ratings:</label>
          <select id="rating" name="score">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
             </select>
        <input type="submit" id="submit" value="submit">   


     </form>
     @endif
@endif
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script type="text/javascript">

   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("input[type="submit"]").click(function(e){

        e.preventDefault();

      
        console.log(data);
        

        $.ajax({
           //url:'/rating',
           method:'POST',
           data: $('form').serialize(),

          success: function(result) {
                console.log('data inserted successfully')
			},

            error: function(err){
				// If ajax errors happens
			}
            
            e.preventDefault();
        });
	});
</script>


<!--Include the FOOTER-->  
</body>
</html>