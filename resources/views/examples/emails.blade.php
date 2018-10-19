@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            
            <h1>Sending emails with a fake SMTPserver</h1>

            <p>Please note that a fake SMTP server (Java/JAR application) is bundled with the skeleton in <code>tests/fakeSMTP-2.0.jar</code></p>
            
            <p>In order to use it:</p>
            
            <ol>
              <li>Double click on the JAR file.</li>
              <li>Click on the button <code>Start server</code>.</li>
              <li>Send an email form the application.</li>
              <li>Double click on an email in the list of emails received by the fake SMTP server.</li>
            </ol>
            
            <p><img class="img-fluid" src="{{ URL::to('images/examples/fake-smtp-server.png') }}" /></p>
            
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
  //Ajax call to endpoint that sends an email

});
</script>
@endpush
