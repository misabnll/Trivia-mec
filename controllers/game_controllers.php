<?php
require_once('../config.php');
require_once(MODULES."/generate_info/generate_info.php");
require_once(MODULES."/generate_validations/generate_validations.php");
require_once(CONNECTION."/connection_class.php");
require_once(CONNECTION."/db_class.php");
require_once('../settings.php');
require_once("../class/class_users.php");
require_once("../class/class_records.php");
require_once("../model/model_save.php");
require_once("../model/model_update.php");
require_once("../model/model_delete.php");
$conn = new connection();
$validate = new generate_validations();
$sql_q = new queries_db();
$instant = new model_save();
$instant_upd = new model_update();
$instant_del = new model_delete();
$class_inst = new class_users();
$class_rec = new class_records();
$e=null;
if (isset($_GET['e'])) {
	$e=$validate->xss_injet($_GET['e'],"urllower");
}
function sessionGame($username,$categorías,$data,$iduser=NULL){
	$_SESSION['user_game'] = $username;
	$_SESSION['category_game'] = $categorías;
	$_SESSION['data_query'] = $data;
	$_SESSION['iduser'] = $iduser;
	$_SESSION['start_date'] = date('Y-m-d h-i-s', time());
}
switch ($e){
	case 'start':
		if($_POST):
			if ($validate->var_validations($_POST['txtemail']) && $validate->var_validations($_POST['slcC'])){
				$user_xss=$validate->xss_injet($_POST['txtemail'],"mail");
				if (count($_POST['slcC'])==5) {
					$sql = $conn->prepare("SELECT * FROM mec_session WHERE username = :usr_l;");
					$sql->bindParam(":usr_l", $user_xss);
					$sql->execute();
					$row = $sql->fetch(PDO::FETCH_ASSOC);
					if (is_array($_POST['slcC'])) {
						$cat=$_POST['slcC'];
						$sql = "SELECT mq.id,mq.description AS 'Pregunta', cc.description AS 'Categoría', ll.description AS 'Nivel' FROM mec_questions AS mq INNER JOIN mec_categories AS cc ON mq.id_category=cc.id INNER JOIN mec_levels AS ll ON mq.id_levels=ll.id WHERE mq.id_status=1 AND mq.id_category = $cat[0] OR mq.id_category = $cat[1] OR mq.id_category = $cat[2] OR mq.id_category = $cat[3] OR mq.id_category = $cat[4] ORDER BY RAND() LIMIT 0, 20;";
	                	$data1 = $sql_q->selects($conn, $sql);
						if($row){
							sessionGame($user_xss,$_POST['slcC'],$data1,$row['id']);
							print $GLOBALS['gene']->message_all(1,"OK: ","Bienvenido nuevamente...");
								echo "<script type=\"text/javascript\">setTimeout(\"location.href = 'game';\", 1000);</script>";
						}else{
							$class_inst->setusername($user_xss);
							$objVal = array(
								$class_inst->getusername()
							);
							$query="mec_session(username)";
							$result=$instant->saveData($query,$conn,$objVal);
							if ($result==0) {
								print $GLOBALS['gene']->message_all(0,"Error: ","imposible guardar.");
							}elseif ($result==1) {
								sessionGame($user_xss,$_POST['slcC'],$data1);
								print $GLOBALS['gene']->message_all(1,"OK: ","Espere por favor...");
								echo "<script type=\"text/javascript\">setTimeout(\"location.href = 'game';\", 1000);</script>";
							}elseif($result==2){
								print $GLOBALS['gene']->message_all(1,"","Sin cambios");
							}
						}
					}else{
						print $GLOBALS['gene']->message_all(0,"Error: ","Error fatal!");
					}
				}else{
					print $GLOBALS['gene']->message_all(0,"Error: ","Se requieren 5 categorías!");
				}
			}else{
				print $GLOBALS['gene']->message_all(0,"Error: ","Campos vacíos o incorrectos!");
			}
		else:
			echo "El formulario contiene errores";
		endif;
	break;
	case 'finish':
		if($_POST):
			if(isset($_SESSION['user_game']) && !empty($_SESSION['user_game'])){
				$questions_list=array();
				$answers_list=array();
				for ($i=1; $i < 21; $i++) {
					if (isset($_POST['questions'.$i]) && !empty($_POST['questions'.$i])) {
						array_push($questions_list, $_POST['questions'.$i]);
					}
					if (isset($_POST['answers'.$i]) && !empty($_POST['answers'.$i])) {
						array_push($answers_list, $_POST['answers'.$i]);
					}
				}
				if (count($questions_list) ==20 && count($answers_list)==20) {
					$comas_questions = implode(",",$questions_list);
					$comas_answers = implode(",",$answers_list);

					$sql = $conn->prepare("SELECT id FROM mec_session WHERE username = :usr_l;");
					$sql->bindParam(":usr_l", $_SESSION['user_game']);
					$sql->execute();
					$row = $sql->fetch(PDO::FETCH_ASSOC);

					$class_rec->setid_users($row['id']);
					$class_rec->setstart_date($_SESSION['start_date']);
					$class_rec->setfinal_date(date('Y-m-d h-i-s', time()));
					$class_rec->setall_questions($comas_questions);
					$class_rec->setall_answers($comas_answers);
					$objVal = array(
						$class_rec->getid_users(),
						$class_rec->getstart_date(),
						$class_rec->getfinal_date(),
						$class_rec->getall_questions(),
						$class_rec->getall_answers()
					);
					$query="mec_records(id_users,start_date,final_date,all_questions,all_answers)";
					$result=$instant->saveData($query,$conn,$objVal);
					if ($result==0) {
						print $GLOBALS['gene']->message_all(0,"Error: ","imposible guardar.");
					}elseif ($result==1) {
						print $GLOBALS['gene']->message_all(1,"OK: ","Espere por favor...");
						echo "<script type=\"text/javascript\">setTimeout(\"location.href = 'my-scores';\", 1000);</script>";
					}elseif($result==2){
						print $GLOBALS['gene']->message_all(1,"","Sin cambios");
					}
				}else{
					print $GLOBALS['gene']->message_all(0,"Error: ","Hay preguntas sin respuesta");
				}
			}else{
				print $GLOBALS['gene']->message_all(0,"Error: ","Tu sesión ha caducado!");
			}
		else:
			print $GLOBALS['gene']->message_all(0,"Error: ","El formulario contiene errores");
		endif;
	break;
	default:
		print $GLOBALS['gene']->message_all(0,"Error: ","No hay acciones disponibles!");
	break;
}
?>