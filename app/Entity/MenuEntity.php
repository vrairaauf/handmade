<?php
namespace app\Entity;
use core\Entity\Entity;
class MenuEntity extends Entity{
	public function lien(){
		echo "<h4><strong><a href='?p=".$this->titre_menu."'>".$this->titre_menu."</a></strong></h4>";

	}
	public function membre_lien(){
		echo "<h4><strong><a href='?p=".$this->titre."'>".$this->titre."</a></strong></h4>";

	}

}
?>