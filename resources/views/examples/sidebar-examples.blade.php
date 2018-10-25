<div class="col-md-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Examples') }}</div>
                <div class="card-body">
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples') }}" class="status btn btn-{{ $currentExample === 'List of examples'?"primary":"secondary"}} btn-block">@lang('List of examples')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/emails') }}" class="status btn btn-{{ $currentExample === 'Send/Test Emails'?"primary":"secondary"}} btn-block">@lang('Send/Test Emails')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/icons') }}" class="status btn btn-{{ $currentExample === 'Material Icons'?"primary":"secondary"}} btn-block">@lang('Material Icons')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/momentjs') }}" class="status btn btn-{{ $currentExample === 'Manipulate dates in JS'?"primary":"secondary"}} btn-block">@lang('Manipulate dates in JS')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/datepicker') }}" class="status btn btn-{{ $currentExample === 'Date selector widget'?"primary":"secondary"}} btn-block">@lang('Date selector widget')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/bootstrap') }}"  class="status btn btn-{{ $currentExample === 'Bootstrap CSS'?"primary":"secondary"}} btn-block">@lang('Bootstrap CSS')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/chartjs') }}"  class="status btn btn-{{ $currentExample === 'Charts in JS'?"primary":"secondary"}} btn-block">@lang('Charts in JS')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/fullCalendar') }}"  class="status btn btn-{{ $currentExample === 'FullCalendar widget'?"primary":"secondary"}} btn-block">@lang('FullCalendar widget')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/select2') }}"  class="status btn btn-{{ $currentExample === 'Enhanced SELECT'?"primary":"secondary"}} btn-block">@lang('Enhanced SELECT')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/richtexteditor') }}"  class="status btn btn-{{ $currentExample === 'Rich text editor'?"primary":"secondary"}} btn-block">@lang('Rich text editor')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/treeview') }}"  class="status btn btn-{{ $currentExample === 'Treeview widget'?"primary":"secondary"}} btn-block">@lang('Treeview widget')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/noto') }}"  class="status btn btn-{{ $currentExample === 'Google noto font'?"primary":"secondary"}} btn-block">@lang('Google noto font')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/rest') }}"  class="status btn btn-{{ $currentExample === 'Call a REST API in PHP'?"primary":"secondary"}} btn-block">@lang('Call a REST API in PHP')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/barcode') }}"  class="status btn btn-{{ $currentExample === 'Create a barcode in PHP'?"primary":"secondary"}} btn-block">@lang('Create a barcode in PHP')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/pdf') }}"  class="status btn btn-{{ $currentExample === 'Create a PDF file in PHP'?"primary":"secondary"}} btn-block">@lang('Create a PDF file in PHP')</a>
                        </div>
                    </div>
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    <div class="row justify-content-left">
                        <div class="col-md-12">
                            <a href="{{ url('examples/translation') }}"  class="status btn btn-{{ $currentExample === 'Translation'?"primary":"secondary"}} btn-block">@lang('Translation')</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

</div>
</div>

@push('scripts')
<script>
$(function() {
    document.title = 'Skeleton / Example: {{ $currentExample }}';
});
</script>
@endpush
