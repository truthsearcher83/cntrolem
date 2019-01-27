    <p>Edit Project</p>
<?php if($this->session->flashdata('project_edited_failure')):?>
    <p class = "bg-danger" ><?php echo $this->session->flashdata('project_edited_failure')?></p> 
<?php endif;?>    
<?php if($this->session->flashdata('project_failure')):?>
    <p class = "bg-danger" ><?php echo $this->session->flashdata('project_failure')?></p> 
<?php endif;?>
<?php echo form_open("projects/edit/$project_id");?>
    <div class='form-group'>
    <?php echo form_label('Project Name');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','value'=>$project_name,'name'=>'project_name');
    echo form_input($attribute);
    ?>
</div>
    <div class='form-group'>
    <?php echo form_label('Project Description');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','value'=>$project_description,'name'=>'project_description');
    echo form_input($attribute);
    ?>
</div>  
    <div class='form-group'>
    <?php 
    $attribute=array('class'=>'btn btn-secondary','name'=>'submit','value'=>'Update Project');
    echo form_submit($attribute);
    ?>
</div>
<?php echo form_close();?>

