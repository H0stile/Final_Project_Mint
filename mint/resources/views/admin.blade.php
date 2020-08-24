<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<h1>Admin Dashborad</h1>
    
    <span>{{$admin->firstname}}</span>
    <span>{{$admin->lastname}}</span>
    <p>{{$admin->type}}</p>
    <img src="{{asset('img/')}}/{{$admin->profile_image}}" style="width:60px">
    <hr>
    <h2>Waiting request</h2>
    <table>
        <thead>
          <tr>
              <th>Picture</th>
              <th>Name</th>
              <th>Status</th>
              <th>Details</th>
              <th>Item Price</th>
              <th>Item Price</th>
          </tr>
        </thead>
        <tbody>
            @if(!empty($pendingMentors) && $pendingMentors->count())
                @foreach($pendingMentors as $pendingMentor)
                 <tr>
                    <td><img src="{{asset('img/')}}/{{$pendingMentor->profile_image}}" style="width:60px"></td>
                    <td>{{$pendingMentor->id}} {{$pendingMentor->firstname}} {{$pendingMentor->lastname}}</td>
                    <td>{{$pendingMentor->mentor_status}}</td>

                    <td><button  class="moreDetails"  name="moreDetails" value="{{$pendingMentor}}">Details</button></td>

                    <!--<td><button type="submit" id="getIdMentee" name="getIdMentee" value="{{$pendingMentor->id}}">Accept</button></td>-->
                    <td>
                        <form action="/admin/update/{{ $pendingMentor->id }}" method="post">
                            @csrf
                            @method('put')
                            <input  name="acceptMentor" type="submit" value="Accept"></i>
                            <input type="hidden" name="acceptMentor" value="{{ $pendingMentor->id }}">
                        </form>
                    </td>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                         <p>{{ $message }}</p>
                    </div>
                    @endif
                    
                    <!--<td><button type="submit" name="getIdCollab" value="{{$pendingMentor->id}}">Decline</button></td>-->
                    <td>
                        <form action="/admin/decline/{{ $pendingMentor->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input  name="declineMentor" type="submit" value="Decline"></i>
                            <input type="hidden" name="declineMentor" value="{{ $pendingMentor->id }}">
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif        
        </tbody>
    </table>

   
        {{ $pendingMentors->links() }}

        <div id="showResultMentor"></div>

        <table>
        <thead>
          <tr>
              <th>Picture</th>
              <th>Name</th>
              
          </tr>
        </thead>
        <tbody>
            @if(!empty($users) && $users->count())
                @foreach($users as $user)
                 <tr>
                    <td>{{$user->id}} {{$user->firstname}} {{$user->lastname}}</td>
                    <td>{{$user->type}}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif        
        </tbody>
    </table>

        
        
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            
            $(".moreDetails").click(function(event){
                $("#showResultMentor").hide("#showResultMentor");
                $("#showResultMentor").show("#showResultMentor");
                var selectedMentor = $( this ).val();
                var objMentor = jQuery.parseJSON(selectedMentor)
                console.log(jQuery.parseJSON(selectedMentor));
                var result = "<p><div class='firstname'>"+ objMentor.firstname +"</div><div class='lastname'>"+ objMentor.lastname + "</div><div class='linkedin'>"
                + objMentor.linkedin + "</div><div class='pitch'>"
                + objMentor.pitch + "</div><div class='img'> "
                +"<img src='{{asset('img/')}}/" +objMentor.profile_image + "' style='width:60px'>";
                $("#showResultMentor").html(result);
            })  
        });
    </script>
    </body>
</html>

    