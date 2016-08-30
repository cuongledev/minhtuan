<?php 
	if ($this->session->flashdata('flash_mess')) {
		echo "<div class='alert alert-success'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Thành công!</strong> ".$this->session->flashdata('flash_mess')."
  </div>";
	}
?>