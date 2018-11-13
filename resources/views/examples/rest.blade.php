@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            
            <h1>API Call with GuzzleHTTP</h1>

            <p>
              This is the result of the code below.
              Please visit the <a target="_blank" href="http://docs.guzzlephp.org/en/stable/">documentation</a> for more help.
            </p>
            
<pre>
$client = new Client(); //Guzzle\Client
$res = $client->request('GET', url('examples/rest/getServerTime'));

$statusCode = $res->getStatusCode();
// "200"
$contentType = $res->getHeader('content-type');
// 'application/json; charset=utf8'
$responseBody = $res->getBody();
</pre>
            
            <h2>Result</h2>
            
            <p>Status Code: {!! $statusCode !!}</p>

            <p>Content Type: {!! $contentType !!}</p>

            <p>Response Body: {!! $responseBody !!}</p>
                        
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>

@endsection

@push('scripts')
<script>
$(function() {

});
</script>
@endpush
