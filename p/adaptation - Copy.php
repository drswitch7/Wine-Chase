<?php
require('../libs/head.php'); 
if(!isset($_SESSION['@member@'])){ die(header('Location:'.SERVERPAT.'logout.php'));}
if(!isset($_GET['f'])){ header('Location:'.SERVERPAT);}

@$User= new UserEnd;
@$utl= new Utilities;
@$jush= $_SESSION['@member@'];


///////THE FIRST TWO WEEK
 if(isset($_POST['go'])){
 	if(isset($_POST['ans'])){
 	try{
 	foreach ($_POST['ans'] as $key => $val) {
 		$send= $User->InsertAnswer($val,$_POST['cat'],$jush);
 	}
 }catch(Exception $e){ $er= $e->getMessage();}
 	}else{echo "<script>alert('PLEASE, CHECK ANY OF THE CHECKBOX TO COMPLETE ACTION');</script>";}
 }

if(isset($_POST['gone'])){
	try{
	foreach ($_POST['ansa'] as $key => $val) {
		$send= $User->RemoveAnswer($val,$_POST['cat'],$jush);
	}
}catch(Exception $e){ echo $e->getMessage();}
}
/////////////////////Forum

if(isset($_POST['forum'])){
	try{
		if($_POST['cont']!=''){
		$send= $User->ForumPost($jush,$_POST['cont']);
		}else{$er='CONTENT IS REQUIRED';}
	}catch(Exception $e){ echo $e->getMessage();}
}


/////////////////////TRIGGERS

 if(isset($_POST['tgo'])){
 	if(isset($_POST['ans'])){
 	try{
 	foreach ($_POST['ans'] as $key => $val) {
 		$send= $User->InsertAnswer($val,$_POST['cat'],$jush);
 	}
 }catch(Exception $e){ $er= $e->getMessage();}
 	}else{echo "<script>alert('PLEASE, CHECK ANY OF THE CHECKBOX TO COMPLETE ACTION');</script>";}
 }

if(isset($_POST['tgo2'])){
	try{
	foreach ($_POST['ansa'] as $key => $val) {
		$send= $User->RemoveAnswer($val,$_POST['cat'],$jush);
	}
}catch(Exception $e){ echo $e->getMessage();}
}

/////////////////////DEALINGS

 if(isset($_POST['dgo'])){
 	if(isset($_POST['ans'])){
 	try{
 	foreach ($_POST['ans'] as $key => $val) {
 		$send= $User->InsertAnswer($val,$_POST['cat'],$jush);
 	}
 }catch(Exception $e){ $er= $e->getMessage();}
 	}else{echo "<script>alert('PLEASE, CHECK ANY OF THE CHECKBOX TO COMPLETE ACTION');</script>";}
 }

if(isset($_POST['dgo2'])){
	try{
	foreach ($_POST['ansa'] as $key => $val) {
		$send= $User->RemoveAnswer($val,$_POST['cat'],$jush);
	}
}catch(Exception $e){ echo $e->getMessage();}
}

/////	FEEDBACK

if(isset($_POST['feed'])){
	if($_POST['topic']!=''){
		if($_POST['msg']!=''){
			try{
		$send= $User->SendFeedback($jush,$_POST['topic'],$_POST['msg']);		
			}catch(Exception $e){$er= $e->getMessage();}
		}else{$er='Message field is Required';}
	}else{$er='Subject field is required';}
}
?>



<div class="container">
	<div class="row">
		<div class="col-xs-12">
<script type="text/javascript" src="../js/jquery214min.js"></script>

<?php if(isset($_GET['f']) && $_GET['f']=='maintenance'){ ?>

<div id="coverpage">

	<h2>MAINTENANCE</h2>

<div class="writeup margin-bottom noBorder" style="margin-bottom: 207px">
	<p>
	Welcome to Staying On Track Section. Have you gone through the Cutting Down Section? Hope it was helpful? This section helps you from the beginning of your program to the stage of maintaining your new found lifestyle. It will give you an insight on how to go past the first two weeks which is usually the most difficult. You will also be given the opportunity to join a support group which will act as a very good support system as you fight this war against alcohol. You will learn what triggers are and how to handle your triggers until you are able to achieve your set goal. How do you deal with the desire to drink when it rears its ugly head? Find that out in this section. Do you need someone to talk when you are confused? This section offers you an opportunity to do just that. Finally you are able to assess yourself to see if you are making project. Isn’t this section interesting? You have no way of knowing until have gone through the activities yourself, have fun as you do that.
    </p>
	
</div>
</div>
<?php  } ?>


