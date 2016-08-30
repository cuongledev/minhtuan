<?php 
	if ($this->session->flashdata('flash_mess')) {
		echo "<div class='alert alert-success'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Thành công!</strong> ".$this->session->flashdata('flash_mess')."
  </div>";
	}
?>
<?php 
  if (!empty($error) && isset($error)) { ?>
  	<div class="alert alert-danger">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Cảnh báo!</strong> <?php echo $error; ?>
	  </div>
  
	<?php
  }
   ?>
   <?php 
  if (!empty($success) && isset($success)) { ?>
  	<div class="alert alert-success">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong>Thông báo!</strong> <?php echo $success; ?>
	  </div>
  
	<?php
  }
   ?>