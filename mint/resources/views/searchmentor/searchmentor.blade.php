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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
    $('#language-input').autocomplete({

    });
  });
</script>