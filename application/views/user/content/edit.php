<div class="row">
	<div class="col-lg-2"></div>

	<div class="col-lg-8">
		<form role="form" id="buatacara" method="post" action="<?php echo base_url('create') ?>" enctype="multipart/form-data">
    <?php $mtr=$matter->row(); ?>
		<div class="box box-solid">
      <div class="box-body">
        <div class="col-lg-12">
        <div class="form-group">
          <label for="">Nama Soal</label>
          <input type="text" name="nama" class="form-control" maxlength="50" value="<?php echo $mtr->name_mtr ?>" placeholder="Nama soal . . ." required>
        </div>
        <div class="form-group">
          <label for="">Jenjang Pendidikan</label>
          <select name="jenjang" class="form-control" required>
          	<option value="1">SD / Sederajatnya</option>
          	<option value="2">SMP / Sederajatnya</option>
          	<option value="3">SMA / SMK / Sederajatnya</option>
          	<option value="5">Perguruan Tinggi</option>
          	<option value="6">Lainya . . .</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Kode Soal</label>
          <input type="text" name="kode" class="form-control" value="<?php echo $mtr->kd_matter ?>" maxlength="15" placeholder="Kode soal . . .">
        </div>
        <div class="form-group">
          <label for="">Tahun Pembuatan</label>
          <select class="select2 form-control" name="tahun" style="width:100%;" id="tahun">
          	<option value="" disabled="disabled" selected="selected">Pilih tahun pembuatan . . . </option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Waktu Pengerjaan</label> <span id="waktu"></span>
          <input type="number" name="waktu" class="form-control" max="240" min="5" value="<?php echo $mtr->mach_time ?>" step="5" id="waktuInput" placeholder="Dalam satuan menit . . ." required>
        </div>
        <div class="form-group">
          <label for="">Aturan Penilaian</label>
          <div class="info-penilaian"></div>
          <select name="penilaian" class="form-control" id="penilaian" required>
            <option value="1">Ujian Nasional</option>
          	<option value="2">SBMPTN</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" name="simpan" value="Simpan" class="btn btn-primary">Simpan</button>
          <button type="button" name="batal" value="Batal" class="btn btn-danger">Batal</button>
        </div>
        </div>
	    </div><!-- box-body -->
    </div>
		</form>
	</div>

	<div class="col-lg-2"></div>
</div>
