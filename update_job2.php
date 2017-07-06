<?php
   include('session.php');
 
   
 
  $id=$_SESSION["user_id"];
 
   
  
  //path of image file
  define('PR_UPLOADPATH','order/');
  define('PR_UPLOADPATH2','quotation/');
  define('PR_UPLOADPATH3','fcard/');
  define('PR_UPLOADPATH4','bcard/');
  define('PR_UPLOADPATH5','ssm/');
  define('PR_UPLOADPATH6','cheque/');
  define('PR_UPLOADPATH7','cash/');
  define('PR_UPLOADPATH8','slip/');

  
  $jid = $_REQUEST["jid"];

  //$query="select * from job where job_id = $jid";
  $query="SELECT * FROM job LEFT JOIN salesperson ON job.sales_id = salesperson.Sales_id where job.job_id = $jid and salesperson.Sales_id=$id";
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  
  if($row == false){
    header('location:job_history.php');
  }
 
  
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<link rel="stylesheet" type="text/css" href="css/enlarge.css">
<script type="text/javascript" src="js/jszip.js"></script>
  <script>
 $(document).ready(function(){
   $('#imgSmile').width(100);
   
  $('#imgSmile').click( function (){
 
   $("#imgSmile").elevateZoom(function()
     {$(this).animate({width: "10000px"}, 'slow');}, 
     function()
     {$(this).animate({width: "500px"}, 'slow');
   });
    
  });

});
 </script>

 

<script>
  
 //download all without zip file 
function downloadit(){
     
    for (var i = 0; i < document.getElementsByClassName("clickit").length; i++){   
    	var clickEvent = document.createEvent("MouseEvent");
		clickEvent.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null); 

        document.getElementsByClassName("clickit")[i].dispatchEvent(clickEvent);
		
		
    }
    return false;
}

function create_zip() {
	var zip = new JSZip();
	/*
	var order=document.getElementsByClassName("order").getAttribute('src') == "order/<?php echo $row['order_form']?>";
	var quotation=document.getElementsByClassName("quotation").getAttribute('src') == "quotation/<?php echo $row['quotation']?>";
	var fcard=document.getElementsByClassName("fcard").getAttribute('src') == "fcard/<?php echo $row['fcard']?>";
	var bcard=document.getElementsByClassName("bcard").getAttribute('src') == "bcard/<?php echo $row['bcard']?>";
	var ssm=document.getElementsByClassName("ssm").getAttribute('src') == "ssm/<?php echo $row['company_ssm']?>";
	var cheque=document.getElementsByClassName("cheque").getAttribute('src') == "cheque/<?php echo $row['cheque']?>";
	var cash=document.getElementsByClassName("cash").getAttribute('src') == "cash/<?php echo $row['cash']?>";
	var slip=document.getElementsByClassName("slip").getAttribute('src') == "slip/<?php echo $row['payment_slip']?>";
	
	//zip.add("new.txt","fhfkljfkljf\n")
	zip.add(order);
	zip.add(quotation);
	zip.add(fcard);
	zip.add(bcard);
	zip.add(ssm);
	zip.add(cheque);
	zip.add(cash);
	zip.add(slip);
	zip.folder("images").add("smile.gif", base64Data, {base64: true});
	
	content = zip.generate();
	location.href="data:application/zip;base64," + content;
	*/
	
    
    zip.add("slip");
	content = zip.generate();
	location.href="data:application/zip;base64," + content;

}



</script>

 

  
  <style>
     ul{
	    list-style-type: none;
		
	 }
	 
	 ul li{
	    display: inline;
	 }
	 
	 #nav{
	    border:solid 2px;
	 }
	 
	 .enlarge:hover {
     	transform:scale(2,2);
	    transform-origin:0 0;
      }
	  
	  input[type=text],
      input[type=email],
      textarea,
      select {
       width: 100%; 
     }
	 
	
	
  </style>
