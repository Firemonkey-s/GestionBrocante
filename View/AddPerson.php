<h2>Ajout d'un membre du personnel</h2>
			<form action="" method="post">
				<fieldset>
					<legend>Profil</legend>
					<input id="Id" type="hidden" name="PersonneId" value="0" />
					<p>	<label for="name">Nom</label>	
						<input id="name" type="text" name="Nom" value="" />
                    </p>
                    <p>	<label for="firstname">Prénom</label>	
						<input id="firstname" type="text" name="Prenom" value="" />
                    </p>
                    <p>	<label for="email">Email</label>	
						<input id="email" type="email" name="Email" value="" />
					</p>
                    <p>	<label for="tel">Téléphone</label>	
						<input id="tel" type="text" name="Telephone" value="" />
					</p>
					<p>	<label for="role">Rôle</label>	
						<select name="RoleId" id="roleid">
							<?php 
								foreach ($arrRoles as $arrDetRole){
								//	$strSelected = ($arrDetRoles['role_id'] == $objUser->getRole())?"selected":"";
									echo "<option value='".$arrDetRole['RoleId']."'>".$arrDetRole['Titre']."</option>";
								}
							?>
						</select>
					</p>
					<p><input type="submit" name="Enregistrer" /></p>
				</fieldset>
			</form>