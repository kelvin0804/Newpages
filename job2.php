<?php
include('session.php');
   
   
 
  
  //path of image file
  define('PR_UPLOADPATH','order/');
  define('PR_UPLOADPATH2','quotation/');
  define('PR_UPLOADPATH3','fcard/');
  define('PR_UPLOADPATH4','bcard/');
  define('PR_UPLOADPATH5','ssm/');
  define('PR_UPLOADPATH6','cheque/');
  define('PR_UPLOADPATH7','cash/');
  define('PR_UPLOADPATH8','slip/');
?>
<!doctype html>
<html>
<head>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">--> <!-- for normal phone -->
<!-- for ios,the textbox inside the form not auto zoom in -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <?php
  
   

    //$query = "SELECT * FROM salesperson";
    //$result = mysql_query($query) or die(mysql_error()."[".$query."]");
  
  ?>
  
  <script>
     function display() 
  {
    var val = document.getElementById("Sales").value;
    var salesperson = document.getElementById("Salesperson");
    salesperson.value = val;
  }
  </script>
  
  <script>
  
     function checkSubmit(){
	     if (document.getElementById('remember_me').checked == false) {
		  alert ("You didn't agree to the terms");
          return false;
         }
		 else if(document.getElementById('Office_Phone').value.length < 9){
		    alert("Please fill a correct office phone number!");
	        return false;
		 }
		 else if(document.getElementById('Office_Fax').value.length < 9){
		   alert("Please fill a correct office fax number!");
	       return false;
		 }
		 else if(document.getElementById('customerPhone').value.length < 10){
		   alert("Please fill a correct customer phone number!");
	       return false;
		 }
	    else{
	     return true;
	   }  
	 
	 }
	 
	 function ValidateFileUpload() {

       var fuData = document.getElementById('fileChooser');
       var FileUploadPath = fuData.value;


        if (FileUploadPath == '') {
         alert("Please upload an image");

       } else {
          var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

            if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                || Extension == "jpeg" || Extension == "jpg") {


            if (fuData.files && fuData.files[0]) {

                var size = fuData.files[0].size;

                if(size > MAX_SIZE){
                    alert("Maximum file size exceeds");
                    return;
                }else{
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                 }
            }
          } 
         else {
            alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
			
			}
        }}
  </script>
  
  <script>
      function copyValue(){
          var cb1 = document.getElementById('e_master');
          var email_master=document.getElementById('email_master');
		  var email_billing=document.getElementById('email_billing'); 
	
		  
		   if (cb1.checked){
		     email_billing.value=email_master.value;

		   }
           else{
		     email_billing.value = '';

		   }		   
   
	  
        }
     
  </script>
  <script>
     function duplicateValue(){
	    var cb = document.getElementById('billing');
	    var c_name = document.getElementById('Company_Name');
		var c_name2 = document.getElementById('CompanyName');
		var c_reg = document.getElementById('Company_Reg');
		var c_reg2 = document.getElementById('CompanyReg');
		var gst = document.getElementById('GSTNo');
		var gst2 = document.getElementById('GST_No');
		var c_address = document.getElementById('Company_Address');
		var c_address2 = document.getElementById('CompanyAddress');
		var office_phone = document.getElementById('Office_Phone');
		var office_phone2 = document.getElementById('OfficePhone');
		var office_fax = document.getElementById('OfficeFax');
		var office_fax2 = document.getElementById('Office_Fax');
		var email_master = document.getElementById('email_master');
		var email_website = document.getElementById('email_website');
		
		if(cb.checked){
		   c_name2.value=c_name.value;
		   c_reg2.value=c_reg.value;
		   gst2.value=gst.value;
		   c_address2.value=c_address.value;
		   office_phone2.value=office_phone.value;
		   office_fax2.value=office_fax.value;
		   email_website.value=email_master.value;
		   
		}
		else{
		   c_name2.value= '';
		   c_reg2.value= '';
		   gst2.value= '';
		   c_address2.value= '';
		   office_phone2.value= '';
		   office_fax2.value= '';
		   email_website.value= '';
		}
	 }
  
  </script>
  <script>
  //display date
   /*function date() {
    d = new Date(document.getElementById("submit_date").value);
    dt = d.getDate();
    mn = d.getMonth();
    mn++;
    yy = d.getFullYear();
    document.getElementById("display_date").value = dt + "/" + mn + "/" + yy
    
  } */
  </script>
  
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
	 
	   
	  input[type=date],
	  input[type=tel],
	  input[type=text],
      input[type=email],
	  input[type=number],
      select {
       width: 100%;
       height: 30px;
        
       	   
     }
	 
	 input[type=checkbox] {
       zoom: 1.5;
     }
	 
	 
	 textarea{
	    border-radius: 10px;	
	 }
	 
	 
	 #CustomerDescription,#Remark,#CompanyAddress,#Company_Address{
	    width:100%;
		height:150px;
	 }
	 
	 #BillingForm{
	   
		width:100%;
       
       
	 }
	 
	 summary{
	   font-size:30px;
	 }
	 
	 #sub-btn-style{
	   width: 100px;
	   height: 30px;
	   background-color:#00ffff;
	   font-weight:bold;
       border-radius: 20px;
	 }
	 
	 #sub-btn-style:hover{
	   cursor:pointer;
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
	 <div id="BillingForm">
	     <form action="" name="sunmit_jobs" method="post" enctype="multipart/form-data" onsubmit="return checkSubmit()" autocomplete="off">
               
                <fieldset>
				     
				     <h1>For Billing</h1>
					<!--<dl>
                        <dt><label for="DisplayDate">Submit date</label></dt>
                        <dt><input id="display_date" type="text"  name="display_date" disabled  ></dt>
                    </dl>-->
				  
                    <dl>
					    
                        <dt><input type="date"  style="display:none;"id="submit_date" name="submit_date" onchange="date();" value="<?php echo date('Y-m-d');?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="ContractNo">Contract No.</label></dt>
                        <dt><input type="text"  name="contract_no" placeholder="Contract No." autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyName">Company name:</label></dt>
                        <dt><input autocorrect="off" type="text" id="Company_Name" name="Company_Name"  size="54"  placeholder="Company Name" required/></dt>
                    </dl>
					
					<dl>
                        <dt><label for="CompanyReg">Company Registration No.:</label></dt>
                        <dt><input type="text" id="Company_Reg"name="CompanyReg"  size="54"  placeholder="Company Registration Number" autocorrect="off"></dt>
                    </dl>
					
					<dl>
                        <dt><label for="GSTNo">GST No.:</label></dt>
                        <dt><input type="text" id="GSTNo"name="GSTNo"  size="54"  placeholder="GST Number" autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyAddress">Company Address:</label></dt>
                        <dt><textarea id="Company_Address" name="Company_Address" rows="5" cols="36" placeholder="Company Address" autocorrect="off" required/></textarea></dt>
					</dl>
					
					 <dl>
                        <dt><label for="OfficePhone">Office Telephone:</label></dt>
                        <dt><input type="tel" id="Office_Phone"  name="Office_Phone"   placeholder="03-12345678" ></dt>
                    </dl>
					
					
					<dl>
                        <dt><label for="OfficeFax">Office Fax:</label></dt>
                        <dt><input type="tel" id="OfficeFax" name="Office_Fax"   placeholder="03-12345678" ></dt>
                    </dl>
					
					
					
					
					
					<dl>
                        <dt><label for="Package">ONESYCN Package:</label></dt>
                        <dt>
						   <select name="package" required>
						     <option disabled selected value> -- select an option -- </option>
						     <option value="OneSync Standard 1 years">OneSync Standard 1 years</option>
							 <option value="OneSync Standard 2 years">OneSync Standard 2 years</option>
							 <option value="OneSync Advanced 2 years">OneSync Advanced 2 years</option>
							 <option value="OneSync Pro 2 years">OneSync Pro 2 years</option>
							 <option value="OneSync  X Edition 1 years">OneSync  X Edition 1 years</option>
						   </select>
						</dt>
                    </dl>
					
					<dl>
                        <dt><label for="Advfee">Annual Advertising Fee[ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="number" name="Advfee" required></dt>
                    </dl>
					
					
					
					<dl>
                        <dt><label for="Item">Additional Item:</label></dt>
                        <dt><input type="checkbox"  name="items[]" value="Basic Add to cart">Basic Add to cart</dt>
						<dt><input type="checkbox"  name="items[]" value="Chinese Version">Chinese Version</dt>
						<dt><input type="checkbox"  name="items[]" value="Malay Version">Malay Version</dt>
						<dt><input type="checkbox"  name="items[]" value="Multiple Quotation">Multiple Quotation</dt>
						<dt><input type="checkbox"  name="items[]" value="Extra Email Account">Extra Email Account</dt>
						<dt><input type="checkbox"  name="items[]" value="Extra Domain Name">Extra Domain Name</dt>
						<dt><input type="checkbox"  name="items[]" value="Customize Form">Customize Form</dt>
						<dt><input type="checkbox"  name="items[]" value="IOS App">IOS App</dt>
						<dt><input type="checkbox"  name="items[]" value="Android App">Android App</dt>
                         
                    </dl>
				   
					
				  	
					<dl>
                        <dt><label for="Total">Total Package Amount [ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="number" name="Total" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="Payment">Payment:</label></dt>
                        <dt>
						  <select name="Payment" required>
						     <option disabled selected value> -- select an option -- </option>
						     <option value="Cheque">Cheque</option>
							 <option value="Cash">Cash</option>
							 <option value="Bank transfer/Online Banking">Bank transfer/Online Banking</option>
							 
						   </select>
						
						</dt>
                    </dl>
					
			        
					
					<dl>
                        <dt><label for="amount">Payment Amount [ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="number" name="amount" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="payment_date">Payment / Cheque / Bank Transfer Date:</label></dt>
                        <dt><input type="date" name="payment_date" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="customer">Customer Name :</label></dt>
                        <dt><input type="text" size="54" placeholder="customer name" name="customer" autocorrect="off" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="customerDesignation">Customer Designation :</label></dt>
                        <dt><input type="text" size="54" placeholder="Customer Designation" name="customer_design" autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="customerPhone">Customer Contact H/P:</label></dt>
                        <dt><input type="tel" id="customerPhone" name="customerPhone"   placeholder="012-3456789" required></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="email_master">Email (MASTER):</label></dt>
                        <dt><input type="email" name="email_master" id="email_master"  placeholder="example@gmail.com" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="email_billing">Email (BILLING):<input type="checkbox" name="e_master" id="e_master" onchange="copyValue();">use master email</label></dt>
                        <dt><input type="email" name="email_billing"  id="email_billing" placeholder="example@gmail.com" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="Attachment">Attachment :</label></dt>
                        <dt><b>Order Form:</b></dt>
						<dt><input type="file" id="fileChooser"name="Order" onchange="return ValidateFileUpload()"></dt>
						<dt><b>Quotation:</b></dt>
						<dt><input type="file" id="fileChooser"name="quotation" onchange="return ValidateFileUpload()"></dt>
						<dt><b>Name Card(Front):</b></dt>
						<dt><input type="file" id="fileChooser"name="fcard" onchange="return ValidateFileUpload()"></dt>
						<dt><b>Name Card(Back):</b></dt>
						<dt><input type="file" id="fileChooser"name="bcard" onchange="return ValidateFileUpload()"></dt>
						<dt><b>Company SSM:</b></dt>
						<dt><input type="file" id="fileChooser"name="SSM" onchange="return ValidateFileUpload()"></dt>
						<dt><b>Cheque:</b></dt>
						<dt><input type="file" id="fileChooser"name="cheque" onchange="return ValidateFileUpload()"></dt>
						<dt><b>Cash:</b></dt>
						<dt><input type="file" id="fileChooser"name="cash" onchange="return ValidateFileUpload()"></dt>
						<dt><b>Payment Slip:</b></dt>
						<dt><input type="file" id="fileChooser"name="slip"onchange="return ValidateFileUpload()"></dt>
						
                         
                    </dl>
				   
					
					
					
					
				   
					<details>
					
                       <summary style="font-weight:bold">For website</summary>
                          
                          
						  <input type="checkbox" name="billing" id="billing" onchange="duplicateValue();">use billing
		           
					<dl>
                        <dt><label for="CompanyName">Company name:</label></dt>
                        <dt><input type="text" id="CompanyName"name="Company_Name"  size="54"  placeholder="Company Name" autocorrect="off" required></dt>
                    </dl>
					
					<dl>
                        <dt><label for="CompanyReg">Company Registration No.:</label></dt>
                        <dt><input type="text" id="CompanyReg" name="CompanyReg"  size="54"  placeholder="Company Registration Number" autocorrect="off"></dt>
                    </dl>
					
					<dl>
                        <dt><label for="GSTNo">GST No.:</label></dt>
                        <dt><input type="text" id="GST_No"name="GSTNo"  size="54"  placeholder="GST Number" autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyAddress">Company Address:</label></dt>
                        <dt><textarea spellcheck="false" name="Company_Address" id="CompanyAddress" rows="5" cols="36" placeholder="Company Address" autocorrect="off" required></textarea></dt>
					</dl>
					
					
					
					 <dl>
                        <dt><label for="OfficePhone">Office Telephone:</label></dt>
                        <dt><input type="tel" id="OfficePhone"  name="Office_Phone"   placeholder="03-12345678" ></dt>
                    </dl>
					
					
					<dl>
                        <dt><label for="OfficeFax">Office Fax:</label></dt>
                        <dt><input type="tel" id="Office_Fax" name="Office_Fax"   placeholder="03-12345678" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="email_website">Email (WEBSITE):</label></dt>
                        <dt><input type="email" name="email_website"  id="email_website" placeholder="example@gmail.com" required/></dt>
                    </dl>
					
						
					<dl>
                        <dt><label for="DomainType">Domain Type:</label></dt>
                        <dt>
						 <select name="DomainType" required>
						     <option disabled selected value> -- select an option -- </option>
						     <option value="Register">Register</option>
							 <option value="Transfer">Transfer</option>
							 <option value="Need Confirm">Need Confirm</option>
							 
						   </select>
						
						</dt>
                    </dl>
					
					<dl>
                        <dt><label for="DomainName">Domain Name:</label></dt>
                        <dt><input type="text" name="DomainName"  size="54"  placeholder="Domain Name" ></dt>
					</dl>
					
					<dl>
                        <dt><label for="NoEmailAccount">How many Email Account:</label></dt>
                        <dt><input type="number"  id="NoEmailAccount" name="NoEmailAccount"  ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="CompanyBusiness">Company Business.:</label></dt>
                        <dt><input type="text" name="CompanyBusiness"  size="54"  placeholder="Company Business" autocorrect="off"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CustomerDescription">Customer description:</label></dt>
                        <dt><textarea name="CustomerDescription" id="CustomerDescription" rows="5" cols="36" placeholder="Customer Description" autocorrect="off"></textarea></dt>
					</dl>
					
					 <dl>
                        <dt><label for="Reason">Reason to Redo Website:</label></dt>
                        <dt><textarea name="Reason" id="Reason" rows="5" cols="36" placeholder="Reason" autocorrect="off"></textarea></dt>
					</dl>
				  
					
				
					
					
                         
                   </details>
				   
				   <dl>
                        <dt><label for="Remark">Remark:</label></dt>
                        <dt><textarea name="Remark" id="Remark" rows="5" cols="36" placeholder="Remark" autocorrect="off"></textarea></dd></dt>
                    </dl>
				 
					
					   
					 <dl class="terms">
                     <dt>
					  <label>
                       <input type="checkbox" name="remember_me" id="remember_me">
					    I agree and take full responsibility for my actions.
                        New Sales Collection also counts for any upgrade from the same clients within the Month.
						Sales/collection will be cancel if any PD cheque is cancelled or hold by clients. 
						Cannot use own money to pay for clients. 
						Cannot play trick. Example: sales cannot transfer.
						Commissions for salary not affect.
						Only item in Brochure is counted, example: special app/ipay88 apply no count in.
						Any TOPUP/Upgrade sales figure, must collect payment just can count.
                       </label>
					</dt>
                   </dl>
					
					
					
                    
                   
                    
                    
                    
                     <dl class="submit">
                      <dt><input id="sub-btn-style" type="submit" name="submit" id="submit" value="Submit"  /></dt>
					   
                     </dl>
				   
               </fieldset>
			   </form>
             
		
		 
		
	 </div >
	 
	 
 <body>
</html>

<!-- insert code -->
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
		 $update_status="No";
		 //for website
		 $Company_Name=$_POST['Company_Name'];
		 $CompanyReg=$_POST['CompanyReg'];
		 $GSTNo=$_POST['GSTNo'];
		 $Company_Address=$_POST['Company_Address'];
		 $CompanyBusiness=$_POST['CompanyBusiness'];
		 $Office_Phone=$_POST['Office_Phone'];
		 $Office_Fax=$_POST['Office_Fax'];
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
		 //upload file
		 $Order = $_FILES['Order']['name'];
		 $quotation = $_FILES['quotation']['name'];
		 $fcard = $_FILES['fcard']['name'];
		 $bcard = $_FILES['bcard']['name'];
		 $SSM = $_FILES['SSM']['name'];
		 $cheque = $_FILES['cheque']['name'];
		 $cash = $_FILES['cash']['name'];
		 $slip = $_FILES['slip']['name'];
         $target= PR_UPLOADPATH . $Order;
		 $target2=PR_UPLOADPATH2 . $quotation;
		 $target3=PR_UPLOADPATH3 . $fcard;
		 $target4=PR_UPLOADPATH4 . $bcard;
		 $target5=PR_UPLOADPATH5 . $SSM;
		 $target6=PR_UPLOADPATH6 . $cheque;
		 $target7=PR_UPLOADPATH7 . $cash;
		 $target8=PR_UPLOADPATH8 . $slip;
	     move_uploaded_file($_FILES['Order']['tmp_name'],$target); 
		 move_uploaded_file($_FILES['quotation']['tmp_name'],$target2); 
		 move_uploaded_file($_FILES['fcard']['tmp_name'],$target3);
		 move_uploaded_file($_FILES['bcard']['tmp_name'],$target4);
		 move_uploaded_file($_FILES['SSM']['tmp_name'],$target5); 
		 move_uploaded_file($_FILES['cheque']['tmp_name'],$target6); 
		 move_uploaded_file($_FILES['cash']['tmp_name'],$target7); 
		 move_uploaded_file($_FILES['slip']['tmp_name'],$target8); 
		 
		 mysqli_query($db,"insert into job(date_submission,contract_no,company_name,company_reg_no,gst_no,
					  company_address,office_telephone,office_fax,package,annual_adv_fee,item,
					  total_package_amount,payment,payment_amount,P_amount_GST,P_amount_b_GST,payment_date,customer_name,CustomerDesignation,customer_hp,email_master,email_billing,fcard,order_form,quotation,bcard,company_ssm,cheque,cash,payment_slip,remark,company_name_web,company_reg_no_web,gst_no_web,company_address_web,company_business_web,office_phone_web,
		              office_fax_web,email_website,Domain_Type,Domain_name,customer_desc,reason,no_of_email_account,gst,beforeGST,status,update_status,sales_name,branch_name,sales_email,sales_id) values
					  ('$submit_date','$contract_no','$Company_Name','$CompanyReg','$GSTNo',
					  '$Company_Address','$Office_Phone','$Office_Fax','$package','$Advfee','" . $items . "',
					  '$Total','$Payment','$amount','$PaymentGst','$PaymentBeforeGST','$payment_date','$customer','$customer_design','$customerPhone','$email_master','$email_billing','$fcard','$Order','$quotation','$bcard','$SSM','$cheque','$cash','$slip','$Remark','$Company_Name',' $CompanyReg','$GSTNo',' $Company_Address','$CompanyBusiness',' $Office_Phone','$Office_Fax','$email_website','$DomainType','$DomainName','$CustomerDescription','$Reason','$NoEmailAccount','$Gst','$BeforeGST','$status','$update_status','$name','$branch_name','$sales_email','$Sales_id')");
	    
		  
		  $to = "jun@n.my";
          $headers = "From: livrariahealth@gmail.com" . "\r\n";
		  $headers .= "CC: $sales_email\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		  //$subject = "Job - NEWPAGES NETWORK SDN BHD Website";
          $subject = "[$branch_name]New Sales - ". $_POST['Company_Name']. " ";
          $message = '<html><body>';
          $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		  $message .= "<tr ><th colspan='2' style='font-size:30px;text-align:left'><strong>For Billing:</strong> </th></tr>";
          $message .= "<tr ><td><strong>Company name:</strong> </td><td>". strip_tags($_POST['Company_Name'])."</td></tr>";
		  $message .= "<tr ><td><strong>Company Reg no.:</strong> </td><td>". strip_tags($_POST['CompanyReg'])."</td></tr>";
          $message .= "<tr ><td><strong>GST no:</strong> </td><td>". strip_tags($_POST['GSTNo'])."</td></tr>";
		  $message .= "<tr ><td><strong>Company Address:</strong> </td><td>". strip_tags($_POST['Company_Address'])."</td></tr>";
		  $message .= "<tr ><td><strong>Office phone:</strong> </td><td>". strip_tags($_POST['Office_Phone'])."</td></tr>";
		  $message .= "<tr ><td><strong>Office Fax:</strong> </td><td>". strip_tags($_POST['Office_Fax'])."</td></tr>";
		  $message .= "<tr ><td><strong>Email(Billing):</strong> </td><td>". strip_tags($_POST['email_billing'])."</td></tr>";
		 
		  
		  $message .= "<tr ><th colspan='2' style='font-size:30px;text-align:left'><strong>For Website:</strong> </th></tr>";
		  $message .= "<tr ><td><strong>Company name:</strong> </td><td>". strip_tags($_POST['Company_Name'])."</td></tr>";
		  $message .= "<tr ><td><strong>Company Reg no.:</strong> </td><td>". strip_tags($_POST['CompanyReg'])."</td></tr>";
          $message .= "<tr ><td><strong>GST no:</strong> </td><td>". strip_tags($_POST['GSTNo'])."</td></tr>";
          $message .= "<tr ><td><strong>Company Address:</strong> </td><td>". strip_tags($_POST['Company_Address'])."</td></tr>";
          $message .= "<tr ><td><strong>Office phone:</strong> </td><td>". strip_tags($_POST['Office_Phone'])."</td></tr>";
          $message .= "<tr ><td><strong>Office Fax:</strong> </td><td>". strip_tags($_POST['Office_Fax'])."</td></tr>";
          $message .= "<tr ><td><strong>E-mail(Website):</strong> </td><td>". strip_tags($_POST['email_website'])."</td></tr>";
          $message .= "<tr ><td><strong>Domain Type:</strong> </td><td>". strip_tags($_POST['DomainType'])."</td></tr>";
          $message .= "<tr ><td><strong>Domain Name:</strong> </td><td>". strip_tags($_POST['DomainName'])."</td></tr>";
          $message .= "<tr ><td><strong>No of e-mail account:</strong> </td><td>". strip_tags($_POST['NoEmailAccount'])."</td></tr>";
          $message .= "<tr ><td><strong>Contact person:</strong> </td><td>". strip_tags($_POST['customer'])."</td></tr>";
          $message .= "<tr ><td><strong>Customer Description:</strong> </td><td>". strip_tags($_POST['CustomerDescription'])."</td></tr>";
		  $message .= "<tr ><td><strong>Customer Phone:</strong> </td><td>". strip_tags($_POST['customerPhone'])."</td></tr>";
		  $message .= "<tr ><td><strong>Email Master:</strong> </td><td>". strip_tags($_POST['email_master'])."</td></tr>";
		  $message .= "<tr ><td><strong>Customer Designation:</strong> </td><td>". strip_tags($_POST['customer_design'])."</td></tr>";
		  $message .= "<tr ><td><strong>Company Business:</strong> </td><td>". strip_tags($_POST['CompanyBusiness'])."</td></tr>";
          $message .= "<tr ><td><strong>Package:</strong> </td><td>". strip_tags($_POST['package'])."</td></tr>";
          $message .= "<tr ><td><strong>Payment:</strong> </td><td>". strip_tags($_POST['amount'])."</td></tr>";
          $message .= "<tr ><td><strong>Reason to redo website:</strong> </td><td>". strip_tags($_POST['Reason'])."</td></tr>";

		  $message .= "<tr ><th colspan='2' style='font-size:30px;text-align:left'><strong>Attachment:</strong> </th></tr>";
		   if(!empty($_FILES['Order']['tmp_name'])){
		     $message .= "<tr ><td><strong>Order form:</strong> </td><td>http://www.newpages.net/wenkai/order/$Order</td></tr>";
		  }else{
		     $message .= "<tr ><td><strong>Order form:</strong> </td><td>not uploading file</td></tr>";
		  }
		  if(!empty($_FILES['quotation']['tmp_name'])){
		    $message .= "<tr ><td><strong>Quotation:</strong> </td><td>http://www.newpages.net/wenkai/quotation/$quotation</td></tr>";
		  }else{
		    $message .= "<tr ><td><strong>Quotation:</strong> </td><td>not uploading file</td></tr>";
		  }
		  if(!empty($_FILES['fcard']['tmp_name'])){
		    $message .= "<tr ><td><strong>Name Card(Front):</strong> </td><td>http://www.newpages.net/wenkai/fcard/$fcard</td></tr>";
		  }else{
		     $message .= "<tr ><td><strong>Name Card(Front):</strong> </td><td>not uploading file</td></tr>";
		  }
		  if(!empty($_FILES['bcard']['tmp_name'])){
		    $message .= "<tr ><td><strong>Name Card(Back):</strong> </td><td>http://www.newpages.net/wenkai/bcard/$bcard</td></tr>";
		  }else{
		    $message .= "<tr ><td><strong>Name Card(Back):</strong> </td><td>not uploading file</td></tr>";
		  }
		  if(!empty($_FILES['SSM']['tmp_name'])){
		    $message .= "<tr ><td><strong>Company SSM:</strong> </td><td>http://www.newpages.net/wenkai/ssm/$SSM</td></tr>";
		  }else{
		    $message .= "<tr ><td><strong>Company SSM:</strong> </td><td>not uploading file</td></tr>";
		  }
		  if(!empty($_FILES['cheque']['tmp_name'])){
		   $message .= "<tr ><td><strong>Cheque:</strong> </td><td>http://www.newpages.net/wenkai/cheque/$cheque</td></tr>";
		  }else{
		    $message .= "<tr ><td><strong>Cheque:</strong> </td><td>not uploading file</td></tr>";
		  }
		  if(!empty($_FILES['cash']['tmp_name'])){
		   $message .= "<tr ><td><strong>Cash:</strong> </td><td>http://www.newpages.net/wenkai/cash/$cash</td></tr>";
		  }else{
		     $message .= "<tr ><td><strong>Cash:</strong> </td><td>not uploading file</td></tr>";
		  }
		  if(!empty($_FILES['slip']['tmp_name'])){
		    $message .= "<tr ><td><strong>Payment Slip:</strong> </td><td>http://www.newpages.net/wenkai/slip/$slip</td></tr>";
		  }else{
		     $message .= "<tr ><td><strong>Payment Slip:</strong> </td><td>not uploading file</td></tr>";
		  }

          $message .= "</table>";
          $message .= "</body></html>";

          mail($to,$subject,$message,$headers);
		  
		  //email to customer
          $to = $email_master;
          $headers = "From: livrariahealth@gmail.com" . "\r\n";
		  $headers .= "CC: $sales_email\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		  $subject = "Your Job been Updated!";
       
          $message = '<html><body>';
          $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		  $message .= "<tr ><th colspan='2' style='font-size:30px;text-align:left'><strong>Thank you:</strong> </th></tr>";
          $message .= "<tr ><td><strong>Job Updated by:</strong> </td><td>$name</td></tr>";
		  $message .= "<tr ><td><strong>Updated date:</strong> </td><td>". strip_tags($_POST['submit_date'])."</td></tr>";
		  
		  mail($to,$subject,$message,$headers);
		  
		  
 ?>
	
	      <?php  
            echo "<script>
                    alert('Sucessfully add a job!');
                   window.location.href='job.php';
                  </script>";
			
			
  
		  ?>
		
		
		
		
	
	<?php
	  
	  
	  }
	  
	  
?>




