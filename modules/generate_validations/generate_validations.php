<?php
class generate_validations{
	function var_validations($varial){
		if(isset($varial) && !empty($varial)){
			return true;
		}else{
			return false;
		}
	}
	function xss_injet($var,$type){
		$caracteres_malos = array("<", ">", "%", "&","'","/","=","\"","\\","*"," ");
      	$free_xss = str_replace($caracteres_malos, "", $var);
      	switch ($type) {
      		//Validación sencilla de para correo
      		case 'mail':
                        $mail = strtolower($free_xss);
      			if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
			  		return $mail;
			  	}else{
			  		return "Error en formato";
			  	}
      		break;
      		//validación sencilla para solo cadeta de texto
      		case 'urllower':
                        $urllower = strtolower($free_xss);
      			if (ctype_lower($urllower)) {
      				return $urllower;
      			}else{
      				return "Cadena debe ser solo texto";
      			}
      		break;
      		//validación sencilla para solo cadena que de numeros y letras. Formato de clave
      		case 'pass':
                        if (ctype_alnum($free_xss)) {
                              return $free_xss;
                        }else{
                              return "Cadena debe ser alfa-numericos";
                        }
                  break;
                  case 'int':
      			if(filter_var($free_xss, FILTER_VALIDATE_INT)){
                              return $free_xss;
                        }else{
                              return "Error en formato";
                        }
      		break;
      		default:
      			# code...
      		break;
      	}
	}
}
?>