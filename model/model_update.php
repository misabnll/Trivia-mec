<?php
//Clase para funciones basicas de guardar, modificar y eliminar
class model_update{	
	public function editData($table,$conn,$fields,$objVal){
		$array_val=array();
		$sql_q = new queries_db();
		$variableSql = "UPDATE $table SET ";
		for ($i=1; $i < count($fields); $i++) {
			array_push($array_val, "$fields[$i] = '$objVal[$i]'");			
		}
		$comas_val = implode(",",$array_val);
		$variableSql .= $comas_val;		
		$variableSql .= " WHERE $fields[0] = '$objVal[0]';";
		$result = $sql_q->consultas($conn,$variableSql);
		$GLOBALS['gene']->createLog("SCRIPT_NAME: ".$_SERVER['SCRIPT_NAME']."\n--HTTP_REFERER: ".$_SERVER['HTTP_REFERER']."\n--REMOTE_ADDR: ".$_SERVER['REMOTE_ADDR'],"SQL: ".$variableSql."\n--Status: ".strip_tags($result));
		return $result;
	}
}
?>