<?php 
/*
 *	Template spécifique à l'affichage de la boite de login
 *	Sébastien MARCELLIN
 */
use_javascript('/js/prototype.js');
use_javascript('/js/effects.js');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!-- Entetes -->
		<head>
		    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<link rel="shortcut icon" href="/images/main/favicon.ico" type="image/x-icon">
			<title><?php if (!include_slot('title')): ?>Intranet - Tallard-Barcillonnette<?php endif; ?></title>
			<?php include_http_metas() ?>
			<?php include_metas() ?>
			<?php include_javascripts() ?>
			<?php include_stylesheets() ?>
		</head>
	<!-- Fin entetes -->
	<!-- Body -->
		<body onLoad="new Effect.Appear('div_login', {delay:1});; return false;">
			<div id="container">
				<!-- Affichage de la vue -->
				<div id="div_login" style="display:none;">
					<?php echo $sf_content ?>
				</div>
				<!-- Fin Vue -->
			</div>
		</body>
	<!-- Fin body -->
</html>
