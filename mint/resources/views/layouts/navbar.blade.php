<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
</head>

<body>

    @if(Auth::user()->type == 'mentor')

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{ route( 'mentorprofile'), ['id' => {{Auth::user()->id}} ]) }}">Profile</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>
    @endif

    @if(Auth::user()->type == 'mentee')

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{ route('mentee.profile', ['id' => {{Auth::user()->id}} ]]) }}">Profile</a></li>
                <!--put the route of --- see all the mentors page-->
                <li><a href="{{ route('mentee.profile', ['id' => {{Auth::user()->id}} ]]) }}">Mentors</a></li>
                <li><a href="{{ route('logout') }}">logout</a></li>
            </ul>
        </div>
    </nav>
    @endif
</body>

</html>