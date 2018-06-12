<?php
class class_records{
	private $id;
	private $id_users;
	private $start_date;
	private $final_date;
	private $all_questions;
	private $all_answers;
	private $all_correct;
	//Métodos set y get para encapsulamiento
	public function getid(){
		return $this->id;
	}
	public function setid($id){
		$this->id = $id;
	}

	public function getid_users(){
		return $this->id_users;
	}
	public function setid_users($id_users){
		$this->id_users = $id_users;
	}

	public function getstart_date(){
		return $this->start_date;
	}
	public function setstart_date($start_date){
		$this->start_date = $start_date;
	}

	public function getfinal_date(){
		return $this->final_date;
	}
	public function setfinal_date($final_date){
		$this->final_date = $final_date;
	}

	public function getall_questions(){
		return $this->all_questions;
	}
	public function setall_questions($all_questions){
		$this->all_questions = $all_questions;
	}

	public function getall_answers(){
		return $this->all_answers;
	}
	public function setall_answers($all_answers){
		$this->all_answers = $all_answers;
	}

	public function getall_correct(){
		return $this->all_correct;
	}
	public function setall_correct($all_correct){
		$this->all_correct = $all_correct;
	}

}
?>