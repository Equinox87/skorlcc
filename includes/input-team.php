<form action="<?php echo base_url(); ?>Welcome/mulailomba" class="col-md-6 col-md-offset-3" style="margin-top:50px;" method="POST" onsubmit="return confirm ('apakah ingin memulai perlombaan?')">
	<h2 class="sekolah" style="text-align: center;"> Aplikasi Skor Lomba Cerdas Cermat PNB IT Competition #12 </h2>
	<div class="form-group">
		<label class="apri-form"> Pilih Babak </label>
		<select name="babak" class="form-control">
			<option value="1">Babak 1</option>
			<option value="2">Babak 2</option>
			<option value="3">Babak 3</option>
			<option value="4">Babak 4</option>
		</select>
	</div>
	<div class="form-group">
		<label class="apri-form"> Team 1 </label>
		<input type="text" name="tim1" class="form-control" placeholder="Nama Sekolah...">
	</div>
	<div class="form-group">
		<label class="apri-form"> Team 2 </label>
		<input type="text" name="tim2" class="form-control" placeholder="Nama Sekolah...">
	</div>
	<div class="form-group">
		<label class="apri-form"> Team 3 </label>
		<input type="text" name="tim3" class="form-control" placeholder="Nama Sekolah...">
	</div>
	<div class="form-group">
		<label class="apri-form"> Team 4 </label>
		<input type="text" name="tim4" class="form-control" placeholder="Nama Sekolah...">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="submit"> MULAI LOMBA</button>
	</div>


</form>