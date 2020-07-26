<?php

include('../libs/head.php'); 
if(!isset($_SESSION['@member@'])){ die(header('Location:'.SERVERPAT.'logout.php'));}
if(!isset($_GET['f'])){ header('Location:'.SERVERPAT);}

@$User= new UserEnd;
@$utl= new Utilities;
@$jush= $_SESSION['@member@'];


//// SET YOUR GOAL
if(isset($_POST['cal'])){
	if($_POST['fkg']!=''){
	try{	
		$send= $User->InsertGoals($jush,$_POST['fkg']);
	}catch(Exception $e){ $er= $e->getMessage();}
	}else{$er='textfield is empty';}
}

//// RECORD UR DRINK

if(isset($_POST['trka'])){ 
	if($_POST['datex']!=''){
		if($_POST['bnd']!='0'){
			if($_POST['vol']!='0'){
				if($_POST['per']!='0'){
					if($_POST['bot']!='0'){
						if($_POST['amt']!='0'){
					try{
$send= $User->SaveRecord($jush,$_POST['datex'],$_POST['bnd'],$_POST['vol'],$_POST['per'],$_POST['bot'],$_POST['amt']);	
		}catch(Exception $e){ $er= $e->getMessage();}				
						}else{$er='amount is required';}
					}else{$er='bottle drank is required';}
				}else{$er='Alcohol Percentage is required';}
			}else{$er='Alcohol Volume is required';}
		}else{$er='Alcohol Brand is required';}
	}else{$er='Date not selected';}
}

//// findtracka
if(isset($_POST['findtracka'])){
	if($_POST['frm'] && $_POST['to']!=''){
		try{
		$findVal= $User->LocateResult($jush,$_POST['frm'],$_POST['to']);
		$TFig= $User->TotalCal($jush,$_POST['frm'],$_POST['to']);
		}catch(Exception $e){echo $e->getMessage();}
	}else{$er='date not selected';}
}

///////////cutting-back
if(isset($_POST['go'])){
	if(isset($_POST['ans'])){
	try{
	foreach ($_POST['ans'] as $key => $val) {
		$send= $User->InsertAnswer($val,$_POST['cat'],$jush);
	}
}catch(Exception $e){ $er= $e->getMessage();}
	}
}

if(isset($_POST['gone'])){
	try{
	foreach ($_POST['ansa'] as $key => $val) {
		$send= $User->RemoveAnswer($val,$_POST['cat'],$jush);
	}
}catch(Exception $e){ echo $e->getMessage();}
}

///////////changing-the-rule

if(isset($_POST['goch'])){
	if(isset($_POST['ans'])){
	try{
	foreach ($_POST['ans'] as $key => $val) {
		$send= $User->InsertAnswer($val,$_POST['cat'],$jush);
	}
}catch(Exception $e){ $er= $e->getMessage();}
	}else{echo "<script>alert('PLEASE, CHECK ANY OF THE CHECKBOX TO COMPLETE ACTION');</script>";}
}

if(isset($_POST['gonech'])){
	try{
	foreach ($_POST['ansa'] as $key => $val) {
		$send= $User->RemoveAnswer($val,$_POST['cat'],$jush);
	}
}catch(Exception $e){ echo $e->getMessage();}
}
//////////////////////////////////



?>


