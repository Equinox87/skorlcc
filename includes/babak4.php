<?php
// var_dump($inputsetting2);
if($inputsetting4==1){
?>
<form action="<?php echo base_url();?>Welcome/babak4setting" class="col-md-6 col-md-offset-3" style="margin-top:50px;" method="POST"onsubmit="return confirm ('apakah ingin memulai babak 4?')">
	<h2 class="sekolah" style="text-align: center;"> Pengaturan Babak 4 </h2>
	<div class="form-group">
		<label class="apri-form"> Jumlah Soal</label>
		<input type="text" name="jumlah" class="form-control" placeholder="Jumlah Soal..." value="20">
	</div>
	<div class="form-group">
		<label class="apri-form"> Kelipatan Nilai</label>
		<input type="text" name="kelipatan" class="form-control" placeholder="Nilai Menjawab dengan benar..." value="10">
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="submit"> MULAI BABAK 4</button>
	</div>

	
</form>
<?php
//akhir dari input setting
}else{
	//mulai babak 4
?>
	<div class="container-soal">
		<h1>Soal #<?php echo $soalke;?></h1>
		<h2 style="border:black 1px solid;">Nilai :<?php echo $kelipatanpoin;?></h2>
		<form action="<?php echo base_url();?>Welcome/babak4play" method="post">
			<input type="hidden" name="soalke" value="<?php echo $soalke;?>" />
			<h1>Tim 
				<select name="tim">
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
				</select>
			</h1>
			<h1 style="font-size:25px"> Jawaban</h1><br>
			<button type="submit" name="benar" class="btn btn-success" onclick="return confirm('Apakah Jawaban Benar?')"> BENAR</button>&nbsp;
			<button type="submit" name="salah" class="btn btn-danger" onclick="return confirm('Apakah Jawaban Salah?')"> SALAH</button>&nbsp;
			<button type="submit" name="pass" class="btn btn-primary" onclick="return confirm('Apakah Ingin Lewati Soal?')"> PASS</button>


		</form>
		
	</div>
	<div class="col-md-12 col-xs-12" style="background-color: #363636;margin-top:50px;color:white;">
		<div class="history col-md-6">
			<h2> Riwayat </h2>
			<?php echo $historybabak4;?>
		</div>
	</div>
	


<?php
}
?>


