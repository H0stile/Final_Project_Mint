$(document).ready(function () {
    //? Button to go to profile
    $("button[name='getIdMentee']").click(function (event) {
        event.preventDefault();
        routeUrl = "{{url('')}}/profile/" + $(this).val();
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

            }
        })
    });
    //? Button to break the connection
    //TODO Add confirm function jquery and if yes run the AJAX call

    $("button[name='getIdCollab']").click(function (event) {
        event.preventDefault();
        routeUrl = "{{url('')}}/disconnect/" + $(this).val();
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
                location.reload();
            }
        })
    });
});