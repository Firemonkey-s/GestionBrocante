<?php

    class Reservations
    {
        public function __construct()
        {
            include("model/Reservation_manager.php");
            include("model/Reservation_class.php");
        }
        
        public function List()
        {   
            $ReservationsManager = new Reservation_manager();
            $arrReservations = $ReservationsManager->findAll();
            include("view/Header.php");
            include("view/Reservations.php");  
            include("View/Footer.php");
        }
        public function addReservation()
        {   
            include("model/brocanteur_manager.php");
            include("model/brocanteur_class.php");
            $ReservationsManager = new Reservation_manager();
            $BrocanteursManager = new Brocanteur_manager();
                if (count($_POST) >0){
                    $objReservation = new Reservation_class();
                    $objReservation->hydrate($_POST);
                    $boolEdit=$ReservationsManager->addReservation($objReservation);
                    header ('Location:index.php?ctrl=Reservations&action=List');

                }
                $arrbrocanteurs=$brocanteursManager->findAll();
                
           
            
            include("View/Header.php");
            include("View/addReservation.php");  
            include("View/Footer.php");
        }
    }