<h1>CKEditor and TinyMCE</h1>

<h2>CKEditor</h2>

<p>
  <a href="https://docs.ckeditor.com/ckeditor4/latest/guide/dev_installation.html">Don't hesitate to visit the online documentation</a>.
</p>

<textarea id="CKEditor">
    <p>Here goes the initial content of the editor.</p>
</textarea>

<h2>TinyMCE</h2>

<p>
  <a href="https://www.tinymce.com/docs/configure/integration-and-setup/">Don't hesitate to visit the online documentation</a>.
</p>


<textarea id="tinyMCE">Next, start a free trial!</textarea>

<link rel="stylesheet" href="<?php echo base_url();?>assets/ckeditor-4.7.3/content.css">
<script src="<?php echo base_url();?>assets/ckeditor-4.7.3/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/tinymce-4.7.4/tinymce.min.js"></script>

<script type="text/javascript">
  tinymce.init({
    selector:'#tinyMCE',
    plugins : 'advlist autolink link image lists charmap print preview'
   });

  CKEDITOR.replace( 'CKEditor' );
</script>
