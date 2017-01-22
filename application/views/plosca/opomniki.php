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
	<script src="<?php echo base_url(); ?>assets/js/op.js" defer></script>
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
		
		<article id="opN">
			<h2>Opomniki</h2>
			<div class="line"></div>
			<div class="content clear">
				<div id="forma-opomniki">
				  <form action="prijava.php">
				   <section>
					<h4>Opomnik preko emaila</h4>
					<label for="opEmail">Omogoči</label>
				    <input type="checkbox" id="opEmail" name="opEmail">
				   </section>
				   
				   <section>
					<h4>Opomnik preko SMS sporočila</h4>
					<label for="opSms">Omogoči</label>
				    <input type="checkbox" id="opSms" name="opSms" onclick="showMe(this, 'divTel', 'tel');">
				   
					<div class="tabL" id="divTel">
						<label for="tel">Telefonska številka</label>
						<input type="tel" id="tel" name="tel" pattern="\b\d{3}[-\s]?\d{3}[-\s]?\d{3}\b" title="Veljavne vrednosti: 031 123 456 ali 031-123-456 ali 031123456" placeholder="031 123 456">
					</div>
				   </section>
				   
					<section>
						<h4>Vrsta opomnika</h4>					
						
						<label for="vsakDan">Vsak dan</label><input type="checkbox" name="vsakDan" id="vsakDan" value="vsakDan" onclick="showMe(this, 'divUra', 'ura');">						
						<div class="tabL" id="divUra">
							<label for="ura">Ura</label>							
							<input type="time" id="ura" name="ura" step="1800">							
						</div>
						<br>
						<label for="predOp">Pol ure pred opravilom</label><input type="checkbox" name="predOp" id="predOp" value="Predop">
						
					</section>
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