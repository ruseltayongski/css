<?php

class Database_pis extends CI_Model{

	public function connectPIS(){
    	return new PDO("mysql:host=localhost;dbname=pis",'root','');
    }

    public function personal_information(){
		try{
			$db=$this->connectPIS();
			$sql="select * from personal_information";
			$pdo=$db->prepare($sql);
			$pdo->execute();
			$row=$pdo->fetchAll();
			$db=null;

			return $row;
		}
		catch(PDOException $e){
			return false;
		}
	}

}