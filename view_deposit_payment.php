<?php
   include('session_admin.php');
   define('PR_UPLOADPATH','bank_slip/');
 
  $dpid = intval($_REQUEST["dpid"]);
  if($_SESSION['position']  == 'super'){
     $query="select * from job where job_id = '$dpid'";
  }
  else if($_SESSION['position']  == 'Johor'){
    $query="select * from job where branch_name='Johor' AND job_id = '$dpid'";  
  }
  else if($_SESSION['position']  == 'Melaka'){
     $query="select * from job where branch_name='Melaka' AND job_id = '$dpid'";
  }
  else if($_SESSION['position']  == 'Penang'){
     $query="select * from job where branch_name='Penang' AND job_id = '$dpid'";
  }
  else if($_SESSION['position']  == 'KL'){
      $query="select * from job where branch_name='KL' AND job_id = '$dpid'";
  }
  else if($_SESSION['position']  == 'Klang'){
      $query="select * from job where branch_name='Klang' AND job_id = '$dpid'";
  }

  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  
   if($row == false){
     header('Location:view_update2.php');
  }
 
  
 
   
  
  //path of image file
  define('PR_UPLOADPATH','bank_slip/');	


  
  
 
  
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
   .enlarge:hover {
     	transform:scale(2,2);
	    transform-origin:0 0;
      }
	  
	  input[type=text],
      textarea
      {
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
    <h1>Update New Job Payment</h1>
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
                        <dt><label for="Payment">Payment:</label></dt>
                        <dt> 
						  <select name="Payment" style="width:100%">
						     <option value="<?php echo $row['payment']?>">Existing type:<?php echo $row['payment']?></option>
						     <option value="Cheque">Cheque</option>
							 <option value="Cash">Cash</option>
							 <option value="Bank transfer/Online Banking">Bank transfer/Online Banking</option>
							 
						   </select>
						 
						</dt>
                    </dl>
					
					
					
					
					
					<dl>
                        <dt><label for="payment_date">Payment Date:</label></dt>
                        <dt> 
					      <input type="date" name="payment_date" value="<?php echo $row['payment_date']; ?>" >
						</dt>
						
                    </dl>
					
					
					<dl>
                        <dt><label for="amount">Payment Amount :</label></dt>
                        <dt>RM<input type="text" name="amount" value="<?php echo $row['payment_amount']; ?>">
						
						</dt>
                    </dl>
					
					<dl>
					   <dt><label for="amount">Attachment:</label></dt>
					   <dt>
					    
					     <img id="myImg1" src="attachment/<?php echo $row['cheque']?>"  onError="this.style.display = 'none';"style="width:150px;"> 
						 <img id="myImg2" src="attachment/<?php echo $row['cash']?>"  onError="this.style.display = 'none';"style="width:150px;"> 
						 <img id="myImg3" src="attachment/<?php echo $row['payment_slip']?>"  onError="this.style.display = 'none';"style="width:150px;"> 
						 
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
                           var img = document.getElementById('myImg2');
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
                           var img = document.getElementById('myImg3');
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
					   </dt>
					</dl>
					
				
					
					<dl>
					   <dt><label for="slip">BankIn slip:</label></dt>
					   <dt>
						  <input type="file" name="b_slip" />
						</dt>
                        
                        <dt>
						  <img id="myImg4"src="bank_slip/<?php echo $row['bank_slip']; ?>" onError="this.style.display = 'none';" width="150px">
						  
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
                           var img = document.getElementById('myImg4');
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
						
						
						
                    </dl>
					
					<dl>
                        <dt><label for="b_date">Bank in date :</label></dt>
                        <dt><input type="date" name="b_date" value="<?php echo $row['bankInDate'];?>"/>
						
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
	     $Payment=$_POST['Payment'];
         $payment_date=$_POST['payment_date'];
		 $amount=$_POST['amount'];
		 $b_date=$_POST['b_date'];
		 
	     
		 $result=mysqli_query($db,"update job set payment='$Payment',payment_date='$payment_date',payment_amount='$amount',bankInDate='$b_date' where job_id='$dpid'");
		 
		 if($result == true){
          echo"<script type='text/javascript'>location.href = 'view_update2.php'</script>";
		 }
		 
	    if($_FILES["b_slip"]["name"] != ""){
	          $allowedExts = array("jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["b_slip"]["name"]);
              $extension = end($temp);

              if ((($_FILES["b_slip"]["type"] == "image/gif") || ($_FILES["b_slip"]["type"] == "image/jpeg")|| ($_FILES["b_slip"]["type"] == "image/jpg")|| ($_FILES["b_slip"]["type"] == "image/pjpeg")|| ($_FILES["b_slip"]["type"] == "image/x-png")|| ($_FILES["b_slip"]["type"] == "image/png"))&& ($_FILES["b_slip"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["b_slip"]["error"] > 0) {
                 echo "Error: " . $_FILES["b_slip"]["error"] . "<br>";
                } else {}
	             
				 
				 //replace filename with filename_1 if the same name exists
				  $Originalbankslip  = $Finalbankslip = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['b_slip']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'bank_slip/'.$Finalbankslip )) 
                    $Finalbankslip = $Originalbankslip.'_'.$FileCounter++; 
					$target=PR_UPLOADPATH . $Finalbankslip;
                    move_uploaded_file($_FILES['b_slip']['tmp_name'],$target);

                  mysqli_query($db,"update job set bank_slip='$Finalbankslip' where job_id='$dpid'");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			
             
			 
			
		  
	  
   
   }
 ?>
