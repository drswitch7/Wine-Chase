<?php

require('libs/functions.php');
$sm = new Access;
//var_dump($_SESSION['@admin@']); die;
if(isset($_SESSION['@member@'])){$sm->logout($_SESSION['@member@']);}elseif(isset($_SESSION['@admin@'])){ $sm->logout($_SESSION['@admin@']); }else{
	session_destroy(); 
	header('Location:index.php');
}

?>