<?php 
		if(isset($_GET['f']) && $_GET['f']=='first-two-weeks'){
		@$chg= $utl->Chg_Category($_GET['f'])->id;		
		@$find= $User->AnsweredByUser($jush,$chg);
		@$findGet= $User->AnsweredByUser2($jush,$chg);
 ?>
	<div id="coverpage">
	
	<h2>The First Two Weeks</h2>
		<div class="writeup margin-bottom noBorder">
			<p>
Whether your goal is to cut down, or quit drinking entirely, the first few weeks can be the toughest. The good news is that there are strategies that can make these first few weeks less stressful.<br/>
There are strategies that work. We know they work because researchers who specialize in the field of alcohol reduction have studied these strategies for years. If possible, complete this exercise before, or during, the first two weeks. 
			</p>
		</div>

    <div class="writeup">
    <form id="form1" name="form1" method="post" class="form-horizontal">
<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">jQuery(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=first-two-weeks";},1800);})</script>';} ?>	

<table class="table table-responsive" width="100%">
	<?php  $User->PullOutQuest($chg,$jush); ?>
	<tr>
<td height="40" colspan="3">
<b style="font-style: italic;font-size: 12px;color: #F00;">Preparing for the First Two Weeks</b><br/>
In order to help reach your goal, what two strategies can you use to help you get through the rough spots? We'll save your results so you can come back and remind yourself of these answers later on. 
 </td>
	</tr>	
	<tr>
<td height="39" colspan="3"><input name="cat" type="hidden" value="<?php echo $chg; ?>" />
      <button name="go" class="btn btn-success"><i class="fa fa-check"></i> <strong>SAVE</strong></button>
      </td>
	  </tr>
	</table>
</form>
</div>


<?php if($find > 0): ?>

<h3>The First Two Weeks [ANSWER]</h3>

<div class="writeup">
		<p>Here are the strategies you listed that could help you get through the first two weeks:</p>

	<form method="POST" name="form2" class="form-horizontal">
<table width="100%" class="table table-responsive">

<?php $no=1; foreach ($find as $key => $vans) { ?>
	<tr>
	<th width="40" height="28"><?php echo $no++; ?></th>
<td width="30"><input name="ansa[]" type="checkbox" value="<?php echo $vans->qstid; ?>" title="Check Me" /></td>
	<td width="1197"><?php echo htmlspecialchars_decode($utl->Chag_QuestID($vans->qstid)->content); ?>
		<input type="hidden" name="cat" value="<?php echo $vans->cat; ?>">
	</td>
	</tr>
<?php } ?>	

	<tr>
	<td height="40" colspan="3">
	<b style="font-style:italic;font-size:14px;color:#F00;"><i class="fa fa-exclamation-triangle"></i> You can add your other Personal Reasons below...</b>
	<em style="font-size: 12px">Click on content to <strong>EDIT</strong> and enter key to <strong>SAVE</strong>.</em>
	</td>
	</tr>

	<tr>
	<td height="45" colspan="3"><span class="fa fa-star pull-left text-danger"></span>
	<div class="edit" id="ch$<?php echo $findGet->id; ?>"><?php echo $findGet->ch; ?></div>
	</td>
	</tr>
	<tr>
	<td height="45" colspan="3"><span class="fa fa-star pull-left text-danger"></span>
	<div class="edit" id="ch2$<?php echo $findGet->id; ?>"><?php echo $findGet->ch2; ?></div>
	  </td>
  </tr>
  <tr>
	<td height="35" colspan="3">
	<button type="submit" name="gone" class="btn btn-primary">
		<i class="fa fa-check-square-o"></i> <strong>UPDATE ANSWER</strong></button>
	</td>
	</tr>
  <tr>
    <td height="35" colspan="3">
   <b style="color:red"> Remember:</b> You're free to re-do this exercise and change your answers by scrolling to the bottom of the page.
Whether your goal is to cut down, or quit drinking entirely, the first few weeks can be the toughest. The good news is that there are strategies that can make these first few weeks less stressful.<br/>
There are strategies that work. We know they work because researchers who specialize in the field of alcohol reduction have studied these strategies for years. If possible, complete this exercise before, or during, the first two weeks.

    </td>
  </tr>
	</table>
	</form>
	</div>

