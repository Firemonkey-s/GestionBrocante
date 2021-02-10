
        <h2>Payement</h2>
		<p>Entrez les infos du payement </p>
        <form name="addPayement" action="" method="post" >
		
            <div id="form_Payement"></div>
            <fieldset>
                <legend></legend>
            
                
                <p><label for="Montant">Montant: </label><input required type="text" name="Montant" id="Montant" /></p>
                <p><label for="Date">Date: </label><input required type="text" name="Date" id="Date" /></p>
                 <p><label for="ModePayement">ModePayement: </label><input required type="text" name="ModePayement" id="ModePayement" />
                <p><label for="ReservationId">Reservation: </label>
               
                <select name="ReservationId" id="Reservationid" >
                    
							<?php 
								foreach ($arrReservations as $arrDetReservations){
                                    
									//$strSelected = ($arrDetReservations['ReservationId'] == $objUser->getReservation())?"selected":"";
									echo "<option value='".$arrDetReservations['ReservationId']."' ".$strSelected." >".$arrDetReservations['Titre']."</option>";
								}
							?>
				</select>
                
                <p><input class="" type="submit" value="Saisir" /></p>
            </fieldset>
        </form> 
    