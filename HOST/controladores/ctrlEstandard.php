<?php

class ctrlEstandard{
	
	function isLogged(){
		if(isset($_SESSION)){
			if(strcmp($_SESSION['user'],$user)==0)
				return true;
			else return false;
		}
		else return false;
	}
	
	function esEstablecimiento(){
		if(isset($_SESSION['tipo'])){
			if(strcmp($_SESSION['tipo'],'1')==0)
				return true;
			else return false;
		}else return false;
	}
	
	function esUser(){
		if(isset($_SESSION['tipo'])){
			if(strcmp($_SESSION['tipo'],'0')==0)
				return true;
			else return false;
		}else return false;
	}
	
	function esAdmin(){
		if(isset($_SESSION['tipo'])){
			if(strcmp($_SESSION['tipo'],'10')==0)
				return true;
			else return false;
		}else return false;
	}
	
	public function logout(){
		session_unset();
		session_destroy();
		setcookie(session_name(),'',time()-3600);
	}
	
	/**
	 * Funcion que se encarga de checar si se Loggea
	 */
	public function login(){
		require("modelos/modLogin.php");
		$mdl = new modLogin();
		if($mdl->loggeador($_POST['user'],$_POST['pass'],$_POST['tipo']))
			echo 'Loggeado?';
		else{
			var_dump($_POST);
			echo 'No coinciden los datos</br>';
			return false;
		}
		var_dump($_SESSION);
		return true;
	}
	
		
}
?>