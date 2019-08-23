<!DOCTYPE html>
<html>
<head>
	<title><?php if($babak!==0 && $babak!==5){echo "Babak $babak |"; }?> 
		<?php if($babak==5){echo "Skor Akhir |"; }?>
	LCC PNB ITC </title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/apriadi.css" type="text/css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
</head>
<body>
<div class="col-md-12" style="padding:0px;">
	<div class="col-md-12 apri-contain" style="padding:0px;">
		<ul>
			<li>
				<a href="<?php echo base_url();?>Welcome/pengaturan">Edit</a> | 
			</li>
			<li>
				<a href="<?php echo base_url();?>Welcome/reset" onclick="return confirm('Apakah anda yakin ingin mereset lomba?')";>Reset Lomba</a> |
			</li>
			<li>
				<a href="<?php echo base_url();?>Welcome/fullhistory" >History</a> 
			</li>
		</ul>
		
		
	</div>
	<div class="col-md-12 apri-contain" style="padding:0px;">

		<div class="col-md-3 team-a">
			<apri>TIM A</apri>
			<h1 class="skor"><?php if($skortim1==NULL){$skortim1=0;} echo $skortim1;?></h1>
			<h1 class="sekolah"><?php echo $tim1;?></h1>
		</div>
		<div class="col-md-3 team-b">
			<apri>TIM B</apri>
			<h1 class="skor"><?php if($skortim2==NULL){$skortim2=0;} echo $skortim2;?></h1>
			<h1 class="sekolah"><?php echo $tim2;?></h1>
		</div>
		<div class="col-md-3 team-c">
			<apri>TIM C</apri>
			<h1 class="skor"><?php if($skortim3==NULL){$skortim3=0;} echo $skortim3;?></h1>
			<h1 class="sekolah"><?php echo $tim3;?></h1>
		</div>
		<div class="col-md-3 team-d">
			<apri>TIM D</apri>
			<h1 class="skor"><?php if($skortim4==NULL){$skortim4=0;} echo $skortim4;?></h1>
			<h1 class="sekolah"><?php echo $tim4;?></h1>
		</div>
	</div>
	<div style="clear:both;"></div>

	<?php
	if($pengaturan==1){
		include "includes/pengaturan.php";
	}else if($fullhistory==1){
		include "includes/fullhistory.php";
	}else{
		if($babak=='0'){
			include "includes/input-team.php";
		}else if($babak==1){
			include "includes/babak1.php";
		}else if($babak==2){
			include "includes/babak2.php";
		}else if($babak==3){
			include "includes/babak3.php";
		}else if($babak==4){
			include "includes/babak4.php";
		}else{
			include "includes/selesai.php";
		}
	}
	
	?>
</div>
</body>
</html>