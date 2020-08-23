<h1>adminPage</h1>
@foreach($pendingMentor as $pendingMentor)
            <div>
                <img src="{{asset('img/')}}/{{$pendingMentor->profile_image}}" style="width:60px">
                <p>{{$pendingMentor->firstname}} {{$pendingMentor->lastname}}</p>
                <p>{{$pendingMentor->mentor_status}}</p>
                <button type="submit" name="getIdMentee" value="{{$pendingMentor->id}}">Accept</button>
                //<button type="submit" name="getIdCollab" value="{{$pendingMentor->id}}">Decline</button>
            </div>
            <hr>
        @endforeach