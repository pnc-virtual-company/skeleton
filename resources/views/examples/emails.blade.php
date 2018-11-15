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

            <p>Then you can use the button below that will send a fake email:</p>

            <p>
                <button class="btn btn-primary" id='cmdSendFakeEmail'>@lang('Send a fake Email')</button>
                <label for="txtStatus">@lang('Status:')
                    <input type="text" id="txtStatus">
                </label>
                <label for="txtMessage">@lang('Message:')
                    <input type="text" id="txtMessage">
                </label>
            </p>

            <h3>Preview of fake SMTPserver</h3>

            <p>
                <img class="img-fluid" src="{{ url('images/examples/fake-smtp-server.png') }}" />
            </p>
            
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>

@include('modal-wait')

@endsection

@push('scripts')
<script>
$(function() {
  //Ajax call to endpoint that sends an email
    $('#cmdSendFakeEmail').click(function (){
        $('#frmModalWait').modal('show');
        $.get("{{url('examples/emails/sendFakeEmail')}}", function(data, status) {
            $('#txtStatus').val(status);
            $('#txtMessage').val(data);
            $('#frmModalWait').modal('hide');
        });
    });
});
</script>
@endpush
