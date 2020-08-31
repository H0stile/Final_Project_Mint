@extends('layouts.app')

@section('css')
<link href="{{ asset('css/editmentorprofile.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">

    <form action="" method="POST">

        @csrf
        <label for="firstname">Firstname :</label>
        <input type="text" name="firstname" id="firstname" placeholder="firstname" value="{{ $mentor->firstname }}"><br>

        <label for="lastname">Lastname :</label>
        <input type="text" name="lastname" id="lastname" placeholder="lastname" value="{{ $mentor->lastname }}"><br>

        <label for="linkedin">Linkedin :</label>
        <input type="text" name="linkedin" id="linkedin" placeholder="linkedin" value="{{$mentor->linkedin}}"><br>

        <label for="pitch">Pitch:</label>
        <textarea name="pitch" id="pitch" cols="30" rows="20" placeholder="Edit Pitch">{{ $mentor->pitch }}</textarea><br><br>


        <!-- Switch -->
        <h6>Availability:</h6>
        <div class="row">

            <div class="switch">
                <label>
                    Not Available
                    <input name="available" type="Checkbox" @if($mentorAvailable=='Yes' ) checked @endif>
                    <span class="lever"></span>
                    Available
                </label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <div class="row">
                    <span class="card-title">{{ __('Languages  : choose only one language') }}</span><br>
                    @foreach($langChosen as $choice)
                    <label><br>
                        <input type="checkbox" name="langChkBox[{{$choice['id']}}]" value="{{$choice['id']}}" @if($choice['chosen']) checked @endif />
                        <span>{{$choice['language']}}</span><br>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <div class="row">
                    <span class="card-title">{{ __('Skills : choose only one skill') }}</span>
                    <div style='height :200px;overflow:auto'>
                        @foreach($skillChosen as $choice)
                        <label><br>
                            <input type="checkbox" name="skillChkBox[{{$choice['id']}}]" value="{{$choice['id']}}" @if($choice['chosen']) checked @endif />
                            <span>{{$choice['skill']}}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <p>
            <button class="btn waves-effect waves-light greenbutton" type="submitsave" name="action" value={{ $mentor->id }}>{{ __('Update & show profile') }}
                <i class="material-icons right">create</i>
            </button>
        </p>
        <p>
            <button name='deletebymentor' class='deletebtn waves-effect waves-light btn' value="{{$mentor->id}}">Delete My Profile</button>
        </p>



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
            let route = '/mentor/edit/' + $(this).val();
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
            let route = '/mentor/delete/' + $(this).val();
            console.log('Route: ' + route);
            $.ajax({
                url: route,
                type: 'delete',
                //dataType: 'json',

                success: function(result) {
                    console.log(result.message);
                    alert('Profile deleted');
                    routeUrl = "{{url('')}}/home";
                    window.location.href = routeUrl;

                },
                error: function(err) {

                    alert('AJAX ERROR');
                }
            });
        });
    </script>


    @endsection


</div>


@endsection
