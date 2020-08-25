@extends('layouts.app')

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
                        <span class="card-title">{{ __('Skills') }}</span>

                        <hr>
                        <!-- TO DO: Check  JS part  -->
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">code</i>
                                        <input type="text" id="autocomplete-input" class="autocomplete" name="skills" required>
                                        <label for="autocomplete-input">Your skills</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <span class="card-title">{{ __('Verification Part') }}</span>

                        <hr>
                        <!-- TO DO: Check if we need to implement JS part (check in Materialize doc. form text area part) -->
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
                                        <textarea id="pitch" class="materialize-textarea" required></textarea>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    //* Fill the autocomplete input with data
    $(document).ready(function() {
        $('input.autocomplete').autocomplete({
            data: {
                "1 - HTML/CSS": null,
                "2 - JavaScript": null,
                "3 - JQuery": null,
                "4 - Vue": null,
                "5 - React": null,
                "6 - Angular": null,
                "7 - TypeScript": null,
                "8 - NodeJS": null,
                "9 - PHP": null,
                "10 - Laravel": null,
                "11 - Symphony": null,
                "12 - SQL": null,
                "13 - Java": null,
                "14 - C": null,
                "15 - C++": null,
                "16 - C#": null,
                "17 - Python": null,
                "18 - Assembly": null,
                "19 - VBA": null,
                "20 - Visual Basic .NET": null,
                "21 - Swift": null,
                "22 - Bash/Shell/PowerShell": null,
                "23 - Go": null,
                "24 - Kotlin": null,
                "25 - Ruby": null,
            },
        });
    });

    $.ajax({
        url: routeUrl,
        method: 'GET',
        dataType: 'json',
        success: function (result) {

        }
    })
</script>
@endsection
