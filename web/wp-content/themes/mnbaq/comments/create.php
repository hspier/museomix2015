<div class="create-content">
	<form action="" method="post"> 
		<div class="row">			
			<?php 
				$emotions = list_emotions("1");
				foreach($emotions as $emotion) {
					echo '<input type="checkbox" name="emotion_';
					echo $emotion->emo_id;
					echo '" value="';
					echo $emotion->emo_id;
					echo '" id="emotion_';
					echo $emotion->emo_id;
					echo '"/>';
					echo '<label class="btn-emotion" for="emotion_';
					echo $emotion->emo_id;					
					echo '">';
					echo $emotion->emo_value;					
					echo '<img class="icon-emotion" src="';
					echo bloginfo('template_directory');
					echo '/';
					echo $emotion->emo_img;
					echo '">';
					echo '</label>';
				}
			?>
		</div>
		<div class="form-submit">
			<button id="btn-comments">Écrire un commentaire</button>
			<button>Enregistrer un commentaire</button>
		</div>
		<div id="comments_row" class="row hidden">
			<textarea  rows="10" placeholder="Saisir votre commentaire..." name="comments"></textarea>
		</div>
		<div class="form-submit">
			<button>Soumettre</button>
		</div>		
		 <input type="hidden" name="comment" value="1" />
	</form>
</div>

