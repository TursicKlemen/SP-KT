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
		<article id="prij1">
			<h2>Prijava</h2>
			<div class="line"></div>
			<div class="content clear">
				<div id="forma-prijava">
					<!-- izpis logov -->
					<?php $errorLog = $this->session->flashdata('error') ?>
					<!-- izpis errorjev -->
					<?php if( !empty($errorLog) ): ?>
						<div class="error-log"><?php echo $errorLog ?></div>
					<?php endif; ?>
					<?php
						$username = array(
						"id" => 'upime',
						"name" => 'upime',
						"placeholder" => 'janez.novak@gmail.com',
						"type" => 'text',
						"required" => "required"
						);
						$password = array(
								"id" => 'geslo',
								"name" => 'geslo',
								"placeholder" => 'geslo',
								"type" => 'password',
								"required" => "required"
							);
		
						echo $errors;	
						echo form_open('','');
							echo form_label('Uporabniško ime (Email)', 'upime');
							echo form_input($username);
							echo form_label('Geslo', 'geslo');
							echo form_input($password);
							echo form_submit('submit', 'Prijava');
						echo form_close();
						/*
						<form action="seznam.html">
				    <label for="upime">Uporabniško ime (Email)</label>
				    <input type="text" id="upime" name="upime" placeholder="janez.novak@gmail.com" required>
				    <label for="geslo">Geslo</label>
				    <input type="password" id="geslo" name="geslo" required>
				    <input type="submit" value="Prijava">
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