<?php
class class_users{
	private $id;
	private $name;
	private $lastname;
	private $username;
	private $password;
	private $maximum_level;
	private $n_answered_questions;
	private $total_points;
	private $id_type;
	private $id_status;
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
	public function getlastname(){
		return $this->lastname;
	}

	public function setlastname($lastname){
		$this->lastname = $lastname;
	}
	public function getusername(){
		return $this->username;
	}

	public function setusername($username){
		$this->username = $username;
	}
	public function getpassword(){
		return $this->password;
	}

	public function setpassword($password){
		$this->password = $password;
	}
	public function getmaximum_level(){
		return $this->maximum_level;
	}

	public function setmaximum_level($maximum_level){
		$this->maximum_level = $maximum_level;
	}
	public function getn_answered_questions(){
		return $this->n_answered_questions;
	}

	public function setn_answered_questions($n_answered_questions){
		$this->n_answered_questions = $n_answered_questions;
	}
	public function gettotal_points(){
		return $this->total_points;
	}

	public function settotal_points($total_points){
		$this->total_points = $total_points;
	}
	public function getid_type(){
		return $this->id_type;
	}

	public function setid_type($id_type){
		$this->id_type = $id_type;
	}
	public function getid_status(){
		return $this->id_status;
	}

	public function setid_status($id_status){
		$this->id_status = $id_status;
	}

}
?>