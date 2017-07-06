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
    <h1>Thank you for your add job!</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       <?php
	       $id = $_SESSION['user_id'];
	       $query="SELECT * FROM job LEFT JOIN salesperson ON job.sales_id = salesperson.Sales_id order by job_id desc where job.sales_id=$id";
           $result = mysqli_query($db,$query);
           $row = mysqli_fetch_assoc($result);
	   
	   ?>
       
   
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Thank You</h5>
          </div>
          <div class="widget-content nopaddings">
		    <h1> For Billing</h1>
			<b>Company name:</b> <?php echo $result['company_name']; ?><br/>
			<b>Company Reg no:</b> <?php echo $_POST["CompanyReg"]; ?><br/>
			<b>GST no:</b> <?php echo $_POST["GSTNo"]; ?><br/>
			<b>Company Address:</b> <?php echo $_POST["Company_Address"]; ?><br/>
			<b>Office phone:</b> <?php echo $_POST["Office_Phone"]; ?><br/>
			<b>Office Fax:</b> <?php echo $_POST["Office_Fax"]; ?><br/>
			<b>Email(Billing):</b> <?php echo $_POST["email_billing"]; ?><br/>
			<b>Email Master:</b> <?php echo $_POST["email_master"]; ?>
			<h1>For Website</h1>
			<b>Company name:</b> <?php echo $_POST["CompanyName"]; ?><br/>
			<b>Company Reg no:</b> <?php echo $_POST["Company_Reg"]; ?><br/>
			<b>GST no:</b> <?php echo $_POST["GST_No"]; ?><br/>
			<b>Company Address:</b> <?php echo $_POST["CompanyAddress"]; ?><br/>
			<b>Office phone:</b> <?php echo $_POST["OfficePhone"]; ?><br/>
			<b>Office Fax:</b> <?php echo $_POST["OfficeFax"]; ?><br/>
			<b>E-mail(Website):</b> <?php echo $_POST["email_website"]; ?><br/>
			<b>Domain Type:</b> <?php echo $_POST["DomainType"]; ?><br/>
			<b>Domain Name:</b> <?php echo $_POST["DomainName"]; ?><br/>
			<b>No of e-mail account:</b> <?php echo $_POST["NoEmailAccount"]; ?><br/>
			<b>Company Business:</b> <?php echo $_POST["CompanyBusiness"]; ?><br/>
			<b>Package:</b> <?php echo $_POST["package"]; ?><br/>
			<b>Payment:</b> <?php echo $_POST["amount"]; ?><br/>
			<b>Reason to redo website:</b> <?php echo $_POST["Reason"]; ?>
			<h1>Customer Details</h1>
			<b>Contact person:</b> <?php echo $_POST["customer"]; ?><br/>
			<b>Customer Description:</b> <?php echo $_POST["CustomerDescription"]; ?><br/>
			<b>Customer Phone:</b> <?php echo $_POST["customerPhone"]; ?><br/>
			<b>Customer Designation:</b> <?php echo $_POST["customer_design"]; ?><br/>
			
		  
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
  ?>
	      <script type="text/javascript">
		    window.open("test.php");
		  </script>
	   <?php