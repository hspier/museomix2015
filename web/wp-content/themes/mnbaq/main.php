<div class="row">
	<div class="columns hide-for-small-only medium-2">
		<div class="rotate">
			<div><p class="bonjour">Bonjour</p></div>					
			<p class="name">
				<?php 
					$profile = get_userprofile($_GET['profile']);
					echo $profile->prf_firstname;
				?>
			</p>
		</div>
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
					<li class="<?php if($create) echo 'active'; ?>"><span>Inscrivez votre nom, groupe d'âge et adresse courriel (facultatif)</span></li>
					<li class="<?php if(!$create) echo 'active next'; ?>"><span>Notez le code qui vous est attribué</span></li>
					<li><span>Rendez-vous dans les salles de l'exposition "Passion Privée"</span></li>
					<li><span>Cherchez les 4 bornes <i>Générateur d'émotions</i> et entrez votre code pour vivre l'expérience intergénérationelle !</span></li>
				</ol>
			</div>
		</div>
	</div>
</div>