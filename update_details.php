<?php
   include('session.php');
?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Thanks you</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<style>
    
	  
	  input[type=text],
      input[type=email],
      textarea,
      select {
       width: 100%; 
     }
</style>
 <script type="text/javascript" src="js/jquery.js"></script>

 <!-- prevent click f5 refresh button -->
 <script>
  function disable_f5(e)
 {
   if ((e.which || e.keyCode) == 116)
  {
      e.preventDefault();
  }
 }

  $(document).ready(function(){
    $(document).bind("keydown", disable_f5);    
  });
 </script>
 
 <script type="text/javascript">
    window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";
    }
</script>
</head>
<body>

<!--Header-part-->
<div id="header">
   <img src="logo/logo.png" width="220px" />
  <!--<h1>Admin</h1>-->
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome  <?php echo $login_session; ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
 
   
    
  </ul>
</div>

 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
  
    
    <li><a href="job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>
	<li><a href="job_history.php"><i class="icon icon-th"></i> <span>Job history</span></a></li>
    <li><a href="payment_update.php"><i class="icon icon-th"></i> <span>Payment update</span></a></li>
    
    

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Thank you</a> </div>
    <h1>Thank you for your update job!</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       
       
   
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Thank You</h5>
          </div>
          <div class="widget-content nopaddings">
		 
		  
	
           <h1> For Billing</h1>

		    <b>Contract no.</b> <?php echo $_GET["cno"]; ?><br/>
			<b>Company name:</b> <?php echo $_GET["cname"]; ?><br/>
			<b>Reg no:</b> <?php echo $_GET["crn"]; ?><br/>
			<b>GST no:</b> <?php echo $_GET["gst"]; ?><br/>
			<b>Address(Billing):</b> <?php echo $_GET["ca"]; ?><br/>
			<b>Tel:</b> <?php echo $_GET["ot"]; ?><br/>
			<b>Fax:</b> <?php echo $_GET["of"]; ?><br/>
			<b>Email(Billing):</b> <?php echo $_GET["eb"]; ?><br/>
			<b>Master Email for Password Verification:</b> <?php echo $_GET["em"]; ?>
			<h1>For Website</h1>
			<b>Company name:</b> <?php echo $_GET["cnw"]; ?><br/>
			<b>Reg no:</b> <?php echo $_GET["crnw"]; ?><br/>
			<b>GST no:</b> <?php echo $_GET["gstw"]; ?><br/>
			<b>Address (Website):</b> <?php echo $_GET["caw"]; ?><br/>
			<b>Tel: </b> <?php echo $_GET["opw"]; ?><br/>
			<b>Fax:</b> <?php echo $_GET["ofw"]; ?><br/>
			<b>E-mail(Website):</b> <?php echo $_GET["ew"]; ?><br/>
			<b>Domain Type:</b> <?php echo $_GET["dt"]; ?><br/>
			<b>Domain Name:</b> <?php echo $_GET["dn"]; ?><br/>
			<b>How Many Email Account:</b> <?php echo $_GET["noe"]; ?><br/>
			<b>Company Business:</b> <?php echo $_GET["cb"]; ?><br/>
			<b>Package:</b> <?php echo $_GET["package"]; ?><br/>
			<b>Total package amount:</b> <?php echo $_GET["Total"]; ?><br/>
			<b>Payment:</b> <?php echo $_GET["pa"]; ?><br/>
			<b>Reason to redo website:</b> <?php echo $_GET["reason"]; ?>
			<h1>Customer Details</h1>
			<b>Contact person:</b> <?php echo $_GET["custname"]; ?><br/>
			<b>Customer Description(Age, Attitude, PC Knowledge, Intro by?):</b> <?php echo $_GET["cd"]; ?><br/>
			<b>Customer Phone:</b> <?php echo $_GET["custphone"]; ?><br/>
			<b>Designation:</b> <?php echo $_GET["custdesign"]; ?><br/>
			
			
			
		  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Newpages Network Sdn Bhd Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<!--<script src="js/jquery.min.js"></script>-->
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<!--<script src="js/jquery.dataTables.min.js"></script>-->
<script src="js/matrix.js"></script> 
<!--<script src="js/matrix.tables.js"></script>-->


</body>
</html>



