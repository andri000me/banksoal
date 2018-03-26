<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<?php
	echo $this->session->flashdata('peringatan_admin');
	
	$this->load->view('admin/content/'.$page);
?>

</div><!-- /.content-wrapper -->