<script type="text/javascript" src="../js/jquery214min.js"></script>
<div class="container">
	<div class="row">
		<div class="col-xs-12">

	<?php if(isset($_GET['f']) && $_GET['f']=='making-the-move'){ ?>				
			<div id="coverpage">
		<h2>Making the move</h2>

		<div class="writeup margin-bottom noBorder" style="margin-bottom: 282px">
			<p>			
Welcome to the Cutting Down Section. Have you gone through the Are You Addicted Section? Hope it was helpful? Like the name implies this section will help you control your drinking. Set Your Goal helps you to know the importance of goal setting and lets you see other peoples’ goal. Track Your Drinking helps you keep track of your daily consumption letting you know the volume of alcohol consumed, the amount you spent and the number of bottles you have consumed over a period of time.
                <br/><br/>
                
				Cutting back helps you know the strategies you can use to reduce your consumption. Changing the Rules gives new ways to quit alcohol different from all the ways that you have previously tried. You can also add methods that have worked for you keeping them as a constant reminder. Sit back and enjoy yourself as you go through these activities.
			</p>
		</div>		
	</div>

<?php } ?>

	<?php if(isset($_GET['f']) && $_GET['f']=='set-your-goal'){ ?>	
			
	<div id="coverpage">
		<h2>Set Your GOAL</h2>
		<div class="writeup margin-bottom noBorder">
			<p>
			Everyone’s goals are different. Some people decide to never drink again while others decide to cut down. Everyone’s goals are unique and it’s important to decide what is best for you. Whatever you do is up to you, but you do need to set a goal. While it's important to take the time to set the right goal, it's important to not delay setting a goal for too long.	
			<br/>
			Because you're now part of a community of like-minded people who are struggling to control their use of alcohol, your goal can help inspire others who are considering taking the brave steps that you have. Take a few moments now to review some of the <a href="control.php?f=view-public-pledge" style="font-weight:600" title="See other people goal">goals</a> that other program members have made. It's important to remember that everyone's goals are different, and that everyone moves at their own pace. It's especially important to reach out and help others if they experience a slip.	
			<br/>
			If you're ready, we invite you to inspire others by listing your goal. We're also aware that goals can change. If you're goal does change, feel free to come back and re-do this exercise.<br/>
					
<hr/>
			
	<b>My GOAL is to</b><br/>
	
<form name="form1" method="POST" class="form-horizontal">
	<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">$(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=view-public-pledge";},1500);});</script>';} ?>

	<div class="form-group">
		<div class="col-md-10">
			<textarea name="fkg" class="form-control text-control" rows="5" required placeholder="My GOAL is to"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-5">
		<button name="cal" class="btn btn-info" style="font-weight: 700">
			<i class="fa fa-check-square-o"></i> SET GOAL</button>
		</div>
	</div>
</form>
			</p>

		</div>

	</div>	
<?php } ?>


<?php 
	if(isset($_GET['f']) && $_GET['f']=='view-public-pledge'){ 
		$goal= $User->PulOutGoalSet();	
	?>	
			
<div id="coverpage">
	<h2>Pledge Set</h2>
    <hr style="margin:1px"/>
	<div class="writeup margin-bottom noBorder">
      <?php if($goal!=0){ foreach($goal as $key => $gval): ?>
		<p style="border-bottom:1px ridge #E4E4E4;padding-bottom:2px">
          <b style="text-transform:capitalize"><i class="fa fa-user text-primary"></i> <?php echo $gval->user; ?></b><br/>
          <span class="text-muted" style="font-size:9px;"><i class="fa fa-calendar"></i> <?php echo date('D (d) M, Y h:ia',strtotime($gval->dated)); ?></span> <br/>
			<?php echo htmlspecialchars_decode($gval->cont); ?>
  <?php if($gval->user==$jush){ echo '<a href="javascript:void()" onclick="DeGoal('.$gval->id.')" title="Delete Goal"><i class="fa fa-trash"></i></a>';} ?>
        </p>
         <?php endforeach; }else{ echo '<div class="alert alert-info text-center" style="padding:5px;"> NO GOAL SET YET! <br/> Be the First to <a href="'.$_SERVER['PHP_SELF'].'?f=set-your-goal"> Set a Goal</a></div>';} ?>
        </div>
	</div>
<?php } ?>




<?php 
	if(isset($_GET['f']) && $_GET['f']=='track-your-drinking'){
		$unlock= $User->ControlTracker($jush);
	 ?>	
			
<div id="coverpage">
<h2>Keep track of your drinking</h2>

<?php if(isset($_GET['f']) && !isset($_GET['s'])){ ?>
<div class="writeup margin-bottom noBorder">	
<div style="font-size:15px;color:#006699;font-weight:600;margin-bottom:3px">Fill in your daily consumption of Alcohol</div>
<form name="form3" method="post" class="form-horizontal">
<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">$(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=track-your-drinking";},800);});</script>';} ?>
			<div class="form-group">
		<label class="label-control col-md-3">Date</label>
				<div class="col-md-8">
	<input type="date" name="datex" id="datex" class="form-control text-control" style="width: auto;" placeholder="Select Date" required/>
				</div>
			</div>

	<div class="form-group">
		<label class="label-control col-md-3">Brand of beer </label>
				<div class="col-md-4">	
	<select name="bnd" id="bnd" class="form-control text-control2" style="width: auto;" title="Brand of beer">
		<option value="0">- Brand -</option>
		<option value="Gulder">Gulder</option>
		<option value="Star">Star</option>
		<option value="B-Shout">B-Shout</option>
		<option value="S-Stout">S-Stout</option>
		<option value="Legend">Legend</option>
		<option value="Xtra-Smooth">Xtra-Smooth</option>
		<option value="Hero">Hero</option>
		<option value="Origin">Origin</option>
		<option value="Star-Lite">Star-Lite</option>
		<option value="Heniken">Heniken</option>
		<option value="Harp">Harp</option>
		<option value="Wine">Wine</option>
        
	</select>

	</div>
