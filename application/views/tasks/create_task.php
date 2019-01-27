
    <p>Create Task</p>
<?php if($this->session->flashdata('task_failure')):?>
    <p class = "bg-danger" ><?php echo $this->session->flashdata('task_failure')?></p> 
<?php endif;?>
<?php echo form_open("tasks/create/$task_project_id");?>
    <div class='form-group'>
    <?php echo form_label('Task Name');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'task_name');
    echo form_input($attribute);
    ?>
</div>
    <div class='form-group'>
    <?php echo form_label('Task Description');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'task_description');
    echo form_input($attribute);
    ?>
</div> 
     <div class='form-group'>
    <?php echo form_label('Due Date');
    ?>
    <?php 
    $attribute=array('class'=>'form-control','name'=>'due_date','type'=>'date');
    echo form_input($attribute);
    ?>
</div> 
    <div class='form-group'>
    <?php 
    $attribute=array('class'=>'btn btn-secondary','name'=>'submit','value'=>'Create Task');
    echo form_submit($attribute);
    ?>
</div>
<?php echo form_close();?>



