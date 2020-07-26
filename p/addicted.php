<?php

require('../libs/head.php'); 
if(!isset($_SESSION['@member@'])){ die(header('Location:'.SERVERPAT.'logout.php'));}
if(!isset($_GET['f'])){ header('Location:'.SERVERPAT);}


@$User= new UserEnd;
@$utl= new Utilities;
@$jush= $_SESSION['@member@'];


////////////////BACalculator
if(isset($_POST['cal'])){
	if($_POST['wh'] && $_POST['kga']!='0'){
		if($_POST['hr']!='0'){
			if($_POST['hg']!='0'){
				try{
		$send= $User->CalculateBAC($_POST['wh'],$_POST['kga'],$_POST['hr'],$_POST['hg'],$jush);
				}catch(Exception $e){ $er= $e->getMessage();}
			}else{$er='please select How many drinks you have had ';}
		}else{$er='please select when did you had your first drink';}
	}else{$er='please select your weigh & module';}
}
////////////////////////////////////////////////////////////////

////////	Do I drink too much 	/////////
if(isset($_POST['go'])){
	if(isset($_POST['ans'])){
	try{
	foreach ($_POST['ans'] as $key => $val) {
		$send= $User->InsertAnswer($val,$_POST['cat'],$jush);
	}
}catch(Exception $e){ $er= $e->getMessage();}
	}else{echo "<script>alert('PLEASE, CHECK ANY OF THE CHECKBOX TO COMPLETE ACTION');</script>";}
}

////////////	UPDATE ANSWER 	///////////

if(isset($_POST['gone'])){
	try{
	foreach ($_POST['ansa'] as $key => $val) {
		$send= $User->RemoveAnswer($val,$_POST['cat'],$jush);
	}
}catch(Exception $e){ echo $e->getMessage();}
}
///////////////////////////////////////////////////

?>



<div class="container">
	<div class="row">
		<div class="col-xs-12">
<script type="text/javascript" src="../js/jquery214min.js"></script>


<?php if(isset($_GET['f']) && $_GET['f']=='knowing-your-status'){ ?>

<div id="coverpage">

	<h2>KNOWING YOUR STATUS</h2>

<div class="writeup margin-bottom noBorder" style="margin-bottom: 222px">
	<p>
	Welcomes to Winechase Are You Addicted section. Have you gone through the overview of alcohol section? Hope it was helpful? This section gives you an idea of whether you are actually addicted and your level of addiction. </p>

	<p>The Blood Alcohol Calculator gives you a rough estimate of the amount of alcohol in your blood while Do I Drink Too Much helps you check your level of drinking. 
<br/><br/>
The role of the programme is to make you reflect on your drinking pattern and help you change your attitude towards alcohol. Sit back and enjoy yourself.</p>
	
</div>
</div>
<?php  } ?>



<?php 
	if(isset($_GET['f']) && $_GET['f']=='blood-alcohol-calculator'){
	$vmatch= $User->MatchResult($jush);
 ?>	
			
	<div id="coverpage">
	<h2>Blood Alcohol Calculator</h2>

	<h3>What is a Blood Alcohol Calculator (BAC)?</h3>

<div class="writeup">
	<p>			
	A Blood Alcohol Calculator or your Blood Alcohol Concentration is a rough estimate of how much alcohol you have in your body. Or, it’s a rough estimate of how intoxicated you are.<br/>
	<b>Is a computer-based BAC accurate?</b><br/>
	No. Many other factors (for example: your body type, age, sex, if you’ve taken any medication, how much food you’ve had to eat, etc.) can influence your BAC. <br/>
	<strong style='font-size:15px;font-style: italic;'>This computer program is just an estimate.</strong>
	</p>
</div>		

<h3>Calculator</h3>

<div class="writeup noBorder">

<form name="dat" id="dat" method="POST" action="" class="form-horizontal">
<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">jQuery(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=blood-alcohol-calculator";},1800);})</script>';} ?>

	<div class="form-group">
	<label class="label-control col-md-3">1). How much do you weigh? </label>
	<div class="col-md-1">
