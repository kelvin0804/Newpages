<?php
   include('session_admin.php');
 
  $puid = intval($_REQUEST["puid"]);
  if($_SESSION['position']  == 'super'){
   $query="select * from payment_update where payment_id = '$puid'";
  }
  else if($_SESSION['position']  == 'Johor'){
    $query="select * from payment_update pu JOIN job j ON pu.job_id=j.job_id where j.branch_name='Johor' AND pu.payment_id = '$puid'";
  }
  else if($_SESSION['position']  == 'Melaka'){
    $query="select * from payment_update pu JOIN job j ON pu.job_id=j.job_id where j.branch_name='Melaka' AND pu.payment_id = '$puid'";
  }
  else if($_SESSION['position']  == 'Penang'){
    $query="select * from payment_update pu JOIN job j ON pu.job_id=j.job_id where j.branch_name='Penang' AND pu.payment_id = '$puid'";
  }
  else if($_SESSION['position']  == 'KL'){
    $query="select * from payment_update pu JOIN job j ON pu.job_id=j.job_id where j.branch_name='KL' AND pu.payment_id = '$puid'";
  }
  else if($_SESSION['position']  == 'Klang'){
    $query="select * from payment_update pu JOIN job j ON pu.job_id=j.job_id where j.branch_name='Klang' AND pu.payment_id = '$puid'";
  }
  
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  
  if($row == false){
     header('Location:view_update2.php');
  }
 
  
 
   
  
  //path of image file
  define('PR_UPLOADPATH','bank_slip/');
  define('PR_UPLOADPATH2','provement/');


  
  
 
  
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
<link rel="stylesheet" type="text/css" href="css/enlarge.css">

