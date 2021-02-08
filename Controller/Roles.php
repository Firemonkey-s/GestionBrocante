<<<<<<< HEAD
<?php

    class Roles
    {
        public function __construct()
        {
            include("model/Role_manager.php");
            include("model/Role_class.php");
        }
        
        public function List()
        {   
            $RolesManager = new Role_manager();
            $arrRoles = $RolesManager->findAll();
            include("view/Header.php");
            include("view/Roles.php");  
            include("View/Footer.php");
        }
=======
<?php

    class Roles
    {
        public function __construct()
        {
            include("model/Role_manager.php");
            include("model/Role_class.php");
        }
        
        public function List()
        {   
            $RolesManager = new Role_manager();
            $arrRoles = $RolesManager->findAll();
            include("view/Header.php");
            include("view/Roles.php");  
            include("View/Footer.php");
        }
>>>>>>> ad41158f8e1859d681ecaaab29648fd06a51ecb9
    }