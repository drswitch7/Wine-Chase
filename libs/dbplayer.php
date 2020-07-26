<?php
    @define('SITENAME','Wine Chase');
    @define('SHORTNAME','Wine Chase');
    @define('AUTHOR','CHARITY');
    @define('SERVERPAT','http://'.$_SERVER['SERVER_NAME'].'/charity/');
    @define('LOCALPAT',$_SERVER['DOCUMENT_ROOT'].'/charity/');

class connect{
	function con($db){
		try{
    $dbh = new PDO("mysql:host=localhost;dbname=$db", 'root', '',array(PDO::MYSQL_ATTR_LOCAL_INFILE => true,));
	 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
	}catch(PDOException $e){echo  $e->getMessage()."ERROR:: REMOTE CONNECTION FAILED";die();}
	}
}


?>