@extends('layouts.app')
@section('content')

<h2>Filter</h2>
<div class="row">
    <div class="col s2">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">search</i>
          <input type="text" id="language-input" class="autocomplete">
          <label for="language-input">Languages</label>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s2">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">search</i>
          <input type="text" id="technologie-input" class="autocomplete">
          <label for="technologie-input">Technologie</label>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s2">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">search</i>
          <input type="text" id="name-input" class="autocomplete">
          <label for="name-input">Name</label>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script>
$(document).ready(function () {
    routeUrl = "{{url('')}}/initSearch";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        url: routeUrl,
        method: 'GET',
        dataType: 'json',
        success: function (result) {
            $.each(result, function(i, item) {
                $.each(result[i], function(a, atem){
                    console.log(result[i][a].firstname+" "+result[i][a].lastname);
                })
            });   
            $('#Name-input').autocomplete({
                data: {"result.msg": null},
            });
        }
    })
});
</script>
@endsection