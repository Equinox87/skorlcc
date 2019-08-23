<form action="<?php echo base_url();?>Welcome/pengaturanplay" class="col-md-6 col-md-offset-3" style="margin-top:50px;" method="POST" onsubmit="return confirm ('apakah pengaturan akan disimpan?')">
	<h2 class="sekolah" style="text-align: center;"> Pengaturan Lomba </h2>
	<div class="form-group">
		<label class="apri-form">Nama Team 1 </label>
		<input type="text" name="tim1" class="form-control" placeholder="Nama Sekolah..." value="<?php echo $tim1;?>">
	</div>
	<div class="form-group">
		<label class="apri-form">Skor Team 1 </label>
		<input type="text" name="skortim1" class="form-control" placeholder="Skor Sekolah..." value="<?php echo $skortim1;?>">
	</div>
	<hr style="border-color: #363636;">
	<div class="form-group">
		<label class="apri-form">Nama Team 2 </label>
		<input type="text" name="tim2" class="form-control" placeholder="Nama Sekolah..." value="<?php echo $tim2;?>">
	</div>
	<div class="form-group">
		<label class="apri-form">Skor Team 2 </label>
		<input type="text" name="skortim2" class="form-control" placeholder="Skor Sekolah..." value="<?php echo $skortim2;?>">
	</div>
	<hr style="border-color: #363636;">
	<div class="form-group">
		<label class="apri-form">Nama Team 3 </label>
		<input type="text" name="tim3" class="form-control" placeholder="Nama Sekolah..." value="<?php echo $tim3;?>">
	</div>
	<div class="form-group">
		<label class="apri-form">Skor Team 3 </label>
		<input type="text" name="skortim3" class="form-control" placeholder="Skor Sekolah..." value="<?php echo $skortim3;?>">
	</div>
	<hr style="border-color: #363636;">
	<div class="form-group">
		<label class="apri-form">Nama Team 4 </label>
		<input type="text" name="tim4" class="form-control" placeholder="Nama Sekolah..." value="<?php echo $tim4;?>">
	</div>
	<div class="form-group">
		<label class="apri-form">Skor Team 4 </label>
		<input type="text" name="skortim4" class="form-control" placeholder="Skor Sekolah..." value="<?php echo $skortim4;?>">
	</div>
	<hr style="border-color: #363636;">
	<div class="form-group">
		<label class="apri-form">Alasan Edit </label>
		<textarea class="form-control" name="alasan"></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="submit"> SIMPAN PENGATURAN</button>
		<button type="submit"  class="btn btn-danger" name="batal"> BATAL</button>	</div>

	
</form>
