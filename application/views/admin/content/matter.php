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
            <h3 class="box-title">Soal</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="fulldata" class="table table-hover">
              <thead>
                <tr>
                  <th>Soal</th>
                  <th>Jumlah</th>
                  <th>Tahun</th>
                  <th>Kode</th>
                  <th>Waktu</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($matter->result() as $row) {?>
                <tr>
                  <td><?php echo $row->name_mtr ?></td>
                  <td class="jml-soal"><span style="display: none;"><?php echo encrypt_url($row->id_mtr); ?></span></td>
                  <td><?php echo $row->created ?></td>
                  <td><?php echo $row->kd_matter ?></td>
                  <td><span class="waktu"><?php echo $row->mach_time ?></span></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- ./col -->      
    </div><!-- /.row -->

  </section><!-- /.content -->