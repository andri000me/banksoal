<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets'); ?>/jquery-ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url('assets/adminlte'); ?>/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets'); ?>/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets'); ?>/moment.js/2.10.3/moment.min.js"></script>
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/adminlte'); ?>/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/adminlte'); ?>/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/adminlte'); ?>/dist/js/demo.js"></script>
<?php 
if($page=='matter'){ ?>
<!-- DataTables -->
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
$('#fulldata').DataTable();

$('.jml-soal').each(function(){
	var nsoal=$(this);
	var id_mtr=$(this).children('span').text();
	$(this).empty();

	var url="<?php echo base_url('n_question_IDMtr'); ?>"+"/"+id_mtr;
	$.getJSON(url,function(result){
	  $(nsoal).append(result);
	});
});
</script>
<?php } ?>