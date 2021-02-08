<?php
	//session_start();
	//if (!isset($_SESSION))
	{
	//	$Panier = new ArrayObject();
	//	$_SESSION['Panier'] = $panier;
	}
	
	$strController 	= $_GET['ctrl']??'Personnes';
	$strAction	 	= $_GET['action']??'List';

	$strController 	= ucfirst($strController);
	
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
		require_once("Controller/Pages.php");
		$objCtrl = new Pages;
		$objCtrl->error_404();
	}
	
