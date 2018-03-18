
<div class="container">

<?php echo $flashPartialView;?>

  <?php
  $attributes = array('id' => 'formLogin', 'class' => 'form-signin');
  echo form_open('connection/login', $attributes); ?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="login" class="sr-only">Login</label>
    <input type="text" name="login" class="form-control" placeholder="Login" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <?php echo validation_errors() ?>
  </form>

</div> <!-- /container -->

<script>
    $(function(){
      $('.form-control').keypress(function(event) {
          if (event.keyCode == 13 || event.which == 13) {
              $('#formLogin').submit();
          }
      });
    });
</script>
