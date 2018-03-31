<?php 
	//Load modals
	$this->load->view("user/modal/login");
	$this->load->view("user/modal/register");
?>

<!-- Head -->
<div class="row f-header">
	<div class="col-lg-12 f-htop">
		<div class="col-lg-3 f-clogo">
			<a href="<?php echo base_url(''); ?>" class="f-logo">BankSoal</a>
		</div>
		<div class="col-lg-6 f-csearch">
			<form class="form-inline" role="form" action="<?php echo base_url('see-all') ?>" method="post" id="cariSoal">
			    <input type="text" class="f-searchbox" name="kata_kunci" placeholder="Cari soal di sini, yuks!">
			    <input type="submit" name="cari" value="Cari" class="btn f-searchbtn">
			</form>
		</div>
		<div class="col-lg-3 f-clog">
		<?php if($this->session->userdata('login_usr')){ ?>
			<a href="<?php echo base_url('see-all').'/'.encrypt_url(0).'/'.encrypt_url($this->session->userdata('id_usr')); ?>" type="button" class="btn btn-sm btn-lg f-logbtn"><?php echo $this->session->userdata('fullname_usr'); ?></a>
			<a href="<?php echo base_url('logout'); ?>" type="button" class="btn f-btn-war btn-sm btn-lg">Logout</a>
		<?php }else{ ?>
			<button type="button" class="btn btn-sm btn-lg f-logbtn" data-toggle="modal" data-target="#Daftar">Daftar</button>
			<button type="button" class="btn btn-sm btn-lg f-logbtn" data-toggle="modal" data-target="#Login">Masuk</button>
		<?php } ?>
		</div>
	</div>

	<div class="col-lg-12 f-hbottom">
		<a class="btn btn-sm f-mbtn" href="<?php echo base_url('about'); ?>">Tentang Kami</a> 
		<a class="btn btn-sm f-mbtn" href="<?php echo base_url('ask'); ?>">#TanyaBankSoal</a> 
		<a class="btn btn-sm f-mbtn" href="<?php echo base_url('create'); ?>">Buat Soal</a>
	</div>
</div>
<!-- End of Head -->
