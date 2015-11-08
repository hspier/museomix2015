<div class="row">
	<div class="columns hide-for-small-only medium-2">
	</div>
	<?php 
		$create = true;
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action === "qr") {
				$create = false;
			}
		}
	?>
	<div class="columns small-12 medium-10">		
		<h2>
			<?php 
				if($create) {
					echo 'Inscription';
				} else {
					echo 'Votre code d\'usager';
				}
			?>
		</h2>

		<?php 
			if($create) {
				include(TEMPLATEPATH . '/profile/create.php');
			} else {
				include(TEMPLATEPATH . '/profile/qr.php');
			}
		?>

		<div class="row">
			<div class="columns small-8">
				<?php if($create) { ?>
				<p>
					<h4>Générateur d'émotions</h4> est un espace virtuel où des rencontres
					intergénérationelles se produisent. Des associations de visiteurs de
					différentes générations sont provoquées par les émotions qui ont été vécues
					devant une oeuvre d'art. <br/><br/>Comment se sent un enfant de 5 ans, un homme
					de 70 ans ou une adolescente de 15 ans devant la même oeuvre que moi ?
				</p>
				<?php } ?>
			</div>
			<div class="columns small-4 steps">
				<h3>Étapes à suivre pour participer</h3>
				<ol>
					<li class="<?php if($create) echo 'active'; ?>">Inscrivez votre nom, groupe d'âge et adresse courriel (facultatif)</li>
					<li class="<?php if(!$create) echo 'active next'; ?>">Notez le code qui vous est attribué</li>
					<li>Rendez-vous dans les salles de l'exposition "Passion Privée"</li>
					<li>Cherchez les 4 bornes <i>Générateur d'émotions</i> et entrez votre code pour vivre l'expérience intergénérationelle !</li>
				</ol>
			</div>
		</div>
	</div>
</div>