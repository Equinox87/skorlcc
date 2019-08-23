<!DOCTYPE html>
<html>
<head>
	<title>Riwayat</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/apriadi.css" type="text/css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
</head>
<div class="container-soal">
	<h1>Full History</h1>
	<div>
	<h3> Babak 1 </h3>
		<div style="font-size:14px;">
		<?php 
		$riwayat1=$this->session->userdata('historybabak1');
		if(strlen($riwayat1)<5){
			echo "Tidak ada data";
		}else{
			echo $riwayat1;
		}	?>
		</div>
	</div>

	<h3> Babak 2 </h3>
		<div style="font-size:14px;">
		<?php 
		$riwayat2=$this->session->userdata('historybabak2');
		if(strlen($riwayat2)<5){
			echo "Tidak ada data";
		}else{
			echo $riwayat2;
		}	?>

		</div>
	

	<h3> Babak 3 </h3>
		<div style="font-size:14px;">
		<?php 
		$riwayat3=$this->session->userdata('historybabak3');
		if(strlen($riwayat3)<5){
			echo "Tidak ada data";
		}else{
			echo $riwayat3;
		}	?>

		</div>
	<h3> Babak 4 </h3>
		<div style="font-size:14px;">
		<?php 
		$riwayat4=$this->session->userdata('historybabak4');
		if(strlen($riwayat4)<5){
			echo "Tidak ada data";
		}else{
			echo $riwayat4;
		}	?>
		</div>
	<br/>
	<h3> Riwayat Edit </h3>
		<div style="font-size:14px;">
		<?php 
		$riwayat5=$this->session->userdata('alasanedit');
		if(strlen($riwayat5)<1){
			echo "Tidak ada data";
		}else{
			echo $riwayat5;
		}	?>
		</div>
		<br/>
		<br/>
		<br/>
	<h3> Skor Akhir</h3>
	<table style="text-align: center;border:#363636 1px solid;font-size:12px;display: table;margin:0 auto" border=1 cellpadding="2ox" >
		<tr><th> <center>A</center></th><th> <center>B</center></th><th> <center>C</center></th><th> <center>D</center></th></tr>
		<tr><th><?php echo $this->session->userdata('nama_tim_1');?></th><th><?php echo $this->session->userdata('nama_tim_2');?></th><th><?php echo $this->session->userdata('nama_tim_3');?></th><th><?php echo $this->session->userdata('nama_tim_4');?></th></tr>
		<tr><td><?php echo $this->session->userdata('skortim1');?></td><td><?php echo $this->session->userdata('skortim2');?></td><td><?php echo $this->session->userdata('skortim3');?></td><td><?php echo $this->session->userdata('skortim4');?></td></tr>
	</table>
	</div>	
	</div>
	
</div>


<script type="text/javascript">
	$(document).ready(function(){
		window.print();
		window.history.back();
	});
</script>