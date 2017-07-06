<?php
include('session_admin.php');
define('PR_UPLOADPATH','provement/');

$jid = intval($_REQUEST["jid"]);
if($_SESSION['position']  == 'super'){
 $query="select * from job where job_id = '$jid'";
 $result = mysqli_query($db,$query);
 $row = mysqli_fetch_assoc($result);
}
else if($_SESSION['position']  == 'KL'){
  $query="select * from job where branch_name='KL' AND job_id = '$jid'"; 
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
}
else if($_SESSION['position']  == 'Klang'){
  $query="select * from job where branch_name='Klang' AND job_id = '$jid'";
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);  
}
else if($_SESSION['position']  == 'Johor'){
    $query="select * from job where branch_name='Johor' AND job_id = '$jid'";   
	$result = mysqli_query($db,$query);
   $row = mysqli_fetch_assoc($result);
}
else if($_SESSION['position']  == 'Melaka'){
    $query="select * from job where branch_name='Melaka' AND job_id = '$jid'";  
    $result = mysqli_query($db,$query);
   $row = mysqli_fetch_assoc($result);	
}
else if($_SESSION['position']  == 'Penang'){
    $query="select * from job where branch_name='Penang' AND job_id = '$jid'";
    $result = mysqli_query($db,$query);
   $row = mysqli_fetch_assoc($result);	
}

if($row == false){
  header('location:joblist2.php');
}

//get a salesperson id
$get_sales_id="select sales_id from job where job_id = '$jid'";
$result = mysqli_query($db,$get_sales_id);
$row = mysqli_fetch_array($result);
//
  
  
  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Update payment</title>
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


 <script type="text/javascript" src="js/jquery.js"></script>
 <style>
   input[type=text],
   select{
      width: 100%;
      height: 30px;
   }
   #other{
     width:100%;
	 height:150px;
   }
 </style>

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
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome  <?php echo $login_session_admin; ?></span><b class="caret"></b></a>
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
  
    
    <?php
	  if($_SESSION['position']  == 'super')
	  {
	    echo'<li><a href="home.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>';
        echo'<li class="active"><a href="joblist2.php"><i class="icon icon-th"></i> <span>All Job</span></a></li>';
	    echo'<li ><a href="add_job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>';
	    echo'<li ><a href="view_update2.php"><i class="icon icon-th"></i> <span>Payment History </span></a></li>';
	    echo'<li ><a href="create_admin.php"><i class="icon icon-th"></i> <span>Create Admin</span></a></li>';
        echo'<li ><a href="create_salesperson.php"><i class="icon icon-th"></i> <span>Create Salesperson</span></a></li>';
        echo'<li ><a href="deactive.php"><i class="icon icon-th"></i> <span>De-active Job</span></a></li>';		
	  }
	  else{
	    echo'<li class="active"><a href="joblist2.php"><i class="icon icon-th"></i> <span>All Job</span></a></li>';
	    echo'<li ><a href="add_job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>';
	    echo'<li ><a href="view_update2.php"><i class="icon icon-th"></i> <span>Payment History </span></a></li>';
	    echo'<li ><a href="create_salesperson.php"><i class="icon icon-th"></i> <span>Create Salesperson</span></a></li>'; 
	  }
	?>
    
    

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Update Payment</a> </div>
    <h1>Update Payment</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       
       
   
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th-list"></i></span>
            <h5>Update Payment</h5>
          </div>
          <div class="widget-content nopaddings">
		 
               <form action="" method="post" enctype="multipart/form-data" onsubmit="return checkSubmit()">
		    <fieldset>
			        <dl>
                      <dt><input type="date"  style="display:none;"id="submit_date" name="submit_date"  value="<?php echo date('Y-m-d');?>" ></dt>

                       
                    </dl>
					
				
					
			    	<dl>
                        <dt><label for="PaymentType">Payment type:</label></dt>
                        <dt>
						  <select name="PaymentType">
						     <option disabled selected value> -- select an option -- </option>
						     <option value="Second deposit">Second deposit</option>
							 <option value="Renewal">Renewal</option>
							 <option value="Upgrade">Upgrade</option>
							 <option value="Balance">Balanc</option>
							 
							 
						   </select>
						
						</dt>
						
                    </dl>
					
						<dl>
                        <dt><label for="Payment">Payment:</label></dt>
                        <dt>
						  <select name="Payment">
						     <option disabled selected value> -- select an option -- </option>
						     <option value="Cheque">Cheque</option>
							 <option value="Cash">Cash</option>
							 <option value="Bank transfer/Online Banking">Bank transfer/Online Banking</option>
							 
						   </select>
						 
						</dt>
                    </dl>
					
					<dl>
					 <dt>Attachment:</dt>
					 <dt><input type="file" id="fileChooser"name="proof" onchange="return ValidateFileUpload()"></dt>
					</dl>
					
					<dl>
                        <dt><label for="payment_date">Payment Date:</label></dt>
                        <dt><input type="date" name="payment_date" >
					
						</dt>
						
                    </dl>
					
					
					<dl>
                        <dt><label for="amount">Payment Amount :</label></dt>
                        <dt>RM<input type="text" name="amount" >
						  
						</dt>
                    </dl>
					
					<dl>
                        <dt><label for="other">Remark:</label></dt>
                        <dt>
						  
						  <textarea id="other" name="other"  ></textarea>
						</dt>
						
                    </dl>
					
					<dl>
                       
                        <dt><input type="submit" name="submit" value="Update" ></dt>
                    </dl>
					
			</fieldset>
		 </form>
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

<?php
   if(isset($_POST["submit"])){
         $submit_date=$_POST['submit_date'];
		 $PaymentType=$_POST['PaymentType'];
		 $other_PaymentType=$_POST['other_PaymentType'];
         $Payment=$_POST['Payment'];
	     $payment_date=$_POST['payment_date'];
	     $amount=$_POST['amount'];
	     $other=$_POST['other'];
		 $Sales_id=$row[0];
		 
         
		 
		 if(($_FILES["proof"]["name"] != "")){
		     $allowedExts = array( "jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["proof"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["proof"]["type"] == "image/jpeg")|| ($_FILES["proof"]["type"] == "image/jpg")|| ($_FILES["proof"]["type"] == "image/pjpeg")|| ($_FILES["proof"]["type"] == "image/x-png")|| ($_FILES["proof"]["type"] == "image/png"))&& ($_FILES["proof"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["proof"]["error"] > 0) {
                 echo "Error: " . $_FILES["proof"]["error"] . "<br>";
                } else {}
	              
				   
				   //replace filename with filename_1 if the same name exists
				  $Originalproof  = $Finalproof = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['proof']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'provement/'.$Finalproof )) 
                    $Finalproof = $Originalproof.'_'.$FileCounter++; 
					$target=PR_UPLOADPATH . $Finalproof;
                    move_uploaded_file($_FILES['proof']['tmp_name'],$target);
                    
					
                   
	         } else {
                 echo '<script language="javascript">';   
                 echo 'alert("invalid format of image")';
                 echo '</script>';
              }
		}
		 
		  
		  $result=mysqli_query($db,"insert into payment_update(p_submit_date,payment_type,payment_u,payment_date_u,payment_amount_u,remark_u,provement,sales_id,job_id)VALUES('$submit_date','$PaymentType','$Payment','$payment_date','$amount','$other','$Finalproof','$Sales_id','$jid')");
          if($result == true)
          {
            echo"<script type='text/javascript'>location.href = 'view_update2.php'</script>";

			
          }
        
		   
          
	
	 
   
   }
   

?>

