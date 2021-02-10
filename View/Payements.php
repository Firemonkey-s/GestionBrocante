<br>
<br>
<br>
<br>
<br>
<h2>Liste des payements</h2>


<a class="nav-link" href="Index.php?ctrl= Payements&action=addPayement">nouveau payement</a>

<?php 
foreach ($arrPayements as $arrPayement){
                        $objPayement = new payement_class();
                        
                        $objPayement->hydrate($arrPayement);
        
                         ?>
                          <p>**<?php echo $objPayement->getPayementId().' '.$objPayement->getMontant().' '.$objPayement->getDate() ?>.....<a href="">.....</a></p>
                        <?php } ?>