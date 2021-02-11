
<br>
<br>
<br>
<br>
<br>


<h2>Liste des roles</h2>
<?php 
foreach ($arrRoles as $arrRole){
                        $objRole = new role_class();
                        $objRole->hydrate($arrRole);
                  ?>
                          <p>   Titre : <?php echo $objRole->GetTitre() ?><a href="">  Modifier</a></p>
                        <?php } ?>






