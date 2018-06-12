<?php
require_once('../config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_validations/generate_validations.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
require_once('../settings.php');
require_once("../class/class_categories.php");
require_once("../model/model_save.php");
require_once("../model/model_update.php");
require_once("../model/model_delete.php");
$conn = new connection();
$validate = new generate_validations();
$sql_q = new queries_db();
$instant = new model_save();
$instant_upd = new model_update();
$instant_del = new model_delete();
$class_inst = new class_categories();
$e=null;
if($is_session_log){
	if (isset($_GET['e'])) {
		$e=$validate->xss_injet($_GET['e'],"urllower");
	}
	switch ($e){
		case 'save':
			if($_POST):
				if ($validate->var_validations($_POST['txtcategoria']) && $validate->var_validations($_POST['SlsTcategory'])){
					$class_inst->setdescription($_POST['txtcategoria']);
					$class_inst->setid_type_category($_POST['SlsTcategory']);
					$objVal = array(
						$class_inst->getdescription(),
						$class_inst->getid_type_category()
					);
					$query="mec_categories(description,id_type_category)";
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
				if ($validate->var_validations($_POST['txtId']) && $validate->var_validations($_POST['txtcategoria']) && $validate->var_validations($_POST['slcTca'])){
					$class_inst->setid($_POST['txtId']);
					$class_inst->setdescription($_POST['txtcategoria']);
					$class_inst->setid_type_category($_POST['slcTca']);
					$objVal = array(
						$class_inst->getid(),
						$class_inst->getdescription(),
						$class_inst->getid_type_category()
					);
					$fields= array("id","description","id_type_category");
					$result = $instant_upd->editData("mec_categories",$conn,$fields,$objVal);
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
		case 'delete':
			if($_POST):
				if ($validate->var_validations($_POST['del_id'])){
					$result = $instant_del->deleteData($conn,"mec_categories",$_POST['del_id']);
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