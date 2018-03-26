<?php 
	if($mode==1){
		$teks="Sekolah Dasar";
	}else if($mode==2){
	 	$teks="Sekolah Menengah Pertama";
	}else if($mode==3){
		$teks="Sekolah Menengah Akhir";
	}else if($mode==4){
		$teks="Sekolah Menengah Kejuruan";
	}else if($mode==5){
		$teks="Perguruan Tinggi";
	}else if($mode==6){
		$teks="Lainya";
	}else if($mode==0){
    $teks=$user->row()->fullname_usr;
  }else if($mode==-1){
    $teks='Hasil Pencarian';
  }
?>

<div class="row f-cmall">
	<div class="col-lg-1"></div>
	<div class="col-lg-10">		
  		<div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <i class="glyphicon glyphicon-education"></i>
            <h3 class="box-title"><?php echo $teks; ?></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="fulldata" class="table table-hover tablepress-id-1">
              <thead>
                <tr>
                  <th>Soal</th>
                  <th>Jumlah</th>
                  <th>Tahun</th>
                  <th>Kode</th>
                  <th>Waktu</th>
                  <?php 
                    if($mode==0){?>
                      <th>Action</th>
                      <?php
                    }
                  ?>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($matter->result() as $row) {?>
                <tr>
              		<td><a href="<?php echo base_url('matter-description').'/'.$this->encrypt->encode($row->id_mtr,'Tub3sPr0mn3t(2)'); ?>"></a><?php echo $row->name_mtr ?></td>
              		<td class="jml-soal"><span style="display: none;"><?php echo $this->encrypt->encode($row->id_mtr); ?></span></td>
                  <td><?php echo $row->created ?></td>
              		<td><?php echo $row->kd_matter ?></td>
              		<td><span class="waktu"><?php echo $row->mach_time ?></span></td>
                  <?php 
                    if($mode==0){?>
                      <td>
                      <a href="<?php echo base_url('matter-details/'.$this->encrypt->encode($row->id_mtr)) ?>" class="btn btn-xs f-btnall">Edit</a>
                      <a href="<?php echo base_url('delete-matter/'.$this->encrypt->encode($row->id_mtr)) ?>" class="btn btn-xs f-btnall">Hapus</a>
                      </td>
                      <?php
                    }
                  ?>
              	</tr>
			        <?php } ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- ./col -->		
	</div>
	<div class="col-lg-1"></div>
</div>