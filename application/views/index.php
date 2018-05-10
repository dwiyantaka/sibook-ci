<?php
	$this->load->view('template/header');
?>

<div class="content-wrapper">
	<div class="content">
		<div class="container">
			<?php $this->load->view('modal'); ?>
			<div class="box box-danger" id="listCal"></div>
		</div>
	</div>
</div>

<?php
	$this->load->view('template/footer');
	$this->load->view('ajax_index');
?>
