
    <div class="row">
        <div class="col-9">
            <?php if($this->session->flashdata('mark_incomplete')):?>
                <p class = "bg-success" ><?php echo $this->session->flashdata('mark_incomplete')?></p> 
            <?php endif;?>
            <?php if($this->session->flashdata('mark_complete')):?>
                <p class = "bg-success" ><?php echo $this->session->flashdata('mark_complete')?></p> 
            <?php endif;?>
            <?php if($this->session->flashdata('task_created')):?>
                <p class = "bg-success" ><?php echo $this->session->flashdata('task_created')?></p> 
            <?php endif;?>
            <?php if($this->session->flashdata('task_deleted')):?>
                <p class = "bg-success" ><?php echo $this->session->flashdata('task_deleted')?></p> 
            <?php endif;?> 
            <h1>Project Name - <?php echo $project->project_name ;?></h1>
            <h5> Created On : <?php echo $project->created_on;?></h5>
            <p> Project  Description:  <?php echo $project->project_description;?></p>
            <?php if(!empty($task_open)):?>
            <h4>Tasks Active</h4>
                <table class = "table table-hover">
                    <thead>
                        <tr>
                            <th>Task Name </th>
                            <th>Task Description </th>
                            <th>Created On </th>
                            <th>Due On </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
            <?php foreach($task_open as $task_open):?>
                        <tr>
                            <td>
                                <div class="task_name">
                                <?php echo $task_open->task_name ;?>
                                </div>
                                <div class="task_action">
                                    <a href="<?php echo base_url(); ?>index.php/tasks/edit/<?php echo $task_open->id; ?>/<?php echo $project->id; ?>">Edit</a>
                                    <a href="<?php echo base_url(); ?>index.php/tasks/delete/<?php echo $task_open->id; ?>/<?php echo $project->id; ?>">Delete</a>
                                </div>
                            </td>
                            <td><?php echo $task_open->task_description ;?></td>
                            <td><?php echo $task_open->created_on ;?></td>
                            <td><?php echo $task_open->due_on ;?></td>
                            <td><a href = "<?php echo base_url(); ?>index.php/tasks/mark_complete/<?php echo $task_open->id; ?>/<?php echo $project->id; ?>">Mark Complete</a>
                            
                            
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            <?php else :?>
            <h4> No  Open  For This Project  </h4>
            <?php endif; ?>
            <h4>Tasks Completed</h4>
            <button data-toggle="collapse" data-target="#closed_task">Show</button>
                <table class = "table table-hover collapse " id ="closed_task">
                    <thead>
                        <tr>
                            <th>Task Name </th>
                            <th>Task Description </th>
                            <th>Created On </th>
                            <th>Due On </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php foreach($task_closed as $task_closed):?>
                        <tr>
                            <td>
                                <div class="task_name">
                                <?php echo $task_closed->task_name ;?>
                                </div>
                                <div class="task_action">
                                    <a href="<?php echo base_url(); ?>index.php/tasks/edit/<?php echo$task_closed->id; ?>/<?php echo $project->id; ?>">Edit</a>
                                    <a href="<?php echo base_url(); ?>index.php/tasks/delete/<?php echo$task_closed->id; ?>/<?php echo $project->id; ?>">Delete</a>
                                </div>
                            </td>
                            <td><?php echo $task_closed->task_description ;?></td>
                            <td><?php echo $task_closed->created_on ;?></td>
                            <td><?php echo $task_closed->due_on ;?></td>
                            <td><a href = "<?php echo base_url(); ?>index.php/tasks/mark_incomplete/<?php echo $task_closed->id;?>//<?php echo $project->id; ?>">Mark incomplete</a>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
        </div>
        <div class="col-3 float-right">
            <h5>Project Actions</h5>
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo base_url();?>index.php/tasks/create/<?php echo $project->id;?>">Create Task</a></li>
                <li class="list-group-item"><a href="<?php echo base_url();?>index.php/projects/edit/<?php echo $project->id;?>">Edit Project</a></li>
                <li class="list-group-item"><a href="<?php echo base_url();?>index.php/projects/delete/<?php echo $project->id;?>">Delete Project</a></li>
            </ul>
        </div>
    </div>
