<h2>Liste des roles</h2>
<?php 
foreach ($arrRoles as $arrRole){
                        $objRole = new role_class();
                        $$objRole	= new Product();
                        $$objRole->hydrate($arrRole);
        
                         ?>
                          <p>Libelle:<?php echo $objRole->Titre ?><a href="">Modifier</a></p>
                        <?php } ?>


