<?php

include('functions.php');

@$Login= new Access;
@$Regin= new UserEnd;


if(isset($_SESSION['@member@'])){
	$uti= new Utilities;
	$data= $Regin->GetSingle($_SESSION['@member@']);
	$datall= $_SESSION['@memberdata@'];
}

?>


<!DOCTYPE html>
<html>
<head>
	<title> Home Page | <?php if(!isset($_SESSION['@member@'])){ ?> <?php if(isset($_GET['p'])){ echo $_GET['p']; }else{ echo 'On Get Display';} ?><?php }elseif(isset($_SESSION['@member@'])){ echo $_SESSION['@member@']; } ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="Description" content="Project Topic and Description">
	<meta name="keywords" content="Wine,Beer,effect,drink,minimize,stop,addiction,correction" />
	<meta name="author" content="Charity">
	 <!-- <meta http-equiv="refresh" content="5; URL="> -->
	<meta name="generator" content="Reconnect" /> 
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
	<meta http-equiv="pragma" content="no-cache" /> 
	<meta http-equiv="content-style-type" content="text/css" /> 
	<meta http-equiv="content-script-type" content="text/javascript" />
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERPAT; ?>css/bootstrap.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERPAT; ?>css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERPAT; ?>css/style.css">	
	<script type="text/javascript" src="<?php echo SERVERPAT; ?>js/jquery214min.js"></script>
	<script type="text/javascript" src="<?php echo SERVERPAT; ?>js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo SERVERPAT; ?>js/custom.js"></script>
	<link href="<?php echo SERVERPAT; ?>img/winez.png" rel="shortcut icon" type="image/jpg" />
</head>
<body>
	<!--Header Tag -->
<header class="navbar navbar-default navbar-fixed-top" role="banner">
      <div class="container">
        <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"
      title="<?php echo SHORTNAME; ?>">
         <span class="sr-only"><?php echo SHORTNAME ?></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
     </button>
<a class="navbar-brand" href="<?php echo SERVERPAT; ?>" title="<?php echo SITENAME; ?>"><img src="<?php echo SERVERPAT.'img/winez.png'; ?>"></a>
            </div>

 <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
   <li><a href="<?php echo SERVERPAT; ?>">Home</a></li>

    <li class="dropdown">
   <a href="<?php echo SERVERPAT; ?>" class="dropdown-toggle" data-toggle="dropdown">alcohol overview</a>
   <?php if(isset($_SESSION['@member@'])){ ?>
    <ul class="dropdown-menu">
	<li><a href="<?php echo SERVERPAT; ?>p/overview.php?f=overview"> introduction</a></li>
	<li><a href="<?php echo SERVERPAT; ?>p/overview.php?f=alcohol-and-health"> alcohol and your health</a></li>
	<li><a href="<?php echo SERVERPAT; ?>p/overview.php?f=socioeconomic-effects-of-alcohol"> socioeconomic effects of alcohol</a></li>	
</ul>
<?php } ?>
</li>
   
   <li class="dropdown">
   <a href="<?php echo SERVERPAT; ?>" class="dropdown-toggle" data-toggle="dropdown">are you addicted</a>
   <?php if(isset($_SESSION['@member@'])){ ?>
    <ul class="dropdown-menu">
    <li><a href="<?php echo SERVERPAT; ?>p/addicted.php?f=knowing-your-status"> knowing your status</a></li>
	<li><a href="<?php echo SERVERPAT; ?>p/addicted.php?f=blood-alcohol-calculator"> blood alcohol calculator</a></li>
	<li><a href="<?php echo SERVERPAT; ?>p/addicted.php?f=drink-too-much"> Do you drink too much</a></li>
</ul>
<?php } ?>
</li>

   <li class="dropdown">
   <a href="<?php echo SERVERPAT; ?>" class="dropdown-toggle" data-toggle="dropdown"> cutting down </a>
    <?php if(isset($_SESSION['@member@'])){ ?>
    <ul class="dropdown-menu">
	<li><a href="<?php echo SERVERPAT; ?>p/control.php?f=making-the-move"> Making the move </a></li>
	<li><a href="<?php echo SERVERPAT; ?>p/control.php?f=set-your-goal"> set your goal </a></li>
	<li><a href="<?php echo SERVERPAT; ?>p/control.php?f=view-public-pledge"> view public pledge </a></li>
	<li><a href="<?php echo SERVERPAT; ?>p/control.php?f=track-your-drinking"> track your drinking </a></li>
<?php if($data->rate==3 OR $data->rate==2){ ?><li><a href="<?php echo SERVERPAT; ?>p/control.php?f=cutting-back"> Cutting back</a></li><?php } ?>
<?php if($data->rate==3){ ?><li><a href="<?php echo SERVERPAT; ?>p/control.php?f=changing-the-rule"> changing the rules</a></li><?php } ?>
</ul>
<?php } ?>
</li>

   <li class="dropdown">
   <a href="<?php echo SERVERPAT; ?>" class="dropdown-toggle" data-toggle="dropdown"> staying on track </a>
   <?php if(isset($_SESSION['@member@'])){ ?>
    <ul class="dropdown-menu">
	<li><a href="<?php echo SERVERPAT; ?>p/adaptation.php?f=maintenance"> Maintenance </a></li>
	<li><a href="<?php echo SERVERPAT; ?>p/adaptation.php?f=first-two-weeks"> the first two weeks </a></li>
	<li><a href="<?php echo SERVERPAT; ?>p/adaptation.php?f=forums"> forums </a></li>
<?php if($data->rate==3 OR $data->rate==2){ ?><li><a href="<?php echo SERVERPAT; ?>p/adaptation.php?f=triggers"> triggers </a></li><?php } ?>
<?php if($data->rate==3){ ?><li><a href="<?php echo SERVERPAT; ?>p/adaptation.php?f=dealings-with-desires"> dealings with desires </a></li><?php } ?>
<li><a href="<?php echo SERVERPAT; ?>p/adaptation.php?f=feedback"> feedback </a></li>
<li><a href="<?php echo SERVERPAT; ?>p/adaptation.php?f=feedback-reply"> feedback reply </a></li>
<?php if($data->rate==3 OR $data->rate==2){ ?><li><a href="<?php echo SERVERPAT; ?>p/adaptation.php?f=result-achieved">Result achieved </a></li><?php } ?>
</ul>
<?php } ?>
</li>
<?php if(!isset($_SESSION['@member@'])){ ?>
   <li><a href="<?php echo SERVERPAT; ?>?p=Login" style="color:blue"><i class="fa fa-lock"></i> Login</a></li> 
   <li><a href="<?php echo SERVERPAT; ?>?p=JoinUs" style="color: green"><i class="fa fa-user"></i> Join Us</a></li>
<?php }elseif(isset($_SESSION['@member@'])){ ?>
	<li><a href="<?php echo SERVERPAT; ?>" style="color:green"><i class="fa fa-user"></i> <?php echo $data->dname; ?></a></li> 
   <li><a href="<?php echo SERVERPAT; ?>logout.php" style="color:red"><i class="fa fa-sign-out"></i> Logout</a></li>
<?php } ?>
</ul>
  		 </div>
 	</div>
</header>