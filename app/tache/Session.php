<?php
namespace app\tache;

class Session{
	private static $instance;
	public static function get_instance(){
		if(is_null(self::$instance)){
			self::$instance=new Session();
		}
		return self::$instance;
	}
	
	
	public function session_securise_pour_admin($app){
		if(isset($_SESSION['admin_token'])){
			$coords=$app->get_table('admin')->get_admin_session($_SESSION['admin_token']['email'], $_SESSION['admin_token']['password']);
			if($coords){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function session_securise_pour_user($app){
		if(isset($_SESSION['user_token'])){
			$user=$app->get_table('user')->get_user_with_email_password($_SESSION['user_token']['email'], $_SESSION['user_token']['password']);
			if($user){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
		
}
?>