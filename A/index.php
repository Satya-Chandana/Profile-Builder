
<!DOCTYPE html>
<html>
<head>
	<title>Online Profile Builder</title>
<?php require 'assets/function.php';?>
<?php require "assets/autoloader.php";?>
	<style type="text/css">
<?php include 'css/myStyle.css';?>		


.treb{font-family: 'KoHo', sans-serif;}
.flex{display: flex}
.hub-top {position: fixed;top: 0;z-index: 20;width: 100%;height: 111px;}
.logo{padding:11px 5px 11px 22px;color: white}
.logo i{color: white;font-size: 77pt}
.logoname{color: white;font-size: 22pt;padding: 22px 11px;}
.login{margin: 11px; color:white;}
.m1{margin: 1px}
.dashboard{background: #333333;position: fixed;height: 100%;width: 17%;padding-top: 111px;}
.dashboard span{color:white;font-size:20px;letter-spacing:1px;padding: 11px 22px;display: block;}
.dashboard ul{list-style: none;padding: 0}
.dashboard ul li{color: white;padding: 6px 22px;display: block;font-size: 14pt;box-shadow: 1px 1px 2px black;;margin-top: 3px}
.dashboard ul li:hover{cursor: pointer;background: #ADD8E6;color: black}
.dashboard ul li i{float: right;padding-top: 5px}
/* .dashboard:hover{box-shadow: 2px 2px 22px green} */
.admin-pic{position: relative;top: -88px;left: 33px}
.admin-name{position: relative;top: -166px;left: 166px;font-size: 13pt;}
.admin-pic img{width: 111px ;height: 111px}
/* .name{} */
.center{text-align: center;}
#mydiv:hover{box-shadow: 2px 2px 22px blue}
</style>
</head>
<body style="background-color:black;">


<div class="background-image"></div>
<div class="hub-top">
	<div class="logo flex pull-left">
		<div><i class="glyphicon glyphicon-cloud"></i></div>
		<div class="logoname treb"><span>CV Builder</span></div>
	</div>


	<!-- <div class="login pull-right " style="margin-right: 44px">
		<div><img src="photo/user.png" class="img-responsive" style="width: 55px;margin:auto;"></div>
		<div class="treb" class="name " ><span style="text-align: center;"><?php echo userName(); ?></span><br>
		<a href="setting.php"><button class="btn btn-success btn-sm" style="padding: 1px 11px;font-size: 8pt">Setting <i class="fa fa-gear fa-fw"></i></button></a>
		</div>

	</div> -->

</div>
<div class="dashboard treb " style="background-color:transparent;  opacity: inherit;">
	<span class="dbname">Dashboad</span>
	<ul>
		<a href="index.php" ><li style="background:#739099"><i class="fa fa-home fa-fw"></i> Home</li></a>
		<a href="newCv.php"><li><i class="fa fa-edit fa-fw"></i> Build New CV</li></a>
		<a href="savedCv.php"><li><i class="fa fa-user-circle fa-fw"></i>Saved CV's</li></a>
		<a href="../index.html"><li><i class="fa fa-user-circle fa-fw"></i>LOGOUT</li></a>
	
	</ul>
</div>
<div style="margin-left: 18%;padding-top: 122px" class="flex">
	
	<div class="well well-sm" id="mydiv" style="width: 84%;margin-left: 33px;font-family: 'KoHo', sans-serif;background-color: rgba(0, 0, 0, 0.4);  opacity: inherit">
		<div class="well well-sm " style="background-color: rgba(0, 0, 0, 0.4);  opacity: inherit;color: white"><h4 class="center">How It Works</h4></div>
		<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style=" text-decoration: none;">1. Select Theme</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body" >
      	<div class="panel panel-primary">
      		
      		<div class="panel-body" style="text-transform: capitalize;"><h4> Select your sutiable cv theme which you want to build,customise it and get your cv faster and professional.</h4></div>
      		<div class="panel-body"><h4> Access Your Resume From Any Corner Of The World And Perform Various Editing Updates.</h4></div>
      		<!-- <div class="panel-body"></div> -->
      	</div>
      	
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" style=" text-decoration: none;" href="#collapse2">
       2.Enter Details</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      		<div class="panel-body" >
      	<div class="panel panel-primary">
      		
      		<div class="panel-body"><h4>Enter Your Required Necessary Details ,And Make Your Resume Look Very Disiplined And Neat.</h4></div>
      		<div class="panel-body"><h6>Your Data Is 100% Secure With Us. </h6></div>
      		<!-- <div class="panel-body">Select your sutiable cv theme which you want to build,customise it and get your cv faster and professional</div> -->
      	</div>
      	
      </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" style=" text-decoration: none;" href="#collapse3">
        3.Finish And Download Customised CV</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
      		<div class="panel-body" >
      	<div class="panel panel-primary">
      		
      		<div class="panel-body"><h2>YES!!! The Final Step.</h2></div>
      		<div class="panel-body"><h4>Save - Download The Resume .And Its All Set TO Represent You .</h4></div>
      		<div class="panel-body"><h3>Best Of Luck For your Carrier.</h3></div>
      	</div>
      	
      </div>
      </div>
    </div>
  </div>
</div>
	</div>
</div>
</body>
</html>

