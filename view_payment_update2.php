<?php
include('session.php');

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
	 
	
	 #textbox_none{
	    background-color:rgba(0, 0, 0, 0);
        color:white;
        border: none;
        outline:none;
        height:30px;
        transition:height 1s;
        -webkit-transition:height 1s;
	    height:50px;
        font-size:16px;
	    color:black;
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
                        <dt><label for="PaymentType"><b>Payment type:</b></label></dt>
                        <dt>
		                   <input id="textbox_none" type="text" name="payment" value="<?php echo $row['payment_type_update']; ?>" disabled>
						</dt>
						<dt><label for="other_payment"><b>Other payment type(If):</b></label>
						    <input id="textbox_none" type="text" name="" value="<?php echo $row['other_payment']; ?>"  disabled>
						</dt>
						
                    </dl>
					
					<dl>
                        <dt><label for="Payment"><b>Payment:</b></label></dt>
                        <dt>
						  <input id="textbox_none"type="text" name="payment" value="<?php echo $row['payment_update']; ?>" disabled>
						</dt>
                    </dl>
					
					<dl>
					 <dt><b>Proof of payment:</b></dt>
					  <dt><a target="_blank"href="provement/<?php echo $row['provement']?>">
					       <img src="provement/<?php echo $row['provement']?>" style="width:150px;">
						 </a>
					  </dt>
					</dl>
					
					<dl>
                        <dt><label for="payment_date"><b>Payment Date:</b></label></dt>
                        <dt>
						<input id="textbox_none" type="text" name="payment_date_update" value="<?php echo $row['payment_date_update']; ?>" disabled>
						</dt>
						
                    </dl>
					
					
					<dl>
                        <dt><label for="amount"><b>Payment Amount :</b></label></dt>
                        <dt>
						 <input id="textbox_none" type="text" name="total_amount_update" value="<?php echo $row['total_amount_update']; ?>" disabled>
						</dt>
                    </dl>
					
					<dl>
                        <dt><label for="other"><b>Remark:</b></label></dt>
                        <dt>
						<input id="textbox_none" type="text" name="other_update" value="<?php echo $row['other_update']; ?>" disabled>
						</dt>
						
                    </dl>
					
					
					
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
		 
		  mysqli_query($db,"update job set payment_type_update='$PaymentType',other_payment='$other_PaymentType',payment_update='$Payment',payment_date_update='$payment_date',total_amount_update='$amount',other_update='$other',update_status='Yes' where job_id=$jid");
          
	  ?>
	
		<script type="text/javascript">
			alert("sucessfully updated!");
			
		</script>
		<?php
	     header( "Location:job_history.php" );
	
	    ?>
		
	
	<?php
   
   }

?>




