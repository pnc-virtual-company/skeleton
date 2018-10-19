<div id="frmModalInputField" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="lblGenericInputTitle">@lang('Input a value')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label for="txtGenericInput" id="lblGenericInput">Value</label>
            <input type="text" id="txtGenericInput" name="txtGenericInput">
        </div>
        <div class="modal-footer">
            <button id="cmdInputConfirmation" type="button" class="btn btn-primary">@lang('OK')</button>
            <button id="cmdInputCancellation" type="button" class="btn" data-dismiss="modal">@lang('Cancel')</button>
        </div>
        </div>
    </div>
</div>
      