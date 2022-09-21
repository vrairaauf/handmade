<?php
namespace app\table;
use core\table\Table;
class UserTable extends table{

	public function add_user($prenom, $email, $password){
	
		$add_user=$this->db->getPDO()->exec("INSERT INTO users SET nom_prenom='".$prenom."', email='".$email."', password='".sha1($password)."', code_verif='00000'");
	}
	public function auth_user($email, $password){
		return $this->create_req("SELECT * FROM users WHERE email=? AND password=?",[$email, sha1($password)], true);
	}
	
	public function deconnexion(){
		unset($_SESSION['user_token']);
		header('location: index.php');
	}
	public function one_user($id){
		return $this->create_req('SELECT * FROM users WHERE id_user=?', [$id], true);
	}
	public function get_user_with_email_password($email, $password){
		return $this->create_req('SELECT * FROM users WHERE email=? AND password=?',[$email, $password], true);
	}
	public function get_user_with_email($email){
		return $this->create_req('SELECT * FROM users WHERE email=?', [$email], true);
	}

}
?>