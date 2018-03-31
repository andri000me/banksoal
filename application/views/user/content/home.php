<div class="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-10">
		<div class="col-lg-12 f-catlabel">
			<label for="">Sekolah Dasar</label>
		</div>

		<?php foreach ($matter['sd']->result() as $row) {
			if($row->edu_lv==1){
		  		$edu="SD";
		  		$bg="f-bgred";
		  	}else if($row->edu_lv==2){
		  	 	$edu="SMP";
		  	 	$bg="f-bgblue";
		  	}else if($row->edu_lv==3){
		  		$edu="SMA";
		  		$bg="f-bggrey";
		  	}else if($row->edu_lv==4){
		  		$edu="SMK";
		  		$bg="";
		  	}else if($row->edu_lv==5){
		  		$edu="PTN";
		  		$bg="";
		  	}else if($row->edu_lv==6){
		  		$edu="Lainya";
		  		$bg="";
		  	}

			?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box f-hbox <?php echo $bg ?>">
					<div class="inner">
					  <h3><?php
					  	echo $edu.' '.$row->created;
					  ?></h3>
					  <p><?php echo $row->name_mtr ?></p>
					</div>
					<div class="icon">
					  <i class="glyphicon glyphicon-pencil"></i>
					</div>
					<a href="<?php echo base_url('matter-description/'.encrypt_url($row->id_mtr)); ?>" class="small-box-footer">Lihat Soal <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<?php
		} ?>

		<div class="col-lg-12 f-cbtnall">
			<a href="<?php echo base_url('see-all').'/'.encrypt_url('1'); ?>" class="btn btn-sm f-btnall">Lihat Semua</a>
		</div>
	</div>
	<div class="col-lg-1"></div>
</div>

<div class="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-10">
		<div class="col-lg-12 f-catlabel">
			<label for="">Sekolah Menengah Pertama</label>
		</div>

		<?php foreach ($matter['smp']->result() as $row) {
			if($row->edu_lv==1){
		  		$edu="SD";
		  		$bg="f-bgred";
		  	}else if($row->edu_lv==2){
		  	 	$edu="SMP";
		  	 	$bg="f-bgblue";
		  	}else if($row->edu_lv==3){
		  		$edu="SMA";
		  		$bg="f-bggrey";
		  	}else if($row->edu_lv==4){
		  		$edu="SMK";
		  		$bg="";
		  	}else if($row->edu_lv==5){
		  		$edu="PTN";
		  		$bg="";
		  	}else if($row->edu_lv==6){
		  		$edu="Lainya";
		  		$bg="";
		  	}

			?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box f-hbox <?php echo $bg ?>">
					<div class="inner">
					  <h3><?php
					  	echo $edu.' '.$row->created;
					  ?></h3>
					  <p><?php echo $row->name_mtr ?></p>
					</div>
					<div class="icon">
					  <i class="glyphicon glyphicon-pencil"></i>
					</div>
					<a href="<?php echo base_url('matter-description/'.encrypt_url($row->id_mtr)); ?>" class="small-box-footer">Lihat Soal <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<?php
		} ?>

		<div class="col-lg-12 f-cbtnall">
			<a href="<?php echo base_url('see-all').'/'.encrypt_url('2'); ?>" class="btn btn-sm f-btnall">Lihat Semua</a>
		</div>
	</div>
	<div class="col-lg-1"></div>
</div>

<div class="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-10">
		<div class="col-lg-12 f-catlabel">
			<label for="">Sekolah Menengah Atas</label>
		</div>

		<?php foreach ($matter['sma']->result() as $row) {
			if($row->edu_lv==1){
		  		$edu="SD";
		  		$bg="f-bgred";
		  	}else if($row->edu_lv==2){
		  	 	$edu="SMP";
		  	 	$bg="f-bgblue";
		  	}else if($row->edu_lv==3){
		  		$edu="SMA";
		  		$bg="f-bggrey";
		  	}else if($row->edu_lv==4){
		  		$edu="SMK";
		  		$bg="";
		  	}else if($row->edu_lv==5){
		  		$edu="PTN";
		  		$bg="";
		  	}else if($row->edu_lv==6){
		  		$edu="Lainya";
		  		$bg="";
		  	}

			?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box f-hbox <?php echo $bg ?>">
					<div class="inner">
					  <h3><?php
					  	echo $edu.' '.$row->created;
					  ?></h3>
					  <p><?php echo $row->name_mtr ?></p>
					</div>
					<div class="icon">
					  <i class="glyphicon glyphicon-pencil"></i>
					</div>
					<a href="<?php echo base_url('matter-description/'.encrypt_url($row->id_mtr)); ?>" class="small-box-footer">Lihat Soal <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<?php
		} ?>

		<div class="col-lg-12 f-cbtnall">
			<a href="<?php echo base_url('see-all').'/'.encrypt_url('3'); ?>" class="btn btn-sm f-btnall">Lihat Semua</a>
		</div>
	</div>
	<div class="col-lg-1"></div>
</div>
