<?php
class queries_db{
  function consultas($conn, $sql){
    $msgok = NULL;
    $msgerror = NULL;
    try {
      $conn->beginTransaction();
      $fila = $conn->exec($sql);
      if ($conn->commit()) {
        if($fila == 0){
          return 2;
        }else{
          return TRUE;
        }
      }else{
        return FALSE;
      }
    }catch (Exception $exc) {
      $conn->rollBack();
      $GLOBALS['gene']->createLog($_SERVER['SCRIPT_NAME'],"Description: Error: impossible to execute SQL.\nSQL: ".$sql."\nPHP: ".$exc->getMessage());
      return FALSE;
    }
  }
  function selects($conn, $sql){
    $return_d = "";
    try {
      $data = $conn->query(trim($sql));
      if ($data) {
        $data->setFetchMode(PDO::FETCH_ASSOC);
        $return_d = $data->fetchAll();
      }else{
        $error = $conn->errorInfo();
        echo "Query error: ".$GLOBALS['gene']->createLog($_SERVER['SCRIPT_NAME'],"Error code SQLSTATE: ".$error[0].".\n--Driver-specific error code: ".$error[1].".\n--Error message: ".$error[2]);
      }
    }catch (Exception $exc) {
      $GLOBALS['gene']->createLog($_SERVER['SCRIPT_NAME'],"SQL: ".$sql." PHP: ".$exc->getMessage());
      return $GLOBALS['gene']->message_all(0,"","The data could not be consulted.");
    }
    return $return_d;
  }
}
?>