<div class="row f-cmall">
	<div class="col-lg-2"></div>

	<div class="col-lg-8">
		<?php $mtr=$matter->row(); ?>
		<div class="box box-solid">
			<div class="box-body">
			<div class="col-lg-12">
			<center>
				<h4 class="f-blackblue"><?php echo $mtr->name_mtr; ?></h4>
				<a href="<?php echo base_url('edit/'.encrypt_url($mtr->id_mtr)); ?>" class="btn btn-xs f-btnall">Edit</a>
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

			<div class="col-lg-12 pertanyaan-x" style="margin-bottom:10px;">
			  <button type="button" class="btn btn-xs" onclick="tambahPertanyaan()">Tambah Pertanyaan</button>
		    </div>

		    <div class="col-lg-12 pertanyaan">
		   	<div class="col-lg-10 box">
		    	<form role="form" id="tambah-pertanyaan" method="post" action="<?php echo base_url('save-question') ?>" enctype="multipart/form-data">

					<!-- Add Teks Pertanyaan -->
					<!-- Add Format Nomor -->
					<!-- Add Kunci Jawaban -->

		            <div class="jawaban"> <!-- untuk keperluan index -->
		            	<label for="">Jawaban</label>
						<!-- Add Jawaban -->
		            </div>

		            <div class="form-group">
			            <button type="button" class="btn btn-xs tambah-pilihan" onclick="tambahPilihan()">Tambah Pilihan</button>
				  		<button type="button" class="btn btn-xs hapus-pilihan" onclick="hapusPilihan()">Hapus</button>
		            </div>

		            <div class="form-group">
		             	<input type="hidden" name="id_mtr" value="<?php echo encrypt_url($mtr->id_mtr) ?>" required>
						<input type="hidden" name="id_qst" value="" readonly="readonly">
			        	<button type="submit" name="simpan" value="Simpan" class="btn btn-sm f-btnall">Simpan</button>
			          	<button type="button" name="batal" value="Batal" class="btn btn-sm f-btnall" onclick="pertanyaanX()">Batal</button>
			        </div>
		    	</form>
		    </div>
		    </div>

		    <div class="col-lg-12">
				<table id="example1" class="table table-hover">
					<thead>
					  <tr>
					    <th>No.</th>
					    <th>Pertanyaan</th>
					    <th>Format Nomor</th>
					    <th>Aksi</th>
					  </tr>
					</thead>
					<tbody>
					<?php
						$no=1;
						foreach ($question->result() as $qst) {?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $qst->text_qst; ?></td>
								<td>
									<?php
										if($qst->num_type==1){
											echo "a,b,c,d, . . .";
										}else if($qst->num_type==2){
											echo "A,B,C,D, . . .";
										}else if($qst->num_type==3){
											echo "1,2,3,4, . . .";
										}
									?>
								</td>
								<td>
									<button type="button" class="btn btn-xs" onclick="editSoal('<?php echo encrypt_url($qst->id_qst);?>')">Edit</button>
									<button type="button" class="btn btn-xs" onclick="hapusSoal('<?php echo base_url('delete-question/'.encrypt_url($mtr->id_mtr).'/'.encrypt_url($qst->id_qst)) ?>')">Hapus</button>
								</td>
							</tr>
						<?php
						$no++;
					} ?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
	</div>

	<div class="col-lg-2"></div>
</div>
