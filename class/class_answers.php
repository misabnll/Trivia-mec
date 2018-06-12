<?php
class class_answers{
	private $id;
	private $idquestions;
	private $literal;
	private $description;
	private $correct;
	//Métodos set y get para encapsulamiento
	public function getid(){
		return $this->id;
	}

	public function setid($id){
		$this->id = $id;
	}

	public function getidquestions(){
		return $this->idquestions;
	}

	public function setidquestions($idquestions){
		$this->idquestions = $idquestions;
	}

	public function getliteral(){
		return $this->literal;
	}

	public function setliteral($literal){
		$this->literal = $literal;
	}
	public function getdescription(){
		return $this->description;
	}

	public function setdescription($description){
		$this->description = $description;
	}
	public function getcorrect(){
		return $this->correct;
	}

	public function setcorrect($correct){
		$this->correct = $correct;
	}
}
?>