</head>
 <body>
 <div id="logout" align="right">
  <a href="logout.php">logout</a>
  </div>   
  
  <div id="nav">
      <ul>
	     <li>View job</li>
		
		  
	  </ul>
  </div>
	 <div id="JobForm">
	     <form action="" method="post" enctype="multipart/form-data" >
         
                <fieldset>
			
				
				 
					
                    <dl>
                        <dt><label for="Submitdate">Submit date</label></dt>
                        <dt><input type="date"  id="submit_date" name="submit_date" value="<?php echo $row['date_submission'];?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="ContractNo">Contract No.</label></dt>
                        <dt><input type="text"  id="contract_no"name="contract_no" value="<?php echo $row['contract_no']; ?>" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyName">Company name:</label></dt>
                        <dt><input type="text" id="Company_Name"name="Company_Name"  size="54" value="<?php echo $row['company_name']; ?>"  ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="CompanyReg">Company Registration No.:</label></dt>
                        <dt><input type="text" id="CompanyReg"name="CompanyReg"  size="54"  value="<?php echo $row['company_reg_no']; ?>"  ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="GSTNo">GST No.:</label></dt>
                        <dt><input type="text" id="GSTNo"name="GSTNo"  size="54"  placeholder="GST Number" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyAddress">Company Address:</label></dt>
                        <dt><textarea id="CompanyAddress"name="CompanyAddress" cols="30" rows="10" id="CompanyAddress" ><?php echo $row['company_address']; ?></textarea></dt>
					</dl>
					
					 <dl>
                        <dt><label for="OfficePhone">Office Telephone:</label></dt>
                        <dt><input type="tel" id="Office_Phone"name="Office_Phone"    value="<?php echo $row['office_telephone']; ?>"  ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="OfficeFax">Office Fax:</label></dt>
                        <dt><input type="tel" id="Office_Fax"name="Office_Fax"  value="<?php echo $row['office_fax']; ?>"  ></dt>
                    </dl>
					
					
					
					
					
					<dl>
                        <dt><label for="Package">ONESYCN Package:</label></dt>
                        <dt>
						   <input type="text" name="package" id="package" value="<?php echo $row['package']; ?>"  >
						</dt>
                    </dl>
					
					<dl>
                        <dt><label for="Advfee">Annual Advertising Fee[ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="text" id="Advfee"name="Advfee" value="<?php echo $row['annual_adv_fee']; ?>" ></dt>
                    </dl>
					
					
					
					<dl>
                        <dt><label for="Item">Additional Item:</label></dt>
                        <dt><textarea name="Item" cols="30" rows="10" id="Item" ><?php echo $row['item']; ?></textarea></dt>
						
                         
                    </dl>
					
					<dl>
                        <dt><label for="Total">Total Package Amount [ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="text" id="total"name="Total" value="<?php echo $row['total_package_amount']; ?>" ></dt>
						
                    </dl>
					
					<dl>
                        <dt><label for="Payment">Payment:</label></dt>
                        <dt>
						  <input type="text" id="payment"name="payment" value="<?php echo $row['payment']; ?>" >
  
						</dt>
                    </dl>
					
			        
					
					<dl>
                        <dt><label for="amount">Payment Amount [ Include 6% GST ]:</label></dt>
                        <dt>RM<input type="text" id="amount"name="amount"  value="<?php echo $row['payment_amount']; ?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="payment_date">Payment / Cheque / Bank Transfer Date:</label></dt>
                        <dt><input type="text" name="payment_date" value="<?php echo $row['payment_date']; ?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="customer">Customer Name :</label></dt>
                        <dt><input type="text" size="54"  id="customer"name="customer" value="<?php echo $row['customer_name']; ?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="customerDesignation">Customer Designation :</label></dt>
                        <dt><input type="text" size="54"  id="customer_design"name="customer_design" value="<?php echo $row['CustomerDesignation']; ?>" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="customerPhone">Customer Contact H/P:</label></dt>
                        <dt><input type="tel" id="customerPhone"name="customerPhone"   value="<?php echo $row['customer_hp']; ?>"  ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="email_master">Email (MASTER):</label></dt>
                        <dt><input type="text"  id="email_master"name="email_master"   value="<?php echo $row['email_master']; ?>"  ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="email_billing">Email (BILLING):</label></dt>
                        <dt><input type="text" id="email_billing"name="email_billing"   value="<?php echo $row['email_billing']; ?>"  ></dt>
                    </dl>
					
					<dl>
                       
						
						<dt><label for="Attachment">Attachment :</label></dt>
						<dt>Download all attachement</dt>
                        <dt><a id="" href="#" onclick="downloadit();">download all</a></dt>
						
						
						
						<dt>Order Form:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="Order" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="order"id="myImg"src="order/<?php echo $row['order_form']?>" style="width:150px;"></dt>
						
						<dt><a  id="order"class="clickit"download="order_form.jpg" href="order/<?php echo $row['order_form']?>">download</a></dt>
						
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
						
						<dt>Quotation:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="quotation" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="quotation"id="myImg1"src="quotation/<?php echo $row['quotation']?>" style="width:150px;"></dt>
						<dt><a  class="clickit" download="Quotation.jpg" href="quotation/<?php echo $row['quotation']?>">download</a></dt>
						
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
						<dt>Front Name Card:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="fcard" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="fcard"id="myImg2"src="fcard/<?php echo $row['fcard']?>" style="width:150px;"></dt>
						<dt><a  class="clickit" download="Front_Name_card.jpg" href="card/<?php echo $row['name_card']?>">download</a></dt>
						
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
						
						<dt>Back Name Card:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="bcard" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="bcard"id="myImg3"src="bcard/<?php echo $row['bcard']?>" style="width:150px;"></dt>
						<dt><a  class="clickit" download="Back_Name_card.jpg" href="card/<?php echo $row['bcard']?>">download</a></dt>
						
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
						
						<dt>Company SSM:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="SSM" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="ssm"id="myImg4"src="ssm/<?php echo $row['company_ssm']?>" style="width:150px;"></dt>
						<dt><a  class="clickit" download="Company_SSM.jpg" href="ssm/<?php echo $row['company_ssm']?>">download</a></dt>
						
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
						<dt>Cheque:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="cheque" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="cheque"id="myImg5"src="cheque/<?php echo $row['cheque']?>" style="width:150px;"></dt>
						<dt><a  class="clickit" download="Cheque.jpg" href="cheque/<?php echo $row['cheque']?>">download</a></dt>
						
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
                           var img = document.getElementById('myImg5');
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
						<dt>Cash:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="cash" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="cash"id="myImg6"src="cash/<?php echo $row['cash']?>" style="width:150px;"></dt>
						<dt><a  class="clickit" download="Cash.jpg" href="cash/<?php echo $row['cash']?>">download</a></dt>
						
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
                           var img = document.getElementById('myImg6');
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
						<dt>Payment Slip:</dt>
						<dt>
						   <input type="file" id="fileChooser"name="slip" onchange="return ValidateFileUpload()"> 
						</dt>
						<dt><img class="slip"id="myImg7" src="slip/<?php echo $row['payment_slip']?>" style="width:150px;"></dt>
						<dt><a  class="clickit" download="Payment_slip.jpg" href="slip/<?php echo $row['payment_slip']?>">download</a></dt>
                         
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
                           var img = document.getElementById('myImg7');
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
					
					<details>
                       <summary style="font-weight:bold"><h1>For website</h1></summary>
                          
                            
		             <dl>
                        <dt><label for="CompanyName">Company name:</label></dt>
                        <dt><input type="text" id="CompanyName"name="company_name"  size="54"  value="<?php echo $row['company_name_web']?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="CompanyReg">Company Registration No.:</label></dt>
                        <dt><input type="text" id="CompanyReg" name="companyreg"  size="54"  value="<?php echo $row['company_reg_no_web']?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="GSTNo">GST No.:</label></dt>
                        <dt><input type="text" id="GST_No"name="GSTno"  size="54"  value="<?php echo $row['gst_no_web']?>" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CompanyAddress">Company Address:</label></dt>
                        <dt><textarea name="Company_Address" id="companyaddress" rows="5" cols="36"  ><?php echo $row['company_address_web']?></textarea></dt>
					</dl>
					
					<dl>
                        <dt><label for="CompanyBusiness">Company Business.:</label></dt>
                        <dt><input type="text" name="CompanyBusiness"  size="54"  value="<?php echo $row['company_business_web']?>" ></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="OfficePhone">Office Telephone:</label></dt>
                        <dt><input type="tel" id="OfficePhone"  name="OfficePhone"   value="<?php echo $row['office_phone_web']?>" ></dt>
                    </dl>
					
					
					<dl>
                        <dt><label for="OfficeFax">Office Fax:</label></dt>
                        <dt><input type="tel" id="Office_Fax" name="OfficeFax"   value="<?php echo $row['office_fax_web']?>" ></dt>
                    </dl>
					
					<dl>
                        <dt><label for="email_website">Email (WEBSITE):</label></dt>
                        <dt><input type="email" name="email_website"  id="email_website" value="<?php echo $row['email_website']?>" ></dt>
                    </dl>
					
						
					<dl>
                        <dt><label for="DomainType">Domain Type:</label></dt>
                        <dt>
						 <select name="DomainType">
						     <option value="<?php echo $row['Domain_Type']?>">Existing type:<?php echo $row['Domain_Type']?></option>
						     <option value="Register">Register</option>
							 <option value="Transfer">Transfer</option>
							 <option value="Need Confirm">Need Confirm</option>
							 
						   </select>
						
						</dt>
						
                    </dl>
					
					<dl>
                        <dt><label for="DomainName">Domain Name:</label></dt>
                        <dt><input type="text" name="DomainName"  size="54"  value="<?php echo $row['Domain_name']?>" ></dt>
					</dl>
					
						<dl>
                        <dt><label for="NoEmailAccount">How many Email Account(3/5/8/10):</label></dt>
                        <dt><input type="number" min="3" max="10" id="NoEmailAccount" name="NoEmailAccount"  value="<?php echo $row['no_of_email_account']?>"></dt>
                    </dl>
					
					 <dl>
                        <dt><label for="CustomerDescription">Customer description:</label></dt>
                        <dt><textarea name="CustomerDescription" id="CustomerDescription" rows="5" cols="36"  ><?php echo $row['customer_desc']?></textarea></dt>
					</dl>
					
					 <dl>
                        <dt><label for="Reason">Reason to Redo Website:</label></dt>
                        <dt><textarea name="Reason" id="Reason" rows="5" cols="36" placeholder="Reason" ><?php echo $row['reason']?></textarea></dt>
					</dl>
					
				
					
					
                         
                   </details>
					
					<dl>
                        <dt><label for="Remark">Remark:</label></dt>
                        <dt><textarea name="remark" cols="30" rows="10" id="remark" ><?php echo $row['remark']; ?></textarea></dt>
						
                    </dl>
					
					
					
					<dl>
                       <dt><input type="submit" id="update" name="update" value="Update" ></dt>
				    </dl>
                   
                </fieldset>
         </form>
	 </div>
 <body>
</html>
<?php
   
    if(isset($_POST["update"])){
         $submit_date=$_POST['submit_date'];
	     $contract_no=$_POST['contract_no'];
		 $Company_Name=$_POST['Company_Name'];
		 $CompanyReg=$_POST['CompanyReg'];
		 $GSTNo=$_POST['GSTNo'];
		 $Company_Address=$_POST['CompanyAddress'];
		 $Office_Phone=$_POST['Office_Phone'];
		 $Office_Fax=$_POST['Office_Fax'];
		 $package=$_POST['package'];
		 $Advfee=$_POST['Advfee'];
		 //$items = implode(',', $_POST['items']);
		 $Total=$_POST['Total'];
		 $Payment=$_POST['payment'];
		 $amount=$_POST['amount'];
		 $payment_date=$_POST['payment_date'];
		 $customer=$_POST['customer'];
		 $customer_design=$_POST['customer_design'];
		 $customerPhone=$_POST['customerPhone'];
		 $email_master=$_POST['email_master'];
		 $email_billing=$_POST['email_billing'];
		 $Remark=$_POST['remark'];
		
		 //for website
		 $company_name=$_POST['company_name'];
		 $companyreg=$_POST['companyreg'];
		 $GSTno=$_POST['GSTno'];
		 $companyaddress=$_POST['Company_Address'];
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
		 
		 //upload file
		
		
		 $fcard = $_FILES['fcard']['name'];
		 $bcard = $_FILES['bcard']['name'];
		 $SSM = $_FILES['SSM']['name'];
		 $cheque = $_FILES['cheque']['name'];
		 $cash = $_FILES['cash']['name'];
		 $slip = $_FILES['slip']['name'];
         
		 $target3=PR_UPLOADPATH3 . $fcard;
		 $target4=PR_UPLOADPATH4 . $bcard;
		 $target5=PR_UPLOADPATH5 . $SSM;
		 $target6=PR_UPLOADPATH6 . $cheque;
		 $target7=PR_UPLOADPATH7 . $cash;
		 $target8=PR_UPLOADPATH8 . $slip;
	      
		 move_uploaded_file($_FILES['fcard']['tmp_name'],$target3);
		 move_uploaded_file($_FILES['bcard']['tmp_name'],$target4);
		 move_uploaded_file($_FILES['SSM']['tmp_name'],$target5); 
		 move_uploaded_file($_FILES['cheque']['tmp_name'],$target6); 
		 move_uploaded_file($_FILES['cash']['tmp_name'],$target7); 
		 move_uploaded_file($_FILES['slip']['tmp_name'],$target8); 
   
             mysqli_query($db,"update job set date_submission='$submit_date',contract_no='$contract_no',company_name='$Company_Name',company_reg_no='$CompanyReg',gst_no='$GSTNo',
					  company_address='$Company_Address',office_telephone='$Office_Phone',office_fax='$Office_Fax',annual_adv_fee='$Advfee',
					  total_package_amount='$Total',payment_amount='$amount',P_amount_GST='$PaymentGst',P_amount_b_GST='$PaymentBeforeGST',customer_name='$customer',CustomerDesignation='$customer_design',customer_hp='$customerPhone',email_master='$email_master',email_billing='$email_billing'
					  ,remark='$Remark',company_name_web='$company_name',company_reg_no_web='$companyreg',gst_no_web='$GSTno',company_address_web='$companyaddress',company_business_web='$CompanyBusiness',office_phone_web='$OfficePhone',
		              office_fax_web='$OfficeFax',email_website='$email_website',Domain_Type='$DomainType',Domain_name='$DomainName',customer_desc='$CustomerDescription',reason='$Reason',no_of_email_account='$NoEmailAccount',gst='$Gst',beforeGST='$BeforeGST' where job_id=$jid");
		    
			//mysqli_query($db,"update job set fcard='$fcard',order_form='$Order',quotation='$quotation',bcard='$bcard',company_ssm='$SSM',cheque='$cheque',cash='$cash',payment_slip='$slip'  where job_id=$jid");
             
			 //update quotation image
			 if($_FILES["quotation"]["name"] != ""){
	          $allowedExts = array("gif", "jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["quotation"]["name"]);
              $extension = end($temp);

              if ((($_FILES["quotation"]["type"] == "image/gif") || ($_FILES["quotation"]["type"] == "image/jpeg")|| ($_FILES["quotation"]["type"] == "image/jpg")|| ($_FILES["quotation"]["type"] == "image/pjpeg")|| ($_FILES["quotation"]["type"] == "image/x-png")|| ($_FILES["quotation"]["type"] == "image/png"))&& ($_FILES["quotation"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["quotation"]["error"] > 0) {
                 echo "Error: " . $_FILES["quotation"]["error"] . "<br>";
                } else {}
	             $quotation = $_FILES['quotation']['name'];
                 $target2=PR_UPLOADPATH2 . $quotation;
                 move_uploaded_file($_FILES['quotation']['tmp_name'],$target2);

                  mysqli_query($db,"update job set quotation='$quotation' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update quotation image
			
			 //update Order image
			 if($_FILES["Order"]["name"] != ""){
	          $allowedExts = array("gif", "jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["Order"]["name"]);
              $extension = end($temp);

              if ((($_FILES["Order"]["type"] == "image/gif") || ($_FILES["Order"]["type"] == "image/jpeg")|| ($_FILES["Order"]["type"] == "image/jpg")|| ($_FILES["Order"]["type"] == "image/pjpeg")|| ($_FILES["Order"]["type"] == "image/x-png")|| ($_FILES["Order"]["type"] == "image/png"))&& ($_FILES["Order"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["Order"]["error"] > 0) {
                 echo "Error: " . $_FILES["Order"]["error"] . "<br>";
                } else {}
	              $Order = $_FILES['Order']['name'];
                  $target=PR_UPLOADPATH . $Order;
                  move_uploaded_file($_FILES['Order']['tmp_name'],$target);

                  mysqli_query($db,"update job set order_form='$Order' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update Order image
			
			//update front card image
			 if($_FILES["fcard"]["name"] != ""){
	          $allowedExts = array("gif", "jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["fcard"]["name"]);
              $extension = end($temp);

              if ((($_FILES["fcard"]["type"] == "image/gif") || ($_FILES["fcard"]["type"] == "image/jpeg")|| ($_FILES["fcard"]["type"] == "image/jpg")|| ($_FILES["fcard"]["type"] == "image/pjpeg")|| ($_FILES["fcard"]["type"] == "image/x-png")|| ($_FILES["fcard"]["type"] == "image/png"))&& ($_FILES["fcard"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["fcard"]["error"] > 0) {
                 echo "Error: " . $_FILES["fcard"]["error"] . "<br>";
                } else {}
	              $fcard = $_FILES['fcard']['name'];
                  $target3=PR_UPLOADPATH3 . $fcard;
                  move_uploaded_file($_FILES['fcard']['tmp_name'],$target3);

                  mysqli_query($db,"update job set fcard='$fcard' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update front card image
			
			//update back card image
			 if($_FILES["bcard"]["name"] != ""){
	          $allowedExts = array("gif", "jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["bcard"]["name"]);
              $extension = end($temp);

              if ((($_FILES["bcard"]["type"] == "image/gif") || ($_FILES["bcard"]["type"] == "image/jpeg")|| ($_FILES["bcard"]["type"] == "image/jpg")|| ($_FILES["bcard"]["type"] == "image/pjpeg")|| ($_FILES["bcard"]["type"] == "image/x-png")|| ($_FILES["bcard"]["type"] == "image/png"))&& ($_FILES["bcard"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["bcard"]["error"] > 0) {
                 echo "Error: " . $_FILES["bcard"]["error"] . "<br>";
                } else {}
	              $bcard = $_FILES['bcard']['name'];
                  $target4=PR_UPLOADPATH4 . $bcard;
                  move_uploaded_file($_FILES['bcard']['tmp_name'],$target4);

                  mysqli_query($db,"update job set bcard='$bcard' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update back card image
			
			//update ssm image
			 if($_FILES["SSM"]["name"] != ""){
	          $allowedExts = array("gif", "jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["SSM"]["name"]);
              $extension = end($temp);

              if ((($_FILES["SSM"]["type"] == "image/gif") || ($_FILES["SSM"]["type"] == "image/jpeg")|| ($_FILES["SSM"]["type"] == "image/jpg")|| ($_FILES["SSM"]["type"] == "image/pjpeg")|| ($_FILES["SSM"]["type"] == "image/x-png")|| ($_FILES["SSM"]["type"] == "image/png"))&& ($_FILES["SSM"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["SSM"]["error"] > 0) {
                 echo "Error: " . $_FILES["SSM"]["error"] . "<br>";
                } else {}
	              $SSM = $_FILES['SSM']['name'];
                  $target5=PR_UPLOADPATH5 . $SSM;
                  move_uploaded_file($_FILES['SSM']['tmp_name'],$target5);

                  mysqli_query($db,"update job set company_ssm='$SSM' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update ssm image
			
			//update cheque image
			 if($_FILES["cheque"]["name"] != ""){
	          $allowedExts = array("gif", "jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["cheque"]["name"]);
              $extension = end($temp);

              if ((($_FILES["cheque"]["type"] == "image/gif") || ($_FILES["cheque"]["type"] == "image/jpeg")|| ($_FILES["cheque"]["type"] == "image/jpg")|| ($_FILES["cheque"]["type"] == "image/pjpeg")|| ($_FILES["cheque"]["type"] == "image/x-png")|| ($_FILES["cheque"]["type"] == "image/png"))&& ($_FILES["cheque"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["cheque"]["error"] > 0) {
                 echo "Error: " . $_FILES["cheque"]["error"] . "<br>";
                } else {}
	              $cheque = $_FILES['cheque']['name'];
                  $target6=PR_UPLOADPATH6 . $cheque;
                  move_uploaded_file($_FILES['cheque']['tmp_name'],$target6);

                  mysqli_query($db,"update job set cheque='$cheque' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update cheque image
			
			//update cash image
			 if($_FILES["cash"]["name"] != ""){
	          $allowedExts = array("gif", "jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["cash"]["name"]);
              $extension = end($temp);

              if ((($_FILES["cash"]["type"] == "image/gif") || ($_FILES["cash"]["type"] == "image/jpeg")|| ($_FILES["cash"]["type"] == "image/jpg")|| ($_FILES["cash"]["type"] == "image/pjpeg")|| ($_FILES["cash"]["type"] == "image/x-png")|| ($_FILES["cash"]["type"] == "image/png"))&& ($_FILES["cash"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["cash"]["error"] > 0) {
                 echo "Error: " . $_FILES["cash"]["error"] . "<br>";
                } else {}
	              $cash = $_FILES['cash']['name'];
                  $target7=PR_UPLOADPATH7 . $cash;
                  move_uploaded_file($_FILES['cash']['tmp_name'],$target7);

                  mysqli_query($db,"update job set cash='$cash' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update cash image
			
			//update slip image
			 if($_FILES["slip"]["name"] != ""){
	          $allowedExts = array("gif", "jpeg", "jpg", "png");
              $temp = explode(".", $_FILES["slip"]["name"]);
              $extension = end($temp);

              if ((($_FILES["slip"]["type"] == "image/gif") || ($_FILES["slip"]["type"] == "image/jpeg")|| ($_FILES["slip"]["type"] == "image/jpg")|| ($_FILES["slip"]["type"] == "image/pjpeg")|| ($_FILES["slip"]["type"] == "image/x-png")|| ($_FILES["slip"]["type"] == "image/png"))&& ($_FILES["slip"]["size"] < 2000000)&& in_array($extension, $allowedExts)) 
	          {
                if ($_FILES["slip"]["error"] > 0) {
                 echo "Error: " . $_FILES["slip"]["error"] . "<br>";
                } else {}
	              $slip = $_FILES['slip']['name'];
                  $target8=PR_UPLOADPATH8 . $slip;
                   move_uploaded_file($_FILES['slip']['tmp_name'],$target8);

                  mysqli_query($db,"update job set payment_slip='$slip' where job_id=$jid");  
	         } else {
             echo '<script language="javascript">';   
             echo 'alert("invalid format of image")';
             echo '</script>';
              }
	        }
			//update slip image
			
		  
	    ?>
	
		<script type="text/javascript">
			alert("sunceffully update job!");
			
		</script>
		
		
	
	<?php
   
   }
 ?>
		






        



