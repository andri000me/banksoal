<?php
$no=0;
foreach ($question->result() as $row) {
	$no++;
	?>
	<div class="col-lg-12" style="margin-top: 10px;">
		<div class="col-lg-1" align="right"><?php echo $no; ?>. </div>
		<div class="col-lg-11"><?php echo $row->text_qst; ?></div>	
	</div>
	<div class="pilihan" style="display:none;"><?php echo encrypt_url($row->id_qst); ?></div>
	<?php		
}
?>