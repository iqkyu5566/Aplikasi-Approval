	<?php 
	$success = $this->session->flashdata('success');
	$alert = $this->session->flashdata('warn');
	?>
	<?php if (!empty($success)): ?>		
	<script type="text/javascript">
		swal({
			title: "Berhasil",
			type: "success",
			text: "<?php echo $this->session->flashdata('success'); ?>",
			timer: 2000,
			showConfirmButton: false
		});
	</script>
	<?php elseif (!empty($alert)): ?>
	<script type="text/javascript">
		swal({
			title: "Warning",
			type: "warning",
			text: "<?php echo $this->session->flashdata('warn'); ?>",
			timer: 2000,
			showConfirmButton: false
		});
	</script>
	<?php endif ?>