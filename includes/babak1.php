<?php
// var_dump($inputsetting);
if($inputsetting==1){
?>
<form action="<?php echo base_url();?>Welcome/babak1setting" class="col-md-6 col-md-offset-3" style="margin-top:50px;" method="POST"onsubmit="return confirm ('apakah ingin memulai babak 1?')">
	<h2 class="sekolah" style="text-align: center;"> Pengaturan Babak 1 </h2>

	<div class="form-group">
		<label class="apri-form"> Nilai Tiap Soal</label>
		<input type="text" name="nilai" class="form-control" placeholder="Nilai Tiap Soal..." value="100">
	</div>
	<div class="form-group">
		<label class="apri-form"> Jumlah Soal</label>
		<input type="text" name="jumlah" class="form-control" placeholder="Jumlah Soal..." value="20">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="submit"> MULAI BABAK 1</button>
	</div>

	
</form>
<?php
//akhir dari input setting
}else{
	//mulai babak 1
	?>
	<div class="container-soal">
	<h1>Soal #<?php echo $soalke;?></h1>
	<h1>Tim <?php echo $tim;?></h1>
	<h1> Jawaban</h1><br>
	<a href="<?php echo base_url();?>Welcome/babak1play?jawaban=benar&soalke=<?php echo $soalke;?>&tim=<?php echo $tim;?>" onclick=""><button  class="btn btn-success" onclick="return confirm('Apakah Jawaban Benar?')"> BENAR</button></a>&nbsp;
	<a href="<?php echo base_url();?>Welcome/babak1play?jawaban=salah&soalke=<?php echo $soalke;?>&tim=<?php echo $tim;?>"><button  class="btn btn-danger" onclick="return confirm('Apakah Jawaban Salah?')"> SALAH</button></a>
	</div>
	<div class="col-md-12 col-xs-12" style="background-color: #363636;margin-top:50px;color:white;">
	<div class="history col-md-6">
		<h2> Riwayat </h2>
		<?php echo $historybabak1;?>
	</div>
	</div>



<?php
}
?>


