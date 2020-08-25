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

<section id="mentorList">
    <div id="clone">
        <img id="img" src="" style="width:60px">
        <p id="mentorName"></p>
        <p id="mentroScore">5/5</p>
        <p id="skill"></p>
        <button type="submit" name="goToMentorProfile" value="">View profile</button>
        <button type="submit" name="goToApply" value="">Apply to mentor</button>
    </div>
</section>

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
    //? Get and create mentor card
    routeUrlName = "{{url('')}}/initSearchMentorData";
    elem = $("#clone");
    $.ajax({
        url: routeUrlName,
        method: 'GET',
        dataType: 'json',
        success: function (result) {
            // console.log(result);
            $.each(result, function(i, item) {
                nameData = {};
                $.each(result[i], function(a, atem){
                    // console.log(result[i][a]);

                    imgUrl = "{{asset('img/')}}/"+result[i][a].profile_image;
                    // console.log(imgUrl);
                    clone = elem.clone(true);
                    clone.find('#img').attr('src', imgUrl);
                    clone.find('#mentorName').text(result[i][a].firstname+" "+result[i][a].lastname);
                    clone.find('#skill').text(result[i][a].skill);
                    clone.appendTo('#mentorList');
                })
            });
        }
    })
});
</script>
@endsection