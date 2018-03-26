  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengaturan Akun
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pengaturan Akun</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php $adm=$admin->row(); ?>
    <!-- Small boxes (Stat box) -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Informasi Admin</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nm_lengkap" maxlength="30" class="form-control" value="<?php echo $adm->fullname_adm; ?>" required>
            </div><!-- /.form-group -->
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" maxlength="35" class="form-control" value="<?php echo $adm->email_adm; ?>" required>
            </div><!-- /.form-group -->
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="user" maxlength="15" class="form-control" value="<?php echo $adm->user_adm; ?>" required>
            </div><!-- /.form-group -->
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="pass" class="form-control" value="">
            </div><!-- /.form-group -->
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Foto</label>
              <input type="text" name="nm_lengkap" maxlength="30" class="form-control" value="<?php echo $adm->fullname_adm; ?>" required>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->

  </section><!-- /.content -->