<style>
   
	  
	  input[type=text],
      select
	  {
       width: 100%;
       height: 30px;
     }
	 
	 textarea{
	   width: 100%;
       height: 150px;
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
        echo'<li ><a href="joblist2.php"><i class="icon icon-th"></i> <span>All Job</span></a></li>';
	    echo'<li ><a href="add_job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>';
	    echo'<li class="active"><a href="view_update2.php"><i class="icon icon-th"></i> <span>Payment History </span></a></li>';
	    echo'<li ><a href="create_admin.php"><i class="icon icon-th"></i> <span>Create Admin</span></a></li>';
        echo'<li ><a href="create_salesperson.php"><i class="icon icon-th"></i> <span>Create Salesperson</span></a></li>';  
	  }
	  else{
	    echo'<li ><a href="joblist2.php"><i class="icon icon-th"></i> <span>All Job</span></a></li>';
	    echo'<li ><a href="add_job.php"><i class="icon icon-th"></i> <span>Add Job</span></a></li>';
	    echo'<li class="active"><a href="view_update2.php"><i class="icon icon-th"></i> <span>Payment History </span></a></li>';
	    echo'<li ><a href="create_salesperson.php"><i class="icon icon-th"></i> <span>Create Salesperson</span></a></li>'; 
	  }
	?>
    
    

  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Update payment</a> </div>
    <h1>Update Payment</h1>
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
               <form action="" method="post" enctype="multipart/form-data" onsubmit="return checkSubmit()">
		    <fieldset>
			    	<dl>
                        <dt><label for="PaymentType">Payment type:</label></dt>
                        <dt>
						   <select name="PaymentType">
						     <option value="<?php echo $row['payment_type']?>">Existing type:<?php echo $row['payment_type']?></option>
						     <option value="Renewal">Deposit</option>
							 <option value="Renewal">Renewal</option>
							 <option value="Balance">Balance</option>
							 <option value="Upgrade">Upgrade</option>
							 
						   </select>
						
						</dt>
						
                    </dl>
					
						<dl>
                        <dt><label for="Payment">Payment:</label></dt>
                        <dt> 
						  <select name="Payment">
						     <option value="<?php echo $row['payment_u']?>">Existing type:<?php echo $row['payment_u']?></option>
						     <option value="Cheque">Cheque</option>
							 <option value="Cash">Cash</option>
							 <option value="Bank transfer/Online Banking">Bank transfer/Online Banking</option>
							 
						   </select>
						 
						</dt>
                    </dl>
					
					<dl>
					 <dt><label>Attachment:</label></dt>
					  <dt>
						  <input type="file" name="attachement" />
					</dt>
					 <dt><img id="myImg" src="provement/<?php echo $row['provement']; ?>"  onError="this.style.display = 'none';"width="150px" ></dt>
					</dl>
					
					<!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
					
					<dl>
                        <dt><label for="payment_date">Payment Date:</label></dt>
                        <dt> <input type="date" name="payment_date"value="<?php echo $row['payment_date_u']; ?>" >
					
						</dt>
						
                    </dl>
					
					
					<dl>
                        <dt><label for="amount">Payment Amount :</label></dt>
                        <dt>RM<input type="text" name="amount"value="<?php echo $row['payment_amount_u']; ?>">
						
						</dt>
                    </dl>
					
					<dl>
                        <dt><label for="other">Remark:</label></dt>
                        <dt><textarea name="remark"><?php echo $row['remark_u']; ?></textarea>
						</dt>
						
                    </dl>
					
					<dl>
                        <dt><label for="slip">BankIn slip:</label></dt>
                        <dt>
						  <img id="myImg1"src="bank_slip/<?php echo $row['bank_slip']; ?>" onError="this.style.display = 'none';"width="150px">
						</dt>
						
						<!-- The Modal -->
                          <div id="myModal" class="modal">

                        <!-- The Close Button -->
                          <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                        <!-- Modal Content (The Image) -->
                          <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                          <div id="caption"></div>
                          </div>
						  
						   <script>
                            // Get the modal
                            var modal = document.getElementById('myModal');

                           // Get the image and insert it inside the modal - use its "alt" text as a caption
                           var img = document.getElementById('myImg1');
                           var modalImg = document.getElementById("img01");
                           var captionText = document.getElementById("caption");
                             img.onclick = function(){
                             modal.style.display = "block";
                             modalImg.src = this.src;
                             captionText.innerHTML = this.alt;
                            }

                          // Get the <span> element that closes the modal
                          var span = document.getElementsByClassName("close")[0];

                         // When the user clicks on <span> (x), close the modal
                          span.onclick = function() { 
                          modal.style.display = "none";
                         }
                        </script>
						
						 <dt>
						  <input type="file" id="fileChooser"name="p_slip" onchange="return ValidateFileUpload()">
						</dt>
						
                    </dl>
					
					<dl>
                        <dt><label for="b_date">Bank in date :</label></dt>
                        <dt><input type="date" name="b_date" value="<?php echo $row['bankIn_date'];?>"/>
						
						</dt>
                    </dl>
					<dl>
                       
                        <dt><input type="submit" name="update" value="Update" ></dt>
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
         $PaymentType=$_POST['PaymentType'];
		 $Payment=$_POST['Payment'];
		 $payment_date=$_POST['payment_date'];
		 $amount=$_POST['amount'];
		 $b_date=$_POST['b_date'];
		 $remark=$_POST['remark'];
	     
		 
		 
   
         $result=mysqli_query($db,"update payment_update set remark_u='$remark',bankIn_date='$b_date' where payment_id='$puid'");
		 
	     //echo "<meta http-equiv='refresh' content='0'>";
		 if($result == true){
		   echo"<script type='text/javascript'>location.href = 'view_update2.php'</script>";
		 }
		 
		 if($_FILES["p_slip"]["name"] != ""){
	          $allowedExts = array("jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["p_slip"]["name"]);
              $extension = end($temp);

              if ((($_FILES["p_slip"]["type"] == "image/gif") || ($_FILES["p_slip"]["type"] == "image/jpeg")|| ($_FILES["p_slip"]["type"] == "image/jpg")|| ($_FILES["p_slip"]["type"] == "image/pjpeg")|| ($_FILES["p_slip"]["type"] == "image/x-png")|| ($_FILES["p_slip"]["type"] == "image/png"))&& ($_FILES["p_slip"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["p_slip"]["error"] > 0) {
                 echo "Error: " . $_FILES["p_slip"]["error"] . "<br>";
                } else {}
	             
				 
				 //replace filename with filename_1 if the same name exists
				  $Originalbankslip  = $Finalbankslip = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['p_slip']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'bankslip/'.$Finalbankslip )) 
                    $Finalbankslip = $Originalbankslip.'_'.$FileCounter++; 
					$target=PR_UPLOADPATH . $Finalbankslip;
                    move_uploaded_file($_FILES['p_slip']['tmp_name'],$target);

                  mysqli_query($db,"update payment_update set bank_slip='$Finalbankslip' where payment_id='$puid'");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			
			if($_FILES["attachement"]["name"] != ""){
	          $allowedExts = array("jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["attachement"]["name"]);
              $extension = end($temp);

              if ((($_FILES["attachement"]["type"] == "image/gif") || ($_FILES["attachement"]["type"] == "image/jpeg")|| ($_FILES["attachement"]["type"] == "image/jpg")|| ($_FILES["attachement"]["type"] == "image/pjpeg")|| ($_FILES["attachement"]["type"] == "image/x-png")|| ($_FILES["attachement"]["type"] == "image/png"))&& ($_FILES["attachement"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["attachement"]["error"] > 0) {
                 echo "Error: " . $_FILES["attachement"]["error"] . "<br>";
                } else {}
	             
				 
				 //replace filename with filename_1 if the same name exists
				  $Originalattachement  = $Finalattachement = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['attachement']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'provement/'.$Finalattachement )) 
                    $Finalattachement = $Originalattachement.'_'.$FileCounter++; 
					$target2=PR_UPLOADPATH2 . $Finalattachement;
                    move_uploaded_file($_FILES['attachement']['tmp_name'],$target2);

                  mysqli_query($db,"update payment_update set provement='$Finalattachement' where payment_id='$puid'");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
             
			 
			
		  
	 
   
   }
 ?>
