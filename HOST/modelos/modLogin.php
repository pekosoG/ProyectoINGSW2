<?php
/**
 * Modelo del Login
 */
class modLogin{
	public $username;
	public $type;
	public $name;
	public $db_driver;

	function __construct(){
		require_once("DataBase.php");
		$this->db_driver = DataBase::singleton()->db_driver;
	}
	
	/**
	 * Funcion encargada de verificar si existe la sesion
	 * @param $user (String con el user)
	 * @param $pass (String con el pass[sin SHA1])
	 * @param $tipo (String con 1->establecimiento, 10->Admin){0 default}
	 * @return TRUE o FALSE si se logró iniciar sesion
	 */
	function loggeador($user,$pass,$tipo='0'){
		$ok=false;
		$res=$this->db_driver->query("SELECT pass,tipo FROM usuario WHERE username='$user'");
		
		while($a = $res->fetch_assoc()){
			var_dump($a);
			if(strcmp($a['tipo'],$tipo)==0)
				if(strcmp($a['pass'],$pass)==0)
					$ok=true;
		}
		if($ok===true){
			session_start();
			$_SESSION['user']=$user;
			$_SESSION['tipo']=$tipo;
		}
		return $ok;
	}	
}
?>