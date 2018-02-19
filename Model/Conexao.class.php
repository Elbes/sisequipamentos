<?php
/**
 * 
 * Enter description here ...
 * @author Elbes Alves
 *
 */
class Conexao{

	public $con = null;
	public $dbType = "mysql";
	public $host = "10.86.0.8";
	public $user = "sesdf";
	public $senha = "sesdf2017";
	public $db = "db_equipamentos";
	public $persistent = false;

	public function Conexao( $persistent=false ){
		if( $persistent != false){
			$this->persistent = true;
		}
	}

	public function getConnection(){

		try{
			$this->con = new PDO($this->dbType.":host=".$this->host.";dbname=".$this->db, $this->user, $this->senha,
			array( PDO::ATTR_PERSISTENT => $this->persistent ) );
			return $this->con;
		}catch ( PDOException $ex ){ echo "Erro: ".$ex->getMessage(); }
	}

	public function Close(){
		if( $this->con != null )
		$this->con = null;
	}
}
?>