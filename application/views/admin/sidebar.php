<?php $adm=$admin->row(); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/img/admin').'/'.$adm->pict_adm; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $adm->fullname_adm; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      
      <li class="treeview">
        <a href="<?php echo base_url('admin/matter'); ?>">
          <i class="fa fa-edit"></i> <span>Soal</span>
        </a>
      </li>
      
      <li>
        <a href="<?php echo base_url('admin/user'); ?>">
          <i class="fa fa-laptop"></i> <span>Penguna</span>
        </a>
      </li>
      <li class="header">LABELS</li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>