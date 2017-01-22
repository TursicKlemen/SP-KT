<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang=slo>
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
		<article id="obl1">
			<h2>Poenostavi življenje</h2>
			<div class="line"></div>
			<div class="content clear">
				<figure>
					<img alt="Plosca" height="340" src="<?php echo base_url(); ?>assets/img/nasl1.png" width="620">
				</figure>
				<ul class="naslSez">
					<li>Ustvari časovni načrt namesto vas.</li>
					<li>Poveča izkoristek vašega časa.</li>
					<li>...</li>
				</ul>				
			</div>
		</article>
		<footer>
			<div class="line"></div>
			<p>Copyright 2016 - Klemen T.</p>
		</footer>
	</section>
</body>
</html>