<?php endif; ?>
	</div>

<?php } ?>


<!-- FORUM LINE -->

<?php 
	if(isset($_GET['f']) && $_GET['f']=='forums'){ 
	$ford= $User->CalOutForum();
	?>

	<div id="coverpage">
	
		<h2>FORUMS</h2>
        
        <h3>Your Support Team</h3>
		<div class="writeup margin-bottom">
			<p style="font-size:18px;">
Having a good support network can really help you stay on track to reaching your goals. Whether you are finding support within your family, friends or colleagues, it’s important to have people who will encourage you with your new lifestyle habits. If you’re finding that your family, friends and colleagues are not being particularly supportive, there are many other avenues you can try to gain support.<br/>
          Our support group is an anonymous group of people just like yourself that will not judge you. If you need more support or if you need to vent, you can always find some support in our anonymous Support Group.</p>
<hr/>
          
          <?php if($ford>0){ foreach($ford as $key => $fval): ?>      
          <p style="padding:5px;">
		  <b style="color:#0099CC; text-transform:capitalize"><i class="fa fa-user"></i> <?php echo $fval->user; ?></b><br/>
          <b style="color:#CCC; font-size:9px;margin-top:-6px"><i class="fa fa-calendar"></i> <?php echo date('d M Y h:ia',strtotime($fval->dated)); ?></b> <br/>
		  <?php echo $fval->cont; ?> <?php if($jush == $fval->user){ echo '<a href="javascript:void()" onclick="DelForum('.$fval->id.')" title="Remove Post"><i class="fa fa-trash text-danger"></i></a>';} ?>
  <?php if($jush!=$fval->user){ echo '<a href="javascript:void()" class="CalDiv" id="'.$fval->id.'" title="Reply Post" style="font-size:11px"><i class="fa fa-reply text-primary"></i> Reply</a>';} ?>
 
  <?php $marp= $User->CalOutForumReply($fval->id); if($marp>0){ ?> 
  <div style="margin-left:60px; margin-top:5px; margin-bottom:6px; border-left:1px dashed #ccc;padding:3px 14px;margin-right:60px;border-top:dashed 1px #CCC">
  <?php foreach($marp as $key => $freply): ?>
  <p>
  <div style="font-weight:700;color:#960;text-transform:capitalize">
  <i class="fa fa-user"></i> <?php echo $freply->user; ?> <span class="pull-right text-muted" style="font-size:11px">
  <i class="fa fa-calendar"></i> <?php echo date('d M Y, h:ia',strtotime($freply->dated)); ?></span></div>
  <div style="padding:.5px;color:#333333"><?php echo htmlspecialchars_decode($freply->reply); ?> <?php if($jush == $freply->user){ echo '<a href="javascript:void()" onclick="DelForumReply('.$freply->id.')" title="Remove Reply to Post"><i class="fa fa-trash"style="color:red"></i></a>';} ?></div>
  </p>
  <?php endforeach; ?>
  </div> 
	<?php } ?>
<div class="klos" id="replyid<?php echo $fval->id; ?>" style="display:none; width:70%"> 
  <textarea name="conty" id="conty<?php echo $fval->id; ?>" rows="3" class="form-control text-control" placeholder="Add Your Reply here..."></textarea>
    <input value="<?php echo $fval->id; ?>" type="hidden" id="fid"/>
    <input value="<?php echo $jush; ?>" type="hidden" id="me"/>
    <button type="submit" id="sreply" name="sreply" class="btn btn-info" onclick="sreply(<?php echo $fval->id; ?>)"><strong>REPLY</strong></button>
</div>
          </p>
          <?php endforeach; } ?>
          
          <hr style="margin:0px"/>
                
          <form id="form3" name="form3" method="post" action="" class="form-horizontal" style="margin-top:10px">
<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">jQuery(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=forums";},1800);})</script>';} ?>	
  <div class="form-group">
      <div class="col-md-10"> 
		<label class="label-control">Add Your Post</label>
        <textarea name="cont" rows="5" class="form-control text-control" placeholder="Add Your Post here..."></textarea>
	</div>
 </div>
      	 <div class="form-group">
      <div class="col-md-10"> 
      <button class="btn btn-primary" name="forum"><i class="fa fa-check-square-o"></i> <strong>ADD POST</strong></button>
      </div>
      </div>
          </form>
		</div>
