<?php

echo 'Wassssup';

if(isset($_POST)){
	if(isset($_POST['ctrl'])){
		if(preg_match('/^[a-z]+$/',$_POST['ctrl'])===0)
			die("Ctrl Rechazado!");
		else{
			$control=NULL;
			switch ($_POST['ctrl']) {
				case 'admin':
					require_once('controladores/ctrlAdmin.php');
					$control=new ctrlAdmin();
					break;
				default:
					die('Bad Controls');
					break;
			}
			$control->ejecutar();
		}
		
	}	
}
?>