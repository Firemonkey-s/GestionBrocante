<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2>Liste des Brocanteur</h2>


<a class="nav-link" href="Index.php?ctrl=Brocanteurs&action=addBrocanteur">nouveau Brocanteur</a>

<?php 
foreach ($arrBrocanteurs as $arrBrocanteur){
                        $objBrocanteur = new Brocanteur_class();
                        
                        $objBrocanteur->hydrate($arrBrocanteur);
        
                         ?>
                          <p>**<?php echo $objBrocanteur->getBrocanteurId().' '.$objBrocanteur->getCarteIdentite().'   '.$objBrocanteur->getPersonneId()?>.....<a href="">.....</a></p>
                        <?php } ?>