<select name="wh" class="form-control text-control2" style="width: auto">
			<option value="0">---</option>
		<?php $a=1; $b=130; while($a<=$b){echo '<option>'.$a++.'</option>';} ?>
					</select>
				</div>
				<div class="col-md-1">
					<select name="kga" class="form-control text-control2" style="width: auto">
						<option value="0">---</option>
						<option value="LB"> LB </option>
						<option value="KG"> KG </option>
						<option value="ST"> ST </option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="label-control col-md-3">2). About how many hours has it been since you had your first drink?</label>
				<div class="col-md-2">
					<select name="hr" class="form-control text-control2" style="width: auto">
						<option value="0">---</option>
						<option value="0.5"> 0.5 </option>
						<option value="1"> 1 </option>
						<option value="1.5"> 1.5 </option>
						<option value="2"> 2 </option>
						<option value="2.5"> 2.5 </option>
						<option value="3"> 3 </option>
						<option value="3.5"> 3.5 </option>
						<option value="4"> 4 </option>
						<option value="4.5"> 4.5 </option>
						<option value="5"> 5 </option>
						<option value="5.5"> 5.5 </option>
						<option value="6"> 6 </option>
						<option value="6.5"> 6.5 </option>
						<option value="7"> 7 </option>
						<option value="7.5"> 7.5 </option>
						<option value="8"> 8 </option>
						<option value="8.5"> 8.5 </option>
						<option value="9"> 9 </option>
						<option value="9.5"> 9.5 </option>
						<option value="10"> 10 </option>
						<option value="10.5"> 10.5 </option>
						<option value="11"> 11 </option>
						<option value="11.5"> 11.5 </option>
						<option value="12"> 12 </option>
					</select>
				</div>
			</div> 

			<div class="form-group">
				<label class="label-control col-md-3">3). How many drinks have you had since you started drinking?</label>
				<div class="col-md-2">
		<select name="hg" class="form-control text-control2" style="width: auto">
			<option value="0">---</option>
			<?php $a=1; $b=50; while($a<=$b){echo '<option>'.$a++.'</option>';} ?>
		</select>
				</div>
			</div> 

			<div class="form-group">
			<div class="col-md-offset-3 col-md-3">
				<button name="cal" class="btn btn-info" style="font-weight: 700">
					<i class="fa fa-calculator"></i> CALCULATE</button>
				</div>
			</div>                                                
		</form>

<?php if($vmatch): ?>
<hr />
		<p>
Based on the information you provided, we estimate that your Blood Alcohol Concentration is <strong style="color:#039;font-size:18px"><?php echo $vmatch->cal; ?> g/100 ml</strong>.
<br/>
<b style="color:#F00;">Please note:</b> This is just an estimate. Remember that many other factors (for example: your body type, age, sex, if youâ€™ve taken any medication, how much food youâ€™ve had to eat, etc.) can influence your BAC.
<br/><br/>
       
<?php if($vmatch->cal <= '0.01'){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong>
You're really not feeling the effects of alcohol right now.<br/>

<?php }elseif($vmatch->cal <= '0.03'){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong> 
You might feel a little more relaxed, perhaps a little light-headed. If you're shy you might lose a bit of your shyness. The typical depressant effects of alcohol are not affecting you at this stage and you probably haven’t lost any of your coordination.<br/>

<?php }elseif($vmatch->cal <= '0.06'){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong> 
You're probably feeling a bit relaxed or you might have a feeling of "well-being" or euphoria (feeling really good or really positive). You might feel a bit warmer than you usually do. Your behavior might be a bit exaggerated or your emotions might be a bit intensified. You're probably feeling some impairment of reasoning and memory and since your level of caution is lower, it's a bad idea to drive.<br/>

<?php }elseif($vmatch->cal <= '0.09'){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong> Although you can definitely tell you've been drinking, and you're probably aware that you're feeling some effects of alcohol, you might believe that you're more alert than you really are. In reality, with a BAC of 0.07 – 0.09 you'll be experiencing a slight impairment of speech, balance and hearing and your reaction time is reduced. Your caution, reasoning and memory are impaired, and your judgment and level of self-control are reduced.<br/>
<strong>Note:</strong> Many countries have laws that forbid people to drive if they have a BAC of 0.05 or more. Most countries have laws that forbid people to drive if they have a BAC of 0.08+. No matter where you live or where you are, definitely don’t drive – take a cab or plan to stay the night.<br/>

<?php }elseif($vmatch->cal <= '0.12'){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong> 
If your BAC is between 0.10 and 0.125 your speech will be slurred and your balance, vision, reactions time and hearing will be impaired. Your motor coordination will also be significantly impaired and you'll have a loss of good judgment.
Note: No matter where you live, it's illegal to drive. <br/>In fact, it'd be extremely irresponsible to drive anything at this point: including a boat, snowmobile, off-road vehicle – even a riding lawnmower. Not a good idea. Don't even think about it.<br/>

<?php }elseif($vmatch->cal <= '0.15'){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong> Right now, you'd be feeling gross motor impairment and a lack of physical control. It'd probably be hard for you to type on the keyboard and your monitor or mobile phone screen would appear blurry. <br/>Your judgment and perception of what’s going on would be severely impaired and any feeling of euphoria (feeling really good or really positive) you had earlier will have turned to dysphoria (an emotional state of agitation, unease or depression). <br/>You'd have gross motor impairment and a lack of physical control.<br/>

<?php }elseif($vmatch->cal <= '0.19'){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong> You'll probably start to feel sick to your stomach. Any euphoria (feeling really good or really positive) you had earlier will have turned to dysphoria (an emotional state of agitation, unease or depression). <br/>Right now you might look like a "sloppy drunk".<br/>

<?php }elseif($vmatch->cal <= '0.20'){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong> 
If your BAC is 0.20, you'll probably need help if you want to walk properly. If you fall down you probably won't feel a lot of pain – even if you hurt yourself. At this level of BAC, some people begin to vomit. <br/>At the very least, you'll feel dazed, confused and disoriented.<br/>

<?php }elseif($vmatch->cal <= '0.30'){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong> 
If you were awake at this point you'd have very little comprehension as to where you were or what you were doing. You might pass out suddenly and it'd be hard to wake you up.<br/>

<?php }elseif(($vmatch->cal <= '0.70') OR ($vmatch->cal > '0.70')){ ?>
<strong style="color:#099">Your BAC of <?php echo $vmatch->cal ; ?> g/100 ml means:</strong> 
It's possible that you might fall into a coma. You might die due to the paralysis of your diaphragm, the collapse of your lungs, or heart attack (any form of respiratory arrest).<br/>
<?php } ?>
		</p>
