<?php
namespace app\table;
use core\table\Table;
class EmailTable extends table{
	public function ajout_email($email){
		$d=date('Y-m-d H:i:s');
		return $this->db->getPDO()->exec('INSERT INTO email SET email="'.$email.'", date_ajout="'.$d.'"');
	}
	

}
?>