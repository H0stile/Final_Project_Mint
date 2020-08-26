@extends('layouts.app')

@section('css')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">


    <form action="" method="get">
        @csrf

        <input type="image" src="" alt="">

        <label for="firstname">Firstname :</label>
        <input type="text" name="firstname" id="firstname" placeholder="firstname" value="{{ $mentor ?? ''->firstname }}"><br>

        <label for="lastname">Lastname :</label>
        <input type="text" name="lastname" id="lastname" placeholder="lastname" value="{{ $mentor ?? ''->lastname }}"><br>

        <label for="skills">skills:</label>
        @foreach($skills as $skill)
        <input type="text" name="skills" id="skills" placeholder="skills"><br>
        <h1>{{$skill->skill}}</h1>
        @endforeach

        <label for="languages">languages :</label>
        @foreach($languages as $languages)
        <input type="checkbox" name="languages" id="languages" placeholder="languages"><br>
        <h1>{{$skill->skill}}</h1>
        @endforeach

        <label for="linkedin">linkedin :</label>
        <input type="text" name="linkedin" id="linkedin" placeholder="linkedin" value="{{$mentor ?? ''->linkedin}}"><br>

        <label for="pitch">pitch:</label>
        <textarea name="pitch" id="pitch" cols="30" rows="10" value="{{ $mentor ?? ''->pitch }}"></textarea>

    </form>

    <p>
        <button class="btn waves-effect waves-light" type="submit" name="Edit&Save">{{ __('Edit&Save') }}
            <i class="material-icons right">create</i>
        </button>
    </p>
    <p>
        <button class="waves-effect waves-light btn" type="submit" name="Exitwithoutsaving">{{ __('Exitwithoutsaving') }}
        </button>
    </p>
    <p>
        <button class="btn waves-effect waves-light" type="submit" name="Exitwithoutsaving">{{ __('Go back') }}
        </button>
    </p>


</div>
</form>
</div>
</div>
</div>
</div>

@endsection