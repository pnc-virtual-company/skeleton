<div class="col-md-3">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Examples') }}</div>
                <div class="card-body">
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <button data-id="0" class="status btn btn-{{ $candidate->status === 0?"primary":"secondary"}} btn-block">@lang('Rejected')</button>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <button data-id="1" class="status btn btn-{{ $candidate->status === 1?"primary":"secondary"}} btn-block">@lang('Applying')</button>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <button data-id="2" class="status btn btn-{{ $candidate->status === 2?"primary":"secondary"}} btn-block">@lang('Screening')</button>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <button data-id="3" class="status btn btn-{{ $candidate->status === 3?"primary":"secondary"}} btn-block">@lang('Interview')</button>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <button data-id="4" class="status btn btn-{{ $candidate->status === 4?"primary":"secondary"}} btn-block">@lang('Contracting')</button>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <button data-id="5" class="status btn btn-{{ $candidate->status === 5?"primary":"secondary"}} btn-block">@lang('Hired')</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

</div>
</div>
