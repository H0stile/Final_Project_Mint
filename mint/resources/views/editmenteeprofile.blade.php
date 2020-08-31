@extends('layouts.app')
@section('css')
<link href="{{ asset('css/menteeProfileEdit.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">

    <form action="" method="POST">

        @csrf
        <section class="field">
            <label for="firstname">Firstname:</label>
            <input type="text" name="firstname" id="firstname" placeholder="firstname" value="{{ $profile->firstname }}">
        </section>

        <section class="field">
            <label for="lastname">Lastname:</label>
            <input type="text" name="lastname" id="lastname" placeholder="lastname" value="{{ $profile->lastname }}">
        </section>

        <section class="field">
            <label for="linkedin">LinkedIn:</label>
            <input type="text" name="linkedin" id="linkedin" placeholder="linkedin" value="{{$profile->linkedin}}">
        </section>

        <section class="field">
            <section class="textfield">
                <label for="pitch" class="textfield">Pitch:</label><br>
            </section>
            <textarea type="text" name="pitch" id="pitch" class="pitcharea">{{$profile->pitch}}</textarea>
        </section>

        <div class="row">
            <div class="input-field col s12">
                <div class="row">
                    <span class="card-title">{{ __('Languages: ') }}</span><br>
                    @foreach($langChosen as $choice)
                    <label><br>
                        <input type="checkbox" name="langChkBox[{{$choice['id']}}]" value="{{$choice['id']}}" @if($choice['chosen']) checked @endif />
                        <span>{{$choice['language']}}</span><br>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
        <p>
            <button class="btn waves-effect waves-light greenbtn" type="submitsave" name="action" value={{ $profile->id }}>{{ __('Update & Show Profile') }}
                <i class="material-icons right">create</i>
            </button>
        </p>
        <section class="editbtn">
            <p>
                <button name='deletebyadmin' class='deletebtn btn waves-effect waves-light redbtn' value="{{$profile->id}}">Delete profile
                    <i class="material-icons right">delete_forever</i>
                </button>
            </p>
        </section>



    </form>
    @section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("input[type='submitsave']").click(function(e) {

            e.preventDefault();
            let route = '/mentee/edit/' + $(this).val();
            $.ajax({

                url: route,
                method: 'POST',
                data: $('form').serialize(),

                success: function(result) {
                    console.log('data saved successfully');
                    alert('data saved successfully');
                },

                error: function(err) {
                    // If ajax errors happens
                    alert('something to do in submit save');
                }


            });
        });



        $(".deletebtn").click(function(e) {
            let route = '/mentee/delete/' + $(this).val();
            console.log('Route: ' + route);
            $.ajax({
                url: route,
                type: 'delete',

                success: function(result) {
                    console.log(result.message);
                    alert('Profile deleted');
                    routeUrl = "{{url('')}}/home";
                    window.location.href = routeUrl;

                },
                error: function(err) {

                    alert('Some AJAX ERROR');
                }
            });
        });
    </script>


    @endsection


</div>


@endsection