    <p>Register</p>
 <?php if(isset($errors_register)):?>
        <div class="bg-danger"><?php echo $errors_register;?></div> 
 <?php endif;?>
<?php echo form_open('users/register');?>
    <div class='form-group'>
    <?php echo form_label('Email');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'email');
    echo form_input($attribute);
    ?>
</div>
    <div class='form-group'>
    <?php echo form_label('First Name');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'first_name');
    echo form_input($attribute);
    ?>
</div>
    <div class='form-group'>
    <?php echo form_label('Last Name');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'last_name');
    echo form_input($attribute);
    ?>
</div>
<div class='form-group'>
    <?php echo form_label('Username');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'username');
    echo form_input($attribute);
    ?>
</div>
<div class='form-group'>
    <?php echo form_label('Password');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'password');
    echo form_password($attribute);
    ?>
</div>
<div class='form-group'>
    <?php echo form_label('Confirm Password');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'confirm_password');
    echo form_password($attribute);
    ?>
</div>
  
<div class='form-group'>
    <?php 
    $attribute=array('class'=>'btn btn-secondary','name'=>'submit','value'=>'Register');
    echo form_submit($attribute);
    ?>
</div>
<?php echo form_close();?>

