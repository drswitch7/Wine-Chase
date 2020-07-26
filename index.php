<?php 
require_once('libs/head.php');


@$Login= new Access;
@$Regin= new UserEnd;


if(isset($_SESSION['@member@'])){
	$uti= new Utilities;
	$data= $Regin->GetSingle($_SESSION['@member@']);
	$datall= $_SESSION['@memberdata@'];
}

//LOGIN
if(isset($_POST['log'])){
	if(trim($_POST['uname'])!=''){
		if($_POST['acex']!=''){
			try{
				$log= $Login->Userlogin($_POST['uname'],$_POST['acex']);
			}catch(Exception $e){ $er= $e->getMessage();}
		}else{$er='password is required';}
	}else{$er='Display name is required';}
}

//REGISTRATION
if(isset($_POST['reg'])){
	if($_POST['name']!=''){
		if($_POST['email']!=''){
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				if(trim($_POST['acex'])!=''){
					if(trim($_POST['acex2'])!=''){
						if(strlen($_POST['acex'])>=6){
							if($_POST['acex']==$_POST['acex2']){
								if(ctype_alnum($_POST['dname'])!=''){
									if(strlen($_POST['dname'])>=5){
										if($_POST['sex']!='0'){
											if($_POST['dob']!=''){ 
												if($_POST['drink']!='0'){
													if($_POST['rate']!='0'){   
														if($_POST['lvl']!='0'){
													try{
$reg= $Regin->Joinus($_POST['name'],$_POST['email'],$_POST['acex'],$_POST['dname'],$_POST['sex'],$_POST['dob'],$_POST['drink'],$_POST['rate'],$_POST['lvl'],$_POST['nod']);
													}catch(Exception $e){$er= $e->getMessage();}
														}else{$er='please set Your Goal';}
													}else{$er='What Is Your Rate Of Drinking Per Day';}
												}else{$er='How Much Would You Say That The Average Drink Costs You';}
											}else{$er='date of birth not selected';}
										}else{$er='gender is required';}
									}else{$er='display name is too short :: '.$_POST['dname'].'<br/> display name should be more than four (4) characters';}
								}else{$er='display name is required without any space or symbols sign'; }
							}else{$er='confirm password do not match password';}
						}else{$er='password is too short,<br/>password should be more than five (5) characters';}
					}else{$er='confirm password is required';}
				}else{$er='password is required';}
			}else{$e='invalid email address or not in good format :: '.$_POST['email'];}
		}else{$er='email address is required';}
	}else{$er='full name is required';}
}

//UPLOAD AVATAR
if(isset($_POST['ake'])){
$file= $_FILES['img'];
	if ($file['name']!=''){
		$log=array('jpg','jpeg','png');
		$ge= explode('.',$file ['name']);
		$get=strtolower(end($ge));
		if(in_array($get,$log)){ 
			$path=LOCALPAT.'img/avatar/';
			$sample=$path.''.$_SESSION['@member@'].rand().'.'.$get;
			$dburl=str_replace(LOCALPAT,SERVERPAT, $sample);
			if($move=move_uploaded_file($_FILES['img']['tmp_name'],$sample)){
				try{
				$gud= $Regin->UploadAvarta($_SESSION['@member@'],$dburl);
				}catch(Exception $e){$er=$e->getMessage(); unlink($sample);}
			}else{$er='upload failed please try again';}
		}else{$er='invalid passport format; image must be in Jpg, Jpeg or Png ';}
	}else{$er='oops!, passport is required';}
}	


?>

