<h1>Translate user interface with CI·</h1>

<p>You must define the strings you want to translate into <code>application/language/...</code> and then use the strings in the views:</p>

<pre>
echo lang('identifier');
</pre>

<h2>Result</h2>

<p>Pick a language:
<select id="language" class="select">
  <option value="<?php echo base_url() . 'examples/i18n';?>" <?php echo ($language=="english")?'selected':''; ?>>English</option>
  <option value="<?php echo base_url() . 'examples/i18n/khmer';?>" <?php echo ($language=="khmer")?'selected':''; ?>>Khmer</option>
</select>
</p>

<ul>
  <li><?php echo lang('identifier');?></li>
  <li><?php echo lang('firstname');?></li>
  <li><?php echo lang('lastname');?></li>
  <li><?php echo lang('datehired');?></li>
  <li><?php echo lang('department');?></li>
  <li><?php echo lang('position');?></li>
  <li><?php echo lang('contract');?></li>
  <li><?php echo lang('Cancel');?></li>
  <li><?php echo lang('copied');?></li>
</ul>

<script>
    $(function(){
      $('#language').on('change', function () {
          var url = $(this).val();
              window.location = url;
          return false;
      });
    });
</script>
