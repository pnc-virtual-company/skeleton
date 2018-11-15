@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            
                <h1>Translate user interface</h1>

                <p>You must define the strings you want to translate into <code>resources/lang/...</code> 
                    and then use the strings in the views (with one of these two syntax options):</p>
                
<pre>
    &#123;&#123; __('identifier') &#125;&#125;      //For a string into resources/lang/en.json
    &#123;&#123; __('messages.identifier') &#125;&#125; //For a string into resources/lang/en/messages.php
    &#64;lang('firstname')
</pre>            
                <h2>Result</h2>
                
                <p>Pick a language ({{ $langCode }}):
                <select id="language" class="select">
                  <option value="{{url('examples/translation/switch')}}/en" {{ ($langCode=="en")?'selected':'' }}>English</option>
                  <option value="{{url('examples/translation/switch')}}/km" {{ ($langCode=="km")?'selected':'' }}>Khmer</option>
                  <option value="{{url('examples/translation/switch')}}/fr" {{ ($langCode=="fr")?'selected':'' }}>French</option>
                </select>
                </p>
                
                <ul>
                  <li>{{ __('messages.identifier') }}</li>
                  <li>@lang('firstname')</li>
                  <li>{{ __('lastname') }}</li>
                  <li>{{ __('datehired') }}</li>
                  <li>{{ __('messages.department') }}</li>
                  <li>{{ __('position') }}</li>
                  <li>{{ __('contract') }}</li>
                  <li>{{ __('Cancel') }}</li>
                  <li>{{ __('copied') }}</li>
                </ul>
                
        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    //On select another language, reload the page with the new language
    $('#language').on('change', function () {
        var url = $(this).val();
            window.location = url;
        return false;
    });
});
</script>
@endpush
