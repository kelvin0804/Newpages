<?php
   include('session_admin.php');
 
   
 
  
 
   
  
  

  
  $sid = $_REQUEST["sid"];

  $query="select * from salesperson where Sales_id = $sid";
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  
  $sql="select * from branch";
  $res = mysqli_query($db,$sql);
  $row1 = mysqli_fetch_assoc($res);
  
 
 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Newpages Admin</title>
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
  
    
    <?php
	  if($_SESSION['position']  == 'super')
	  {
	    echo'<li><a href="home.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>';
        echo'<li class="active"><a href="joblist2.php"><i class="icon icon-th"></i> <span>All Job</span></a></li>';
	    echo'<li ><a href="add_job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>';
	    echo'<li ><a href="view_update2.php"><i class="icon icon-th"></i> <span>Payment History </span></a></li>';
	    echo'<li ><a href="create_admin.php"><i class="icon icon-th"></i> <span>Create Admin</span></a></li>';
        echo'<li ><a href="create_salesperson.php"><i class="icon icon-th"></i> <span>Create Salesperson</span></a></li>';  
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Salesperson details</a> </div>
    <h1>Salesperson details</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       
       
   
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Update Job</h5>
          </div>
          <div class="widget-content nopaddings">
               <form action="" method="post" enctype="multipart/form-data" >
         
                <fieldset>
			
				
				     <dl>
                        <dt><label >Status</label></dt>
                        <dt>
						  <select name="sales_status" >
						     
							 <option value="<?php echo $row['sales_status'];?>">Current:<?php echo $row['sales_status'];?></option>
						     <option value="active">Active</option>
							 <option value="inactive">Inactive</option>
							 
						  </select>
						
						</dt>
                    </dl>
					
                    <dl>
                        <dt><label >Sales name</label></dt>
                        <dt><input type="text"  id="sales_name" name="sales_name" value="<?php echo $row['Sales_name'];?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label >Sales email.</label></dt>
                        <dt><input type="text"  id="sales_email"name="sales_email" value="<?php echo $row['Sales_email']; ?>" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label >Sales phone:</label></dt>
                        <dt><input type="text" id="sales_phone"name="sales_phone"  size="54" value="<?php echo $row['Sales_phone']; ?>"  ></dt>
                    </dl>
					
					<dl>
                        <dt><label >Sales password:</label></dt>
                        <dt><input type="text" id="sales_pass"name="sales_pass"  size="54"  value="<?php echo $row['Sales_password']; ?>"  ></dt>
                    </dl>
					
					<dl>
                        <dt><label>Sales Branch:</label></dt>
                        <dt>
						<input type="text" id="salesbranch"name="salesbranch"  size="54"  value="<?php echo $row['sales_branch']; ?>"  disabled>
						</dt>
                    </dl>
					
					
					
					
					
					<dl>
                       <dt><input type="submit" id="update" name="update" value="Update" ></dt>
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
   
    if(isset($_POST["update"])){
         $sales_name=$_POST['sales_name'];
	     $sales_phone=$_POST['sales_phone'];
		 $sales_email=$_POST['sales_email'];
		 $sales_pass=$_POST['sales_pass'];
		 $sales_status=$_POST['sales_status'];
		 
		 mysqli_query($db,"update salesperson set Sales_name='$sales_name',Sales_email='$sales_email',Sales_phone='$sales_phone',Sales_password='$sales_pass',sales_status='$sales_status' where Sales_id=$sid ");
		 
		 echo "<meta http-equiv='refresh' content='0'>";
			
		  
	    ?>
	
		<script type="text/javascript">
			alert("sunceffully update salesperson!");
			
		</script>
		
		
	
	<?php
   
   }
 ?>
