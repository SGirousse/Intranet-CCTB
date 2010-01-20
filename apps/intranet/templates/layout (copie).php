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
			<div id="container">
				<div id="header">
				    <!-- Menu de selection des modules -->
				    <?php include_component_slot('menuPrincipal') ?>
				    <!-- Logo de l'application -->
				    <div id="logo"><img alt="" src="/images/main/logo.png" /></div>
				     <div class="googleSearch">
				      <form method="get" action="http://www.google.fr/search">
					<table>
					  <tr>
					    <td>
					      <img alt="<?php echo __('Search on Google') ?>" src="/images/googleSearch/google.png" style="border:none;" />
					    </td>
					    <td>
					      <input id="googleInput" type="text" name="q" size="31" maxlength="255" value="" /> <input type="hidden" name="hl" value="fr" /> <input type="submit" value="<?php echo __('Search'); ?>" />
					    </td>
					  </tr>
					</table>
				      </form>
				    </div>
				</div>
				<!-- Affichage du menu gauche -->
				<div id="menu_gauche">
					<?php include_component_slot('sousMenu') ?>
				</div>
				<!-- Fin du menu gauche -->
				<!-- Affichage des messages "flashs" notice et error -->
				<div id="zone-informations">
					<?php if ($sf_user->hasFlash('notice')): ?>
						<span class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></span>
					<?php endif; ?>
					 
					<?php if ($sf_user->hasFlash('error')): ?>
					  <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
					<?php endif; ?>
				</div>
				<!-- Affichage de la vue -->
				<div id="contenu">
					<!-- Boite contenant les informations de profil utilisateur -->
				    	<?php include_component_slot('profil') ?>
					<?php echo $sf_content ?>
				</div>
				<!-- Fin Vue -->
			</div>
			<!-- Pied de page -->
				<div id="footer">
					<!-- Pied de page -->
				</div>
			<!-- Fin Pied de page -->
		</body>
	<!-- Fin body -->
</html>
