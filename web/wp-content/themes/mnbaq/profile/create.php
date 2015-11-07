<div class="create-content">
	<form action="" method="post"> 
		<div class="row">
			<div class="form-field form-field-mandatory">
				<label for="firstname">Prénom : </label>
				<input name="firstname" type="text"></input>
			</div>
		</div>
		<!--div class="row">
			<div class="form-field form-field-mandatory">
				<label for="lastname">Nom : </label>
				<input name="lastname" type="text"></input>
			</div>
		</div-->
		<div class="row">
			<div class="form-field-select form-field-mandatory">
				<label for="age">Âge : </label>
				<select name="age">
					<?php 
						$categories = list_categories();
						foreach($categories as $categorie) {
							echo '<option value="';
							echo $categorie->cat_id;
							echo '">';
							echo $categorie->cat_value;
							echo '</option>';
						}
					?>
				</select>			
			</div>	
		</div>
		<div class="row">
			<div class="form-field">
				<label for="email">Courriel : </label>
				<input name="email" type="text"></input>
			</div>
		</div>
		<!--div class="form-field">
			<label for="address">Adresse : </label>
			<input id="address" type="email"></input>
		</div>
		<div class="form-field">
			<label for="city">Ville : </label>
			<input id="city" type="text"></input>
		</div>
		<div class="form-field">
			<label for="province">Province : </label>
			<input id="province" type="text"></input>
		</div>
		<div class="form-field">
			<label for="country">Pays : </label>
			<input id="country" type="text"></input>
		</div>
		<div class="form-field">
			<label for="postal">Code Postal : </label>
			<input id="postal" type="text"></input>
		</div>
		<div class="form-field">
			<label for="phone">Téléphone : </label>
			<input id="phone" type="tel"></input>
		</div-->
		<div class="form-submit">
			<button>S'inscrire</button>
		</div>		
		 <input type="hidden" name="inscription" value="1" />
	</form>
	<div id="virtualKeyboard" class="form-keyboard"></div>
</div>

