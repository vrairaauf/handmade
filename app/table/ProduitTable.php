<?php
namespace app\table;
use core\table\Table;
class ProduitTable extends table{
	public function ajouter_produit($titre, $description, $prix){
		$date=date("Y-m-d H:i:s");
		$slogan=uniqid(substr($titre, 0, 5));
		$add_product=$this->db->getPDO()->exec('INSERT INTO produits SET titre_prod="'.$titre.'", description_prod="'.$description.'", date_pub="'.$date.'", prix="'.$prix.'", slogan_prod="'.$slogan.'" ');
	}
	public function last_produit($titre, $desc){
		return $this->create_req("SELECT* FROM produits WHERE titre_prod=? AND description_prod=?", [$titre, $desc], true);
	}
	public function insert_image($nom, $id_prod){
		$add_image=$this->db->getPDO()->exec("INSERT INTO image_prod SET id_prod='".$id_prod."', nom_image='".$nom."'");
	}
	public function nb_ligne(){
		return $this->create_req('SELECT COUNT(*) AS total FROM produits WHERE est_il_vendu=?',['non'], true);
	}
	public  function produit_non_vendu($debut=0, $perpage){
		return $this->create_req('SELECT * FROM produits WHERE est_il_vendu="non" LIMIT '.$debut.', '.$perpage.'');
	}
	public function all_images_de_produits($id_prod){
		return $this->create_req('SELECT * FROM image_prod WHERE id_prod=?', [$id_prod]);
	}
	public function un_produit($sl){
		return $this->create_req('SELECT * FROM produits WHERE slogan_prod=?', [$sl], true);
	}
	public function un_produit_avec_id($id){
		return $this->create_req('SELECT * FROM produits WHERE id_prod=?', [$id], true);
	}

}
?>