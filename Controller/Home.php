<?php

    class Home
    {
        public function __construct()
        {

        }
        
        public function Index()
        {   
            include("view/Header.php");
            include("view/Home.php");  
            include("View/Footer.php");
        }

    }