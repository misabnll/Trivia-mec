<?php
class generate_info{
	public function __construct(){
		$this->dir_info = FatherDir;
		$this->date_unix = date('Y-m-d(h-i-s-a)', time());
	}
	//Compueba si existe un directorio o archivo
	function file_exists_ok($url){		
		if(!file_exists($url)){
			if(mkdir($url, 0777)){
				return true;
			}else{
				return false;
			}	
	    }else{
	    	return true;
	    }
	}
	//Abre un url especifico y crea un documento de texto
	function file_open_ok($url_dest,$var_title,$var_text,$dateu){
		$fp = fopen($url_dest, 'w');
		$varsalida = $dateu;
		$varsalida .= $var_title;
		$varsalida .= $var_text;
		if(fputs($fp, $varsalida)>0){
			return true;
		}else{
			return false;
		}		
	}
	//Crea archivos de log con información útil
	function createLog($title,$valores){
		if ($this->file_exists_ok($this->dir_info."/logs")) {
			//Usar fopen para abrir y crear documentos de texto
			$aleatorio=rand(0, 100);
			if ($this->file_open_ok($this->dir_info."/logs/".$this->date_unix."-a".$aleatorio.".txt","\n--".$title,"\n--".$valores,"--Log: ".$this->date_unix)) {
				$message = "Log creado ";
			}else{
				$message = "No se puede crear el archivo de log";
			}
		}else{
			$message = "Carpeta Logs, no existe y no se puede crear(Revisar permisos).";
		}
		return $message;
	}
	//Genera mensajes(html) de confirmación(1) y de error(0)
	function message_all($type,$title,$message){
		if($type === 1){
            $alert = "<div style=\"padding:3.5px; min-height:30px; margin-bottom:0px; margin-top:5px\" class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>".$title."</strong><label>".$message."</label></div>";
      	} elseif ($type === 0){
            $alert = "<div style=\"padding:3.5px; min-height:30px; margin-bottom:0px; margin-top:5px\" class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>".$title."</strong><label>".$message."</label></div>";
      	}
      	return $alert;
	}
}
?>