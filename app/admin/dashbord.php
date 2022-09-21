<?php
$app=App::get_instance();
$session= app\tache\session::get_instance();
if(!$session->session_securise_pour_admin($app)){
	header('location: index.php');
}
//____________________________
echo '<p><a href="admin.php?p=ajouter_prod">ajouter des produits</a></p>';
echo '<p><a href="admin.php?p=deconnexion">deconnexion</a></p>';
?>