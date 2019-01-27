
<p>This is a secured app.</p>
<div class="jumbotron"> 
    <h2 class="text-center"> Welcome to Control EM .</h2>

</div>
<?php if ($this->session->flashdata('login_failure')) :?>
        <p class='bg-danger'><?php echo $this->session->flashdata('login_failure'); ?></p>
<?php endif;?>
    

