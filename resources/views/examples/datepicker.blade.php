@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <h1>Bootstrap datepicker widget</h1>
            <p>This widget transforms a text input into a date picker. Please visit their website for more information:
                <a target="_blank" href="http://bootstrap-datepicker.readthedocs.io/en/latest/">http://bootstrap-datepicker.readthedocs.io/en/latest/</a></p>
            
            <p>Click into the text input below:</p>
            
            <input type="text" class="datepicker">

            <h1>flatpickr is an alternative datepicker widget</h1>

            <p>This is a serious alternative with plenty of options. Please visit their website for more information:
                    <a target="_blank" href="https://flatpickr.js.org/">https://flatpickr.js.org/</a></p>
    
            <h3>Range mode</h3>
            <input type="text" id="flatpickr_range" class=flatpickr placeholder="Select Dates..">

            <h3>Date and time selector</h3>
            <input type="text" id="flatpickr_datetime" class=flatpickr placeholder="Select a Date and Time..">

        </div>

        @include('examples.sidebar-examples', ['currentExample' => $currentExample])

    </div>
</div>

@include('modal-wait')

@endsection

@push('scripts')
<script>
$(function() {
  //Bootstrap datepicker
  $('.datepicker').datepicker({
    orientation:"bottom",
    todayBtn: true,
    todayHighlight: true,
    autoclose:true,
  });

  //flatpickr range mode
  //$("#flatpickr_range").flatpickr({
  flatpickr("#flatpickr_range", {
    mode: "range"
  });

  //flatpickr with date time
  flatpickr("#flatpickr_datetime", {
    enableTime: true,
  });
});
</script>
@endpush
