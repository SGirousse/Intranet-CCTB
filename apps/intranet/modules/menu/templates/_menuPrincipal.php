<div id="menuPrincipal">
  <ul>
  <?php
  	foreach($menu as $element){
  		echo '<li><a href="'.$element['lien'].'">'.$element['titre'].'</a></li>';
  	}
  ?>
  </ul>
</div>