<?php if(!isset($_GET['p'])){ ?>
	<?php if(!isset($_SESSION['@member@'])){ ?>
<link rel="stylesheet" type="text/css" href="css/slideWiz.css" />
	<style type="text/css">
	.slide-container {
    width: 100%;
    height: 398px;
    float: none;
    overflow: hidden;
	}
	</style>
<section id="sliderbox">
	<div class="slide-container"></div>
</section>

<section id="sliderList">
<div class="container">
     <div class="row">

	<div class="col-md-12 col-sm-12">
		<div class="boxshow">
			<!--<h4>Wine Chase</h4>-->
<p>Many of us drink too much alcohol. Often people can get stuck in their thinking about drinking. Sometimes people dwell too much on whether their drinking is a problem or not. This can prevent them from making small changes that might help them drink in a less risky way and make it less likely they will have problems in the future.</p>

<p>Whether you are not sure if you need to cut back or if drinking is a real problem, Winechase has the information and tools to help you look more closely at your dinking</p>
		</div>
	</div>
	
	</div>

</div>
</section>
<script type="text/javascript" src="js/slideWiz.js"></script>
<script type="text/javascript" src="js/slideWizAddup.js"></script>

<?php } ?>
<?php } ?>

<div class="container">

<?php if(isset($_GET['p']) && $_GET['p']=='JoinUs'){ ?>
	<div class="row">
		<div class="col-md-offset-2 col-sm-offset-2 col-md-8 col-sm-8 col-xs-12">
			<div class="RegBox">
				<h3>Join Us</h3>
				<p>Join us by creating an Account with us.. <i class="fa fa-pencil"></i></p>

				<form name="form1" action="" method="POST" class="form-horizontal">
					<?php if(isset($er))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';}elseif(isset($reg)){ echo '<div class="alert alert-success text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-check-circle"></i> '.$reg.'</div>'.'<script type="text/javascript">jQuery(document).ready(function(e){setTimeout(function(){window.location.href="'.$_SERVER['PHP_SELF'].'?p=Login";},5000);})</script>';} ?>
					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-user"></i> Full Name</label>
							<input type="text" name="name" class="form-control text-control" placeholder="Full Name" autocomplete="off" autofocus="On" required="required" value="<?php if(isset($_POST['reg'])){ echo $_POST['name']; } ?>" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-envelope"></i> email address</label>
							<input type="text" name="email" class="form-control text-control" placeholder="Email Address" autocomplete="off" autofocus="On" required="required" value="<?php if(isset($_POST['reg'])){ echo $_POST['email']; } ?>" style="text-transform: lowercase;" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-lock"></i> Password <i style="font-size:9.5px;color:#FF0000">Password should be morethan five (5) characters</i></label>
							<input type="password" name="acex" class="form-control text-control" placeholder="Password" autocomplete="off" autofocus="On" required="required" style="text-transform: lowercase;"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-lock"></i> Confirm Password</label>
							<input type="password" name="acex2" class="form-control text-control" placeholder="Confirm Password" autocomplete="off" autofocus="On" required="required" style="text-transform: lowercase;" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-desktop"></i> Display Name <i style="font-size:9.5px;color:#FF0000">Display Name should be morethan four (4) characters</i></label>
							<input type="text" name="dname" class="form-control text-control" placeholder="Display Name" autocomplete="off" autofocus="On" required="required" value="<?php if(isset($_POST['reg'])){ echo $_POST['dname']; } ?>" style="text-transform:;" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-male"></i> Gender</label>
							<select name="sex" class="form-control text-control2" title="Gender" required="required">
								<option value="0" selected="selected">- SELECT -</option>
								<option value="1">MALE</option>
								<option value="2">FEMALE</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-calendar"></i> Date of Birth</label>
							<input type="date" name="dob" class="form-control text-control" placeholder="Date of Birth" title="Date of Birth" autocomplete="off" autofocus="On" required="required" value="<?php if(isset($_POST['reg'])){ echo $_POST['dob']; } ?>" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-money"></i> How much would you say that the average drink costs you? </label>
							<select name="drink" class="form-control text-control2" title="SELECT OPTION" required="required">
								<option value="0" selected="selected">- SELECT -</option>
								<option value="100"> &#x20A6 100 </option>
								<option value="200"> &#x20A6 200 </option>
								<option value="300"> &#x20A6 300 </option>
								<option value="400"> &#x20A6 400 </option>
								<option value="500"> &#x20A6 500 </option>
							</select>
						</div>
					</div>


					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-glass"></i> What is your rate of drinking per day </label>
							<select name="rate" class="form-control text-control2" title="SELECT OPTION" required="required">
								<option value="0" selected="selected">- SELECT -</option>
								<option value="1"> 1 - 5 </option>
								<option value="2"> 6 - 10 </option>
								<option value="3"> 11 and above </option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-line-chart"></i> Your goal is to</label>
							<select name="lvl" id="lvl" class="form-control text-control2" title="Grade" required="required">
								<option value="0" selected="selected">- SELECT -</option>
								<option value="1"> Stop drinking altogether </option>
								<option value="2"> Cut down number of drinks per day </option>
								<option value="3"> I'm not sure what my goal is at this point </option>
							</select>
						</div>
					</div>
					
					<div class="form-group" style="display:none;" id="idrink">
						<div class="col-xs-12">
							<label><i class="fa fa-glass"></i> Number of Drink</label>
						<input type="text" name="nod" class="form-control text-control" placeholder="Number of Drink" autocomplete="off" autofocus="On"/>	
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label> <input type="checkbox" name="checkme" id="checkme" /> <em style="font-size: 11px">Please check this box to acknowledge that your non-personal information will be used for purposes of improving this program. Your use of this program is subject to your data being used for research purposes. We do not collect or analyze individual statistics.<br/>
<b style="color:red" id="faze"> <i class="fa fa-exclamation-triangle"></i> By submitting this form, you acknowledge that this program is for educational purposes only and is not to be used as a substitute for a consultation or visit with your family physician or other healthcare provider.</b>
</em></label>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-offset-1 col-xs-10">
							<button type="submit" name="reg" id="reg" class="btn btn-block btn-success" disabled="disabled"> J O I N U S <i class="fa fa-pencil"></i> </button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>

<?php } ?>