</div>		

<div class="form-group">
		<label class="label-control col-md-3">Alcohol Volume </label>
				<div class="col-md-8">
	<select name="vol" class="form-control text-control2" style="width: auto;" title="Alcohol Volume">
		<?php $a=15; $b=50; echo '<option value="0">- - -</option>';
		 while ($a <= $b) {echo '<option>'.$a++.'cl</option>';} ?>
	</select>
				</div>
			</div>

	<div class="form-group">
		<label class="label-control col-md-3">Alcohol Percentage </label>
				<div class="col-md-8">
<select name="per" id="per" class="form-control text-control2" style="width: auto;" title="Alcohol Percentage">
		<?php $a=1; $b=50; echo '<option value="0">- - -</option>';
		 while ($a <= $b) {echo '<option>'.$a++.'%</option>';} ?>
	</select>
				</div>
			</div>

	<div class="form-group">
		<label class="label-control col-md-3">How many bottles taken </label>
				<div class="col-md-8">
	<select name="bot" id="bot" class="form-control text-control2" style="width: auto;" title="How many bottles taken">
		<?php $a=1; $b=15; echo '<option value="0">- - -</option>';
		 while ($a <= $b) {echo '<option>'.$a++.'</option>';} ?>
	</select>
				</div>
			</div>

	<div class="form-group">
		<label class="label-control col-md-3">How much does each cost </label>
				<div class="col-md-8">
	<select name="amt" class="form-control text-control2" style="width: auto;" title="How much does each cost">
		<option value="0">- AMOUNT -</option>
		<option value="100">&#x20A6 100</option>
		<option value="200">&#x20A6 200</option>
		<option value="300">&#x20A6 300</option>
		<option value="400">&#x20A6 400</option>
		<option value="500">&#x20A6 500</option>
		<option value="600">&#x20A6 600</option>
		<option value="700">&#x20A6 700</option>
		<option value="800">&#x20A6 800</option>
		<option value="900">&#x20A6 900</option>
		<option value="1000">&#x20A6 1000</option>
	</select>
				</div>
			</div>

		<div class="form-group">
		<div class="col-md-offset-1 col-md-5">
        <a href="<?php echo $_SERVER['PHP_SELF'].'?f=track-your-drinking&s=view-record'; ?>" class="btn btn-info"><i class="fa fa-eye"></i> <strong>VIEW RECORD</strong></a>
<button name="trka" type="submit" class="btn btn-primary" style="font-weight: 700"><i class="fa fa-check-square-o"></i> SAVE RECORD </button>
		</div>
	</div>
	</form>
	</div>
<?php } ?>

<?php if(isset($_GET['f']) && isset($_GET['s']) && $_GET['s']=='view-record'){ ?>
<?php if($unlock=='1'){ ?>
<div class="writeup">

<?php if(!isset($_POST['findtracka']) && (isset($er))){ ?>

<div class="text-center text-uppercase" style="font-size:17px;color:red;font-weight:bold;margin-bottom:5px;">Track your saved record by Date</div>
<div style="width:350px; margin-right:auto; margin-left:auto; margin-bottom:268px">
<form name="form2"  method="POST" class="form-horizontal">			
	<table width="100%" align="center">
		<tr align="center">
		<td width="36%"><b>From</b></td>
		<td width="41%"><b>To</b></td>
		<td width="23%"> </td>
		</tr>
		<tr>
		<td><input type="date" name="frm" class="form-control text-control" style="width:auto" /></td>
		<td><input type="date" name="to" class="form-control text-control" style="width:auto"/></td>
		<td><button type="submit" name="findtracka" class="btn btn-primary">TRACK</button></td>
		</tr>
	</table>
</form>
</div>	

<?php } ?>

<?php if(isset($_POST['findtracka']) && ($findVal>0)){  ?>
<div style="font-size:15px;color:red;font-weight:600; height:28px"><i class="fa fa-th"></i> Your result from your saved record

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?f=track-your-drinking&s=view-record" style="float:right;padding:0px;margin:0px">
<button type="submit" class="btn btn-link"><i class="fa fa-arrow-circle-left"></i> <b>GO BACK</b></button></form>
</div>
		<table width="100%" class="table table-responsive table-bordered table-striped">
			<tr style="background: #ccc;color: #FFF">
				<th height="30">ID</th>
				<th>BRAND</th>
				<th>VOLUME</th>
				<th>PERCENTAGE</th>
				<th>BOTTLES</th>
				<th>RATE</th>
				<th>AMOUNT</th>
				<th>DATE</th>
			</tr>
	<?php $no=1; foreach($findVal as $key => $val): ?>	
			<tr>		
				<td height="29"><?php echo $no++; ?></td>
				<td><?php echo $val->brand; ?></td>
				<td><?php echo $val->vol.'cl'; ?></td>
				<td><?php echo $val->per.'%'; ?></td>
				<td><?php echo $val->bottles; ?></td>
				<td><?php echo '&#x20A6 '.$val->amt; ?></td>
				<td><?php echo '&#x20A6 '.$val->amt*$val->bottles; ?></td>
				<td><?php echo $val->dob; ?></td>		
			</tr>	
			<?php endforeach; ?>
			<tr style="font-weight:bolder;color:red;text-align:center">		
				<td colspan="2" align="center" height="38">TOTAL =></td>
				<td><?php echo $TFig->Tvol.'cl'; ?></td>
				<td><?php echo $TFig->Tper.'%'; ?></td>
				<td><?php echo $TFig->Tbot.' Bottles'; ?></td>
				<td>-</td>
				<td><?php echo '&#x20A6 '.$TFig->TSpend; ?></td>
				<td></td>		
			</tr>	
		</table>
<?php } ?>

</div>
<?php }else{ echo '<div class="alert alert-warning text-center"> <i class="fa fa-exclamation-triangle"></i> OOPS, YOU DON\'T HAVE ANY SAVED RECORD <br/>
 TRY SAVING ONE <a href="'.$_SERVER['PHP_SELF'].'?f=track-your-drinking" title="Save a Record"><strong>CLICK HERE</strong></a></div>';} ?>

<?php } ?>

</div>
<?php } ?>








