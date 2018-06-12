<?php
session_start();
class user_login{
	public function in_sesion($user,$pass_user,$conn,$mss=null){
		//Usar metodo para aplicar la consulta, obtener los datos y comparar con lo datos ingresados
		//Para la consulta se toma como referencia en nombre de usuario(email) que es unico por cada usuario.
		$sql = $conn->prepare("SELECT * FROM mec_session WHERE username = :usr_l AND id_type = 1 AND id_status = 1;");
		$sql->bindParam(":usr_l", $user);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		if($row){
			if(password_verify($pass_user, $row['password'])){
				$login_is = array($row['id'],$row['username'],$row['name']." ".$row['lastname'],$row['id_type']);
				$_SESSION['is_login'] = $login_is;
				$mss = $GLOBALS['gene']->message_all(1,"OK: ","Por favor espera..</p>");
				$js_ajax=" <script type=\"text/javascript\">var ajaxr=true;</script>";
			}else{
				$mss = $GLOBALS['gene']->message_all(0,"Error: ","La contraseña es incorrecta!");
				$js_ajax="<script type=\"text/javascript\">var ajaxr=false;</script>";
			}
		}else{
			$mss = $GLOBALS['gene']->message_all(0,"Error: ","El correo electrónico no está registrado!");
			$js_ajax=" <script type=\"text/javascript\">var ajaxr=false;</script>";
		}
		return $mss.$js_ajax;
	}
	public function out_sesion(){
		if (session_destroy()) {
			return true;
		}
		return false;
	}
}
?>