<?php if(isset($_GET['p']) && $_GET['p'] =='Login'){ ?>
<div class="row">
		<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
	

			<div class="LoginBox">
				<h3>Welcome Back, </h3>
				<p>You may Login with your Display Name</p>

				<form name="form1" action="" method="POST" class="form-horizontal">

					<?php if(isset($_POST['log']))if($er){ echo '<div class="alert alert-danger text-center text-uppercase" style="padding: 8px 10px"><i class="fa fa-times-circle"></i> '.$er.'</div>';} ?>
					
					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-desktop"></i> Display Name</label>
							<input type="text" name="uname" class="form-control text-control" placeholder="Display Name" autocomplete="off" autofocus="On" required="required" value="<?php if(isset($_POST['log'])){ echo $_POST['uname']; }elseif(isset($_COOKIE["uname"])) { echo $_COOKIE["uname"]; } ?>" style="text-transform: lowercase;" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label><i class="fa fa-unlock-alt"></i> Password</label>
							<input type="password" name="acex" class="form-control text-control" placeholder="Password" autocomplete="off" autofocus="On" required="required" style="text-transform: lowercase;" value="<?php if(isset($_COOKIE["acex"])) { echo $_COOKIE["acex"]; } ?>" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<p class="pull-left"><label>
					<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["remember"])) { ?> checked <?php } ?> /> <em>Remember Me</em></label></p>
							<p class="pull-right"><a href="javascript:void();"><i class="fa fa-lock"></i> Forgotten Password</a></p>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-offset-1 col-xs-10">
							<button type="submit" name="log" class="btn btn-block btn-primary"> <i class="fa fa-sign-in"></i> L O G I N </button>
							
						</div>
					</div>

				</form>

			</div>
		
		</div>

	</div>

<?php } ?>


