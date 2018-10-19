<div id="frmModalImageCrop" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="lblGenericImageCropTitle">@lang('Upload an image')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <canvas class="col-md-4 text-center">
                    <canvas id="upload-demo" style="width:200px"></canvas>
                </div>
                <div class="col-md-4" style="padding-top:30px;">
                    <strong>Select Image:</strong>
                    <br/>
                    <input type="file" id="upload">
                    <br/>
                    <button class="btn btn-success upload-result">Upload Image</button>
                </div>
                <div class="col-md-4" style="">
                    <div id="upload-demo-i" class="btn btn-primary"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="cmdInputConfirmation" type="button" class="btn btn-primary">@lang('OK')</button>
            <button id="cmdInputCancellation" type="button" class="btn" data-dismiss="modal">@lang('Cancel')</button>
        </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
var cropCanvas = null;

$(function() {

    $('#upload').on('change', function () { 
        var oFReader = new FileReader();
        oFReader.readAsDataURL(this.files[0]);
        oFReader.onload = function (oFREvent) {
            // Destroy the old cropper instance if any
            if (cropCanvas != null) {
                cropCanvas.cropper('destroy');
            }
            cropCanvas = new Cropper(document.getElementById("upload-demo") , {
                aspectRatio: 1,
                movable: true,
                zoomable: true,
                rotatable: false,
                scalable: true,
            });
        });
    });


    $('.upload-result').on('click', function (ev) {
        cropCanvas.getCroppedCanvas().toBlob((blob) => {
            const formData = new FormData();
            imageData.append('croppedImage', blob);
            let imageProperties = cropCanvas.getData();
            formData.append('x', blob);
            formData.append('y', imageProperties.y);
            formData.append('width', imageProperties.width);
            formData.append('height', imageProperties.height);
            formData.append('rotate', imageProperties.rotate);
            formData.append('scaleX', imageProperties.scaleX);
            formData.append('scaleY', imageProperties.scaleY);
            formData.append('filename', $('#upload').val().split('\\').pop());
            formData.append('entity', '{{ $entity }}');
            formData.append('entityId', {{ $entityId }});
            formData.append('_method', 'POST');
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: "{{URL::to('/')}}/image/crop",
                type: "POST",
                data: formData,
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    $("#upload-demo-i").html(html);
                }
            });
    });

});
</script>
@endpush
