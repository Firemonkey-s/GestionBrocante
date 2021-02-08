<<<<<<< HEAD
<h2>Liste des roles</h2>
<?php 
foreach ($arrRoles as $arrRole){
                        $objRole = new role_class();
                        $objRole->hydrate($arrRole);
                  ?>
                          <p>   Titre : <?php echo $objRole->GetTitre() ?><a href="">  Modifier</a></p>
                        <?php } ?>



=======
<h2>Liste des roles</h2>
<?php 
foreach ($arrRoles as $arrRole){
                        $objRole = new role_class();
                        $objRole->hydrate($arrRole);
                  ?>
                          <p>   Titre : <?php echo $objRole->GetTitre() ?><a href="">  Modifier</a></p>
                        <?php } ?>



>>>>>>> ad41158f8e1859d681ecaaab29648fd06a51ecb9
