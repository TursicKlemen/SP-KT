<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="ToDo List">
	<meta name="author" content="Klemen Turšič">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url(); ?>assets/js/main.js" defer></script>
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
	<title>ToDo List</title>
</head>
<body>
	<section id="page" class="logged">
		<header>
			<h1>ToDo List</h1>
			<h3>Plan your life</h3>
			<div class="clear controls linf"><div>Prijavljen kot: <a href="<?php echo base_url(); ?>plosca/uporabnik" class="userLink"><?php echo $user; ?></a></div></div>
			<div class="clear gmb controls logoff">
				<ul>
					<li>						
						<a href="<?php echo base_url(); ?>odjava">Odjavi se</a>
					</li>					
				</ul>
			</div>
		</header>
		<div class="line"></div>
		<nav class="clear taskMenu controls gmb">
			<?php
			$uri = explode( "/",uri_String() ) ;
			$cpp = $uri[sizeof($uri)-1];
			$aktivT = "class=\"trenuten\"";?>
			<ul>
				<li>						
					<a href="<?php echo base_url(); ?>plosca/seznam" <?php if($cpp == "seznam"){echo $aktivT;}?> >Seznam opravil</a>
				</li>
				<li>						
					<a href="<?php echo base_url(); ?>plosca/novo" <?php if($cpp == "novo"){echo $aktivT;}?>>Novo opravilo</a>
				</li>
				<li>						
					<a href="<?php echo base_url(); ?>plosca/opravljeno" <?php if($cpp == "opravljeno"){echo $aktivT;}?>>Opravljeno</a>
				</li>
				<li>						
					<a href="<?php echo base_url(); ?>plosca/opomniki" <?php if($cpp == "opomniki"){echo $aktivT;}?>>Opomniki</a>
				</li>
			</ul>
		</nav>
		<div class="line"></div>
		<div class="tasks">
			<div class="taskPrint priorHigh">
				<div class="taskTitleCont">
					<div class="taskTitle">Kupi olje</div>
					<div class="ikone">
						<img src="<?php echo base_url(); ?>assets/img/check.svg" alt="Označi kot opravljeno" />
						<img src="<?php echo base_url(); ?>assets/img/edit.svg" alt="Uredi" />
						<img src="<?php echo base_url(); ?>assets/img/delete.svg" alt="Izbriši" onclick="removeTask(this);"/>
					</div>
				</div>			
				<div class="content clear taskContent">
					<div class="taskInfo">
						<span class="taskCat">Nakupovanje</span>
						<span class="taskTime"></span>
					</div>
				</div>
			</div>
			
			<div class="taskPrint priorMed">
				<div class="taskTitleCont">
					<div class="taskTitle">Kolokvij</div>
					<div class="ikone">
						<img src="<?php echo base_url(); ?>assets/img/check.svg" alt="Označi kot opravljeno" />
						<img src="<?php echo base_url(); ?>assets/img/edit.svg" alt="Uredi" />
						<img src="<?php echo base_url(); ?>assets/img/delete.svg" alt="Izbriši" onclick="removeTask(this);"/>
					</div>
				</div>			
				<div class="content clear taskContent">
					<div class="taskInfo">
						<span class="taskCat">Faks</span>,
						<span class="taskTime">06.12.2016, 8:00</span>
					</div>					
				</div>
			</div>
			
			<div class="taskPrint priorLow">
				<div class="taskTitleCont">
					<div class="taskTitle">Večerja</div>
					<div class="ikone">
						<img src="<?php echo base_url(); ?>assets/img/check.svg" alt="Označi kot opravljeno" />
						<img src="<?php echo base_url(); ?>assets/img/edit.svg" alt="Uredi" />
						<img src="<?php echo base_url(); ?>assets/img/delete.svg" alt="Izbriši" onclick="removeTask(this);"/>
					</div>
				</div>			
				<div class="content clear taskContent">
					<div class="taskInfo">
						<span class="taskCat">Ostalo</span>,
						<span class="taskTime">10.12.2016, 19:00</span>
					</div>
					<div class="taskDesc">
						<p>Pri tašči.</p>
					</div>
				</div>
			</div>
			
			
			
		</div>
		
		<footer>
			<div class="line"></div>			
			<p>Copyright 2016 - Klemen T.</p>
		</footer>
	</section>
</body>
</html>