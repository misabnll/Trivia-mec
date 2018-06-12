<?php
@$GLOBALS['gene'] = new generate_info();
/**
* Clase para establecer conexión con el servidor de Base de datos MYSQL
*/
class connection extends PDO {
  private $type_db = 'mysql';
  private $host = DB_HOST;
  private $db_name = DB_NAME;
  private $user_db = DB_USER;
  private $password_db = DB_PASSWORD;
  private $charset_db = DB_CHARSET;
  public function __construct(){
    try{
      parent::__construct($this->type_db.':host='.$this->host.';dbname='.$this->db_name, $this->user_db, $this->password_db, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
    }catch(PDOException $e){
      echo "Connection error: ".$GLOBALS['gene']->createLog($_SERVER['SCRIPT_NAME'],"Error, code: ".$e->getCode()." Description: ".$e->getMessage());
      exit;
    }
	}
}
?>