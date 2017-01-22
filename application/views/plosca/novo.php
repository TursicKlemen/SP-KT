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
		
		<article id="opN">
			<h2>Dodaj opravilo</h2>
			<div class="line"></div>
			<div class="content clear">
				<div id="forma-opravilo">
					<!-- izpis logov -->
					<?php $errorLog = $this->session->flashdata('error') ?>
					<!-- izpis errorjev -->
					<?php if( !empty($errorLog) ): ?>
						<div class="error-log"><?php echo $errorLog ?></div>
					<?php endif; ?>
					<?php if($errorLog != "Opravilo shranjeno!"){
						$naslov = array(
							"id" => 'naslov',
							"name" => 'naslov',
							"placeholder" => 'Kupi kruh',
							"type" => 'text',
							"required" => "required"
						);
						$kategorija = array(
							"id" => 'kategorija',
							"name" => 'kategorija',
							"placeholder" => 'Nakupovanje',
							"type" => 'text',
							"list" => "kats",
							"required" => "required"
						);
						$cas = array(
							"id" => 'cas',
							"name" => 'cas',							
							"type" => 'datetime-local',
							"required" => "required"
						);
						$opis = array(
								"id" => 'opis',
								"name" => 'opis',
								"placeholder" => 'Ovseni kruh',
								"type" => 'text',								
								"required" => "required"
							);
		
						echo $errors;	
						echo form_open('','');
							echo form_label('Ime opravila', 'naslov');
							echo form_input($naslov);
							echo form_label('Kategorija', 'priimek');
							echo form_input($kategorija);
							echo form_label('Datum zapadlosti', 'email');
							echo form_input($cas);
							echo form_label('Opis', 'geslo');
							echo form_input($opis);							
							echo form_submit('submit', 'Shrani');
						echo form_close();
					}
						/*
						 <form action="dodaj-opravilo.php">
					<label for="naslov">Ime opravila</label>
					<input type="text" id="naslov" name="naslov" placeholder="Kupi kruh" required>
					
					<label for="kategorija">Kategorija</label>					
					<input list="kats" name="kategorija" id="kategorija" placeholder="Nakupovanje" required>
					<datalist id="kats">
						<option value="Ostalo">Ostalo</option>
						<option value="Faks">Faks</option>
						<option value="Nakupovanje">Nakupovanje</option>
						<option value="Delo">Delo</option>
						<option value="Doma">Doma</option>
						<option value="Osebno">Osebno</option>
					</datalist>
					
					<label for="cas">Datum zapadlosti</label>							
					<input type="datetime-local" id="cas" name="cas"> 					
					
					<label for="opis">Opis</label>							
					<input type="text" id="opis" name="opis" placeholder="Ovseni kruh">
					
				    <input type="submit" value="Shrani">
				  </form>*/
					
					?>
					
				  <datalist id="kats">
						<option value="Ostalo">Ostalo</option>
						<option value="Faks">Faks</option>
						<option value="Nakupovanje">Nakupovanje</option>
						<option value="Delo">Delo</option>
						<option value="Doma">Doma</option>
						<option value="Osebno">Osebno</option>
					</datalist>
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