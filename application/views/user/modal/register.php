<div class="modal fade" id="Daftar" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title f-blackblue">Daftar</h4>
    </div>
    <div class="modal-body">
      <!-- Start -->
        <div class="col-lg-12 f-cmod">
          <form action="<?php echo base_url('register') ?>" method="post" accept-charset="utf-8">
            <div class="form-group has-feedback">
              <input type="text" name="nama" class="form-control" placeholder="masukan nama lengkap" maxlength="30" required>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" name="email" class="form-control" placeholder="masukan email" maxlength="30" required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="pass" class="form-control" placeholder="masukan password" maxlength="20" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="rpass" class="form-control" placeholder="masukan ulang password" maxlength="20" required>
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <?php echo $captcha['image']; ?>
            </div>
            <div class="form-group has-feedback">
              <input type="text" name="captcha" id="captcha" class="form-control" placeholder="masukan kode di atas" required>
              <span class="fa fa-contao form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox" class="flat-red"> Saya menyetujui <a href="#">Ketentuan dan Persyaratan</a>
                  </label>
                </div>
              </div><!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" name="daftar" value="Daftar" class="btn btn-block f-btnall">Register</button>
              </div><!-- /.col -->
            </div>
          </form>
        </div>
    <!-- End -->
    </div>
  </div>
  
</div>
</div>