
<br>
<br>
<br>
<br>
<br>
<h2>Liste des personnes</h2>


<a class="nav-link" href="Index.php?ctrl=Personnes&action=addPersonne">nouveau</a>

<?php 
foreach ($arrPersonnes as $arrPersonne){
                        $objPersonne = new personne_class();
                        
                        $objPersonne->hydrate($arrPersonne);
        
                         ?>
                          <p>**<?php echo $objPersonne->getNom().' '.$objPersonne->getPrenom() ?>.....<a href="">.....</a></p>
                        <?php } ?>




