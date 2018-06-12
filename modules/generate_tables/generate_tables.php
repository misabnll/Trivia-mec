<?php
class generate_tables
{
	function print_table($obj,$form,$style,$edit,$id_table,$tr_class){
	    if ($obj != NULL) {
	      if (is_array($obj)) {
	        $tabla = "<table width=\"100%\" class=\"$style\" id=\"".$id_table."\">";
	        $tabla .= "<thead><tr class='".$tr_class."'>";
	        $indice = array();
	        foreach (array_keys($obj[0]) as $value) {
	          array_push($indice, $value);
	          $tabla .= "<th class=\"text-center\">";
	          $tabla .= $value;
	          $tabla .= "</th>";
	        }
	        if($edit == 1){
	          $tabla .= "<th class=\"text-center\">Editar</th><th class=\"text-center\">Eliminar</th>";
	        }elseif($edit == 2){
	        	$tabla .= "<th class=\"text-center\">Editar</th>";
	        }
	        $tabla .= "</tr></thead>";
	        //Tfoot para search de datatable
	        $tabla .= "<tfoot><tr class='".$tr_class."'>";
	        foreach ($indice as $value){
	        	$tabla .= "<th>";
	          	$tabla .= $value;
	          	$tabla .= "</th>";
	        }
	        if($edit == 1){
	        	$tabla .= "<td></td>";
	        	$tabla .= "<td></td>";
	        }elseif($edit == 2){
	        	$tabla .= "<td></td>";
	        }
	        $tabla .= "</tr></tfoot>";
	        $tabla .= "<tbody>";
	        foreach ($obj as $datos) {
	        	//var_dump($datos);
	        	$tabla .= "<tr>";
		        foreach ($datos as $registro) {
		            $tabla .= "<td class=\"text-center\">";
		            $tabla .= $registro;
		            $tabla .="</td>";
		        }
		        if($edit == 1){
		            $tabla .= "<td class=\"text-center\"><a href=\"edit-".strtolower($form)."?e=".$datos[$indice[0]]."\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a></td>";
		            $tabla .= "<td class=\"text-center\"><a href=\"#\" id=\"".$datos[$indice[0]]."\" class=\"delete-link\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></td>";
		        }elseif ($edit == 2) {
		        	$tabla .= "<td class=\"text-center\"><a href=\"edit-".strtolower($form)."?e=".$datos[$indice[0]]."\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a></td>";
		        }
		        $tabla .="</tr>";
		    }
	        $tabla .="</tbody></table>";
	      }else{
	        $tabla = "Debe pasarse un arreglo como parámetro";
	      }
	    }else {
	      $tabla = "No hay registros que mostrar";
	    }
	    return $tabla;
	}
	function table_desing($link){
		$html=null;
		switch ($link) {
			case 'head':
				$html = "<!-- DataTables CSS -->\n<link href=\"themes/default-core/vendor/datatables-plugins/dataTables.bootstrap.css\" rel=\"stylesheet\">\n";
				$html .= "<!-- DataTables Responsive CSS -->\n<link href=\"themes/default-core/vendor/datatables-responsive/dataTables.responsive.css\" rel=\"stylesheet\">";
			break;
			case 'foot':
				$html = "<!-- DataTables JavaScript -->\n<script src=\"themes/default-core/vendor/datatables/js/jquery.dataTables.min.js\"></script>\n";
				$html .= "<script src=\"themes/default-core/vendor/datatables-plugins/dataTables.bootstrap.min.js\"></script>\n";
				$html .= "<script src=\"themes/default-core/vendor/datatables-plugins/dataTables.colResize.js\"></script>\n";
				$html .= "<script src=\"themes/default-core/vendor/datatables-responsive/dataTables.responsive.js\"></script>";
			break;
			default:
				$html = "<!--No hay html que mostrar-->";
			break;
		}
		return $html;
	}
	//Funcion en desarrollo
	function form_input($type,$name,$class,$id,$required,$placeholder,$value,$maxlength,$other,$multi=""){
		switch ($type) {
			//Si es text todo es plano
			case 'text':
				$form_input = "<input class=\"".$class."\" type=\"".$type."\" name=\"".$name."\" id=\"".$id."\" ".$required." placeholder=\"".$placeholder."\" value=\"".$value."\" maxlength=\"".$maxlength."\" ".$other.">";
			break;
			case 'password':
				$form_input = "<input class=\"".$class."\" type=\"".$type."\" name=\"".$name."\" id=\"".$id."\" ".$required." placeholder=\"".$placeholder."\" value=\"".$value."\" maxlength=\"".$maxlength."\" ".$other.">";
			break;
			case 'email':
				$form_input = "<input class=\"".$class."\" type=\"".$type."\" name=\"".$name."\" id=\"".$id."\" ".$required." placeholder=\"".$placeholder."\" value=\"".$value."\" maxlength=\"".$maxlength."\" ".$other.">";
			break;
			//Si es input hidden
			case 'hidden':
				$form_input = "<input class=\"".$class."\" type=\"".$type."\" name=\"".$name."\" id=\"".$id."\" value=\"".$value."\" maxlength=\"".$maxlength."\" ".$other.">";
			break;
			//Si es un textarea
			case 'textarea':
				$form_input = "<textarea class=\"".$class."\" name=\"".$name."\" id=\"".$id."\" placeholder=\"".$placeholder."\" maxlength=\"".$maxlength."\" ".$other.">".$value."</textarea>";
			break;
			//Si es select se recibe un array que seran los option
			case 'select':
				if ($value != NULL) {
					$form_input = "<select ".$multi." name=\"".$name."\" class=\"".$class."\" id=\"".$id."\" ".$required.">";
					if (isset($other) && !empty($other)) {
						$form_input.=$other;
					}else{
						$form_input.="<option value=\"\">Select</option>";
					}
					//Se separan los indices del array recibido, teniendo en cuenta que en indice 0 es el value que
					//se tomara y el indice 2 es la opcion que se mostrar, esto debe de coincidir.
					$indice = array();
			        foreach (array_keys($value[0]) as $val) {
			        	array_push($indice, $val);
			        }
					foreach ($value as $vart) {
						$form_input .= "<option value=\"".$vart[$indice[0]]."\">".$vart[$indice[1]]."</option>";
					}
					$form_input .= "</select>";
				}else{
					if (isset($other) && !empty($other)) {
						$form_input = "<select ".$multi." name=\"".$name."\" class=\"".$class."\" id=\"".$id."\" ".$required.">";
						$form_input.=$other;
						$form_input .= "</select>";
					}else{
						$form_input = "No data to display";
					}
				}
			break;
			default:
				print("Error, sin opciones seleccionadas!");
			break;
		}
		return @$form_input;
	}
}
?>