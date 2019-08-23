<?php
// var_dump($inputsetting2);
if($inputsetting2==1){
?>
<form action="<?php echo base_url();?>Welcome/babak2setting" class="col-md-6 col-md-offset-3" style="margin-top:50px;" method="POST" onsubmit="return confirm ('apakah ingin memulai babak 2?')">
	<h2 class="sekolah" style="text-align: center;"> Pengaturan Babak 2 </h2>
	<div class="form-group">
		<label class="apri-form"> Jumlah Soal</label>
		<input type="text" name="jumlah2" class="form-control" placeholder="Jumlah Soal..." value="10">
	</div>
	<div class="form-group">
		<label class="apri-form"> Nilai Benar</label>
		<input type="text" name="nilaibenar" class="form-control" placeholder="Nilai Menjawab dengan benar..." value="100">
	</div>
	<div class="form-group">
		<label class="apri-form"> Denda Salah Pertama</label>
		<input type="text" name="salahpertama" class="form-control" placeholder="Denda salah menjawab tim yang pertama..." value="25">
	</div>
	<div class="form-group">
		<label class="apri-form"> Denda Salah Kedua</label>
		<input type="text" name="salahkedua" class="form-control" placeholder="Denda salah menjawab tim yang kedua..." value="50">
	</div>
	<div class="form-group">
		<label class="apri-form"> Denda Menjawab Lagi</label>
		<input type="text" name="jawablagi" class="form-control" placeholder="Denda bagi tim yang sudah salah tapi menjawab lagi..." value="100">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="submit"> MULAI BABAK 2</button>
	</div>

	
</form>
<?php
//akhir dari input setting
}else{
	//mulai babak 2
?>
	<div class="container-soal">
		<h1>Soal #<?php echo $soalke;?></h1>
		<?php if($kesempatan==1){
		?>
		<form action="<?php echo base_url();?>Welcome/babak2play" method="post">
			<input type="hidden" name="soalke" value="<?php echo $soalke;?>" />
			<input type="hidden" name="kesempatan" value="1" />
			<h2 style="font-size:18px;background-color: lawngreen">Kesempatan Pertama </h2>
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
		<?php 
		}else{
		//mulai kesempatan kedua
		?>
		<form action="<?php echo base_url();?>Welcome/babak2play" method="post">
			<input type="hidden" name="soalke" value="<?php echo $soalke;?>" />
			<input type="hidden" name="kesempatan" value="2" />
			<h2 style="font-size:18px;background-color: red;color:white;">Kesempatan Kedua </h2>
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
		<?php
		}
		?>
	</div>
	<div class="col-md-12 col-xs-12" style="background-color: #363636;margin-top:50px;color:white;">
		<div class="history col-md-6">
			<h2> Riwayat </h2>
			<?php echo $historybabak2;?>
		</div>
	</div>
	


<?php
}
?>


