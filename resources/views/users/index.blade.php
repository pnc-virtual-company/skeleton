@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('List of users')</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-secondary" id="cmdAddUser">@lang('Add')</button>
                            <a class="btn btn-secondary" href="{{URL::to('users/export')}}">@lang('Export to Excel')</a>
                        </div>
                    </div>

                    <div class="row"><div class="col-md-12">&nbsp;</div></div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="users">
                                <thead>
                                    <tr>
                                        <th>@lang('ID')</th>
                                        <th>@lang('Name')</th>
                                        <th>@lang('Email')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr data-id="{{ $user->id }}">
                                        <td>
                                            <i class="fas fa-trash clickable delete-icon" data-id="{{ $user->id }}" title="@lang('delete the user')"></i>
                                            <i class="fas fa-pen clickable edit-icon" data-id="{{ $user->id }}" title="@lang('edit the user')"></i>
                                            <span>{!! $user->id !!}</span>
                                        </td>
                                        <td>
                                            <span>{!! $user->name !!}</span>
                                        </td>
                                        <td>
                                            <span>{!! $user->email !!}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Include the modal //-->
@include('modal-confirm-delete')
@include('modal-alert')
@include('users.modal-create')

@endsection

@push('scripts')
<script type="text/javascript">
var table = null;

//On document ready, 
$(function() {

    var table = $("#users").DataTable();

    $("#cmdAddKeyword").click(function(e) {
        $('#lblGenericInput').text('Keyword');
        $('#lblGenericInputTitle').text('Add a new keyword');
        $('#txtGenericInput').val('');
        $("#cmdInputConfirmation").unbind( "click" );
        $("#cmdInputConfirmation").click(function(e) {
            var keyword = $('#txtGenericInput').val();
            $.ajax({
                url: '{{URL::to('/')}}/keywords',
                type: 'POST',
                data: {
                    name: keyword,
                    _method: 'POST',
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var encodedStr = keyword.replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
                        return '&#'+i.charCodeAt(0)+';';
                    });
                    var cell='<i class="fas fa-trash clickable delete-icon" data-id="' + data.id + '" title="delete the keyword"></i>';
                    cell+='&nbsp;<i class="fas fa-pen clickable edit-icon" data-id="' + data.id + '" title="edit the keyword"></i>';
                    cell+='&nbsp;<span>' + encodedStr + '</span>';
                    var row = table.row.add([cell]).draw();
                    $(row).data("id", data.id);
                    $('#frmModalInputField').modal('hide');
                },
                error:
                function(result) {
                    $('#frmModalInputField').modal('hide');                
                    $('#frmModalAlert').modal('show');
                },
            });
        });
        $('#frmModalInputField').modal('show');
    });
    
    //On click on delete, pass the object id to the confirmation modal
    $('#keywords').on("click", ".delete-icon", function() {
        $('#frmModalDeleteConfirmation').data("id", $(this).data("id"));
        $('#frmModalDeleteConfirmation').modal('show');
    });
    
    //On click on edit, fill the input modal
    $('#keywords').on("click", ".edit-icon", function() {
        var id = $(this).data("id");
        var keyword = $(this).closest("tr").find("span").text();
        $('#frmModalInputField').data("id", id);
        $('#lblGenericInput').text('Keyword');
        $('#lblGenericInputTitle').text('Edit a keyword');
        $('#txtGenericInput').val(keyword);
        $("#cmdInputConfirmation").unbind( "click" );
        $("#cmdInputConfirmation").click(function(e){
            e.preventDefault();
            var id = $('#frmModalInputField').data("id");
            var keyword = $('#txtGenericInput').val();
            $.ajax({
                url: '{{URL::to('/')}}/users/' + id,
                type: 'PATCH',
                data: {
                    id: id,
                    name: keyword,
                    _method: 'PATCH',
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    $('tr[data-id="' + id + '"]').closest("tr").find("span").text(keyword);
                    $('#frmModalInputField').modal('hide');
                },
                error:
                function(result) {
                    $('#frmModalInputField').modal('hide');                
                    $('#frmModalAlert').modal('show');
                },
            });
        });
        $('#frmModalInputField').modal('show');
    });

    //Delete the row from the DataTable if button OK or press Enter
    $("#cmdDeleteConfirmation").click(function(e){
        var id = $('#frmModalDeleteConfirmation').data("id");
        $.ajax({
            url: '{{URL::to('/')}}/users/' + id,
            type: 'DELETE',
            data: {
                id: id,
                _method: 'DELETE',
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
                table.rows('tr[data-id="' + id + '"]').remove().draw();
                $('#frmModalDeleteConfirmation').modal('hide');
            },
            error:
            function(result) {
                $('#frmModalDeleteConfirmation').modal('hide');                
                $('#frmModalAlert').modal('show');
            },
        });
    });

    //Handle enter key pressed
    $(document).keypress(function(e) {
        if ($("#frmModalDeleteConfirmation").is(':visible') && (e.keycode == 13 || e.which == 13)) {
            e.preventDefault();
            $("#cmdDeleteConfirmation").trigger("click");
        }
        if ($("#frmModalInputField").is(':visible') && (e.keycode == 13 || e.which == 13)) {
            e.preventDefault();
            $("#cmdInputConfirmation").trigger("click");
        }
    });

    //Give the focus to the edit field of the update modal
    $('#frmModalInputField').on('shown.bs.modal', function () {
        $('#txtGenericInput').trigger('focus');
    });

});
</script>
@endpush
