<div class="create-content">
	<div class="row">
		<div class="columns hide-for-small-only medium-2">
			<div>
				<div class="rotate">
					<div><p class="bonjour">Bonjour</p></div>					
					<p class="name">
						<?php 
							$profile = get_userprofile($_GET['profile']);
							echo $profile->prf_firstname;
						?>
					</p>
				</div>
				<img style="min-height:768px;" src="<?php bloginfo('template_directory'); ?>/img/typo4.svg">
			</div>
		</div>		
		<div class="columns small-12 medium-10">
			<div class="row">			
				<div class="columns small-12 medium-6">
					<div class="row">
						<div class="columns small-12 clear-padding">
							<?php 
							if(isset($_GET['work'])) {
								$workId = $_GET['work'];
								$work = get_work($workId);
								echo '<p>';
								echo $work->wrk_name;
								echo '<br/>';
								echo $work->wrk_author;
								echo '</p>';
							}
							?>
							
						</div>
					</div>
					<div class="row">
						<div class="columns small-12 clear-padding">
							<p>Qu'est-ce que cette oeuvre évoque pour vous ?</p>	
							<p><strong>SÉLECTIONNER</strong></p>
						</div>
					</div>
				</div>
				<div class="columns hide-for-small-only medium-6">
					<?php 
					echo '<img src="';
					echo bloginfo('template_directory');
					echo '/';
					echo $work->wrk_img;
					echo '"">';
					?>							
				</div>
			</div>

			<form action="" method="post"> 
				<div class="row">			
					<?php 
					if(isset($_GET['work'])) {
						$workId = $_GET['work'];
						$emotions = list_emotions($workId);
						foreach($emotions as $emotion) {
							echo '<input type="checkbox" name="emotion_';
							echo $emotion->emo_id;
							echo '" value="';
							echo $emotion->emo_id;
							echo '" id="emotion_';
							echo $emotion->emo_id;
							echo '"/>';
							echo '<label class="btn-icon" for="emotion_';
							echo $emotion->emo_id;					
							echo '">';					
							echo '<img class="img-icon" src="';
							echo bloginfo('template_directory');
							echo '/';
							echo $emotion->emo_img;
							echo '"><br/>';					
							echo $emotion->emo_value;
							echo '</label>';
						}
					}						
					?>
				</div>
				<div class="row">
					<p>Vous pouvez ajouter un commentaire pour appuyer votre choix.</p>
					<p>SÉLECTIONNER</p>
				</div>				
				<div class="form-submit">
					<button id="btn-comments" class="btn-icon"><img class="img-icon" src="<?php bloginfo('template_directory'); ?>/img/clavier-2.svg"></button>
					<button id="btn-audio" class="btn-icon" disabled><img class="img-icon" src="<?php bloginfo('template_directory'); ?>/img/micro-2.svg"></button>
				</div>
				<div id="comments_row" class="row hidden">
					<textarea rows="10" placeholder="Saisir votre commentaire..." name="comments"></textarea>
				</div>
				<div class="form-submit">
					<button id="btn-share">Partager</button>
					<button id="btn-back">Annuler</button>
				</div>		
				<input type="hidden" name="comment" value="1" />
			</form>
		</div>
	</div>
	
</div>

