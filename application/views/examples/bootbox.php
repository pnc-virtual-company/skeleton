<!--Include the JS Library Bootbox //-->
<script src="<?php echo base_url();?>assets/js/bootbox-4.4.0.min.js"></script>

<h1>Bootbox simplifies modals</h1>
<p>Bootbox makes it easy and fast to create Bootstrap modals. Please visit their website for more information:
  <a target="_blank" href="http://bootboxjs.com/">http://bootboxjs.com/</a></p>

<button class="btn btn-primary" id="cmdSimpleAlert">
A simple alert
</button>

<br /><br />

<div class="input-group mb-3">
  <input id="txtAge" type="text" class="form-control" placeholder="How old are you?" aria-label="Age" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button id="cmdInputNumber" class="btn btn-outline-primary" type="button">Select</button>
  </div>
</div>

<!-- Live example of usage //-->
<script type="text/javascript">

  $('#cmdSimpleAlert').click(function() {
    bootbox.alert("Hello");
  });

  $('#cmdInputNumber').click(function() {
    bootbox.prompt({
        title: "Please enter your age",
        inputType: 'number',
        callback: function (result) {
            $('#txtAge').val(result);
        }
    });
  });

</script>
