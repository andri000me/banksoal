<div class="row f-cmall">
	<div class="col-lg-2"></div>

	<div class="col-lg-8">
	<div class="col-lg-12">
	<?php
		$mtr=$matter->row();
	?>
		<form action="" method="post" id="tryout">
		<div class="box">
            <div class="box-body" style="min-height:100px;">
            	<div class="col-lg-12">
				<center>
					<h4 class="f-blackblue"><?php echo $mtr->name_mtr; ?></h4>
				</center>
				</div>

				<div class="col-lg-12">
	          	<dl class="dl-horizontal">
				    <dt class="f-label">Aturan Penilaian</dt>
				    <dd>
				    	<?php
				    	if($mtr->role_type==1){
				    		echo "Ujian Nasional";
				    	}else if($mtr->role_type==2){
				    		echo "SBMPTN";
				    	}
				    	?>
				    </dd>
				    <dt class="f-label">Tingkat Pendidikan</dt>
				    <dd>
				    	<?php
				    	 if($mtr->edu_lv==1){
				    	 	echo "SD/Sederajatnya";
				    	 }else if($mtr->edu_lv==2){
				    	 	echo "SMP/Sederajatnya";
				    	 }else if($mtr->edu_lv==3){
				    	 	echo "SMA/SMK/Sederajatnya";
				    	 }else if($mtr->edu_lv==5){
				    	 	echo "Perguruan Tinggi";
				    	 }else if($mtr->edu_lv==6){
				    	 	echo "Lainya . . .";
				    	 }
				    	?>
				    </dd>
				    <dt class="f-label">Tahun Pembuatan</dt>
				    <dd><?php echo $mtr->created ?></dd>
				    <dt class="f-label">Kode Soal</dt>
				    <dd><?php echo $mtr->kd_matter ?></dd>
				    <dt class="f-label">Jumlah Soal</dt>
				    <dd><?php echo $question->num_rows() ?></dd>
				<?php if($subpage==3){?>
					<dt class="f-label">Sisa Waktu</dt>
					<dd>
						<div id="clockdiv">
						    <span class="days" style="display: none;"></span>
						    <span class="hours"></span> :
						    <span class="minutes"></span> :
						    <span class="seconds"></span>
						</div>
					</dd>
				<?php }else{ ?>
					<dt class="f-label">Waktu Pengerjaan</dt>
				    <dd><span id="waktu"></span></dd>
				<?php } ?>
				</dl>
			</div>

			<div class="col-lg-12">
			<?php
			if($subpage==1){
				$this->load->view('user/content/matter_description/see_matter');
			}else if($subpage==2){
				$this->load->view('user/content/matter_description/konfirm');
			}else if($subpage==3){
				$this->load->view('user/content/matter_description/tryout');
			}else if($subpage==4){
				$this->load->view('user/content/matter_description/score');
			}
			?>
			</div>
        </div><!-- /.box-body -->

        <div class="box-footer" align="center">
        	<?php
			if($subpage==1){?>
				<a href="<?php echo base_url('matter-description/'.encrypt_url($mtr->id_mtr).'/1') ?>" class="btn btn-sm f-btnall">Cetak Soal</a>
			<?php
			}else{?>
				<a href="<?php echo base_url('matter-description/'.encrypt_url($mtr->id_mtr).'/1') ?>" class="btn btn-sm f-btnall">Lihat Soal</a>
			<?php
			}
			if($subpage!=2&&$subpage!=3){?>
				<a href="<?php echo base_url('matter-description/'.encrypt_url($mtr->id_mtr).'/2') ?>" class="btn btn-sm f-btnall">Coba Ujian</a>
			<?php
			}
			if($subpage==3){?>
				<input type="hidden" name="id_mtr" value="<?php echo encrypt_url($mtr->id_mtr); ?>" required>
        		<input type="submit" name="lihathasil" value="Lihat Hasil" onclick="konfirm()" class="btn btn-sm f-btnall">
			<?php
			}?>

        	<a href="<?php echo base_url('matter-description/'.encrypt_url($mtr->id_mtr)) ?>" class="btn btn-sm f-btnall" disabled>Lihat Pembahasan</a>
        </div><!-- /.box-footer -->
    </div><!-- /.box -->
	</form>

    </div>
	</div>

	<div class="col-lg-2"></div>
</div>
