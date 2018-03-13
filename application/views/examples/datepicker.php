<!--Datepicker widget needs its CSS and JS files to work //-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>

<h1>Bootstrap datepicker widget</h1>
<p>This widget transforms a text input into a date picker. Please visit their website for more information:
  <a target="_blank" href="http://bootstrap-datepicker.readthedocs.io/en/latest/">http://bootstrap-datepicker.readthedocs.io/en/latest/</a></p>

<p>Click into the text input below:</p>

<input type="text" class="datepicker">

<!-- Live example of usage //-->
<script type="text/javascript">
$(document).ready(function() {
  $('.datepicker').datepicker({
    orientation:"bottom",
    todayBtn: true,
    todayHighlight: true,
    autoclose:true,
  });
});
</script>
