
    <h1>Projects (Home) </h1>
   
    <?php if($this->session->flashdata('project_deleted')):?>
    <p class = "bg-success" ><?php echo $this->session->flashdata('project_deleted')?></p> 
    <?php endif;?> 
    <?php if($this->session->flashdata('project_edited')):?>
    <p class = "bg-success" ><?php echo $this->session->flashdata('project_edited')?></p> 
    <?php endif;?> 
    <?php if($this->session->flashdata('project_created')):?>
    <p class = "bg-success"><?php echo $this->session->flashdata('project_created')?></p> 
    <?php endif;?>
    <a href ="<?php echo base_url(); ?>index.php/projects/create" class ="btn btn-primary float-right"> CREATE PROJECT </a>
    <?php if($this->session->flashdata('login_success')) :?>
        <p class='bg-success'><?php echo $this->session->flashdata('login_success'); ?></p>
    <?php endif;?>
        <table class ="table table-hover">
            <thead>
                <tr>
                    <th>Project ID </th>
                    <th>Project Name </th>
                    <th>Project Description </th>
                </tr>
             </thead>
                <?php foreach($projects as $project):?>
                <tr>
                    <td><?php echo $project->id;?></td>
                    <td><a href="<?php echo base_url();?>index.php/projects/display/<?php echo $project->id;?>"><?php echo $project->project_name;?></a></td>
                    <td><?php echo $project->project_description;?></td>
                    <td><a href="<?php echo base_url();?>index.php/projects/delete/<?php echo $project->id;?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                </tr>
                <?php endforeach;?>    
        </table>
    

