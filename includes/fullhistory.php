<div class="container-soal">
	<h1>Full History</h1>
	<a style="margin-right:10px;" href="<?php echo base_url();?>Welcome/backfullhistory"><button class="btn btn-success" style="font-size:12px">Kembali</button></a>
	<a href="<?php echo base_url();?>Welcome/printhistory" target="_blank"><button class="btn btn-primary" style="font-size:12px">Print</button></a>
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

	</div>	
	</div>
	
</div>

