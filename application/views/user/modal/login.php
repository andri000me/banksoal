<div class="modal fade" id="Login" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title f-blackblue">Masuk</h4>
    </div>
    <div class="modal-body">
    	<!-- Start -->
        <div class="col-lg-12 f-cmod">
        <form action="<?php echo base_url('login'); ?>" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="masukan email" maxlength="30" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="pass" class="form-control" placeholder="masukan password" maxlength="20" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" class="flat-red"> Ingat akun saya
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="login" value="Login" class="btn btn-block f-btnall">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
        </div>

      <div class="col-lg-12" align="right" style="margin-bottom: 5px;">
        <a href="#" class="f-blackblue">Lupa password?</a><br>
      </div>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-facebook f-socialbtn"><i class="fa fa-facebook"></i> Masuk pakai Facebook</a>
        <a href="#" class="btn btn-google f-socialbtn"><i class="fa fa-google-plus"></i> Masuk pakai Google+</a>
      </div><!-- /.social-auth-links -->
		<!-- End -->
    </div>
  </div>
  
</div>
</div>