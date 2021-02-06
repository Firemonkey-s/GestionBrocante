<?php

    class Roles
    {
        public function __construct()
        {
            include("models/Role_manager.php");
            include("models/Role_model.php");
        }
        
        public function List()
        {   
            $RolesManager = new Role_manager();
            $arrRoles = $RolesManager->findAll();
            include("Header.php");
            include("models/Role_model.php");  
            include("Footer.php");
        }
    }