<br/><br/>
<p><b style="color: #F00;">Note:</b> Many countries have laws that forbid people to drive if they have a <strong style="color:#099">BAC of 0.05 or more</strong>
<?php endif; ?>
	</div>

</div>
<?php } ?>


<?php 
	if(isset($_GET['f']) && $_GET['f']=='drink-too-much'){	

		@$chg= $utl->Chg_Category($_GET['f'])->id;		
		@$find= $User->AnsweredByUser($jush,$chg);
		@$findGet= $User->AnsweredByUser2($jush,$chg);	
		
?>

<div id="coverpage">

<h2>Do I drink too much?</h2>

<div class="writeup margin-bottom">
	<p>
	You might feel like there's no reason why you shouldn't enjoy a drink or two. After all, a lot of people drink alcohol and drinking with others can be fun. There are a lot of places and events where people get together and have a few drinks; weddings, wakes, sporting events, celebrations, graduations, family dinners – just to name a few. 
	<br/>
	Then again, a lot of people just don't drink. They might not like the taste, how alcohol makes them feel, or they may have had a bad experience in the past. 
	<br/>
	But you're here because you're asking the question: "Do I drink too much?" <br/>
<h3>Answer:</h3> You're the only person who can decide if you want to moderate your drinking, cut down, or quit drinking completely. But we can help you with you decision – and we're also aware that decisions (or goals) can change.
	<br/>

	This program is not just about quitting drinking – however some of the exercises in the program are designed to help those who are quitting (or abstaining) alcohol. There are also people in our support group who have decided to abstain, while there are others who just want to cut down. We support everyone. 
	</p>
</div>



<h3>Do I Drink Too Much?</h3>

<div class="writeup topMargin">
	<p>
	Here are just a few of the issues that people encounter when they feel they might drink too much. 
	<br/>Check the statement that may sound familiar to you:
	</p>

	<form name="form1" method="post" class="form-horizontal">	
<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">$(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=drink-too-much";},2000);});</script>';} ?>

	<table width="100%" class="table table-responsive">
		<?php  $User->PullOutQuest($chg,$jush); ?>
	
		<tr>
		<td height="40" colspan="3">
	<b style="font-style: italic;font-size: 12px;color: #F00;">Other Personal Reasons You may have other, more personal, reasons for feeling like you drink too much. Feel free to write them in the below spaces:</b></td>
		</tr>		
	<tr>
	  <td height="40" colspan="3">
	  	We'll reproduce these answers for you when you click "<strong>SAVE</strong>". You can come back and redo this exercise at any time.
      </td>
	  </tr>
	<tr>
	  <td height="40" colspan="3"><input name="cat" type="hidden" value="<?php echo $chg; ?>" />
      <button name="go" class="btn btn-success"><i class="fa fa-check"></i> <strong>SAVE</strong></button>
      </td>
	  </tr>
	</table>
</form>

</div>


<!-- ANSWERED QUESTIONS BELOW -->

<?php if($find > 0): ?>
	<h3>Do I Drink Too Much? [ANSWER]</h3>

<div class="writeup">
		<p>
		<b>Remember:</b> When you last finished this exercise, here are some of the issues you identified that might help you answer this question:
		</p>

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
	<td height="35" colspan="3">
	<button type="submit" name="gone" class="btn btn-primary">
		<i class="fa fa-check-square-o"></i> <strong>UPDATE ANSWER</strong></button>
	</td>
	</tr>	

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
	</table>
	</form>


	</div>

<?php endif; ?>

</div>

<?php } ?>


	</div>
</div>
</div>

<script type="text/javascript" src="../js/jquery214min.js"></script>
<script type="text/javascript" src="../js/inlineedit.js"></script>
<script type="text/javascript">
$(document).ready(function(e){
$(".edit").editable('handle.php',{ tooltip :'Click to edit and Enter to Save' }); 
});
</script>
<?php require_once('../libs/foot.php'); ?>
