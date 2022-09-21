<?php
namespace app\table;
use core\table\Table;
class MenuTable extends table{
	public function menu(){
		return $this->create_req("SELECT * FROM menu_site");
	}
	public function membre_menu(){
		return $this->create_req("SELECT * FROM membre_menu");
	}

}
?>