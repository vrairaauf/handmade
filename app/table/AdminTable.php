<?php
namespace app\table;
use core\table\Table;
class AdminTable extends table{
	
public function admin_auth($email, $password){
	return $this->create_req("SELECT * FROM admin WHERE email_admin=? AND password=?", [$email, sha1($password)], true);
}
public function deconnexion(){
	unset($_SESSION['admin_token']);
	header('location: index.php');
}
public function get_admin_session($email, $password){
	return $this->create_req('SELECT * FROM admin WHERE email_admin=? AND password=?', [$email, $password], true);
}
}
?>