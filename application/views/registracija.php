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
	<link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
	<title>ToDo List</title>
</head>
<body>
	<section id="page">
		<header>
			<a href="<?php echo base_url(); ?>"><h1>ToDo List</h1></a>
			<h3>Plan your life</h3>
			<nav class="clear gmb">
				<ul>
					<li>
						<a href="<?php echo base_url(); ?>prijava">Prijava</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>registracija">Registracija</a>
					</li>
				</ul>
			</nav>
		</header>
		<div class="line"></div>
		<article id="reg1">
			<h2>Registracija</h2>
			<div class="line"></div>
			<div class="content clear">
				<div id="forma-registracija">
					<!-- izpis logov -->
					<?php $errorLog = $this->session->flashdata('error') ?>
					<!-- izpis errorjev -->
					<?php if( !empty($errorLog) ): ?>
						<div class="error-log"><?php echo $errorLog ?></div>
					<?php endif; ?>
					<?php
						$ime = array(
							"id" => 'ime',
							"name" => 'ime',
							"placeholder" => 'Janez',
							"type" => 'text',
							"required" => "required"
						);
						$priimek = array(
							"id" => 'priimek',
							"name" => 'priimek',
							"placeholder" => 'Novak',
							"type" => 'text',
							"required" => "required"
						);
						$email = array(
							"id" => 'email',
							"name" => 'email',
							"placeholder" => 'janez.novak@gmail.com',
							"type" => 'text',
							"required" => "required"
						);
						$password = array(
								"id" => 'geslo',
								"name" => 'geslo',
								//"placeholder" => 'geslo',
								"type" => 'password',
								"pattern" => "(?=.*\d)(?=.*[A-Za-z]).{6,}",
								"title" => "Geslo mora biti dolžine 6 ali več znakov ter mora vsebovati najmanj eno številko.",
								"required" => "required"
							);
						$password2 = array(
								"id" => 'geslo2',
								"name" => 'geslo2',
								//"placeholder" => 'geslo',
								"type" => 'password',
								"required" => "required"
							);
		
						echo $errors;	
						echo form_open('','');
							echo form_label('Ime', 'ime');
							echo form_input($ime);
							echo form_label('Priimek', 'priimek');
							echo form_input($priimek);
							echo form_label('Email', 'email');
							echo form_input($email);
							echo form_label('Geslo', 'geslo');
							echo form_input($password);
							echo form_label('Potrdi geslo', 'geslo2');
							echo form_input($password2);
							echo form_submit('submit', 'Registracija');
						echo form_close();
						/*
						 <form action="registracija.php">
				   <label for="ime">Ime</label>
				    <input type="text" id="ime" name="ime" placeholder="Janez" required>
					<label for="priimek">Priimek</label>
				    <input type="text" id="priimek" name="priimek" placeholder="Novak" required>
				    <label for="email">Email</label>
				    <input type="email" id="email" name="email" placeholder="janez.novak@gmail.com" required>
				    <label for="geslo">Geslo</label>
				    <input type="password" id="geslo" name="geslo" pattern="(?=.*\d)(?=.*[A-Za-z]).{6,}" title="Geslo mora biti dolžine 6 ali več znakov ter mora vsebovati najmanj eno številko." required>
				    <label for="geslo2">Potrdi geslo</label>
				    <input type="password" id="geslo2" name="geslo2" required>
				    <input type="submit" value="Registracija">
				  </form>*/
					
					?>
				 
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