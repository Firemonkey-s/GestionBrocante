
</br></br></br></br></br></br></br></br></br></br></br></br></br>

<section id="personne">

<h2>Liste du personnel</h2>
<a href="index.php?ctrl=Personnes&action=addPerson">Nouveau</a>  
<?php 
foreach ($arrPersonnes as $arrPersonne){
                        $obj = new personne_class();
                        $obj->hydrate($arrPersonne);
                  ?> 
                          <p>   Nom : <?php echo $obj->GetNom()." ".$obj->GetPreNom()." ".$obj->GetEmail()." ".$obj->GetTelephone() ?>
                            <a href="">  Modifier</a>
                        </p>
                        <?php } ?>
                        <p></p>
                                              


</section>
