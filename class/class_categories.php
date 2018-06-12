<?php
class class_categories{
	private $id;
	private $description;
	private $id_type_category;
	//Métodos set y get para encapsulamiento
	public function getid(){
		return $this->id;
	}

	public function setid($id){
		$this->id = $id;
	}
	public function getdescription(){
		return $this->description;
	}

	public function setdescription($description){
		$this->description = $description;
	}
	public function getid_type_category(){
		return $this->id_type_category;
	}

	public function setid_type_category($id_type_category){
		$this->id_type_category = $id_type_category;
	}

}
?>