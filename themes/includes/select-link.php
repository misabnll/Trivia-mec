<?php
require_once('../../config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_validations/generate_validations.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
$conn = new connection();
$validate = new generate_validations();
$sql_q = new queries_db();
$e=null;
if (isset($_GET['e'])) {
	$e=$validate->xss_injet($_GET['e'],"pass");
}
switch ($e) {
	case 'q1':		
		if ($_POST) {
			if ($validate->var_validations($_POST['id_art'])) {
				$data = $sql_q->selects($conn, "SELECT * FROM category WHERE id_types_art ='".$_POST['id_art']."';");
				if ($data!=null) {
					echo "<option value=\"\">Select item type</option>";
					foreach ($data as $value) {
						print "<option value=\"".$value['id']."\">".$value['name']."</option>";
					}
				}else{
					echo "<option value=\"\">No categories</option>";
				}
			}else{
				echo "No information received";
			}
		}
	break;
	case 'q2':
		if ($_POST) {
			if ($validate->var_validations($_POST['id_art'])) {
				$data = $sql_q->selects($conn, "SELECT * FROM attributes WHERE id_category ='".$_POST['id_art']."';");
				if ($data!=null) {
					echo "<option value=\"\">Select item type</option>";
					foreach ($data as $value) {
						print "<option value=\"".$value['id']."\">".$value['name_attributes']."</option>";
					}
				}else{
					echo "<option value=\"\">No attributes</option>";
				}
			}else{
				echo "No information received";
			}
		}
	break;
	case 'q3':
		if ($_POST) {
			if ($validate->var_validations($_POST['id_art'])) {
				$data = $sql_q->selects($conn, "SELECT id,name FROM category WHERE id_types_art ='".$_POST['id_art']."';");
				if ($data!=null) {
					echo "<option value=\"\">Select item type</option>";
					foreach ($data as $value) {
						print "<option value=\"".$value['id']."\">".$value['name']."</option>";
					}
				}else{
					echo "<option value=\"\">No attributes</option>";
				}
			}else{
				echo "No information received";
			}
		}
	break;
	
	default:
	
	break;
}
?>