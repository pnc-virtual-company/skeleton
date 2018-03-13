<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$activeLink = (isset($activeLink)) ? $activeLink :  "";?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

  <a class="navbar-brand" href="<?php echo base_url();?>">Skeleton</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo ($activeLink=='home'?'active':'');?>">
        <a class="nav-link" href="<?php echo base_url();?>">Home</a>
      </li>
      <li class="nav-item <?php echo ($activeLink=='examples'?'active':'');?>">
        <a class="nav-link" href="<?php echo base_url();?>examples/views/index">Examples</a>
      </li>
      <li class="nav-item <?php echo ($activeLink=='users'?'active':'');?>">
        <a class="nav-link" href="<?php echo base_url();?>users"><i class="mdi mdi-lock"></i>Users</a>
      </li>
    </ul>
  </div>

<?php if($this->session->loggedIn === TRUE) { ?>
  <div class="navbar-collapse collapse navbar-right">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>connection/logout">
                <?php echo $this->session->fullname;?> <i class="mdi mdi-power"></i>
              </a>
          </li>
      </ul>
  </div>
<?php } ?>
</nav>