</div>

<?php } ?>

<!-- TRIGGER -->
<?php 
	if(isset($_GET['f']) && $_GET['f']=='triggers'){ 
	@$chg= $utl->Chg_Category($_GET['f'])->id;		
	@$find= $User->AnsweredByUser($jush,$chg);
	@$findGet= $User->AnsweredByUser2($jush,$chg);
	?>

	<div id="coverpage">	
		<h2>Triggers</h2>
		<div class="writeup margin-bottom">
		  <p>What are triggers? Quite simply, triggers are situations, times of the day, activities, emotions or even people that tempt you to drink or remind you of drinking. <br/> 
Sometimes you can predict a trigger. If you used to have a drink every night before bed, you can bet that your body will remember and you'll get an urge to drink before you go to bed. In that situation, a certain time of day is a "trigger". Before you refrain yourself to not drink before bed, you can expect to continually experience strong triggers around bedtime.<br/> 
You can also experience a trigger accidentally, or "out of the blue". For example, if you run into a friend that you used to drink with, you might experience a strong desire to drink (even if you don't plan too). <br/>

Everyone has different triggers. And before you learn how to deal with them you need to recognize what they are. 
<br/><br/>
Here's a list of some common triggers. Which ones might apply to you? 

</p>

    <form id="form4" name="form4" method="post" class="form-horizontal">
<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">jQuery(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=triggers";},1800);})</script>';} ?>	

<table class="table table-responsive">
	<?php  $User->PullOutQuest($chg,$jush); ?>
	<tr>
	<td height="40" colspan="3">
<b style="font-style: italic;font-size: 12px;color: #F00;">Other personal Trigger</b><br/>
The above examples are by no means a complete list of triggers. Once again, everyone's triggers are different. What are two personal triggers that you'll experience? In order to prepare for triggers, it helps to identify them before they happen: 
 </td>
	</tr>
	<tr>
	  <td height="53" colspan="3">Submit your Answers and we'll save your answers, so you can come back and review them later on. Don't forget that you can come back and change your answers anytime. </td>
	  </tr>
	<tr>
	  <td height="39" colspan="3"><input name="cat" type="hidden" value="<?php echo $chg; ?>" />
      <button name="tgo" class="btn btn-success"><i class="fa fa-check"></i> <strong>SAVE</strong></button>
      </td>
	  </tr>
	</table>
</form>
</div>

<?php if($find > 0): ?>

<h3>Your Triggers [ANSWER]</h3>

<div class="writeup">
		<p>Here are some of personal triggers that you've identified. It's important to recognize triggers before they happen, or if you find yourself in a situation where a trigger presents itself:</p>
        
	<form method="POST" name="form5" class="form-horizontal">
<table width="100%" class="table table-responsive">

<?php $no=1; foreach ($find as $key => $vans) { ?>
	<tr>
	<th width="40" height="28"><?php echo $no++; ?></th>
<td width="30"><input name="ansa[]" type="checkbox" value="<?php echo $vans->qstid; ?>" title="Check Me" /></td>
	<td width="1197"><?php echo htmlspecialchars_decode($utl->Chag_QuestID($vans->qstid)->content); ?>
		<input type="hidden" name="cat" value="<?php echo $vans->cat; ?>">
	</td>
	</tr>
<?php } ?>	

	<tr>
	<td height="40" colspan="3">
	<b style="font-style:italic;font-size:14px;color:#F00;"><i class="fa fa-exclamation-triangle"></i> You can add your other Personal Reasons below...</b>
	<em style="font-size: 12px">Click on content to <strong>EDIT</strong> and enter key to <strong>SAVE</strong>.</em>
	</td>
	</tr>

	<tr>
	<td height="45" colspan="3"><span class="fa fa-star pull-left text-danger"></span>
	<div class="edit" id="ch$<?php echo $findGet->id; ?>"><?php echo $findGet->ch; ?></div>
	</td>
	</tr>
	<tr>
	<td height="45" colspan="3"><span class="fa fa-star pull-left text-danger"></span>
	<div class="edit" id="ch2$<?php echo $findGet->id; ?>"><?php echo $findGet->ch2; ?></div>
	  </td>
  </tr>
  <tr>
	<td height="35" colspan="3">
	<button type="submit" name="tgo2" class="btn btn-primary">
		<i class="fa fa-check-square-o"></i> <strong>UPDATE ANSWER</strong></button>
	</td>
	</tr>
  <tr>
    <td height="35" colspan="3">
   <b style="color:#FF0000">Remember:</b> You can re-read the above section on triggers and change your answers if you'd like.
 </td>
  </tr>
	</table>
	</form>
	</div>

