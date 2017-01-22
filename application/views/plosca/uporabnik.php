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
	<script src="<?php echo base_url(); ?>assets/js/uporabnik.js" defer></script>
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
		
		<article id="profilUrej">
			<h2>Uredi profil</h2>
			<div class="line"></div>
			<div class="content clear">
				<div id="forma-opravilo">
				  <form action="urediProfil.php">
					<label>Slika profila</label><br>					
					<div id="profilePicID"><img src="<?php echo base_url(); ?>assets/img/captured.png" class="profilePic" alt="Slika profila" /></div>
					<div id="videoCapture">
						<video id="video" autoplay></video>
					</div>
					<br> <button type="button" id="cameraShow" class="openCamera">Ustvari novo sliko</button>
					<button id="zajemiPix" type="button">Slikaj</button><br>
					
					<label for="email">Email</label>
				    <input type="email" id="email" name="email" value="tursic.klemen@gmail.com" required>
				    <label for="geslo">Spremeni geslo</label>
				    <input type="password" id="geslo" name="geslo" pattern="(?=.*\d)(?=.*[A-Za-z]).{6,}" title="Geslo mora biti dolžine 6 ali več znakov ter mora vsebovati najmanj eno številko.">
				    <label for="geslo2">Potrdi geslo</label>
				    <input type="password" id="geslo2" name="geslo2">
					
				    <input type="submit" value="Shrani">
				  </form>
				</div>
			</div>
		</article>
		
		<footer>
			<div class="line"></div>			
			<p>Copyright 2016 - Klemen T.</p>
		</footer>
	</section>
</body>
</html>