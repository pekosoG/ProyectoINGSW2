<?php
include 'ctrlEstandard.php';

class ctrlAdmin extends ctrlEstandard{
	private $modelo;
	
	function __construct(){
		require_once("modelos/modAdmin.php");
		$this->modelo=new modAdmin();
	}
	
	function ejecutar(){
		if(!isset($_POST['act']))
			die('Actividad no Encontrada</br>');
		else{
			if(preg_match('/^[a-z]+$/',$_POST['act'])===0)
				die("Act Rechazado!</br>");
			else{
				switch ($_POST['act']) {
					case 'login':
						if(!$this->login())
							die('Bad Login</br>');
						break;
					case 'logout':
						$this->logout();
						break;
					
					default:
						die('Error con la Activdad');
						break;
				}
			}
		}
	}
}
?>
