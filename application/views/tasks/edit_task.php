    <p>Edit Task</p>
<?php if($this->session->flashdata('task_edited')):?>
    <p class = "bg-danger" ><?php echo $this->session->flashdata('task_edited')?></p> 
<?php endif;?>         
<?php if($this->session->flashdata('task_edited_failure')):?>
    <p class = "bg-danger" ><?php echo $this->session->flashdata('task_edited_failure')?></p> 
<?php endif;?>    
<?php if($this->session->flashdata('task_failure')):?>
    <p class = "bg-danger" ><?php echo $this->session->flashdata('task_failure')?></p> 
<?php endif;?>
<?php echo form_open("tasks/edit/$id/$task_project_id");?>
    <div class='form-group'>
    <?php echo form_label('Project Name');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','value'=>$task_name,'name'=>'task_name');
    echo form_input($attribute);
    ?>
</div>
    <div class='form-group'>
    <?php echo form_label('Task Description');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','value'=>$task_description,'name'=>'task_description');
    echo form_input($attribute);
    ?>
</div> 
    <div class='form-group'>
    <?php echo form_label('Due Date');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','value'=>$due_on,'name'=>'due_on','type'=>'date');
    echo form_input($attribute);
    ?>
</div> 
    <div class='form-group'>
    <?php 
    $attribute=array('class'=>'btn btn-secondary','name'=>'submit','value'=>'Update Task');
    echo form_submit($attribute);
    ?>
</div>
<?php echo form_close();?>




