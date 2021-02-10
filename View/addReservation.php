
        <h2>Reservation</h2>
		<p>Entrez les infos de la reservation </p>
        <form name="addResevation" action="" method="post" >
		
            <div id="form_Reservation"></div>
            <fieldset>
                <legend></legend>
            
               
                <p><label for="Date">Date: </label><input required type="text" name="Date" id="Date" /></p>
                 <p><label for="NombrePlace">NombrePlace: </label><input required type="text" name="NombrePlace" id="NombrePlace" />
                
               
                <select name="BrocanteurId" id="BrocanteurId" >
                $arrbrocanteurs=$brocanteursManager->findAll();
							<?php 
								foreach ($arrbrocanteurs as $arrDetBrocanteurs){
                                    
									//$strSelected = ($arrDetBrocanteurs['BrocanteurId'] == $objUser->getReservation())?"selected":"";
									echo "<option value='".$arrDetBrocanteurs['BrocanteurId']."' ".$strSelected." >".$arrDetBrocanteurs['Carteidentite']."</option>";
								}
							?>
				</select>
                
                <p><input class="" type="submit" value="Saisir" /></p>
            </fieldset>
        </form> 
    