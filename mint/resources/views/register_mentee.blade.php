@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css">
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
                <form method="POST" action="{{ route('register.mentee') }}" id="registerSubmit">
                    <div class="card-content">
                        {{ csrf_field() }}
                        <ul class="stepper linear">
                            <li class="step active">
                                <div class="step-title waves-effect">Personal Informations</div>
                                <div class="step-content">
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

                                    <div class="step-actions">
                                        <!-- Here goes your actions buttons -->
                                        <button class="waves-effect waves-dark btn next-step" type="button">CONTINUE</button>

                                    </div>
                                </div>
                            </li>
                            <li class="step">
                                <div class="step-title waves-effect">Password</div>
                                <div class="step-content">
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

                                    <div class="step-actions">
                                        <!-- Here goes your actions buttons -->
                                        <button class="waves-effect waves-dark btn next-step" type="button">CONTINUE</button>
                                        <button class="waves-effect waves-dark btn-flat previous-step" type="button">BACK</button>
                                    </div>
                                </div>
                            </li>
                            <li class="step">
                                <div class="step-title waves-effect">Languages and skills</div>
                                <div class="step-content">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            @foreach($languages as $language)
                                            <p>
                                                <label>
                                                    <input type="checkbox" name="chck[]" value="{{$language->id}}" />
                                                    <span>{{$language->languages}}</span>
                                                </label>
                                            </p>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="step-actions">
                                        <!-- Here goes your actions buttons -->
                                        <p>
                                            <button class="btn waves-effect waves-light" type="submit" name="action">{{ __('Register') }}
                                                <i class="material-icons right">create</i>
                                            </button>
                                            <button class="waves-effect waves-dark btn-flat previous-step" type="button">BACK</button>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>




    @section('script')
    <script>
        $.ajax({
            url: routeUrl,
            method: 'GET',
            dataType: 'json',
            success: function(result) {

            }
        })
    </script>
    <script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.min.js">
    </script>
    <script>
        //* Charles : stepper init
        var stepper = document.querySelector('.stepper');
        var stepperInstace = new MStepper(stepper, {
            // options
            firstActive: 0, // this is the default
            linearStepsNavigation: true,
            // Auto focus on first input of each step.
            autoFocusInput: false,
        })
    </script>
    @endsection
    @endsection
