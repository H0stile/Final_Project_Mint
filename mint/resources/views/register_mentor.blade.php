@extends('layouts.app')

@section('css')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">
            <div class="card">
                <form method="POST" action="{{ route('register.mentor') }}" id="registerSubmit">
                    <div class="card-content">
                        {{ csrf_field() }}
                        <span class="card-title">{{ __('Personal informations') }}</span>

                        <hr>
                         <!-- Charles : personal informations, mail & password part -->
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input id="firstname" type="text" name="firstname" value="{{ old('firstname') }}" class="{{ $errors->has('firstname') ? 'invalid' : '' }}" required autofocus>
                                <label for="email">{{ __('First Name') }}</label>
                                <span class="red-text">{{ $errors->has('firstname') ? $errors->first('firstname'): '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" class="{{ $errors->has('lastname') ? 'invalid' : '' }}" required autofocus>
                                <label for="email">{{ __('Last Name') }}</label>
                                <span class="red-text">{{ $errors->has('lastname') ? $errors->first('lastname'): '' }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mail</i>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'invalid' : '' }}" required>
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <span class="red-text">{{ $errors->has('email') ? $errors->first('email'): '' }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" name="password" class="{{ $errors->has('password') ? 'invalid' : '' }}" required>
                                <label for="password">{{ __('Password') }}</label>
                                <span class="red-text">{{ $errors->has('password') ? $errors->first('password'): '' }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="password-confirm" type="password" name="password_confirmation" required>
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            </div>
                        </div>
                         <!-- Charles : languages checkboxes part -->
                        <span class="card-title">{{ __('Languages') }}</span>

                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                            @foreach($languages as $language)
                                <p>
                                    <label>
                                        <input type="checkbox" name="chck[]" value="{{$language->id}}"/>
                                        <span>{{$language->languages}}</span>
                                    </label>
                                </p>
                            @endforeach

                            </div>
                        </div>
                        <!-- Charles : skills autocomplete input part -->
                        <span class="card-title">{{ __('Skills') }}</span>

                        <hr>

                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">code</i>
                                        <input type="text" id="skills-input" class="autocomplete" name="skills" required>
                                        <label for="skills-input">Your skills</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Charles : Pitch & linkedin account part (for mentor validation) -->
                        <span class="card-title">{{ __('Verification Part') }}</span>

                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">http</i>
                                <input id="linkedin" type="text" name="linkedin" value="{{ old('linkedin') }}" class="{{ $errors->has('linkedin') ? 'invalid' : '' }}" required autofocus>
                                <label for="email">{{ __('Linkedin') }}</label>
                                <span class="red-text">{{ $errors->has('linkedin') ? $errors->first('linkedin'): '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">comment</i>
                                        <textarea id="pitch" class="materialize-textarea" name="pitch" required></textarea>
                                        <label for="pitch">Why do you want to become a mintor ?</label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <p>
                            <button class="btn waves-effect waves-light" type="submit" name="action">{{ __('Register') }}
                                <i class="material-icons right">create</i>
                            </button>
                        </p>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('script')
<script>
    //* Charles : fill the autocomplete input with data for the skills autocomplete (upper part) and also for the languages checkbox (last part)
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        //? Get and put the data for skill
        routeUrlSkills = "{{url('')}}/register_mentor_skill";
        $.ajax({
            url: routeUrlSkills,
            method: 'GET',
            dataType: 'json',
            success: function (result) {
                $.each(result, function(i, item) {
                    techData = {};
                    $.each(result[i], function(a, atem){
                        datas = result[i][a].id + ' - ' + result[i][a].skill;
                        techData [datas] = null;
                        //techData [datas] = result[i][a].id;
                    })
                });
                console.log(techData);
                //? Add skills to autocomplete
                $('#skills-input').autocomplete({
                    data: techData,
                });
            }
        })
        $.ajax({
            url: routeUrl,
            method: 'GET',
            dataType: 'json',
            success: function (result) {

            }
        })
    });
</script>
@endsection
@endsection
