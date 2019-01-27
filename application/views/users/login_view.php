
<?php if($this->session->userdata('logged_in')):?>
    <?php $username=$this->session->userdata('username')?>
    <p>You are logged in as : <?php echo $username;?></p>
    <?php echo form_open('users/logout');?>
    <div class='form-group'>
    <?php 
    $attribute=array('class'=>'btn btn-primary','name'=>'submit','value'=>'logout');
    echo form_submit($attribute);
    ?>
   </div>
<?php else: ?>
    <p>Login</p>
    <?php if(isset($errors)):?>
        <div class="bg-danger"><?php echo $errors;?></div> 
    <?php endif;?>
    <?php echo form_open('users/login');?>
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
        <?php 
        $attribute=array('class'=>'btn btn-primary','name'=>'submit','value'=>'login');
        echo form_submit($attribute);
        ?>
    </div>
    <?php echo form_close();?>
<?php endif;?>

