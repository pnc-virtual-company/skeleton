<?php
/**
 * This view allows to modify a user record.
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */
?>

<div class="row-fluid">
    <div class="col-12">

<h2>Edit user #<?php echo $users_item['id']; ?></h2>

<?php echo validation_errors(); ?>

<?php
$attributes = array('class' => 'form-horizontal');
echo form_open('users/edit/' . $users_item['id'], $attributes);
?>

    <input type="hidden" name="id" value="<?php echo $users_item['id']; ?>" />

    <div class="form-group">
      <label class="control-label" for="firstname">Firstname</label>
      <input type="text" class="form-control" name="firstname" value="<?php echo $users_item['firstname']; ?>" required />
    </div>

    <div class="form-group">
      <label class="control-label" for="lastname">Lastname</label>
      <input type="text" class="form-control" name="lastname" value="<?php echo $users_item['lastname']; ?>" required />
    </div>

    <div class="form-group">
      <label class="control-label" for="login">Login</label>
      <input type="text" class="form-control" name="login" value="<?php echo $users_item['login']; ?>" required />
    </div>

    <div class="control-group">
      <label class="control-label" for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $users_item['email']; ?>" required />
    </div>

    <div class="control-group">
      <label class="control-label" for="role[]">Role</label>
      <select class="form-control" name="role[]" multiple="multiple" size="3">
      <?php foreach ($roles as $roles_item): ?>
          <option value="<?php echo $roles_item['id'] ?>" <?php if ((((int)$roles_item['id']) & ((int) $users_item['role']))) echo "selected" ?>><?php echo $roles_item['name'] ?></option>
      <?php endforeach ?>
      </select>
    </div>

  <div class="row-fluid">
      <div class="col-12">
          <button type="submit" class="btn btn-primary"><i class="mdi mdi-pencil"></i>&nbsp;Update</button>
          &nbsp;
          <a href="<?php echo base_url();?>users" class="btn btn-danger"><i class="mdi mdi-cancel"></i>&nbsp;Cancel</a>
      </div>
  </div>

</form>
  </div>
</div>
