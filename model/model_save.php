<?php
class model_save{
	public function saveData($query,$conn,$objVal,$copy=0){
		$sql_q = new queries_db();
		$variableSql = "INSERT INTO $query";
		if ($copy==1) {
			$variableSql="INSERT INTO $query ($objVal)";
		}else{
			$variableSql .= " VALUES(";
			$array_val=array();
			for ($i=0; $i < count($objVal); $i++) {
				array_push($array_val, "\"".$objVal[$i]."\"");
			}
			$comas_val = implode(",",$array_val);
			$variableSql .= "".$comas_val.");";
		}
		$result = $sql_q->consultas($conn,$variableSql);
		$GLOBALS['gene']->createLog("SCRIPT_NAME: ".$_SERVER['SCRIPT_NAME']."\n--HTTP_REFERER: ".$_SERVER['HTTP_REFERER']."\n--REMOTE_ADDR: ".$_SERVER['REMOTE_ADDR'],"SQL: ".$variableSql."\n--Status: ".strip_tags($result));		
		return $result;
	}
}
?>