<?php
class model_delete{
	public function deleteData($conn,$table,$id){
		$sql_q = new queries_db();
		$sql = "DELETE FROM $table WHERE id = ".$id.";";
		$result = $sql_q->consultas($conn,$sql);
		$GLOBALS['gene']->createLog("SCRIPT_NAME: ".$_SERVER['SCRIPT_NAME']."\n--HTTP_REFERER: ".$_SERVER['HTTP_REFERER']."\n--REMOTE_ADDR: ".$_SERVER['REMOTE_ADDR'],"SQL: ".$sql."\n--Status: ".strip_tags($result));
		return $result;
	}
}
?>