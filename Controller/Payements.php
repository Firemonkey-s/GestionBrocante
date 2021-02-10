<?php

    class Payements
    {
        public function __construct()
        {
            include("model/payement_manager.php");
            include("model/payement_class.php");

        }
        
        public function List()
        {   
            $PayementsManager = new Payement_manager();
            $arrPayements = $PayementsManager->findAll();
            include("view/Header.php");
            include("view/Payements.php");  
            include("View/Footer.php");
        }
        
        public function addPayement()
        
        {   
            include("model/reservation_manager.php");
            include("model/reservation_class.php");
            $PayementsManager = new Payement_manager();
            $ReservationsManager = new Reservation_manager();
            if (count($_POST) >0){
                $objPayement = new Payement_class();
                $objPayement->hydrate($_POST);
                $boolEdit=$PayementsManager->addPayement($objPayement);
                //header ('Location:index.php?ctrl=Payements&action=List');

            }
            $arrReservations=$ReservationsManager->findAll();
            
            
            include("View/Header.php");
            include("View/addPayement.php");  
            include("View/Footer.php");
        }
    }