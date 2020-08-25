@extends('layouts.app')
@section('content')
<h1>Admin Dashborad</h1>
    
    <span>{{$admin->firstname}}</span>
    <span>{{$admin->lastname}}</span>
    <p>{{$admin->type}}</p>
    <img src="{{asset('img/')}}/{{$admin->profile_image}}" style="width:60px">
    <hr>
    <h2>Waiting request</h2>
    
    <div class="container">
        <div class="row">
            <div class="col 6">
                <table class="centered highlight responsive">
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
                            <td><button  class="moreDetails"  name="moreDetails" value="{{$pendingMentor}}">More Details</button></td>
                            <!--<td><button type="submit" id="getIdMentee" name="getIdMentee" value="{{$pendingMentor->id}}">Accept</button></td>-->
                            <td>
                                <form action="/admin/update/{{ $pendingMentor->id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <a class="waves-effect waves-light btn-small"><input  name="acceptMentor" type="submit" value="Accept"></a>
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
                                    <a class="waves-effect waves-light btn-small"><input  name="declineMentor" type="submit" value="Decline"></a>
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
            </div>
            <div class="row">
                <div class="col 6">
                    <div id="showResultMentor"></div>
                </div>
            </div>
        </div>
    </div>

    

..trouble to delete when user has message !!!
        <!-- show all mentors validated and mentee registered-->
    <div class="container">
        <div class="row">
            <div class="col l12">
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"></th>
                            <th>

                            <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a>
                                <!-- Dropdown Structure -->
                                <ul id='dropdown1' class='dropdown-content'>
                                    <li><a href="#">one</a></li>
                                    <li><a href="#">two</a></li>
                                    
                                </ul> 
                            </th>    
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($mentorMenteeList) && $mentorMenteeList->count())
                            @foreach($mentorMenteeList as $user)
                            <tr>
                            <td><a href="{{ route('profile', $user->id) }}" ><img src="{{asset('img/')}}/{{$user->profile_image}}" style="width:60px"></a></td>
                                <td><a href="{{ route('profile', $user->id) }}" >{{$user->id}} {{$user->firstname}} {{$user->lastname}}</a></td>
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
                {{ $mentorMenteeList->links() }}
            </div>
        </div>
    </div>
    
    @endsection
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>


        $(document).ready(function () {
            
            $(".moreDetails").click(function(event){
                $("#showResultMentor").hide("#showResultMentor");
                $("#showResultMentor").show("#showResultMentor");
                var selectedMentor = $( this ).val();
                var objMentor = jQuery.parseJSON(selectedMentor)
                var result = "<p><div class='firstname'>"+ objMentor.firstname +"</div><div class='lastname'>"+ objMentor.lastname + "</div><div class='linkedin'>"
                + objMentor.linkedin + "</div><div class='pitch'>"
                + objMentor.pitch + "</div><div class='img'> "
                +"<img src='{{asset('img/')}}/" +objMentor.profile_image + "' style='width:60px'>";
                $("#showResultMentor").html(result);
            })  
        });
    </script>

    