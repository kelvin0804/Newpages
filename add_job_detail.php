<?php
   include('session_admin.php');
  
   if(!isset($_POST["submit"])){
      header('Location:error.php');
   }
  
  
  //path of image file
  define('PR_UPLOADPATH','attachment/');
  



?>
<?php
    if(isset($_POST["submit"])){
	     $submit_date=$_POST['submit_date'];
	     $contract_no=$_POST['contract_no'];
		 $Company_Name=$_POST['Company_Name'];
		 $CompanyReg=$_POST['CompanyReg'];
		 $GSTNo=$_POST['GSTNo'];
		 $Company_Address=$_POST['Company_Address'];
		 $Office_Phone=$_POST['Office_Phone'];
		 $Office_Fax=$_POST['Office_Fax'];
		 $package=$_POST['package'];
		 $Advfee=$_POST['Advfee'];
		 $items = implode(',', $_POST['items']);
		 $Total=$_POST['Total'];
		 $Payment=$_POST['Payment'];
		 $amount=$_POST['amount'];
		 $payment_date=$_POST['payment_date'];
		 $customer=$_POST['customer'];
		 $customer_design=$_POST['customer_design'];
		 $customerPhone=$_POST['customerPhone'];
		 $email_master=$_POST['email_master'];
		 $email_billing=$_POST['email_billing'];
		 $Remark=$_POST['Remark'];
		 $status="Pending";
		 $salesid=$_POST['salesid'];
		 $salesid_explode = explode('|', $salesid);
		
		 
		 
		
		 
		 //for website
		 $CompanyName=$_POST['CompanyName'];
		 $Company_Reg=$_POST['Company_Reg'];
		 $GST_No=$_POST['GST_No'];
		 $CompanyAddress=$_POST['CompanyAddress'];
		 $CompanyBusiness=$_POST['CompanyBusiness'];
		 $OfficePhone=$_POST['OfficePhone'];
		 $OfficeFax=$_POST['OfficeFax'];
		 $email_website=$_POST['email_website'];
		 $DomainType=$_POST['DomainType'];
		 $DomainName=$_POST['DomainName'];
		 $CustomerDescription=$_POST['CustomerDescription'];
		 $Reason=$_POST['Reason'];
		 $NoEmailAccount=$_POST['NoEmailAccount'];
        //gst		
		 $BeforeGST=$Total/1.06;
		 $Gst=$Total-$BeforeGST;
		 $PaymentBeforeGST=$amount/1.06;
		 $PaymentGst=$amount-$PaymentBeforeGST;
		 //
		 $name=$login_session;
		 $Sales_id=$_SESSION['user_id'];
		 $sales_email=$_SESSION['user_email'];
		 $branch_name =$_SESSION['branch_name'];
		 
         //Order image 
		if( ($_FILES["Order"]["name"] != "")){
	          $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["Order"]["name"]);
              $extension = end($temp);

              if(( ($_FILES["Order"]["type"] == "image/jpeg")|| ($_FILES["Order"]["type"] == "image/jpg")|| ($_FILES["Order"]["type"] == "image/pjpeg")|| ($_FILES["Order"]["type"] == "image/x-png")|| ($_FILES["Order"]["type"] == "image/png"))&& ($_FILES["Order"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if (($_FILES["Order"]["error"] > 0)) {
                 $error =  "Error: " . $_FILES["Order"]["error"] . "<br>";
				
                } else {}
				  //replace filename with filename_1 if the same name exists
				  $OriginalFilename  = $FinalFilename = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['Order']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$FinalFilename )) 
                    $FinalFilename = $FileCounter++.'_'.$OriginalFilename;
					$target=PR_UPLOADPATH . $FinalFilename;
                    move_uploaded_file($_FILES['Order']['tmp_name'],$target);
			  }
             else{
			     $error ="invalid format of order form or file exceed limit!";	
			  }			 
	    }
	
		 if(($_FILES["quotation"]["name"] != "")){
		      $allowedExts = array("pdf","jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["quotation"]["name"]);
              $extension = end($temp);

              if (( ( $_FILES["quotation"]["type"] == "application/pdf") || ($_FILES["quotation"]["type"] == "image/jpeg")|| ($_FILES["quotation"]["type"] == "image/jpg")|| ($_FILES["quotation"]["type"] == "image/pjpeg")|| ($_FILES["quotation"]["type"] == "image/x-png")|| ($_FILES["quotation"]["type"] == "image/png"))&& ($_FILES["quotation"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["quotation"]["error"] > 0) {
                 echo "Error: " . $_FILES["quotation"]["error"] . "<br>";
                } else {}
	             
				 
				 //replace filename with filename_1 if the same name exists
				  $Originalquotation  = $Finalquotation = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['quotation']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalquotation )) 
                    $Finalquotation = $FileCounter++.'_'.$Originalquotation; 
					$target2=PR_UPLOADPATH . $Finalquotation;
                    move_uploaded_file($_FILES['quotation']['tmp_name'],$target2);

                   
	         } else {
                  $error1 = "invalid format of quotation or file exceed limit!";
              }
		}
	
		
		if(($_FILES["fcard"]["name"] != "")){
		   $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["fcard"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["fcard"]["type"] == "image/jpeg")|| ($_FILES["fcard"]["type"] == "image/jpg")|| ($_FILES["fcard"]["type"] == "image/pjpeg")|| ($_FILES["fcard"]["type"] == "image/x-png")|| ($_FILES["fcard"]["type"] == "image/png"))&& ($_FILES["fcard"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["fcard"]["error"] > 0) {
                 echo "Error: " . $_FILES["fcard"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $Originalfcard  = $Finalfcard = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['fcard']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalfcard )) 
                    $Finalfcard = $FileCounter++.'_'.$Originalfcard; 
					$target3=PR_UPLOADPATH . $Finalfcard;
                    move_uploaded_file($_FILES['fcard']['tmp_name'],$target3);

               
	         } else {
                  $error2="invalid format of front card or file exceed limit!";
              }
		}
	
		
		if(($_FILES["bcard"]["name"] != "")){
		    $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["bcard"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["bcard"]["type"] == "image/jpeg")|| ($_FILES["bcard"]["type"] == "image/jpg")|| ($_FILES["bcard"]["type"] == "image/pjpeg")|| ($_FILES["bcard"]["type"] == "image/x-png")|| ($_FILES["bcard"]["type"] == "image/png"))&& ($_FILES["bcard"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["bcard"]["error"] > 0) {
                 echo "Error: " . $_FILES["bcard"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $Originalbcard  = $Finalbcard = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['bcard']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalbcard )) 
                    $Finalbcard = $FileCounter++.'_'.$Originalbcard; 
					$target4=PR_UPLOADPATH . $Finalbcard;
                    move_uploaded_file($_FILES['bcard']['tmp_name'],$target4);

                    
	         } else {
                 $error3="invalid format of back card!";
              }
		}
	
		
		if(($_FILES["SSM"]["name"] != "")){
		     $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["SSM"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["SSM"]["type"] == "image/jpeg")|| ($_FILES["SSM"]["type"] == "image/jpg")|| ($_FILES["SSM"]["type"] == "image/pjpeg")|| ($_FILES["SSM"]["type"] == "image/x-png")|| ($_FILES["SSM"]["type"] == "image/png"))&& ($_FILES["SSM"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["SSM"]["error"] > 0) {
                 echo "Error: " . $_FILES["SSM"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $OriginalSSM  = $FinalSSM = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['SSM']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$FinalSSM )) 
                    $FinalSSM = $FileCounter++.'_'.$OriginalSSM; 
					$target5=PR_UPLOADPATH . $FinalSSM;
                    move_uploaded_file($_FILES['SSM']['tmp_name'],$target5);

                   
	         } else {
                $error4="invalid format of SSM or file exceed limit!";
              }
		}
		
		
		if(($_FILES["cheque"]["name"] != "")){
		     $allowedExts = array("jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["cheque"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["cheque"]["type"] == "image/jpeg")|| ($_FILES["cheque"]["type"] == "image/jpg")|| ($_FILES["cheque"]["type"] == "image/pjpeg")|| ($_FILES["cheque"]["type"] == "image/x-png")|| ($_FILES["cheque"]["type"] == "image/png"))&& ($_FILES["cheque"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["cheque"]["error"] > 0) {
                 echo "Error: " . $_FILES["cheque"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $Originalcheque  = $Finalcheque = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['cheque']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalcheque )) 
                    $Finalcheque = $FileCounter++.'_'.$Originalcheque; 
					$target6=PR_UPLOADPATH . $Finalcheque;
                    move_uploaded_file($_FILES['cheque']['tmp_name'],$target6);

                   
	         } else {
                   $error5="invalid format of cheque or file exceed limit!";
              }
		}
		
		
		if(($_FILES["cash"]["name"] != "")){
		     $allowedExts = array( "jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["cash"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["cash"]["type"] == "image/jpeg")|| ($_FILES["cash"]["type"] == "image/jpg")|| ($_FILES["cash"]["type"] == "image/pjpeg")|| ($_FILES["cash"]["type"] == "image/x-png")|| ($_FILES["cash"]["type"] == "image/png"))&& ($_FILES["cash"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["cash"]["error"] > 0) {
                 echo "Error: " . $_FILES["cash"]["error"] . "<br>";
                } else {}
	              
				  
				  //replace filename with filename_1 if the same name exists
				  $Originalcash  = $Finalcash = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['cash']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalcash )) 
                    $Finalcash = $FileCounter++.'_'.$Originalcash; 
					$target7=PR_UPLOADPATH . $Finalcash;
                    move_uploaded_file($_FILES['cash']['tmp_name'],$target7);

                    
	         } else {
                 $error6="invalid format of cash or file exceed limit!";
              }
		}
	
		
		if(($_FILES["slip"]["name"] != "")){
		     $allowedExts = array( "jpeg","JPEG", "jpg","JPG", "png","PNG");
              $temp = explode(".", $_FILES["slip"]["name"]);
              $extension = end($temp);

              if (( ($_FILES["slip"]["type"] == "image/jpeg")|| ($_FILES["slip"]["type"] == "image/jpg")|| ($_FILES["slip"]["type"] == "image/pjpeg")|| ($_FILES["slip"]["type"] == "image/x-png")|| ($_FILES["slip"]["type"] == "image/png"))&& ($_FILES["slip"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["slip"]["error"] > 0) {
                 echo "Error: " . $_FILES["slip"]["error"] . "<br>";
                } else {}
	              
				   
				   //replace filename with filename_1 if the same name exists
				  $Originalslip  = $Finalslip = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['slip']['name']);
                  $FileCounter = 1;
				  while (file_exists( 'attachment/'.$Finalslip )) 
                    $Finalslip = $FileCounter++.'_'.$Originalslip; 
					$target8=PR_UPLOADPATH . $Finalslip;
                    move_uploaded_file($_FILES['slip']['tmp_name'],$target8);

                   
	         } else {
                 $error7="invalid format of payment slip or file exceed limit!";
              }
		}
		 
		 mysqli_query($db,"insert into job(date_submission,contract_no,company_name,company_reg_no,gst_no,
					  company_address,office_telephone,office_fax,package,annual_adv_fee,item,
					  total_package_amount,payment,payment_amount,P_amount_GST,P_amount_b_GST,payment_date,customer_name,CustomerDesignation,customer_hp,email_master,email_billing,fcard,order_form,quotation,bcard,company_ssm,cheque,cash,payment_slip,remark,company_name_web,company_reg_no_web,gst_no_web,company_address_web,company_business_web,office_phone_web,
		              office_fax_web,email_website,Domain_Type,Domain_name,customer_desc,reason,no_of_email_account,gst,beforeGST,status,sales_name,branch_name,sales_email,sales_id) values
					  ('$submit_date','$contract_no','$Company_Name','$CompanyReg','$GSTNo',
					  '$Company_Address','$Office_Phone','$Office_Fax','$package','$Advfee','" . $items . "',
					  '$Total','$Payment','$amount','$PaymentGst','$PaymentBeforeGST','$payment_date','$customer','$customer_design','$customerPhone','$email_master','$email_billing',
					  '$Finalfcard','$FinalFilename','$Finalquotation','$Finalbcard','$FinalSSM','$Finalcheque','$Finalcash','$Finalslip','$Remark','$CompanyName',' $Company_Reg','$GST_No',' $CompanyAddress','$CompanyBusiness',' $OfficePhone','$OfficeFax','$email_website','$DomainType','$DomainName','$CustomerDescription','$Reason','$NoEmailAccount','$Gst','$BeforeGST','$status','$salesid_explode[1]','$salesid_explode[3]','$salesid_explode[2]','$salesid_explode[0]')");
	    
		  $to = "jun@n.my";
          $headers = "From: livrariahealth@gmail.com" . "\r\n";
		  $headers .= "CC: $salesid_explode[2]\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		  //$subject = "Job - NEWPAGES NETWORK SDN BHD Website";
          if($amount == ''){
		    $subject = "[$salesid_explode[3]]New Sales - ". $_POST['Company_Name']. " ";  
		  }
		  else{
		    $subject = "[$salesid_explode[3]]New Sales and Payment - ". $_POST['Company_Name']. " ";  
		  }  
		  
		
          
         $message = '<html><body>';
		 $message .="<h1>For Billing</h1>";
		 $message .="<b>Contract no.:</b> ".$_POST['contract_no']."<br> ";
		 $message .="<b>Company Name.:</b> ".$_POST['Company_Name']."<br> ";
		 $message .="<b>Reg no.  :</b> ".$_POST['CompanyReg']." <br>";
		 $message .="<b>GST no. :</b> ".$_POST['GSTNo']." <br>";
		 $message .="<b>Address (Billing) :</b> ".$_POST['Company_Address']."<br> ";
		 $message .="<b>Tel :</b> ".$_POST['Office_Phone']."<br> ";
		 $message .="<b>Fax:</b> ".$_POST['Office_Fax']."<br> ";
		 $message .="<b>Email(Billing) :</b> ".$_POST['email_billing']."<br> ";
		 $message .="<b>Master Email for Password Verification :</b> ".$_POST['email_master']."<br> ";
		 
		 $message .="<h1>For Website</h1>";
		 $message .="<b>Company Name.:</b> ".$_POST['CompanyName']."<br> ";
		 $message .="<b>Reg no.  :</b> ".$_POST['Company_Reg']."<br> ";
		 $message .="<b>GST no. :</b> ".$_POST['GST_No']."<br> ";
		 $message .="<b>Address (Billing) :</b> ".$_POST['CompanyAddress']."<br> ";
		 $message .="<b>Tel :</b> ".$_POST['OfficePhone']."<br> ";
		 $message .="<b>Fax:</b> ".$_POST['OfficeFax']."<br> ";
		 $message .="<b>Email(Website):</b> ".$_POST['email_website']."<br> ";
		 $message .="<b>Domain Type :</b> ".$_POST['DomainType']."<br> ";
		 $message .="<b>Domain Name :</b> ".$_POST['DomainName']."<br> ";
		 $message .="<b>How Many Email Account :</b> ".$_POST['NoEmailAccount']."<br> ";
		 $message .="<b>Company Business :</b> ".$_POST['CompanyBusiness']."<br> ";
		 $message .="<b>Package :</b> ".$_POST['package']."<br> ";
		 $message .="<b>Total Package amount :</b> ".$_POST['Total']."<br> ";
		 $message .="<b>Payment :</b> ".$_POST['amount']."<br> ";
		 $message .="<b>Reason to redo website :</b> ".$_POST['Reason']."<br> ";
		 
		 $message .="<h1>Customer Details</h1>";
		 $message .="<b>Contact person.:</b> ".$_POST['customer']."<br> ";
		 $message .="<b>Customer Description(Age, Attitude, PC Knowledge, Intro by?)  :</b> ".$_POST['CustomerDescription']."<br> ";
		 $message .="<b>Customer Phone :</b> ".$_POST['customerPhone']."<br> ";
		 $message .="<b>Designation :</b> ".$_POST['customer_design']."<br> ";
		 
		 $message .="<h1>Attachment</h1>";
		  if(!empty($_FILES['Order']['tmp_name'])){
		     $message .= "<b>Order form:</b> http://www.newpages.net/wenkai/order/$FinalFilename <br>";
		  }else{
		     $message .= "<b>Order form:</b> not uploading file <br>";
		  }
		  if(!empty($_FILES['quotation']['tmp_name'])){
		    $message .= "<b>Quotation:</b> http://www.newpages.net/wenkai/quotation/$Finalquotation <br>";
		  }else{
		    $message .= "<b>Quotation:</b> not uploading file <br>";
		  }
		  if(!empty($_FILES['fcard']['tmp_name'])){
		    $message .= "<b>Name Card(Front):</b> http://www.newpages.net/wenkai/fcard/$Finalfcard <br>";
		  }else{
		     $message .= "<b>Name Card(Front):</b> not uploading file <br>";
		  }
		  if(!empty($_FILES['bcard']['tmp_name'])){
		    $message .= "<b>Name Card(Back):</b> http://www.newpages.net/wenkai/bcard/$Finalbcard <br>";
		  }else{
		    $message .= "<b>Name Card(Back):</b> not uploading file <br>";
		  }
		  if(!empty($_FILES['SSM']['tmp_name'])){
		    $message .= "<b>Company SSM:</b> http://www.newpages.net/wenkai/ssm/$FinalSSM <br>";
		  }else{
		    $message .= "<b>Company SSM:</b> not uploading file <br>";
		  }
		  if(!empty($_FILES['cheque']['tmp_name'])){
		   $message .= "<b>Cheque:</b> http://www.newpages.net/wenkai/cheque/$Finalcheque <br>";
		  }else{
		    $message .= "<b>Cheque:</b> not uploading file <br>";
		  }
		  if(!empty($_FILES['cash']['tmp_name'])){
		   $message .= "<b>Cash:</b> http://www.newpages.net/wenkai/cash/$Finalcash <br>";
		  }else{
		     $message .= "<b>Cash:</b> not uploading file <br>";
		  }
		  if(!empty($_FILES['slip']['tmp_name'])){
		    $message .= "<b>Payment Slip:</b> http://www.newpages.net/wenkai/slip/$Finalslip <br>";
		  }else{
		     $message .= "<b>Payment Slip:</b> not uploading file <br>";
		  }
		 $message .="</html></body>";
         
           mail($to,$subject,$message,$headers);
		  
		  
		  
		
		  
		  
 ?>
	
	     
		
		
		
		
	
	<?php
	  
	  
	  }
	  
	  
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Thank you</a> </div>
    <h1>Thank you!</h1>
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
		    <b>Contract no.</b> <?php echo $_POST["contract_no"]; ?><br/>
			<b>Company name:</b> <?php echo $_POST["Company_Name"]; ?><br/>
			<b>Reg no:</b> <?php echo $_POST["CompanyReg"]; ?><br/>
			<b>GST no:</b> <?php echo $_POST["GSTNo"]; ?><br/>
			<b>Address(Billing):</b> <?php echo $_POST["Company_Address"]; ?><br/>
			<b>Tel:</b> <?php echo $_POST["Office_Phone"]; ?><br/>
			<b>Fax:</b> <?php echo $_POST["Office_Fax"]; ?><br/>
			<b>Email(Billing):</b> <?php echo $_POST["email_billing"]; ?><br/>
			<b>Master Email for Password Verification:</b> <?php echo $_POST["email_master"]; ?>
			<h1>For Website</h1>
			<b>Company name:</b> <?php echo $_POST["CompanyName"]; ?><br/>
			<b>Reg no:</b> <?php echo $_POST["Company_Reg"]; ?><br/>
			<b>GST no:</b> <?php echo $_POST["GST_No"]; ?><br/>
			<b>Address (Website):</b> <?php echo $_POST["CompanyAddress"]; ?><br/>
			<b>Tel: </b> <?php echo $_POST["OfficePhone"]; ?><br/>
			<b>Fax:</b> <?php echo $_POST["OfficeFax"]; ?><br/>
			<b>E-mail(Website):</b> <?php echo $_POST["email_website"]; ?><br/>
			<b>Domain Type:</b> <?php echo $_POST["DomainType"]; ?><br/>
			<b>Domain Name:</b> <?php echo $_POST["DomainName"]; ?><br/>
			<b>How Many Email Account:</b> <?php echo $_POST["NoEmailAccount"]; ?><br/>
			<b>Company Business:</b> <?php echo $_POST["CompanyBusiness"]; ?><br/>
			<b>Package:</b> <?php echo $_POST["package"]; ?><br/>
			<b>Payment:</b> <?php echo $_POST["amount"]; ?><br/>
			<b>Reason to redo website:</b> <?php echo $_POST["Reason"]; ?>
			<h1>Customer Details</h1>
			<b>Contact person:</b> <?php echo $_POST["customer"]; ?><br/>
			<b>Customer Description(Age, Attitude, PC Knowledge, Intro by?):</b> <?php echo $_POST["CustomerDescription"]; ?><br/>
			<b>Customer Phone:</b> <?php echo $_POST["customerPhone"]; ?><br/>
			<b>Designation:</b> <?php echo $_POST["customer_design"]; ?><br/>
			
		  
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


