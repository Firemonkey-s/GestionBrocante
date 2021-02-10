<br>
<br>
<br>
<br>
<br>
<h2>Liste des reservations</h2>
<a class="nav-link" href="Index.php?ctrl= Reservations&action=addReservation">nouveau reservation</a>
<?php 
foreach ($arrReservations as $arrReservation){
                        $objReservation = new Reservation_class();
                        
                        $objReservation->hydrate($arrReservation);
        
                         ?>
                          <p>reservation:<?php echo $objReservation->getReservationId().' Date '. 
                           $objReservation->getDate ().' le nombre de places '.$objReservation->getNombrePlace().' le Id du brocanteur '.
                           $objReservation->getBrocanteurId() ?><a href="">Modifier</a></p>
                        <?php } ?>



