@extends('layouts.app')

@section('content')
<div class="container">

    <form action="" method="POST">

        @csrf
        <label for="firstname">Firstname :</label>
        <input type="text" name="firstname" id="firstname" placeholder="firstname" value="{{ $mentor->firstname }}"><br>

        <label for="lastname">Lastname :</label>
        <input type="text" name="lastname" id="lastname" placeholder="lastname" value="{{ $mentor->lastname }}"><br>

        <label for="linkedin">linkedin :</label>
        <input type="text" name="linkedin" id="linkedin" placeholder="linkedin" value="{{$mentor->linkedin}}"><br>

        <label for="pitch">pitch:</label>
        <textarea name="pitch" id="pitch" cols="30" rows="10" value="{{ $mentor->pitch }}"></textarea>

        <div class="row">
            <div class="input-field col s12">
                <div class="row">
                    <span class="card-title">{{ __('Languages  :') }}</span><br>

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
                    <span class="card-title">{{ __('Skills') }}</span>
                    @foreach($skillChosen as $choice)
                    <label><br>
                        <input type="checkbox" name="skillChkBox[{{$choice['id']}}]" value="{{$choice['id']}}" @if($choice['chosen']) checked @endif />
                        <span>{{$choice['skill']}}</span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>

        <p>
            <button class="btn waves-effect waves-light" type="submitsave" name="action" value={{ $mentor->id }}>{{ __('Edit & Show Profile') }}
                <i class="material-icons right">create</i>
            </button>
        </p>



    </form>

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
                    console.log('data inserted successfully')
                    alert('Your Data Inserted Successfully');
                    routeUrl = "{{url('')}}/mentor/edit/" + $(this).val();
                    window.location.href = routeUrl;
                },

                error: function(err) {
                    // If ajax errors happens
                }


            });
        });
    </script>




</div>


@endsection