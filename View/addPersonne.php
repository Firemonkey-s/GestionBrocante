
        <h2>Personne</h2>
		<p>Entrez les infos de la Personne </p>
        <form name="addPersonne" action="" method="post" >
		
            <div id="form_Personne"></div>
            <fieldset>
                <legend></legend>
                
                <p><label for="Nom">Nom: </label><input required type="text" name="Nom" id="Nom" /></p>
                <p><label for="Prenom">Prenom: </label><input required type="text" name="Prenom" id="Prenom" /></p>
                <p><label for="Telephone">Telephone: </label><input required type="text" name="Telephone" id="Telephone" /></p>
                 <p><label for="email">Email: </label><input required type="text" name="Email" id="email" />
                <p><label for="Role">Role: </label>
               
                <select name="RoleId" id="Roleid" >
                    
							<?php 
								foreach ($arrRoles as $arrDetRoles){
                                    
									//$strSelected = ($arrDetRoles['RoleId'] == $objUser->getRole())?"selected":"";
									echo "<option value='".$arrDetRoles['RoleId']."' ".$strSelected." >".$arrDetRoles['Titre']."</option>";
								}
							?>
				</select>
                
                <p><input class="" type="submit" value="Saisir" /></p>
            </fieldset>
        </form> 
    