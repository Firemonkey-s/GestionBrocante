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

        public function AddPerson()
        {   
            include("model/Role_manager.php");
            include("model/Role_class.php");

            $PersonnesManager = new Personne_manager();

			if (count($_POST) > 0){
                $objPerson = new personne_class();
				$objPerson->hydrate($_POST);
                $boolEdit = $PersonnesManager->addPerson($objPerson);
                header("Location:index.php?ctrl=Personnes&action=List");
                }
            $RoleManager = new Role_manager();
            $arrRoles = $RoleManager->findAll();
            include("view/Header.php");
            include("view/AddPerson.php");  
            include("View/Footer.php");

        }

        public function UpdatePerson()
        {   
            include("model/Role_manager.php");
            include("model/Role_class.php");

            $PersonnesManager = new Personne_manager();

			if (count($_POST) > 0){
                $objPerson = new personne_class();
				$objPerson->hydrate($_POST);
                $boolEdit = $PersonnesManager->addPerson($objPerson);
                header("Location:index.php?ctrl=Personnes&action=List");
                }
            $RoleManager = new Role_manager();
            $arrRoles = $RoleManager->findAll();
            include("view/Header.php");
            include("view/AddPerson.php");  
            include("View/Footer.php");

        }
    }