<?php endif; ?>

	</div>

<?php } ?>


<!-- DEALINGS WITH DESIRES -->
<?php 
	if(isset($_GET['f']) && $_GET['f']=='dealings-with-desires'){ 
	@$chg= $utl->Chg_Category($_GET['f'])->id;		
	@$find= $User->AnsweredByUser($jush,$chg);
	@$findGet= $User->AnsweredByUser2($jush,$chg);
	?>

	<div id="coverpage">	
		<h2>Dealing with Strong Desires, Urges or Thoughts about Drinking</h2>
		<div class="writeup margin-bottom">
<p>It's normal for someone to experience strong desires, urges or thoughts when they cut down or quit drinking. It helps to recognize that these feelings are normal and that there are things you can do to make sure that you reach your goal. <br/>
Here are some of the ways that others have used to deal with strong urges, desires or thoughts. Pick the ones that might make sense to you. There's also a space for you to type in more specific methods that you might plan to use. You might also want to check with people in the Support Group so you can see what's working for them. <br/>
Which of the following methods can help you deal with strong desires, urges or thoughts about drinking alcohol? </p>

    <form id="form6" name="form6" method="post" class="form-horizontal">
<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">jQuery(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=dealings-with-desires";},1800);})</script>';} ?>	

<table class="table table-responsive">
	<?php  $User->PullOutQuest($chg,$jush); ?>
	<tr>
	<td height="40" colspan="3">
<b style="font-style: italic;font-size: 12px;color: #F00;">Other personal Desires</b><br/>
What are some specific methods or strategies that'll work for you? 
<br/>Submit your Answers and we'll save your answers, so you can come back and review them later on. Don't forget that you can come back and change your answers anytime. </td>
	  </tr>
	<tr>
	  <td height="39" colspan="3"><input name="cat" type="hidden" value="<?php echo $chg; ?>" />
      <button name="dgo" class="btn btn-success"><i class="fa fa-check"></i> <strong>SAVE</strong></button>
      </td>
	  </tr>
	</table>
</form>
</div>

<?php if($find > 0): ?>

<h3>Dealing with Desires [ANSWER]</h3>

<div class="writeup">
<p>Here are some of the ways that you’ve chosen to help you deal with strong desires, urges or thoughts about drinking.<br/>
Think about the methods you’ve chosen. You might even want to print out this summary to look at later, or when you need it most.<br/> You can also come back later and change or add new methods that you find work for you.</p>
        
	<form method="POST" name="form7" class="form-horizontal">
<table width="100%" class="table table-responsive">

<?php $no=1; foreach ($find as $key => $vans) { ?>
	<tr>
	<th width="40" height="28"><?php echo $no++; ?></th>
<td width="30"><input name="ansa[]" type="checkbox" value="<?php echo $vans->qstid; ?>" title="Check Me" /></td>
	<td width="1197"><?php echo htmlspecialchars_decode($utl->Chag_QuestID($vans->qstid)->content); ?>
		<input type="hidden" name="cat" value="<?php echo $vans->cat; ?>">
	</td>
	</tr>
<?php } ?>	

	<tr>
	<td height="40" colspan="3">
	<b style="font-style:italic;font-size:14px;color:#F00;"><i class="fa fa-exclamation-triangle"></i> You can add your other Personal Desires below...</b>
	<em style="font-size: 12px">Click on content to <strong>EDIT</strong> and enter key to <strong>SAVE</strong>.</em>
	</td>
	</tr>

	<tr>
	<td height="45" colspan="3"><span class="fa fa-star pull-left text-danger"></span>
	<div class="edit" id="ch$<?php echo $findGet->id; ?>"><?php echo $findGet->ch; ?></div>
	</td>
	</tr>
	<tr>
	<td height="45" colspan="3"><span class="fa fa-star pull-left text-danger"></span>
	<div class="edit" id="ch2$<?php echo $findGet->id; ?>"><?php echo $findGet->ch2; ?></div>
	  </td>
  </tr>
  <tr>
	<td height="35" colspan="3">
	<button type="submit" name="dgo2" class="btn btn-primary">
		<i class="fa fa-check-square-o"></i> <strong>UPDATE ANSWER</strong></button>
	</td>
	</tr>
  <tr>
    <td height="35" colspan="3">

 </td>
  </tr>
	</table>
	</form>
	</div>

