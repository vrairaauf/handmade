<?php
namespace app\Entity;
use core\Entity\Entity;
class ProduitEntity extends Entity{
	public function lien(){
		return '<a href="?p=details&sl='.$this->slogan_prod.'">'.$this->titre_prod.'</a>';
	}
	public function affiche_titre(){
		echo '<h4><strong>'.$this->lien().'</strong></h4>';
	}
	public function get_extrai(){
		$extrai=substr($this->description_prod, 0, 100);
		echo '<p>'.$extrai.'<br> <a href="?p=details&sl='.$this->slogan_prod.'">... voir la suite</a></p>';
	}
	public function affiche_image(){
		echo '<img src="'.$this->path_image.'final/'.$this->nom_image.'">';
	}
	public function ajouter_au_panier(){
		echo '<form method="post" ><input type="hidden" name="produit_panier" value="'.$this->id_prod.'"> <br><input type="submit" name="ajout_panier" value="ajouter au panier" class="btn btn-success"></form>';
	}
	public function vers_page_connexion(){
		echo '<p><a href="?p=connexion" class="btn btn-success">ajouter au panier</a></p>';
	}
	public function get_extrai_pub(){
		$extrai=substr($this->description_prod, 0, 100);
		echo '<p>'.$extrai.'...</p>';
	}
	public function affiche_titre_pub(){
		echo '<h4><strong><a href="?p=connexion">'.$this->titre_prod.'</a></strong></h4>';
	}
	
}
?>