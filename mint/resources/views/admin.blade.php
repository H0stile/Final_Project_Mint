@extends('layouts.app')
@section('css')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">


@endsection
@section('content')

<section class="titleDate">
    <h2>Dashborad</h2>
    <p class="currentDate">Today  <b>{{date('Y-m-d')}}</b></p>
</section>
<section class="adminInfo">
    <div class="info">   
        <p class="pic"><img class ="picture" src="{{asset('img/')}}/{{$admin->profile_image}}" style="width:60px"></p>
        <div class="number">
            <p>Welcome back</p>
            <p ><b> {{$admin->firstname}} {{$admin->lastname}}</b></p>    
        </div>
    </div>
    <div class="summery">
        <div>
            <p class="number">Active Users</p>
            <p class="number"><b>{{$userNumber}}</b></p>
        </div>
        <p class="pic" ><i class="Medium material-icons ">account_circle</i></p>
    </div>
    
    <div class="userNumber">
        <div>
            <p class="number">Pending mentor</p>
            <p class="number"><b>{{$pendingReqCount}}</b></p>
        </div>
        
        <p class="pic"><i class=" Medium material-icons ">person_add</i></p>
    </div>
    <div class="interactionNumber">
        <div>
            <p class="number">Interactions</p>
            <p class="number"><b>{{$messages}}</b></p>
        </div>
        <p class="pic"><i class="Medium material-icons ">mode_comment</i></p> 
    </div>
</section>

<section class="chartSript">
    <h3>User register Chart 2020</h3>
<div id="charts" >
            {!! $chart->container() !!}
</div>
 <div class="chartSript">
    {!! $chart->script() !!}
 </div>       
      
</section>

    <section id="adminPgae">
    <div class="container">
        <h3>Waiting request</h3>
        <div class="row">
            <div class="">
                <table class="scroll striped">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Register date</th>
                            <th>Details</th>
                            <th>Accept</th>
                            <th>Decline</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($pendingMentors) && $pendingMentors->count())
                        @foreach($pendingMentors as $pendingMentor)
                        <tr>
                            <td><img class ="picture" src="{{asset('img/')}}/{{$pendingMentor->profile_image}}" style="width:60px"></td>
                            <td>{{$pendingMentor->firstname}} {{$pendingMentor->lastname}}</td>
                            <td>{{$pendingMentor->mentor_status}}</td>
                            

                            <td>{{$pendingMentor->created_at->format('d-m-Y')}}</td>

                            <td class="editbtn">
                                <button  class="moreDetails btn waves-effect waves-light desktop"  name="moreDetails" value="{{$pendingMentor}}">More Details</button>

                            </td>

                            <td>
                                <form action="/admin/update/{{ $pendingMentor->id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button  name="acceptMentor" class="btn waves-effect waves-light " type="submit" value="{{ $pendingMentor->id }}" >Accept</button>
                                    <a class=" mobile btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
                                    @if(session('message'))
                                    <div>
                                        {{session('message')}}
                                    </div>
                                    @endif
                                </form>
                            </td>
                            <td class="deletebtn toast-init-btn">
                            <button class=" btn waves-effect waves-light redbtn" >Decline</button>
                                <div class="toast-container">
                                    <div class="toast-new-message">
                                        <div class="toast-header-flex-container">
                                            Are you sure to decline this request ?
                                            <div class="toast-close">
                                        </div>
                                        <div class="toast-body-flex-container">
                                            <div class="toast-content">
                                                <form action="/admin/decline/{{ $pendingMentor->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  name="declineMentor" class=" btn waves-effect waves-light redbtn"  type="submit" value="{{ $pendingMentor->id }}"><a onclick="M.toast({html: 'you delete mentor request'})">Yes<i class="material-icons ">delete_forever</i></a></button>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>                             
                            </td>
                        </tr>
                        <tr id="rowShowResultMentor{{ $pendingMentor->id }}" class = "rowShowResultMentor" style="display: none;">
                            <td colspan="7" style="text-align: center;">
                                <div id="showResultMentor{{ $pendingMentor->id }}" class="showResultMentor"></div>
                            </td>
                        <tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7"><b>There are no data</b></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- show all mentors validated and mentee registered-->
    <div class="container" >
        <h3>Mentors and Mentees</h3>
            <div class="userTable">
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>
                                <i class="material-icons ">
                                    <input type="text" id="searchUser" onkeyup= "searchFunction()" placeholder="Search "/>
                                </i>
                            </th>
                            <th>
                                <span>Status</span>
                            </th>
                            <th>
                            <span>More details</span>
                            </th>  
                            <th>
                            <span>Contact</span>
                            </th>    
                        </tr>
                    </thead>
                    <tbody >
                    
                        @if(!empty($mentorMenteeList) && $mentorMenteeList->count())
                            @foreach($mentorMenteeList as $user)
                            <tr class="users-list">
                                <td><a href="{{ url('')}}/{{ $user->type}}/{{$user->id}}" ><img class ="picture" src="{{asset('img/')}}/{{$user->profile_image}}" style="width:60px"></a></td>
                                <td><a href="{{ url('')}}/{{ $user->type}}/{{$user->id}}" class="userName" ><b>{{$user->firstname}} {{$user->lastname}}</b></a></td>
                                <td class="{{ $user->type =='mentor' ? 'mentor' : 'mentee' }}"><b>{{ $user->type }}</b></td>
                                <td><button class="btn waves-effect waves-light showCollaborations"  name="showCollaborations" value="{{$user->id}}">Collaborations</button></td>
                                <td><a href="{{ url('')}}/contactUser/{{$user->id}}"><b>Send email</b></a></td>  
                            </tr>
                            <tr id="rowShowUserCollab{{ $user->id }}" class = "rowShowUserCollab" style="display: none;">
                                <td colspan=5>
                                    <div id="showUserCollab{{ $user->id }}" class="showUserCollab"></div>
                                </td>
                            <tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">NO new request.</td>
                            </tr>
                        @endif        
                    </tbody>
                </table>
            </div>
    </div>

    
