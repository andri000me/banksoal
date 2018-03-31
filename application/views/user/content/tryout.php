<div class="row f-cmall">
	<div class="col-lg-2"></div>

	<div class="col-lg-8">
	<div class="col-lg-12">
	<?php
		$mtr=$matter->row();
	?>
		<form action="<?php echo base_url('tryout'); ?>" method="post">
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
				    <dt class="f-label">Waktu Pengerjaan</dt>
				    <dd><span id="waktu"></span></dd>
				</dl>
			</div>

			<div class="col-lg-12">
			<?php
			if($subpage=='mulaisekarang'){
				$no=0;
				foreach ($question->result() as $row) {
				$no++;
				?>
				<div class="col-lg-12" style="margin-top: 10px;">
					<div class="col-lg-1" align="right"><?php echo $no; ?>. </div>
					<div class="col-lg-11"><?php echo $row->text_qst; ?></div>
				</div>
				<div class="pilihan" style="display:none;"><?php echo encrypt_url($row->id_qst); ?></div>
				<?php
				}
			}else{
				?>
				<center>
					<a href="<?php echo base_url('tryout/'.encrypt_url($mtr->id_mtr)) ?>" class="btn btn-md f-btnall">Mulai Sekarang</a>
				</center>
				<?php
			}
			?>
			</div>

            </div><!-- /.box-body -->
            <div class="box-footer" align="center">
            	<a href="<?php echo base_url('tryout/'.encrypt_url($mtr->id_mtr.'/1')) ?>" class="btn btn-sm f-btnall">Coba Ujian</a>
            	<a href="<?php echo base_url('see-matter/'.encrypt_url($mtr->id_mtr)) ?>" class="btn btn-sm f-btnall">Lihat Soal</a>
            	<a href="#" class="btn btn-sm f-btnall" disabled>Lihat Pembahasan</a>
            <?php if($subpage=='mulaisekarang'){ ?>
            	<input type="hidden" name="id_mtr" value="<?php echo encrypt_url($mtr->id_mtr); ?>">
            	<input type="submit" name="lihathasil" value="Lihat Hasil" class="btn btn-sm f-btnall">
            <?php } ?>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
        </form>
    </div>
	</div>

	<div class="col-lg-2"></div>
</div>
