<?php
require_once('../config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_session/generate_session.php");
require_once(MODULES."/generate_validations/generate_validations.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
$conn = new connection();
$validate = new generate_validations();
$sql_q = new queries_db();
$session = new user_login;
$e=null;
if (isset($_GET['e'])) {
	$e=$validate->xss_injet($_GET['e'],"urllower");
}
switch ($e) {
	case 'login':
		if($_POST):
			if ($validate->var_validations($_GET['e']) && $validate->var_validations($_POST['txtemail']) && $validate->var_validations($_POST['txtpassword'])){		
				$user_xss=$validate->xss_injet($_REQUEST['txtemail'],"mail");
				$pass_xss=$validate->xss_injet($_REQUEST['txtpassword'],"pass");
				print $session->in_sesion($user_xss,$pass_xss,$conn);
			}else{
				print $GLOBALS['gene']->message_all(0,"Error: ","Empty or incorrect fields!");
			}
		else:
			echo "The form contains errors";
		endif;
	break;
	case 'logout':
		if ($session->out_sesion()) {
			header("Location: session");
		}else{
			echo "No se pudo cerrar";
		}
	break;
	//Logout del jugador
	case 'logoutgame':
		if ($session->out_sesion()) {
			header("Location: start-game");
		}else{
			echo "No se pudo cerrar";
		}
	break;
	default:
		print $GLOBALS['gene']->message_all(0,"Error: ","no actions available!");
	break;
}
?>