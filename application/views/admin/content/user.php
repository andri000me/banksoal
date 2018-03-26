  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengguna
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pengguna</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="glyphicon glyphicon-education"></i>
              <h3 class="box-title">Daftar Pengguna</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table id="fulldata" class="table table-hover tablepress-id-1">
                <thead>
                  <tr>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($user->result() as $row) {?>
                  <tr>
                    <td><?php echo $row->fullname_usr ?></td>
                    <td><?php echo $row->email_usr ?></td>
                <?php } ?>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- ./col -->    
    </div><!-- /.row -->

  </section><!-- /.content -->