<?php endif; ?>

	</div>

<?php } ?>


<!--SEND FEEDBACK -->
<?php if(isset($_GET['f']) && $_GET['f']=='feedback'){ ?>
		<div id="coverpage">
		<h2>FEEDBACK</h2>
        
 <h3>Write to us</h3>
		<div class="writeup margin-bottom noBorder">
		  <p>If you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours.</p>
  
  <hr style="margin:11.6px 0px" />
  <form id="form8" name="form8" method="post" class="form-horizontal">
  <?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">jQuery(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=feedback";},1800);})</script>';} ?>	
     <div class="form-group">
          <div class="col-md-8">
          <label class="label-control">Subject ::</label>
          <input type="text" name="topic" class="form-control text-control" placeholder="Your Subject"/>          
          </div>
      </div>
      <div class="form-group">
          <div class="col-md-8">
          <label class="label-control">Message ::</label>
          <textarea name="msg" rows="3" class="form-control text-control" placeholder="Your Message"></textarea>
          </div>
      </div>
      <div class="form-group">
          <div class="col-md-8">
         <button type="submit" class="btn btn-primary active" name="feed"><strong><i class="fa fa-envelope"></i> SEND </strong></button> 
         <!-- <a href="<?php //echo $_SERVER['PHP_SELF'].'?f=sent'; ?>" class="btn btn-info pull-right active"><i class="fa fa-envelope-o"></i> VIEW SENT</a>    --> 
          </div>
      </div>
  </form>
		</div>
        
    </div>    
<?php } ?>


<!-- FEEDBACK OLD-->
<?php 
	if(isset($_GET['f']) && $_GET['f']=='feedback-reply'){
	$old= $User->FeedbackReply($jush);		
 ?>
		<div id="coverpage">
	
		<h2>FEEDBACK</h2>
        
 <h3>Feedback Reply</h3>
		<div class="writeup margin-bottom noBorder" <?php if($old!=10){ echo 'style="margin-bottom:151px"';} ?>>
		  <p>Here are your reply to your feedback messages...</p>
  
  <hr style="margin:11.6px 0px" />
<?php if(!isset($_GET['t'])){ ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-responsive table-striped">
    <tr style="background-color:#666;color:#FFFFFF; font-weight:600">
      <td height="39">S/N</td>
      <td>Subject</td>
      <td>Read</td>
      <td>Date</td>
      <td>Active</td>
    </tr>
   <?php  if($old>0){ $no=1; foreach($old as $key => $Fbval): ?>
    <tr>
      <td height="30"><?php echo $no++; ?></td>
      <td <?php if($Fbval->stage==1){ echo 'style="font-weight:bold"';} ?>><?php echo htmlspecialchars_decode($User->GetSingleFB($Fbval->mid)->topic); ?></td>
	  <td><?php if($Fbval->stage==1){ echo '<a href="'.$_SERVER['PHP_SELF'].'?f=feedback-reply&t=read-msg&own='.$Fbval->id.'&s='.$Fbval->mid.'&msg='.time().'" title="Click to read"><strong>Read</strong></a>';}else{ echo '<a href="'.$_SERVER['PHP_SELF'].'?f=feedback-reply&t=read-msg&own='.$Fbval->id.'&s='.$Fbval->mid.'&msg=read" title="This message has been read" style="color:red">Read</a>';} ?></td>
      <td><?php echo date('d M Y h:ia',strtotime($Fbval->dated)); ?></td>	
      <td><?php echo '<a href="javascript:void()" onclick="DelFB('.$Fbval->id.')" title="Delete"><i class="fa fa-trash text-danger"></i></a>' ; ?>
      </td>
    </tr>
    <?php endforeach; }else{echo '<h4><i class="fa fa-bars"></i> No Record Found </h4> ';} ?>
  </table>
<?php } ?>

<?php 
   if(isset($_GET['t']) && $_GET['t']=='read-msg'){ 
   $User->UpdateRead($_GET['own']);
   $Gfback= $User->ReadFeedbackReply($_GET['own']); ?>
 
   <form id="form1" name="form1" method="post" class="form-horizontal">
 <h3 style="text-transform:capitalize;color:#333333; font-size: 13px"><i class="fa fa-calendar"></i> <?php echo date('d M Y, h:ia',strtotime($Gfback->dated)); ?> </h3>

<div class="form-group"> 
  <div class="col-md-12">
   		<label class="label-control">Subject::</label>
        <?php echo htmlspecialchars_decode($User->GetSingleFB($Gfback->mid)->topic); ?>
        </div>
   </div>
 <div class="form-group"> 
  <div class="col-md-12">
   		<label class="label-control">Message::</label> 
        <?php echo htmlspecialchars_decode($Gfback->msg); ?>
        </div>
   </div>
    </form> 
 
   <?php } ?> 

		</div>
        
    </div>    

<?php } ?>



