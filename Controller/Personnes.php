<?php

    class Personnes
    {
        public function __construct()
        {
            include("model/Personne_manager.php");
            include("model/Personne_class.php");

        }
        
        public function List()
        {   
            $PersonnesManager = new Personne_manager();
            $arrPersonnes = $PersonnesManager->findAll();
            include("view/Header.php");
            include("view/Personnes.php");  
            include("View/Footer.php");
        }
        public function addPersonne()
        {   
            include("model/role_manager.php");
            include("model/role_class.php");
            $PersonnesManager = new Personne_manager();
            $RolesManager = new Role_manager();
                if (count($_POST) >0){
                    $objPersonne = new Personne_class();
                    $objPersonne->hydrate($_POST);
                    $boolEdit=$PersonnesManager->addPersonne($objPersonne);
                    header ('Location:index.php?ctrl=Personnes&action=List');

                }
                $arrRoles=$RolesManager->findAll();
                
           
            
            include("View/Header.php");
            include("View/addPersonne.php");  
            include("View/Footer.php");
        }
        
    }