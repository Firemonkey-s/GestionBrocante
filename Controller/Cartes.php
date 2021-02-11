<?php

    class Cartes
    {
        public function __construct()
        {
           // include("model/Role_manager.php");
           // include("model/Role_class.php");
        }
        
        // Gilles
        public function EditerEmplacement()
        {   
		/*
            require("model/emplacement_manager.php");
	
			$objEmplacementManager	= new Emplacement_manager;
			$arrEmplacements 		= $objEmplacementManager->FindAll();
*/
            //include("view/Header.php");
            include("view/Emplacement.php");  
            //include("View/Footer.php");
        }

       // Jean Philippes
       public function EditerLocalisation()
       {   
         $RolesManager = new Role_manager();
         $arrRoles = $RolesManager->findAll();
         include("view/Header.php");
         include("view/Localisation.php");  
         include("View/Footer.php");
       }

    }