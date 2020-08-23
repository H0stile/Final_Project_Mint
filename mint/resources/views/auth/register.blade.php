@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">
            <div class="card">
                <form method="POST" action="{{ route('register') }}">
                    <div class="card-content">
                        {{ csrf_field() }}
                        <span class="card-title">{{ __('Personal informations') }}</span>

                        <hr>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'invalid' : '' }}" required autofocus>
                                <label for="email">{{ __('First Name') }}</label>
                                <span class="red-text">{{ $errors->has('name') ? $errors->first('name'): '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'invalid' : '' }}" required autofocus>
                                <label for="email">{{ __('Last Name') }}</label>
                                <span class="red-text">{{ $errors->has('name') ? $errors->first('name'): '' }}</span>
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
                                <p>
                                    <label>
                                        <input type="checkbox" />
                                        <span>French</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="checkbox" />
                                        <span>Luxembourgish</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="checkbox" />
                                        <span>German</span>
                                    </label>
                                </p>
                                <p>
                                    <label>
                                        <input type="checkbox" />
                                        <span>English</span>
                                    </label>
                                </p>
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
                                        <input type="text" id="autocomplete-input" class="autocomplete">
                                        <label for="autocomplete-input">Your skills</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <span class="card-title">{{ __('Verification Part') }}</span>

                        <hr>
                        <!-- TO DO: Check if we need to implement JS part (check in Materialize doc. form text area part) -->
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="pitch" class="materialize-textarea"></textarea>
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
@endsection