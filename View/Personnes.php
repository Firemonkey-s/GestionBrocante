
<<<<<<< HEAD
<br>
<br>
<br>
<br>
<br>
<h2>Liste des personnes</h2>


<a class="nav-link" href="Index.php?ctrl=Personnes&action=addPersonne">nouveau</a>

=======
</br></br></br></br></br></br></br></br></br></br></br></br></br>

<section id="personne">

<h2>Liste du personnel</h2>
<a href="index.php?ctrl=Personnes&action=addPerson">Nouveau</a>  
>>>>>>> f5767191c46b0595c35695a84778409c77939536
<?php 
foreach ($arrPersonnes as $arrPersonne){
                        $objPersonne = new personne_class();
                        
                        $objPersonne->hydrate($arrPersonne);
        
                         ?>
                          <p>**<?php echo $objPersonne->getNom().' '.$objPersonne->getPrenom() ?>.....<a href="">.....</a></p>
                        <?php } ?>



</section>
