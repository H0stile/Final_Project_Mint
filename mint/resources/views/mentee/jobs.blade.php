<h1>Job list</h1>


@foreach($data['jobs'] as $job)
<li>Job title: {{$job['title']}}</li>
<li>Company: {{$job['company_name']}}</li>
<li><a href="{{$job['url']}}">Details</a></li>
<hr>
@endforeach