<?php

    class Home
    {
        public function __construct()
        {
            include("model/Role_manager.php");
            include("model/Role_class.php");
        }
        
        public function Index()
        {   
            include("view/Header.php");
            include("view/Home.php");  
            include("View/Footer.php");
        }

    }