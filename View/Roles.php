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
                          <p>Libelle:<?php echo $objRole->getTitre() ?><a href="">Modifier</a></p>
                        <?php } ?>



