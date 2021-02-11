
        <h2>Brocanteur</h2>
		<p>Entrez les infos du Brocanteur </p>
        <form name="addBrocanteur" action="" method="post" >
		
            <div id="form_Brocanteur"></div>
            <fieldset>
                <legend></legend>
                
		        <p><label for="CarteIdentite">CarteIdentite: </label><input required type="text" name="CarteIdentite" id="CarteIdentite" /></p>
                <p><label for="Rue">Rue: </label><input required type="text" name="Rue" id="Rue" /></p>
                <p><label for="CP">CP </label><input required type="text" name="CP" id="CP" /></p>
                <p><label for="Ville">Ville: </label><input required type="text" name="Ville" id="Ville" /></p>
                <p><label for="reservationEmplacement">reservationEmplacement: </label><input required type="text" name="reservationEmplacement" id="reservationEmplacement" />
                <p><label for="metreLineaire">metreLineaire: </label><input required type="text" name="metreLineaire" id="metreLineaire" />
                <p><label for="rCN_">rCN_: </label><input required type="text" name="rCN_" id="rCN_" />
                 
                <p><label for="Personne">PersonneId: </label>
               
                <select name="PersonneId" id="Personneid" >
                    
							<?php 
								foreach ($arrPersonnes as $arrDetPersonnes){
                                    
									//$strSelected = ($arrDetPersonnes['PersonneId'] == $objUser->getPersonne())?"selected":"";
									//echo "<option value='".$arrDetRole['RoleId']."'>".$arrDetRole['Titre']."</option>";
                                    //$arrPersonnes = $PersonnesManager->findAll();
                                    echo "<option value='".$arrDetPersonnes['PersonneId']."'>".$arrDetPersonnes['PersonneId']."</option>";
								
                                    header("Location:index.php?ctrl=Personnes&action=List");
                                }

							?>
				</select>
                
                <p><input class="" type="submit" value="Saisir" /></p>
            </fieldset>
        </form> 
    