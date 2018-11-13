@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            
            <h1>TinyMCE is a powerful text editor</h1>
            
            <p>
              <a href="https://www.tinymce.com/docs/configure/integration-and-setup/">Don't hesitate to visit the online documentation</a>.
            </p>
            
            
            <textarea id="tinyMCE">Next, start a free trial!</textarea>            
            
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>

@endsection

@push('scripts')
<script>
$(function() {
    tinymce.baseURL = "{{URL::to('tinymce/')}}";   // trailing slash is important

    tinymce.init({
        selector:'#tinyMCE',
        plugins : 'advlist autolink link image lists charmap print preview'
    });
});
</script>
@endpush
