<?php
require_once('../libs/functions.php');
@$utl= new Operate;
@$user= new UserEnd;

if(isset($_POST['id'])){
    $div=explode('$',$_POST['id']);
    $col=$div[0];
    $id=$div[1];
    $val=$_POST['value'];    
   $go=$user->InlineEdit($col,$val,$id);    
    echo $go;
}


if(isset($_POST['userid'])){ echo $_POST['userid']; die;
	$utl->AjaxDelete($_POST['userid']);
	echo 'ok';
}

if(isset($_POST['DelGoal'])){ $utl->AjaxDeleteGoalSet($_POST['DelGoal']);echo 'ok';}

if(isset($_POST['delforum'])){ $utl->AjaxDeleteForumPosted($_POST['delforum']);echo 'ok';}

if(isset($_POST['user'])){ $user->ForumReply($_POST['divid'],$_POST['user'],$_POST['comet']); echo 'ok';}

if(isset($_POST['delFBack'])){ $utl->AjaxRemoveFeedBack($_POST['delFBack']);echo 'ok';}

if(isset($_POST['delforumRP'])){ $utl->AjaxDeleteForumReply($_POST['delforumRP']);echo 'ok';}


?>