<?php if(isset($_SESSION['@member@'])){ ?>


<div class="row">
      <div class="col-md-10 toppad col-md-offset-1 col-sm-offset-2 col-sm-8" style="margin-bottom: 30px">
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-user"></i> <?php echo $data->name; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-sm-2 col-xs-12" align="center">
                	<img alt="<?php echo $data->name; ?>" src="<?php echo $data->img; ?>" class="img-circle img-responsive"> 
				<p style="margin-top: 3px;">
				 <button id="myBtn" class="btn btn-primary text-center" title="CHANGE AVATAR" style="cursor: pointer;"><i class="fa fa-photo"></i> CHANGE AVATAR </button> <br/>
				<?php if($data->stage==0){ echo '<em style="text-transform: none; font-size: 11px; line-height: 2px;text-align: center; color:red">Change AVATAR to enable your menu bar active</em>';} ?>
				</p>
                </div>

                <div class="col-md-9 col-sm-10 col-xs-12"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Full Name:</td>
                        <td><?php echo $data->name; ?></td>
                      </tr>
                      <tr>
                        <td>Email Address:</td>
                        <td><?php echo $data->email; ?></td>
                      </tr>
                      <tr>
                        <td>Display Name:</td>
                        <td><?php echo $data->dname; ?></td>
                      </tr>                   
                         <tr>
                        <td>Gender:</td>
                        <td><?php $uti->Chg_Gender($data->sex); ?></td>
                      </tr>
                        <tr>
                        <td>Date of Birth:</td>
                        <td><?php echo date('D (d) F Y',strtotime($data->dob)); ?></td>
                      </tr>
                      <tr>
                        <td>Your GOAL is to: </td>
                        <td><?php $uti->Chg_Goal($data->goal); ?> 
                        <?php if($data->goal==2){ echo 'to '.$data->nob;} ?>
                    </td>
                      </tr>
                      <tr>
                        <td>Your total consumption is:</td>
                        <td><?php $uti->Chg_Drink($data->rate); ?> bottles</td>                           
                      </tr>

                      <tr>
                        <td>Your Amount spent on drink: </td>
                        <td><?php echo '&#x20A6 '.$data->amt; ?></td>                           
                      </tr>
                     
                    </tbody>
                  </table>                  
                 
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a href="#" class="btn btn-success btn-block"><i class="fa fa-check"></i> ACCOUNT ACTIVE </a>                        
                    </div>
            
          </div>
        </div>
      </div>

      <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  	<h4 class="pull-left">UPLOAD AVATAR</h4>
    <span class="close pull-right">×</span><br/>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <p align="center">
<img name="" src="" alt="" width="135" height="145"  id="tim" style="margin-top:5px;margin-bottom: 4px;" class="img-rounded lop"/><br/>
<input type="file" name="img" id="imginp"  onchange="readURL(this)" style="border:none; cursor:pointer;padding: 4px;" required="required"/>
<input type="submit" name="ake" id="ake" value="UPLOAD" class="btn btn-primary active" style="margin-top: 4px;padding: 5px"/>
    </p>
</form>
  </div>

</div>

<?php } ?>

</div>

<style type="text/css">
	/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 28%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    text-decoration: none;
    cursor: pointer;
}
</style>
<script type="text/javascript">
	// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$('#tim').hide();
	function readURL(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function (e){
				$('#tim').attr('src',e.target.result);
				$('.lop').show().css('border-color','#999');
				$('.lop').show().css('border-width','1px');
				$('.lop').show().css('border-style','inset');
				$('.lop').show().css('-moz-border-radius','4px');
				$('.lop').show().css('-webkit-border-radius','4px');
				$('.lop').show().css('border-radius','4px');
				
			}
			reader.readAsDataURL(input.files[0]);
		}
		}

$("#imginp").change(function(){
    readURL(this);
});	

</script>

<script type="text/javascript">
	
jQuery(document).ready(function(e) {
	$('#lvl').click(function(e) {
		var elvl= $('#lvl').val();
		if(elvl=='2'){
			$('#idrink').show();
		}else{
			$('#idrink').hide();
		}
	});

	<?php if(isset($_POST['reg']))if($_POST['lvl']=='2'){ ?>
			$('#idrink').show();
		<?php }  ?>


})
</script>

<?php require_once('libs/foot.php'); ?>