</section>
    @endsection
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
    <script>
    
    $("form[name='yes']").click(function(e) {
        alert('YES');
    });

    
    $(document).ready(function () {
/****************************************/
// Get details of mentors to be validated
/****************************************/
    $('.toast-init-btn, .toast-close').click(function() {
    $('.toast-container').toggleClass('open-toast');
    });

        $(".moreDetails").click(function(event){
            //$(".showResultMentor").hide("#showResultMentor");
            $(".rowShowResultMentor").hide(".rowShowResultMentor");
            var selectedMentor = $( this ).val();
            var objMentor = jQuery.parseJSON(selectedMentor);
            var result = "<p><div class='firstname'><b>"+ objMentor.firstname +" "
                + objMentor.lastname + "</b></div><div class='linkedin'><i class='fab fa-linkedin-in'></i>"
                + objMentor.linkedin + "</div><div class='pitch'>"
                + objMentor.pitch + "</div><div class='img'> ";
            $temp = "#showResultMentor"+objMentor.id;
            //$("#showResultMentor".selectedMentor).html(result);
            $($temp).html(result);
            //$("#showResultMentor".selectedMentor).show("#showResultMentor".selectedMentor);
            $("#rowShowResultMentor"+objMentor.id).show("#rowShowResultMentor"+objMentor.id);
            //$($temp).show($temp);
        }); 
/************************************/
// Get collaborators for a valid user
/************************************/
        $(".showCollaborations").click(function(event){
            routeUrlUserCollabs = "{{url('')}}/userCollaborations/" + $(this).val();
            $.ajax({
                url: routeUrlUserCollabs,
                method: 'GET',
                dataType: 'json',
                success: function (result) {
                   
                    $(".rowShowUserCollab").hide(".rowShowUserCollab");
                    let finalHtml = ""
                    if (typeof(result) == "object"){
                        let userId = ""
                        $.each(result, function(i, item) {
                            finalHtml += "<tr class='collaborators-list'>"
                            finalHtml += "<td>"+ item.firstname +"</td><td>"
                                + item.lastname + "</td><td>"
                                + item.pivot.status_rqs + "</td>"
                                + "</tr>";
                                if (item.pivot.mentee_id === item.id){
                                    userId = item.pivot.mentor_id
                                }else{
                                    userId = item.pivot.mentee_id
                                }
                        });
                        $("#showUserCollab"+ userId).html(finalHtml);
                        $("#rowShowUserCollab"+ userId).show("#rowShowUserCollab"+ userId);
                        

                    }
                    if (typeof(result) == "number"){
                        console.log(result);
                        finalHtml = "<div class='redbtn'>No collaboration</div>"
                        $("#showUserCollab"+ result).html(finalHtml);
                        $("#rowShowUserCollab"+ result).show("#rowShowUserCollab"+ result);
                    }  
                }
            }) 
        });  
    });
    </script>
    <script>
/************************************/
// Sorting 
/************************************/
        function searchFunction(){
           let searchValue = document.getElementById("searchUser").value.toUpperCase();
           let userList = document.getElementsByClassName("users-list");
           for (i = 0; i < userList.length; i++) {
                let userName = userList[i].getElementsByClassName("userName")[0].textContent    ;
                if (userName.toUpperCase().indexOf(searchValue) > -1) {
                    userList[i].style.display = "";
                } else {
                    userList[i].style.display = "none";                  
                }
            }
        }
    </script>
  

    