<!-- result-achieved -->
<?php 
	if(isset($_GET['f']) && $_GET['f']=='result-achieved'){
	 $ft= $User->MyChart($jush);
	$dataPoints = array(
	array("label"=> "Volume (cl)", "y"=> $ft->Tvol),
	array("label"=> "Percentage (%)", "y"=> $ft->Tper),
	array("label"=> "Bottles", "y"=> $ft->Tbot),
	array("label"=> "Amount (N)", "y"=> $ft->TSpend)
);	
?>
		<div id="coverpage">
		<h2>Result Achieved</h2>
        
 <h3>This chart below shows the summary of your record summitted on daily bases</h3>
 
		<div class="writeup margin-bottom noBorder">
		  
  <div id="chartContainer" style="height: 368px; width: 100%;"></div>
		</div>
        
    </div>    
<?php } ?>


</div>
	</div>
</div>

<script type="text/javascript" src="../js/jquery214min.js"></script>
<script type="text/javascript" src="../js/inlineedit.js"></script>
<script src="../js/chartlib.js"></script>

<script type="text/javascript">
$(document).ready(function(e){
$(".edit").editable('handle.php',{ tooltip :'Click to edit and Enter to Save' }); 
	//////FORUM REPLY CONTROL
	$('.CalDiv').click(function(e) {
		var rdrop= $(this).attr('id');
		$('.klos').hide();
       $('#replyid'+rdrop).slideToggle(); 
    });

});

///////////////////// DELETR FROM FEEDBACK REPLY
function DelFB(id){   
    dataz= 'delFBack='+id;
    $.ajax({
    type:'POST', 
    data: dataz, 
    url: "handle.php",    
    cache: false,
     success: function(move){ 
    if(move=='ok'){ location.reload(); }
    else { alert ('Something Went Wrong, Please Reload');}}
   });
  };
  
  ///////////////////DELETE FROM FORUM
  function DelForum(id){   
    dataz= 'delforum='+id;
    $.ajax({
    type:'POST', 
    data: dataz, 
    url: "handle.php",    
    cache: false,
     success: function(move){ 
    if(move=='ok'){ location.reload(); }
    else { alert ('Something Went Wrong, Please Reload');}}
   });
  };


/////////// SEND REPLY FOR FORUMS

 function sreply(id){
	 	divid= id;
        user= $('#me').val();		 
 		sms= $('#conty'+id).val();
		if(sms!=''){
 	dataz= 'divid='+divid+'&user='+user+'&comet='+sms;
	$.ajax({
 		type:'POST', 
 		data: dataz, 
 		url: "handle.php",    
 		cache: false,
 		success: function(move){
 		if(move=='ok'){ location.reload(); }
 		else { alert ('Something Went Wrong, Please Reload');}}
    });
		}else{ alert('REPLY COMMENT IS EMPTY');}
};

///// DELETE FROM FORUM REPLY
function DelForumReply(id){
	dataz= 'delforumRP='+id;
	$.ajax({
    type:'POST', 
    data: dataz, 
    url: "handle.php",    
    cache: false,
     success: function(move){ 
    if(move=='ok'){ location.reload(); }
    else { alert ('Something Went Wrong, Please Reload');}}
   });
  };
  
 </script>
<script>
window.onload = function () { 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "dark1", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "RESULT ACHIEVED FROM YOUR DAILY RECORD"
	},
	axisY: {
		title: "LIST OF ITEMS RECORDED",
		includeZero: false
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<?php require_once('../libs/foot.php'); ?>