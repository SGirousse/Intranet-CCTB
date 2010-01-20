<?php 
	/*
		Template principale
		Sébastien MARCELLIN
	*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!-- Entetes -->
	<head>
	    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="/images/main/favicon.ico" type="image/x-icon" />
		<title><?php if (!include_slot('title')): ?>Intranet - Tallard-Barcillonnette<?php endif; ?></title>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<?php include_javascripts() ?>
		<?php include_stylesheets() ?>
	</head>
	<!-- Fin entetes -->
	<!-- Body -->
	<body>
		<!-- Container global de l'interface -->
		<div id="container">
			<!-- En-tête de l'interface -->
			<div id="header">
				<!-- Menu de selection des modules -->
				<?php include_component_slot('menuPrincipal') ?>
				<!-- Logo de l'application -->
				<div id="logo">
					<img alt="" src="/images/main/logo.png" />
				</div>
				<!-- Fin du logo de l'application -->
				<!-- Formulaire de recherche Google -->
				<div id="googleSearch">
					<form method="get" action="http://www.google.fr/search">
					<img alt="<?php echo __('Search on Google') ?>" src="/images/googleSearch/google.png" style="border:none;" />
					<input id="googleInput" type="text" name="q" size="31" maxlength="255" value="" /> <input type="hidden" name="hl" value="fr" /> <input type="submit" value="<?php echo __('Search'); ?>" />
					</form>
				</div>
				<!-- Fin du formulaire de recherche Google -->
			</div>
			<!-- Fin de l'en-tête de l'interface -->
			<!-- Affichage du menu gauche -->
			<div id="menu_gauche">
				<?php include_component_slot('sousMenu') ?>
			</div>
			<!-- Fin du menu gauche -->
			<!-- Affichage des messages "flashs" notice et error -->
			<div id="zone-informations">
				<?php 
					if($sf_user->hasFlash('notice'))
						echo '<span class="flash_notice">'.$sf_user->getFlash('notice').'</span>';
					elseif($sf_user->hasFlash('error'))
						echo '<span class="flash_error">'.$sf_user->getFlash('error').'</span>';
					else
						echo '<span>&nbsp;</span>';
				?>
			</div>
			<!-- Fin d'affichage des messages "flashs" notice et error -->
			<!-- Affichage de la vue -->
			<div id="contenu">
				<!-- Boite contenant les informations de profil utilisateur -->
			    	<?php include_component_slot('profil') ?>
				<?php echo $sf_content ?>
			</div>
			<!-- Fin Vue -->
		</div>
		<!-- Fin du container global de l'interface -->
		<!-- Pied de page -->
		<div id="footer">
			<!-- Pied de page -->
		</div>
		<!-- Fin Pied de page -->
	</body>
	<!-- Fin body -->
</html>
