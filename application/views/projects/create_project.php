    <p>Create Project</p>
<?php if($this->session->flashdata('project_failure')):?>
    <p class = "bg-danger" ><?php echo $this->session->flashdata('project_failure')?></p> 
<?php endif;?>
<?php echo form_open('projects/create');?>
    <div class='form-group'>
    <?php echo form_label('Project Name');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'project_name');
    echo form_input($attribute);
    ?>
</div>
    <div class='form-group'>
    <?php echo form_label('Project Description');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'project_description');
    echo form_input($attribute);
    ?>
</div>  
    <div class='form-group'>
    <?php 
    $attribute=array('class'=>'btn btn-secondary','name'=>'submit','value'=>'Create Project');
    echo form_submit($attribute);
    ?>
</div>
<?php echo form_close();?>

