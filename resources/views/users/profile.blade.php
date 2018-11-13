@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('My profile')</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <img id="imgProfilePic" src="{{URL::to('images/examples/faces/m34.jpg')}}" class="img-fluid rounded mx-auto d-block clickable"/>
                            
                            {!! $user->name !!}<br />
                            {!! $user->email !!}<br />

                        </div>
                    </div>

                    <div class="row"><div class="col-md-12">&nbsp;</div></div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">

//On document ready, 
$(function() {

});
</script>
@endpush
