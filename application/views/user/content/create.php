<div class="row f-cmall">
  <div class="col-lg-12">
	<div class="col-lg-3"></div>

	<div class="col-lg-6">
		<form role="form" id="buatacara" method="post" action="<?php echo base_url('create') ?>" enctype="multipart/form-data">
		<div class="box box-solid">
      <div class="box-body">
        <div class="col-lg-12">
        <div class="form-group">
          <label for="">Nama Soal</label>
          <input type="text" name="nama" class="form-control" maxlength="50" placeholder="masukan nama soal" required>
        </div>
        <div class="form-group">
          <label for="">Jenjang Pendidikan</label>
          <select name="jenjang" class="form-control f-fselect" required>
          	<option value="" disabled="disabled" selected="selected">pilih jenjang pendidikan</option>
          	<option value="1">SD</option>
          	<option value="2">SMP</option>
          	<option value="3">SMA</option>
            <option value="4">SMK</option>
          	<option value="5">Perguruan Tinggi</option>
          	<option value="6">Lainya</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Kode Soal</label>
          <input type="text" name="kode" class="form-control" maxlength="15" placeholder="masukan kode soal">
        </div>
        <div class="form-group">
          <label for="">Tahun Pembuatan</label>
          <select class="select2 form-control" name="tahun" style="width:100%;" id="tahun">
          	<option value="" disabled="disabled" selected="selected">pilih tahun pembuatan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Waktu Pengerjaan</label> <span id="waktu"></span>
          <input type="number" name="waktu" class="form-control" max="240" min="5" step="5" id="waktuInput" placeholder="dalam satuan menit" required>
        </div>
        <div class="form-group">
          <label for="">Aturan Penilaian</label>
          <div class="info-penilaian"></div>
          <select name="penilaian" class="form-control" id="penilaian" required>
          	<option value="" disabled="disabled" selected="selected">pilih aturan penilaian</option>
          	<option value="1">Ujian Nasional</option>
          	<option value="2">SBMPTN</option>
          </select>
        </div>
			<?php if($this->session->userdata('login_usr')){ ?>
				<input type="hidden" name="email" class="form-control" maxlength="30" value="<?php echo $this->session->userdata('email_usr'); ?>" required>	
			<?php }else{ ?>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email" class="form-control" maxlength="30" placeholder="masukan email anda" required>
        </div>
      <?php } ?>
        <div class="form-group">
          <label for="">Kode Captcha</label>
          <br/>
          <?php echo $captcha['image']; ?>
          <input type="text" name="captcha" id="captcha" class="form-control" style="margin-top:5px;" placeholder="masukan kode di atas" required>
        </div>
        
        <div class="form-group">
          <button type="submit" name="simpan" value="Simpan" class="btn btn-sm f-btnall">Simpan</button>
        </div>
        </div>
	    </div><!-- box-body -->
    </div>
		</form>
	</div>

	<div class="col-lg-3"></div>
  </div>
</div>
