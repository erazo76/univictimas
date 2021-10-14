<?php	
//  error_reporting(E_ALL);
//  ini_set('display_errors', '1');
        @require_once('../../adodb/adodb.inc.php');
	    @require_once("conexionAdo.php");
        @require_once("baseClases.class.php");
  
	class basedatosAdoIbase
	{
		var $conn;
		var $bd;		
		function basedatosAdoIbase()
		{
                  
	        $this->bd=new conexionAdo();

                $host= '127.0.0.1';
                $port='5432';
                $dbname='app_univictimas';
                $user='postgres';
                $password='postgresbd2021';                
                                 
  						
  		$this->conn=$this->bd->conectar("postgres",$host,$user,$password,$port,$dbname);
                
                         

        }
		function select($sql)
		{
			
                       $this->conn->Execute('SET search_path TO "public"');
			$rs=$this->conn->Execute($sql);
			return $rs;
		}
		
		function selectp($sql)
		{
			$this->conn->Execute('SET search_path TO "public"');
			$rs=$this->conn->Execute($sql);
			return $rs;
		}
		
		function actualizar($sql)
		{
			$this->conn->Execute('SET search_path TO "public"');
			$this->conn->Execute($sql);
		}
		function closed()
		{
			$this->conn->Close();
		}

	}
?>
