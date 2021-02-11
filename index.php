<?php
	//session_start();
	//if (!isset($_SESSION))
	{
	//	$Panier = new ArrayObject();
	//	$_SESSION['Panier'] = $panier;
	}
	
//<<<<<<< HEAD
	$strController 	= $_GET['ctrl']??'roles';
	$strAction	 	= $_GET['action']??'List';
//=======
	$strController 	= $_GET['ctrl']??'home';
	$strAction	 	= $_GET['action']??'Index';
//>>>>>>> a346f08e6f180000ec5944bf089ec939af95ab1f

	$strController 	= ucfirst($strController);
	$strAction	= ucfirst($strAction);
	echo "<p>  $strController  $strAction </p>";
	$boolOk = true;
	if (file_exists("Controller/".$strController.".php")){ // Si le fichier existe
		// inclusion du bon fichier
		require_once("Controller/".$strController.".php");
		// Je construit le nom de la classe
		if (class_exists($strController)){ // Si le nom de la classe existe
			// j'instancie la classe
			$objCtrl = new $strController; // Articles_ctrl
			if (method_exists($objCtrl, $strAction)){ // Si la méthode existe dans l'objet controller
				// j'appelle la méthode
				$objCtrl->$strAction(); // $objCtrl->index();
			}else{
				echo '1';
				$boolOk	= false;
			}
		}else{
			echo '2';
			$boolOk	= false;
		}
	}else{
		echo '3';
		$boolOk	= false;
	}
	
	if ($boolOk === false){
//<<<<<<< HEAD
		require("Controller/Pages.php");
//=======
		require_once("Controller/Pages.php");
//>>>>>>> a346f08e6f180000ec5944bf089ec939af95ab1f
		$objCtrl = new Pages;
		$objCtrl->error_404();
	}
	
