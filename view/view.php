<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $pagetitle; ?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.amber-pink.min.css" />		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	</head>
	<body>
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
			<header class="mdl-layout__header">
				<div class="mdl-layout__header-row">
					<!-- Title -->
					<span class="mdl-layout-title">eGoodies.com</span>
					<!-- Add spacer, to align navigation to the right -->
					<div class="mdl-layout-spacer"></div>
					<!-- Navigation. We hide it in small screens. -->
					<nav class="mdl-navigation mdl-layout--large-screen-only">
						<a class="mdl-navigation__link"href="index.php">Home</a>
						<?php
							if ( !isset( $_SESSION[ "login" ] ) ) {
								echo "<a class=\"mdl-navigation__link\" href=\"index.php?action=connect&controller=utilisateur\">Connect</a>\n
								      <a class=\"mdl-navigation__link\" href='index?action=update&controller=utilisateur'>Créer compte</a>";
							}
							else {
								echo "<a class=\"mdl-navigation__link\" href='index.php?action=read&controller=utilisateur'>Mon compte</a>\n
								      <a class=\"mdl-navigation__link\" href=\"index.php?action=disconnect&controller=utilisateur\">Disconnect</a>";
							}
						?>
						<a class="mdl-navigation__link" href="index.php?action=update&controller=commande"><span  class="material-icons mdl-badge mdl-badge--overlap" data-badge="<?php

							if(isset($_COOKIE['panier'])){
								$i=0;
								$tab=unserialize($_COOKIE["panier"]);
								foreach($tab as $p){
									$i+=$p;
								}
								echo $i;
							}
							else{
								echo "0";
							}
							?>">&#xE8CC;</span >
						</a>
					</nav>
				</div>
			</header>
			<main class="mdl-layout__content">
				<div class="page-content"><!-- Your content goes here -->

					<?php
						$filepath = File ::build_path ( [ "view" , $object , "$view.php" ] );
						require $filepath;
					?>
				</div>
			</main>
			<footer class="mdl-mega-footer">
				<div class="mdl-mega-footer__middle-section">
						Site de vente de goodies, eGoodies.com
				</div>
			</footer>
		</div>
	</body>
</html>
