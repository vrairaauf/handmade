<?php
if(isset($_POST['submit'])){
	if(!empty($_POST['email']) AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) AND !empty($_POST['password'])){
		$app=App::get_instance();
		$auth=$app->get_table('admin')->admin_auth($_POST['email'], $_POST['password']);
		if($auth){
			$_SESSION['admin_token']=array('id'=>$auth->id_admin, 'email'=>$auth->email_admin, 'password'=>$auth->password);
			header('location: ?p=dashbord');
		}
	}
}
?>
<div>
	<form method="post">
		<p><input type="email" name="email" placeholder="email"></p>
		<p><input type="password" name="password" placeholder="password"></p>
		<p><input type="submit" name="submit" value="submit"></p>
	</form>
</div>