<?php
class class_questions{
	private $id;
	private $name;
	private $description;
	private $picture;
	private $idcategory;
	private $idlevels;
	private $idstatus;
	//Métodos set y get para encapsulamiento
	public function getid(){
		return $this->id;
	}

	public function setid($id){
		$this->id = $id;
	}

	public function getname(){
		return $this->name;
	}

	public function setname($name){
		$this->name = $name;
	}

	public function getdescription(){
		return $this->description;
	}

	public function setdescription($description){
		$this->description = $description;
	}
	public function getpicture(){
		return $this->picture;
	}

	public function setpicture($picture){
		$this->picture = $picture;
	}
	public function getidcategory(){
		return $this->idcategory;
	}

	public function setidcategory($idcategory){
		$this->idcategory = $idcategory;
	}
	public function getidlevels(){
		return $this->idlevels;
	}

	public function setidlevels($idlevels){
		$this->idlevels = $idlevels;
	}
	public function getidstatus(){
		return $this->idstatus;
	}

	public function setidstatus($idstatus){
		$this->idstatus = $idstatus;
	}

}
?>