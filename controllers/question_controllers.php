<?php
require_once('../config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_validations/generate_validations.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
require_once('../settings.php');
require_once("../class/class_questions.php");
require_once("../model/model_save.php");
require_once("../model/model_update.php");
require_once("../model/model_delete.php");
$conn = new connection();
$validate = new generate_validations();
$sql_q = new queries_db();
$instant = new model_save();
$instant_upd = new model_update();
$instant_del = new model_delete();
$class_inst = new class_questions();
$e=null;
if($is_session_log){
	if (isset($_GET['e'])) {
		$e=$validate->xss_injet($_GET['e'],"urllower");
	}
	switch ($e){
		case 'save':
			if($_POST):
				if ($validate->var_validations($_POST['slcCategory']) && $validate->var_validations($_POST['txtDescription']) && $validate->var_validations($_POST['slcNivel'])){
					$class_inst->setdescription($_POST['txtDescription']);
					$class_inst->setidcategory($_POST['slcCategory']);
					$class_inst->setidlevels($_POST['slcNivel']);
					$objVal = array(
						$class_inst->getdescription(),
						$class_inst->getidcategory(),
						$class_inst->getidlevels()
					);
					$query="mec_questions(description,id_category,id_levels)";
					$result=$instant->saveData($query,$conn,$objVal);
					if ($result==0) {
						print $GLOBALS['gene']->message_all(0,"Error: ","imposible guardar.");
					}elseif ($result==1) {
						print $GLOBALS['gene']->message_all(1,"OK ","");
					}elseif($result==2){
						print $GLOBALS['gene']->message_all(1,"","Sin cambios");
					}
				}else{
					print $GLOBALS['gene']->message_all(0,"Error: ","Campos vacíos o incorrectos!");
				}
			else:
				echo "El formulario contiene errores";
			endif;
		break;
		case 'edit':
			if($_POST):
				if ($validate->var_validations($_POST['txtId']) && $validate->var_validations($_POST['slcCategory']) && $validate->var_validations($_POST['txtDescription']) && $validate->var_validations($_POST['slcNivel'])){
					$class_inst->setid($_POST['txtId']);
					$class_inst->setdescription($_POST['txtDescription']);
					$class_inst->setidcategory($_POST['slcCategory']);
					$class_inst->setidlevels($_POST['slcNivel']);
					$objVal = array(
						$class_inst->getid(),
						$class_inst->getdescription(),
						$class_inst->getidcategory(),
						$class_inst->getidlevels()
					);
					$fields= array("id","description","id_category","id_levels");
					$result = $instant_upd->editData("mec_questions",$conn,$fields,$objVal);
					if ($result==0) {
						print $GLOBALS['gene']->message_all(0,"Error: ","imposible actualizar.");
					}elseif ($result==1) {
						print $GLOBALS['gene']->message_all(1,"OK ","");
					}elseif($result==2){
						print $GLOBALS['gene']->message_all(1,"","Sin cambios");
					}
				}else{
					print $GLOBALS['gene']->message_all(0,"Error: ","Campos vacíos o incorrectos!");
				}
			else:
				echo "El formulario contiene errores";
			endif;
		break;
		case 'states':
			if($_POST):
				if ($validate->var_validations($_REQUEST['id']) && $validate->var_validations($_REQUEST['est'])){
					$class_inst->setid($_REQUEST['id']);
					$class_inst->setidstatus($_REQUEST['est']);
					$objVal = array(
						$class_inst->getid(),
						$class_inst->getidstatus());
					$fields= array("id","id_status");
					$result=$instant_upd->editData("mec_questions",$conn,$fields,$objVal);
					if ($result==0) {
						print $GLOBALS['gene']->message_all(0,"Error","");
					}elseif ($result==1) {
						print $GLOBALS['gene']->message_all(1,"OK ","");
					}elseif($result==2){
						print $GLOBALS['gene']->message_all(1,"","No change has been made.");
					}
				}else{
					print $GLOBALS['gene']->message_all(0,"Error: ","Empty or incorrect fields!");
				}
			else:
				echo "El formulario contiene errores";
			endif;
		break;
		case 'delete':
			if($_POST):
				if ($validate->var_validations($_POST['del_id'])){
					$result = $instant_del->deleteData($conn,"mec_questions",$_POST['del_id']);
					if ($result==0) {
						print $GLOBALS['gene']->message_all(0,"Error: ","imposible eliminar.");
					}elseif ($result==1) {
						print $GLOBALS['gene']->message_all(1,"OK ","<script>var ajaxr=true;</script>");
					}elseif($result==2){
						print $GLOBALS['gene']->message_all(1,"","Sin cambios.");
					}
				}else{
					print $GLOBALS['gene']->message_all(0,"Error: ","Campos vacíos o incorrectos!");
				}
			else:
				echo "El formulario contiene errores";
			endif;
		break;
		default:
			print $GLOBALS['gene']->message_all(0,"Error: ","No hay acciones disponibles!");
		break;
	}
}else{
	print $GLOBALS['gene']->message_all(0,"Error: ","Tu sesión ha caducado!");
}
?>