<?php
include('session.php');
define('PR_UPLOADPATH','provement/');

   $jid = $_REQUEST["jid"];
  $query="select * from job where job_id = $jid";
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  

  
?>
<!doctype html>
<html>
<head>



  
  <style>
  a{
    text-decoration:none;
	color:white;
	
  }
  
  a:hover{
     background-color:grey;
  }
     ul{
	    list-style-type: none;
		
	 }
	 
	 ul li{
	    display: inline;
	 }
	 
	#nav{
	    border:solid 2px;
		background-color:black;
	    width:auto;
		height:100%;
		color:white;
		display:block;
	 }
	
	.dropdown:hover{
	   cursor:pointer;
	 }
	 
	 .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 100px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
       padding: 12px 16px;
      z-index: 1;
     }
	 
	 .dropdown:hover .dropdown-content {
      
	   display: block;
      }
	 


  </style>
  
   
  
 
</head>
 <body>
  
  
 
  <div id="nav">
       <ul>
	     <li><a href="job.php">Add Job</a></li>
	     <li><a href="job_history.php">Job History</a></li>
		 <li><a href="payment_update.php">Payment update</a></li>
		 <li style="float:right;margin-right:60px;">
		     <div class="dropdown">
			  <?php echo $login_session; ?>
			 
			     <div class="dropdown-content">
			       <a href = "logout.php" style="color:black;">Sign Out</a>
				 </div>
		     </div>
	     </li>
		
		  
	  </ul>
	
                              
  </div>
	 <div id="updatepayment">
	     <form action="" method="post" enctype="multipart/form-data" onsubmit="return checkSubmit()">
		    <fieldset>
			    	<dl>
                        <dt><label for="PaymentType">Payment type:</label></dt>
                        <dt>
						  <select name="PaymentType">
						     <option disabled selected value> -- select an option -- </option>
						     <option value="Renewal">Renewal</option>
							 <option value="Upgrade">Upgrade</option>
							 <option value="Balance">Balance</option>
							 <option class="editable" value="Other">Other</option>
							 
						   </select>
						
						</dt>
						<dt><label for="other_payment">please specified for other:</label>
					
						</dt>
						<dt>
						 <input type="text" name="other_PaymentType" >
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
					 <dt>Proof of payment:</dt>
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
                        <dt><input type="text" name="other" >
						</dt>
						
                    </dl>
					
					<dl>
                       
                        <dt><input type="submit" name="submit" value="Update" ></dt>
                    </dl>
					<input type="text" name="emails"style="display:none;" value="<?php echo $_SESSION['user_email']?>" >
			</fieldset>
		 </form>
	  
     </div>   
	     
	 
 <body>
</html>
<?php
   if(isset($_POST["submit"])){
         $PaymentType=$_POST['PaymentType'];
		 $other_PaymentType=$_POST['other_PaymentType'];
         $Payment=$_POST['Payment'];
	     $payment_date=$_POST['payment_date'];
	     $amount=$_POST['amount'];
	     $other=$_POST['other'];
		 
		 $proof = $_FILES['proof']['name'];
		 $target=PR_UPLOADPATH . $proof;
		 move_uploaded_file($_FILES['proof']['tmp_name'],$target); 
		 
		 
		  mysqli_query($db,"update job set payment_type_update='$PaymentType',other_payment='$other_PaymentType',payment_update='$Payment',payment_date_update='$payment_date',total_amount_update='$amount',other_update='$other',provement='$proof',update_status='Yes' where job_id=$jid");
          
	  ?>
	
		<script type="text/javascript">
			alert("sunceffully updated!");
			
		</script>
		<?php
	     header( "Location:job_history.php" );
	
	    ?>
		
	
	<?php
   
   }

?>




