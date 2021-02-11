
<?php

class Brocanteurs
{
    public function __construct()
    {
        include("model/Brocanteur_manager.php");
        include("model/Brocanteur_class.php");
        


    }
    
    public function List()
    {   
        $BrocanteursManager = new Brocanteur_manager();
        //header("Location:index.php?ctrl=Brocanteurs&action=List");
        $arrBrocanteurs = $BrocanteursManager->findAll();
        include("view/Header.php");
        include("view/Brocanteurs.php");  
        include("View/Footer.php");

    }

    public function AddBrocanteur()
    {   
        include("model/Personne_manager.php");
        include("model/Personne_class.php");

        
        $BrocanteursManager = new Brocanteur_manager();
        if (count($_POST) > 0){
            $objBrocanteurs = new Brocanteur_class();
            $objBrocanteur->hydrate($_POST);
            $boolEdit = $BrocanteursManager->addBrocanteur($objBrocanteur);
            header("Location:index.php?ctrl=Brocanteurs&action=List");
            }
            $PersonnesManager= new Personne_manager();
        $arrPersonnes = $PersonnesManager->findAll();
        include("view/Header.php");
        include("view/AddBrocanteur.php");  
        include("View/Footer.php");

    }

    public function UpdateBrocanteurs()
    {   
        include("model/Personne_manager.php");
        include("model/Personne_class.php");

        

        if (count($_POST) > 0){
            $objBrocanteur = new Brocanteur_class();
            $objBrocanteur->hydrate($_POST);
            $boolEdit = $BrocanteursManager->editBrocanteurs($objBrocanteur);
            header("Location:index.php?ctrl=Brocanteurs&action=List");
            }
        $BrocanteursManager = new Brocanteur_manager();
        $arrBrocanteurs = $BrocanteursManager->findAll();
        include("view/Header.php");
        include("view/AddBrocanteur.php");  
        include("View/Footer.php");

    }
}
