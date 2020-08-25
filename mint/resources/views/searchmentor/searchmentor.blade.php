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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    //? Get and put the data for language
    routeUrlLanguages = "{{url('')}}/initSearchLanguages";
    $.ajax({
        url: routeUrlLanguages,
        method: 'GET',
        dataType: 'json',
        success: function (result) {
            $.each(result, function(i, item) {
                langData = {};
                $.each(result[i], function(a, atem){
                    datas = result[i][a].languages;
                    langData [datas] = null;
                })
            });
            //? Add language to autocomplete
            $('#language-input').autocomplete({
                data: langData,
            });
        }
    })
    //? Get and put the data for skill
    routeUrlSkills = "{{url('')}}/initSearchSkills";
    $.ajax({
        url: routeUrlSkills,
        method: 'GET',
        dataType: 'json',
        success: function (result) {
            $.each(result, function(i, item) {
                techData = {};
                $.each(result[i], function(a, atem){
                    datas = result[i][a].skill;
                    techData [datas] = null;
                })
            });
            //? Add skills to autocomplete
            $('#technologie-input').autocomplete({
                data: techData,
            });
        }
    })
    //? Get and put the data for mentor name
    routeUrlName = "{{url('')}}/initSearchNames";
    $.ajax({
        url: routeUrlName,
        method: 'GET',
        dataType: 'json',
        success: function (result) {
            $.each(result, function(i, item) {
                nameData = {};
                $.each(result[i], function(a, atem){
                    datas = result[i][a].firstname+" "+result[i][a].lastname;
                    nameData [datas] = null;
                })
            });
            //? Add name to autocomplete
            $('#name-input').autocomplete({
                data: nameData,
            });
        }
    })
});
</script>
@endsection