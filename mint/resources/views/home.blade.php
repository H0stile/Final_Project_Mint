@extends('layouts.app')
@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row" id="top-content">
    <div class="top-element">
        <img src="img\main_img.png" alt="mint">
    </div>

    <div class="top-element">
        <h4>Keep your skills fresh with Mint !</h4>
        <p class="flow-text">Mint is a luxembourg-based plateform that connects motivated people with dedicated mintors in the IT field, quickly and accurately. Become one of our mintees,
            browse through our mintors catalog and chose a mentor that catch your interest. Get connected and you'll get some fresh insights on how to progress ! You can also become a mintor and
            enjoy helping your mintee get some new cool skills and experience !</p>
    </div>
</div>

<div class="row" id="middle-jumbotron">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lobortis vitae sapien id varius. Maecenas massa diam, dignissim eget magna et, tincidunt elementum nulla. Mauris pulvinar, urna tempus dignissim mollis, ligula ligula tincidunt libero, nec finibus felis libero vel neque. Pellentesque a ipsum eget tellus laoreet faucibus. Aenean euismod sollicitudin lectus, sed vehicula magna sagittis sit amet. Fusce velit velit, mollis at gravida id, consectetur ut lacus. Suspendisse potenti. Mauris porttitor dolor in dolor convallis aliquam. Nulla in.</p>
</div>

<div class="row" id="home-register">
    <div class="col s6" id="register_col_1">

        <img src="img\mentee.png" alt="mentee">
        <h5>A fresh mintee</h5>


        <p>Join Mint as a mintee and get some fresh new skills and grow up in the luxembourgish IT market !</p>


        <a class="waves-effect waves-light btn" href="/register_mentee">Become a mintee</a>


    </div>
    <div class="col s6" id="register_col_2">

        <img src="img\mentor.png" alt="mentor">
        <h5>A green and experienced mintor</h5>


        <p>Join Mint as a mintor and help your mintees to get some insights, experience, and maybe make your network grow up !</p>


        <a class="waves-effect waves-light btn" href="/register_mentor">Become a mintor</a>



    </div>
</div>
@endsection