<!-- cutting back -->
<?php 
	if(isset($_GET['f']) && $_GET['f']=='cutting-back'){ 
	@$chg= $utl->Chg_Category($_GET['f'])->id;
	@$find= $User->AnsweredByUser($jush,$chg);
	@$findGet= $User->AnsweredByUser2($jush,$chg);
	?>

<div id="coverpage">

	<h2>Cutting Back</h2>

		<div class="writeup margin-bottom">
		<p>
	Slow and steady often wins the race, so if your goal (or your first goal – goal's can change) is to cut back it might be a good idea to sit back and think about ways that you can cut back. Cutting back can also be helpful when planning on quitting drinking entirely.The below suggestions can really help out.
		<br/>
		Here's a list of some things you could do to before you cut back. Which ones would work for you? 
		</p>


<form id="form4" name="form4" method="post" class="form-horizontal">
<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">$(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=cutting-back";},800);});</script>';} ?>

<table width="100%" class="table table-responsive">	
	<?php  $User->PullOutQuest($chg,$jush); ?>	
	<tr>
	<td height="40" colspan="3">
<b style="font-style: italic;font-size: 12px;color: #F00;">Other Personal Ways to Cut Back are...</b><br/>
It takes a bit of planning, but cutting back does take some time. Since everyone is different, what are two personal activities you can do to start cutting back? </td>
	</tr>

	  <td height="40" colspan="3">You don't have to think of all of the answers right now - you can come back and change your answers anytime. 
      </td>
	  </tr>
	<tr>
	  <td height="28" colspan="4"><input type="hidden" name="cat" value="<?php echo $chg; ?>">
      <button name="go" class="btn btn-success"><i class="fa fa-check"></i> <strong>SAVE</strong></button>
      </td>
	  </tr>
	</table>
</form>

</div>

<!-- MY SELECTED ANSWER -->
<?php if($find > 0): ?>


	<h3>Cutting Back [ANSWER]</h3>
		<div class="writeup">
<p>	When you last finished this exercise, here are some of the strategies you chose that could help you cut back:</p>
	<form method="POST" name="form5" class="form-horizontal">		
<table width="100%" class="table table-responsive">
	<?php $no=1; foreach ($find as $key => $vans) { ?>
	<tr>
	<th width="3%" height="28"><?php echo $no++; ?></th>
<td width="3%"><input name="ansa[]" type="checkbox" value="<?php echo $vans->qstid; ?>" title="Check Me" /></td>
	<td width="94%"><?php echo htmlspecialchars_decode($utl->Chag_QuestID($vans->qstid)->content); ?>
		<input type="hidden" name="cat" value="<?php echo $vans->cat; ?>">
	</td>
	</tr>
<?php } ?>

