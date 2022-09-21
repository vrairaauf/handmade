<div>
	<?php
	$app=App::get_instance();
$session= app\tache\session::get_instance();
if(!$session->session_securise_pour_admin($app)){
	header('location: index.php');
}
	$erreur['erreur']="";
if(isset($_POST['submit'])){
	foreach($_POST as $k=>$v){
		if(empty($v)){
		$erreur['erreur']='completer votre '.$k;			
		}
	}
	if($erreur['erreur']===""){
		$app=App::get_instance();
		//onsertion de prodiuts
		$ajout=$app->get_table('produit')->ajouter_produit($_POST['titre'], $_POST['description'], $_POST['prix']);
		$dernier_prod=$app->get_table('produit')->last_produit($_POST['titre'], $_POST['description']);
		//
		$gestion_image=app\tache\GestionImage::get_instance();
		$id_prod=$dernier_prod->id_prod;
		for($i=0;$i<count($_FILES['image']['name']);$i++){
		$extension=explode('.', $_FILES['image']['name'][$i]);
		
		
		$d=microtime();
		
		$d=str_replace(' ', 'resp', $d);
		$d.='.'.$extension[1];
		
		$name=$d;
		
		$tmp_name=$_FILES['image']['tmp_name'][$i];
		$image=$app->get_table('produit')->insert_image($name, $id_prod);
		$name=str_replace('/', '', $name);
		move_uploaded_file($tmp_name, '../app/views/membre/image/'.$name);
		$gestion_image->redimmensionner('../app/views/membre/image/'.$name, '../app/views/membre/image/final/'.$name, 250, 160, 100);
	}
	}
}
	?>
	<form method="post" enctype="multipart/form-data">
		<p><input type="text" name="titre" placeholder="titre produit"></p>
		<p><textarea cols="80" rows="6" name="description"></textarea></p>
		<p><input type="number" name="prix" placeholder="prix"></p>
		<p>images<input type="file" name="image[]" multiple="on"></p>
		<p><input type="submit" name="submit" value="submit"></p>
	</form>
</div>