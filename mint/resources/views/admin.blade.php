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
            @if(!empty($pendingMentor) && $pendingMentor->count())
                @foreach($pendingMentor as $pendingMentor)
                <tr>
                    <td><img src="{{asset('img/')}}/{{$pendingMentor->profile_image}}" style="width:60px"></td>
                    <td>{{$pendingMentor->firstname}} {{$pendingMentor->lastname}}</td>
                    <td>{{$pendingMentor->mentor_status}}</td>
                    <td><button type="submit" name="moreDetails" value="{{$pendingMentor->id}}">Details</button></td>
                    <td><button type="submit" name="getIdMentee" value="{{$pendingMentor->id}}">Accept</button></td>
                    <td><button type="submit" name="getIdCollab" value="{{$pendingMentor->id}}">Decline</button></td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif        
        </tbody>
    </table>
    {{$pendingMentor->links()}}
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            //? Button to go to profile
            $("button[name='moreDetails']").click(function (event) {
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
        });

    </script>
    
    </body>
</html>

    