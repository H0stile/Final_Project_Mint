@extends('layouts.app')

@section('content')
<div class="container">

    <form action="" method="POST">

        @csrf
        <label for="firstname">Firstname :</label>
        <input type="text" name="firstname" id="firstname" placeholder="firstname" value="{{ $profile->firstname }}"><br>

        <label for="lastname">Lastname :</label>
        <input type="text" name="lastname" id="lastname" placeholder="lastname" value="{{ $profile->lastname }}"><br>

        <label for="linkedin">linkedin :</label>
        <input type="text" name="linkedin" id="linkedin" placeholder="linkedin" value="{{$profile->linkedin}}"><br>

        <label for="pitch">pitch:</label>
        <textarea type="text" name="pitch" id="pitch">{{$profile->pitch}}</textarea>

        <div class="row">
            <div class="input-field col s12">
                <div class="row">
                    <span class="card-title">{{ __('Languages  : ') }}</span><br>
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
            <button class="btn waves-effect waves-light" type="submitsave" name="action" value={{ $profile->id }}>{{ __('Update & Show Profile') }}
                <i class="material-icons right">create</i>
            </button>
        </p>
        <p>
            <button name='deletebyadmin' class='deletebtn' value="{{$profile->id}}">Delete the profile</button>
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