<tr>
		<td height="35" colspan="3">
	<button type="submit" name="gone" class="btn btn-primary" style="font-weight: bolder;"><i class="fa fa-check-square-o"></i> UPDATE ANSWER</button>
		</td>
	</tr>

<tr>
	<td height="40" colspan="3">
<b style="font-style: italic;font-size: 12px;color: #F00;">You can also add Personal Reasons here below...</b></td>
	</tr>

	<tr>
	<td height="45" colspan="3"><span class="fa fa-star pull-left"></span>
	<div class="edit" id="ch$<?php echo $findGet->id; ?>"><?php echo $findGet->ch; ?></div>
	</td>
	</tr>

	<tr>
	<td height="45" colspan="3"><span class="fa fa-star pull-left"></span>
	<div class="edit" id="ch2$<?php echo $findGet->id; ?>"><?php echo $findGet->ch2; ?></div>
	  </td>
  </tr>

	</table>
	</form>

		<p>
	You can re-read the below section on cutting back and change your answers if you'd like. 

	<br/>Slow and steady often wins the race, so if your goal (or your first goal – goals can change) is to cut back it might be a good idea to sit back and think about ways that you can cut back.
	<br/>
	Cutting back can also be helpful when planning on quitting drinking entirely. The below suggestions can really help out.
	</p>

	</div>
<?php endif; ?>
</div>
<?php } ?>

<!-- changing-the-rule -->
<?php 
	if(isset($_GET['f']) && $_GET['f']=='changing-the-rule'){ 
	@$chg= $utl->Chg_Category($_GET['f'])->id;
	@$find= $User->AnsweredByUser($jush,$chg);
	@$findGet= $User->AnsweredByUser2($jush,$chg);

?>

<div id="coverpage">

	<h2>Changing the Rules</h2>

		<div class="writeup margin-bottom">
			<p>
			One thing that is certain is that you're in charge of the way you drink. As you work toward reaching your goal sit back and think about making some rules that you'll follow. When you're finished this exercise you might want to print it out and carry it with you so you can remind yourself of your new rules if needed.  
		Set some rules and try to stick with them for a few weeks. It's OK to change the rules, but try not to change them too often and give yourself some time to get used to them. <br/>
		Here are some common "rules" that have worked for people who were trying to cut down or quit drinking. Put a check mark beside the ones that might work for you. There's some space at the bottom of this exercise where you can record some personal rules that might work for you. 
		</p>


<form id="form4" name="form4" method="post" class="form-horizontal">
<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($send)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$send.'</div>'.'<script type="text/javascript">$(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?f=changing-the-rule";},800);});</script>';} ?>	

<table width="100%" class="table table-responsive">

	<?php  $User->PullOutQuest($chg,$jush); ?>

	<tr>
	<td height="40" colspan="3">
<b style="font-style: italic;font-size: 12px;color: #F00;">Personal Rules </b><br/>
You may have other, more personal, ideas that might help you set some new "rules" around your drinking.<br/>
We'll reproduce these answers for you when you click "Next". You can come back and redo this exercise at any time. 
 </td>
	</tr>
	<tr>
	  <td height="39" colspan="3"><input type="hidden" name="cat" value="<?php echo $chg; ?>">
      <button name="goch" class="btn btn-success"> <strong><i class="fa fa-check"></i> SAVE</strong></button>

      </td>
	  </tr>
	</table>
</form>
</div>

<!-- MY SELECTED ANSWER -->

<?php if($find > 0): ?>

<h3>Changing the Rules [ANSWER]</h3>

		<div class="writeup">
<form id="form6" name="form6" method="post" action="">
<table class="table table-responsive" width="100%">
  <?php $no=1; foreach ($find as $key => $vans) { ?>
  <tr>
	<th width="38" height="28"><?php echo $no++; ?></th>
<td width="31"><input name="ansa[]" type="checkbox" value="<?php echo $vans->qstid; ?>" title="Check Me" /></td>
	<td width="1198"><?php echo htmlspecialchars_decode($utl->Chag_QuestID($vans->qstid)->content); ?>
		<input type="hidden" name="cat" value="<?php echo $vans->cat; ?>">
	</td>
	</tr>
<?php } ?>

	<tr>
	<td height="40" colspan="3">
<b style="font-style: italic;font-size: 15px;color: #F00;">Your can add other Personal Reasons here</b></td>
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
  <td height="45" colspan="3"><button class="btn btn-primary" type="submit" name="gonech"><i class="fa fa-check-square-o"></i> <strong>UPDATE ANSWER</strong> </button> </td>
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

function DeGoal(id){
    dataz= 'DelGoal='+id;
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
<?php require_once('../libs/foot.php'); ?>

