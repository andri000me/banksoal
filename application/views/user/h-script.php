<!-- h-scrip -->
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte'); ?>/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte'); ?>/plugins/iCheck/all.css">
	
	<!-- Add per page -->
	<?php 
	  if ($page=='create') {
	?>
	  	<!-- Select2 -->
    	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte'); ?>/plugins/select2/select2.min.css">
	<?php
	  }else if($page=='home'){
	?>
		<!-- Ionicons -->
    	<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/ionicons/2.0.1/css/ionicons.min.css">
    	<!-- DataTables -->
    	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte'); ?>/plugins/datatables/dataTables.bootstrap.css">
	<?php
	  }else if($page=='matter_details'){
	?>
	  	<style>
			.pertanyaan,.hapus-pilihan{
				display: none;
			}
		</style>

	    <!-- DataTables -->
	    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte'); ?>/plugins/datatables/dataTables.bootstrap.css">
    	<!-- bootstrap wysihtml5 - text editor -->
    	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte'); ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<?php 
	  }else if($page=='edit'){
	?>
	  	<!-- Select2 -->
    	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte'); ?>/plugins/select2/select2.min.css">
    <?php 
	  }else if($page=='see_all'){
	?>
		<!-- DataTables -->
    	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte'); ?>/plugins/datatables/dataTables.bootstrap.css">
	<?php } ?>
    
	<!-- Always on Bottom -->
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte'); ?>/dist/css/AdminLTE.min.css">
	<!-- MyStyle -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle.css')?>" /> 
<!-- End of h-scrip -->