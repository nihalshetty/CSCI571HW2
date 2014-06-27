<?php ob_start();session_start(); ?>

<!DOCTYPE html>
<?php 

	if( !(isset($_SESSION['Type_id']) && $_SESSION['Type_id'] == 1) )
	{
		header('Location: login.php');
	}
?>
<html>
	<head>
		<title>
			newuser.com
		</title>
		<link rel="stylesheet" type="text/css" href="nihal_admin_support.css"/>	
	</head>
	<body onload="updateemptype()">
    
  
    <?php
      
		      $username= $password=$firstname=$lastname=$emptype=$email=$phone=$birth=$gender="";
		      $address=$country=$city=$zip=$age=$pay="";
		      $usernameerr=$passworderr=$firstnameerr=$lastnameerr=$emptyperr=$emailerr=$phoneerr=$birtherr=$gendererr="";
		      $addresserr=$countryerr=$cityerr=$ziperr=$ageerr=$payerr="";
              $month= $year=$day=$city= $country =$zipcode =$fulladdress="";
              $montherr= $yearerr=$dayerr=$cityerr= $countryerr =$zipcodeerr =$fulladdress="";
              $flag=0;
              $count=1;
		     
		      if( $_SERVER["REQUEST_METHOD"]== "POST")
		       {
		          
		           if(empty($_POST["username"]))
		            {
		           	 	$usernameerr="Username is required.";
		           	 	
		            }
		           else
		           {

		                $username= test_input($_POST["username"]);
		            	$count++;

		           } 


		           if(empty($_POST["password"]))
		           {
		           	 	$passworderr="Password is required.";
		           }
		           else
		           {

		            	$password= test_input($_POST["password"]);
		            	$count++;
		           } 


		           if(empty($_POST["firstname"]))
		           {
				        $firstnameerr="Firstname is required.";
		           }
				 else
				  {

				      $firstname= test_input($_POST["firstname"]);
				      $count++;
				       
				     // validation
				     if (!preg_match("/^[a-zA-Z ]*$/",$firstname))
				      {
 						   $firstnameerr = "Only letters and white space allowed";
 						   $count--; 
					  }

			     } 


				  if(empty($_POST["lastname"]))
				   {
				       	$lastnameerr="Lastname is required.";

				   }
				   else
				   {
				        $lastname= test_input($_POST["lastname"]);
				        $count++;
				        
				        // validation
				        if (!preg_match("/^[a-zA-Z ]*$/",$lastname))
				        {
 							 $lastnameerr = "Only letters and white space allowed"; 
							 $count--;
					    }  

				   } 


				 if(empty($_POST["emptype"]))
				  {
				         $emptyperr="Employee Type is required.";
				           	 
				  }
				 else
				  {

				         $emptype= test_input($_POST["emptype"]);
				         $count++;
				            			 

					     if (!preg_match("/^[0-9]*$/",$emptype))
					      {
			 					$emptyperr="Employee Type is not valid.";
								$count--;
						  }
						 else
						  {
								$emptyperr="";
						  }				            
				  } 

				         
				 if(empty($_POST["email"]))
				  {
				         $emailerr="Email is required.";
				           	 	
				  }
				 else
				  {

				         $email= test_input($_POST["email"]);
				         $count++;
				            	 
						 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
						  {
								 $count--;
								 $emailerr = "Invalid email format"; 
						  }													            	
				  }

				 if(empty($_POST["phone"]))
				 {
				           	 	
				     $phoneerr="Phone is required.";
				           	 	
				 }
				else{

				       $phone= test_input($_POST["phone"]);
				       $count++;
				            	 

				      if (!preg_match("/^[0-9]*$/",$phone))
					   {
 							 $phoneerr="Phone  is not valid.";
							 $count--;
					   }
					  else
					   {
							 $phoneerr="";
					   }
				           	 
			       } 
 							\
 				   //birtdate month date year	
 				   if(empty($_POST["month"]))
 				   {
				          $birtherr="Birthdate is required.";
				           	 	
				   }
				  else
				  {

				          $month= test_input($_POST["month"]);
				          $count++;
				        
				  } 

				 if(empty($_POST["year"]))
				 {
				           	 	   $birtherr="Birthdate is required.";
				           	 	
				 }
				else
				 {

				     $year= test_input($_POST["year"]);
				     $count++;
				 } 


				 if(empty($_POST["day"]))
				  {
				      $birtherr="Birthdate is required.";
				           	 	
				  }
				 else
				 {

				      $day= test_input($_POST["day"]);
				      $count++;
			     } 

				 //gender
				 if(empty($_POST["sex"]))
				  {
				     $gendererr="Gender is required.";
				           	 
				  }
				 else
				  {

				     $gender= test_input($_POST["sex"]);
				     $count++;

				  } 

				 //age
				 if(empty($_POST["age"]))
				  {      	 	
				     $ageerr="Age is required.";
				           	
				  }
				 else
				  {

				     $age= test_input($_POST["age"]);
				     $count++;


				     if (!preg_match("/^[0-9]*$/",$age))
					  {
 						 $ageerr="Phone  is not valid.";
						 $count--;
					  }
					 else
					  {
						 $ageerr="";
					  }
          	 
				  } 

				              
				 if(empty($_POST["pay"]))
				  {
				     $payerr="Pay is required.";
				           	
				  }
				 else
				  {
				         $count++;
				         $pay= test_input($_POST["pay"]);
		
					     if (!preg_match("/^[0-9]*$/",$pay))
						  {
 							  $payerr="Phone  is not valid.";
							  $count--;
						  }
					     else
						  {
							  $payerr="";
						  }				            	 
				  } 

				  // address city zipcode country
				  if(empty($_POST["address"]))
				  {
				     $addresserr="Address is required.";
				           	 	
				  }
				 else
				  {
				           		
				     $address= test_input($_POST["address"]);
				     $count++;
				  } 


				 if(empty($_POST["city"]))
				  {

				     $cityerr="City is required.";
				           	 	
				  }
				 else
				  {

				     $city= test_input($_POST["city"]);
 					 $count++;
				            	 
				     // validation
				     if (!preg_match("/^[a-zA-Z ]*$/",$city))
				      {
 						   $cityerr = "Only letters and white space allowed"; 
 						   $count--;
					  }
				            	   
				  } 


				 if(empty($_POST["zipcode"]))
				  {
				     $ziperr="Zipcode is required.";
				           	 	
				  }
				 else
				  {

				      $zipcode= test_input($_POST["zipcode"]);
				      $count++;
				            	 
				      if (!preg_match("/^[0-9]*$/",$zipcode))
					   {
 						   $ziperr="Phone  is not valid.";
						   $count--;
					   }
					  else
					   {
						   $ziperr="";
					   }
				            	
				  } 



				 if(empty($_POST["countries"]))
				  {
				      $countryerr="Country is required.";
				           	 	
				  }
				 else
				  {

				          $country= test_input($_POST["countries"]);
				          $count++;
				  } 
  
                            $birtdate = $year . "-" .$month . "-" .$day;
                           $fulladdress= $address . " " . $city ." " . $zipcode ." " .$country;     
		         
		   }

		      
		      function test_input($data)
		       {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}

				// controlling the querry
				if( $count == 18)
				{
					$flag=1;
				}

				 

	             $con=mysqli_connect("localhost","root","lionelm10","restaurant");
				
				 // Check connection
				 if (mysqli_connect_errno())
				  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

					//escape variables for security

					$firstname = mysqli_real_escape_string($con,$firstname);
					$lastname = mysqli_real_escape_string($con,$lastname);
					$emptype = mysqli_real_escape_string($con,$emptype);
					$password = mysqli_real_escape_string($con,$password);
					$email = mysqli_real_escape_string($con,$email);
					$phone = mysqli_real_escape_string($con,$phone);
					$birtdate = mysqli_real_escape_string($con,$birtdate);
					$gender = mysqli_real_escape_string($con,$gender);
					$fulladdress = mysqli_real_escape_string($con,$fulladdress);
					$age = mysqli_real_escape_string($con,$age);
					$pay = mysqli_real_escape_string($con,$pay);
					
                    
					
       if($flag == 1)               
        {
        	 $sql="INSERT INTO Employee (Type_id, Username, PASSWORD, Firstname, Lastname, Email, Phone, Birthdate, Gender, Address, Age, Pay)
                   VALUES ('$emptype', '$username', '$password','$firstname','$lastname','$email','$phone','$birtdate','$gender','$fulladdress','$age', '$pay')";

             if (!mysqli_query($con,$sql))
              {
                  die('Error: ' . mysqli_error($con));
              }
        }                   

              mysqli_close($con);

  ?>


		<div id="container">
			<div id="top2" class="transparent" height="150px">
				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					
					<h1 id="enter"> Enter New Employee Details...</h1>
					<hr/>
					
					&nbsp;Username<br/>&nbsp;<input type="text" name="username" placeholder="Username" size="30" onblur="myaccnamevalid(this)" />
					&nbsp;<label id="userlabel" class="errorlabels"><?php echo $usernameerr; ?></label> <br/> <br/>
					
					&nbsp;Password<br/>&nbsp;<input type="password" name="password" placeholder="Password" size="30" onblur="mypasswordvalid(this)"/> 
	                &nbsp;<label id="passlabel" class="errorlabels"><?php echo $passworderr; ?></label><br/> <br/>
	                
	                &nbsp;First Name<br/>&nbsp;<input type="text" name="firstname" placeholder="firstname" size="30" onblur="myfirstnamevalid(this)"/> 
	                &nbsp;<label id="firstlabel" class="errorlabels"><?php echo $firstnameerr; ?></label><br/> <br/>
	                
	                &nbsp;Last Name<br/>&nbsp;<input type="text" name="lastname" placeholder="lastname" size="30" onblur="mylastnamevalid(this)"/> 
	                &nbsp;<label id="lastlabel" class="errorlabels"><?php echo $lastnameerr; ?></label><br/> <br/>
	                <!-- &nbsp;Employee&nbsp;Type<br/>&nbsp;<input type="text" name="emptype" placeholder="Employee Type" size="30" onblur="myphonevalid1(this)"/> --> 
	                
	                &nbsp;Employee&nbsp;Type<br/>
						&nbsp;<select id="emptype" name="emptype">
						                	<option value="0">Select</option>
	
								    </select>
	                &nbsp;<label id="typelabel" class="errorlabels"><?php echo $emptyperr; ?></label><br/> <br/>
	               
	                &nbsp;Email<br/>&nbsp;<input type="text" name="email" placeholder="Email" size="30" onblur="myemailvalid(this)"/> 
	                &nbsp;<label id="emaillabel" class="errorlabels"><?php echo $emailerr; ?></label><br/> <br/>
	               
	                &nbsp;Phone<br/>&nbsp;<input type="text" name="phone" placeholder="Phone" size="30" onblur="myphonevalid(this)"/> 
	                &nbsp;<label id="phonelabel" class="errorlabels"><?php echo $phoneerr; ?></label><br/> <br/>
	               
	                &nbsp;Birthdate<br/>
	       			  				  <select id="months" name="month">
		       			  				   <option value="0">Month</option>
						           		   <option value="01">January</option>
								           <option value="02">February</option>
								           <option value="03">March</option>
								           <option value="04">April</option>
								           <option value="05">May</option>
								           <option value="06">June</option>
								           <option value="07">July</option>
								           <option value="08">August</option>
								           <option value="09">September</option>
								           <option value="10">October</option>
								           <option value="11">November</option>
								           <option value="12">December</option>
						         </select>
						         <select id="days" name="day">
											<option value="0">Days</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
						         </select>
						         <select id="years"name="year">
										    <option value="0">Year</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
											<option value="2011">2011</option>
											<option value="2010">2010</option>
											<option value="2009">2009</option>
											<option value="2008">2008</option>
											<option value="2007">2007</option>
											<option value="2006">2006</option>
											<option value="2005">2005</option>
											<option value="2004">2004</option>
											<option value="2003">2003</option>
											<option value="2002">2002</option>
										    <option value="2001">2001</option>
											<option value="2000">2000</option>
											<option value="1999">1999</option>
											<option value="1998">1998</option>
											<option value="1997">1997</option>
											<option value="1996">1996</option>
											<option value="1995">1995</option>
											<option value="1994">1994</option>
											<option value="1993">1993</option>
											<option value="1992">1992</option>
											<option value="1991">1991</option>
											<option value="1990">1990</option>
											<option value="1989">1989</option>
											<option value="1988">1988</option>
											<option value="1987">1987</option>
											<option value="1986">1986</option>
											<option value="1985">1985</option>
											<option value="1984">1984</option>
											<option value="1983">1983</option>
											<option value="1982">1982</option>
											<option value="1981">1981</option>
											<option value="1980">1980</option>
											<option value="1979">1979</option>
											<option value="1978">1978</option>
						         </select>
				    &nbsp;<label id="birthlabel" class="errorlabels"><?php echo $birtherr; ?></label><br/> <br/>
					
					&nbsp;Gender<br/><input type="radio" name="sex" value="male"/>&nbsp;male&nbsp;
						            <input type="radio" name="sex" value="female"/>&nbsp;female&nbsp;
						            <input type="radio" name="sex" value="other"/>&nbsp;other&nbsp;
					&nbsp;<label id="genderlabel" class="errorlabels"><?php echo $gendererr; ?></label><br/><br/>
					
					&nbsp;Address<br/><input type="text" name="address" placeholder="Address" size="30" onblur="myaddressvalid(this)"/>
					&nbsp;<label id="addresslabel" class="errorlabels"><?php echo $addresserr; ?></label><br/> <br/>
					
					&nbsp;City<br/><input type="text" name="city" placeholder="City" size="30" onblur="mycityvalid(this)"/>
					&nbsp;<label id="citylabel" class="errorlabels"><?php echo $cityerr; ?></label><br/> <br/>
					
					&nbsp;Zipcode<br/><input type="text" name="zipcode" placeholder="Zipcode" size="30" onblur="myzipcodevalid(this)"/>
					&nbsp;<label id="ziplabel" class="errorlabels"><?php echo $ziperr; ?></label><br/> <br/> 
					
					&nbsp;Country<br/>
						       <select id="country" name="countries">
						                	<option value="0">Select</option>
											<option value="AF">Afghanistan</option>
											<option value="AX">Åland Islands</option>
											<option value="AL">Albania</option>
											<option value="DZ">Algeria</option>
											<option value="AS">American Samoa</option>
											<option value="AD">Andorra</option>
											<option value="AO">Angola</option>
											<option value="AI">Anguilla</option>
											<option value="AQ">Antarctica</option>
											<option value="AG">Antigua and Barbuda</option>
											<option value="AR">Argentina</option>
											<option value="AM">Armenia</option>
											<option value="AW">Aruba</option>
											<option value="AU">Australia</option>
											<option value="AT">Austria</option>
											<option value="AZ">Azerbaijan</option>
											<option value="BS">Bahamas</option>
											<option value="BH">Bahrain</option>
											<option value="BD">Bangladesh</option>
											<option value="BB">Barbados</option>
											<option value="BY">Belarus</option>
											<option value="BE">Belgium</option>
											<option value="BZ">Belize</option>
											<option value="BJ">Benin</option>
											<option value="BM">Bermuda</option>
											<option value="BT">Bhutan</option>
											<option value="BO">Bolivia, Plurinational State of</option>
											<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
											<option value="BA">Bosnia and Herzegovina</option>
											<option value="BW">Botswana</option>
											<option value="BV">Bouvet Island</option>
											<option value="BR">Brazil</option>
											<option value="IO">British Indian Ocean Territory</option>
											<option value="BN">Brunei Darussalam</option>
											<option value="BG">Bulgaria</option>
											<option value="BF">Burkina Faso</option>
											<option value="BI">Burundi</option>
											<option value="KH">Cambodia</option>
											<option value="CM">Cameroon</option>
											<option value="CA">Canada</option>
											<option value="CV">Cape Verde</option>
											<option value="KY">Cayman Islands</option>
											<option value="CF">Central African Republic</option>
											<option value="TD">Chad</option>
											<option value="CL">Chile</option>
											<option value="CN">China</option>
											<option value="CX">Christmas Island</option>
											<option value="CC">Cocos (Keeling) Islands</option>
											<option value="CO">Colombia</option>
											<option value="KM">Comoros</option>
											<option value="CG">Congo</option>
											<option value="CD">Congo, the Democratic Republic of the</option>
											<option value="CK">Cook Islands</option>
											<option value="CR">Costa Rica</option>
											<option value="CI">Côte d'Ivoire</option>
											<option value="HR">Croatia</option>
											<option value="CU">Cuba</option>
											<option value="CW">Curaçao</option>
											<option value="CY">Cyprus</option>
											<option value="CZ">Czech Republic</option>
											<option value="DK">Denmark</option>
											<option value="DJ">Djibouti</option>
											<option value="DM">Dominica</option>
											<option value="DO">Dominican Republic</option>
											<option value="EC">Ecuador</option>
											<option value="EG">Egypt</option>
											<option value="SV">El Salvador</option>
											<option value="GQ">Equatorial Guinea</option>
											<option value="ER">Eritrea</option>
											<option value="EE">Estonia</option>
											<option value="ET">Ethiopia</option>
											<option value="FK">Falkland Islands (Malvinas)</option>
											<option value="FO">Faroe Islands</option>
											<option value="FJ">Fiji</option>
											<option value="FI">Finland</option>
											<option value="FR">France</option>
											<option value="GF">French Guiana</option>
											<option value="PF">French Polynesia</option>
											<option value="TF">French Southern Territories</option>
											<option value="GA">Gabon</option>
											<option value="GM">Gambia</option>
											<option value="GE">Georgia</option>
											<option value="DE">Germany</option>
											<option value="GH">Ghana</option>
											<option value="GI">Gibraltar</option>
											<option value="GR">Greece</option>
											<option value="GL">Greenland</option>
											<option value="GD">Grenada</option>
											<option value="GP">Guadeloupe</option>
											<option value="GU">Guam</option>
											<option value="GT">Guatemala</option>
											<option value="GG">Guernsey</option>
											<option value="GN">Guinea</option>
											<option value="GW">Guinea-Bissau</option>
											<option value="GY">Guyana</option>
											<option value="HT">Haiti</option>
											<option value="HM">Heard Island and McDonald Islands</option>
											<option value="VA">Holy See (Vatican City State)</option>
											<option value="HN">Honduras</option>
											<option value="HK">Hong Kong</option>
											<option value="HU">Hungary</option>
											<option value="IS">Iceland</option>
											<option value="IN">India</option>
											<option value="ID">Indonesia</option>
											<option value="IR">Iran, Islamic Republic of</option>
											<option value="IQ">Iraq</option>
											<option value="IE">Ireland</option>
											<option value="IM">Isle of Man</option>
											<option value="IL">Israel</option>
											<option value="IT">Italy</option>
											<option value="JM">Jamaica</option>
											<option value="JP">Japan</option>
											<option value="JE">Jersey</option>
											<option value="JO">Jordan</option>
											<option value="KZ">Kazakhstan</option>
											<option value="KE">Kenya</option>
											<option value="KI">Kiribati</option>
											<option value="KP">Korea, Democratic People's Republic of</option>
											<option value="KR">Korea, Republic of</option>
											<option value="KW">Kuwait</option>
											<option value="KG">Kyrgyzstan</option>
											<option value="LA">Lao People's Democratic Republic</option>
											<option value="LV">Latvia</option>
											<option value="LB">Lebanon</option>
											<option value="LS">Lesotho</option>
											<option value="LR">Liberia</option>
											<option value="LY">Libya</option>
											<option value="LI">Liechtenstein</option>
											<option value="LT">Lithuania</option>
											<option value="LU">Luxembourg</option>
											<option value="MO">Macao</option>
											<option value="MK">Macedonia, the former Yugoslav Republic of</option>
											<option value="MG">Madagascar</option>
											<option value="MW">Malawi</option>
											<option value="MY">Malaysia</option>
											<option value="MV">Maldives</option>
											<option value="ML">Mali</option>
											<option value="MT">Malta</option>
											<option value="MH">Marshall Islands</option>
											<option value="MQ">Martinique</option>
											<option value="MR">Mauritania</option>
											<option value="MU">Mauritius</option>
											<option value="YT">Mayotte</option>
											<option value="MX">Mexico</option>
											<option value="FM">Micronesia, Federated States of</option>
											<option value="MD">Moldova, Republic of</option>
											<option value="MC">Monaco</option>
											<option value="MN">Mongolia</option>
											<option value="ME">Montenegro</option>
											<option value="MS">Montserrat</option>
											<option value="MA">Morocco</option>
											<option value="MZ">Mozambique</option>
											<option value="MM">Myanmar</option>
											<option value="NA">Namibia</option>
											<option value="NR">Nauru</option>
											<option value="NP">Nepal</option>
											<option value="NL">Netherlands</option>
											<option value="NC">New Caledonia</option>
											<option value="NZ">New Zealand</option>
											<option value="NI">Nicaragua</option>
											<option value="NE">Niger</option>
											<option value="NG">Nigeria</option>
											<option value="NU">Niue</option>
											<option value="NF">Norfolk Island</option>
											<option value="MP">Northern Mariana Islands</option>
											<option value="NO">Norway</option>
											<option value="OM">Oman</option>
											<option value="PK">Pakistan</option>
											<option value="PW">Palau</option>
											<option value="PS">Palestinian Territory, Occupied</option>
											<option value="PA">Panama</option>
											<option value="PG">Papua New Guinea</option>
											<option value="PY">Paraguay</option>
											<option value="PE">Peru</option>
											<option value="PH">Philippines</option>
											<option value="PN">Pitcairn</option>
											<option value="PL">Poland</option>
											<option value="PT">Portugal</option>
											<option value="PR">Puerto Rico</option>
											<option value="QA">Qatar</option>
											<option value="RE">Réunion</option>
											<option value="RO">Romania</option>
											<option value="RU">Russian Federation</option>
											<option value="RW">Rwanda</option>
											<option value="BL">Saint Barthélemy</option>
											<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
											<option value="KN">Saint Kitts and Nevis</option>
											<option value="LC">Saint Lucia</option>
											<option value="MF">Saint Martin (French part)</option>
											<option value="PM">Saint Pierre and Miquelon</option>
											<option value="VC">Saint Vincent and the Grenadines</option>
											<option value="WS">Samoa</option>
											<option value="SM">San Marino</option>
											<option value="ST">Sao Tome and Principe</option>
											<option value="SA">Saudi Arabia</option>
											<option value="SN">Senegal</option>
											<option value="RS">Serbia</option>
											<option value="SC">Seychelles</option>
											<option value="SL">Sierra Leone</option>
											<option value="SG">Singapore</option>
											<option value="SX">Sint Maarten (Dutch part)</option>
											<option value="SK">Slovakia</option>
											<option value="SI">Slovenia</option>
											<option value="SB">Solomon Islands</option>
											<option value="SO">Somalia</option>
											<option value="ZA">South Africa</option>
											<option value="GS">South Georgia and the South Sandwich Islands</option>
											<option value="SS">South Sudan</option>
											<option value="ES">Spain</option>
											<option value="LK">Sri Lanka</option>
											<option value="SD">Sudan</option>
											<option value="SR">Suriname</option>
											<option value="SJ">Svalbard and Jan Mayen</option>
											<option value="SZ">Swaziland</option>
											<option value="SE">Sweden</option>
											<option value="CH">Switzerland</option>
											<option value="SY">Syrian Arab Republic</option>
											<option value="TW">Taiwan, Province of China</option>
											<option value="TJ">Tajikistan</option>
											<option value="TZ">Tanzania, United Republic of</option>
											<option value="TH">Thailand</option>
											<option value="TL">Timor-Leste</option>
											<option value="TG">Togo</option>
											<option value="TK">Tokelau</option>
											<option value="TO">Tonga</option>
											<option value="TT">Trinidad and Tobago</option>
											<option value="TN">Tunisia</option>
											<option value="TR">Turkey</option>
											<option value="TM">Turkmenistan</option>
											<option value="TC">Turks and Caicos Islands</option>
											<option value="TV">Tuvalu</option>
											<option value="UG">Uganda</option>
											<option value="UA">Ukraine</option>
											<option value="AE">United Arab Emirates</option>
											<option value="GB">United Kingdom</option>
											<option value="US">United States</option>
											<option value="UM">United States Minor Outlying Islands</option>
											<option value="UY">Uruguay</option>
											<option value="UZ">Uzbekistan</option>
											<option value="VU">Vanuatu</option>
											<option value="VE">Venezuela, Bolivarian Republic of</option>
											<option value="VN">Viet Nam</option>
											<option value="VG">Virgin Islands, British</option>
											<option value="VI">Virgin Islands, U.S.</option>
											<option value="WF">Wallis and Futuna</option>
											<option value="EH">Western Sahara</option>
											<option value="YE">Yemen</option>
											<option value="ZM">Zambia</option>
											<option value="ZW">Zimbabwe</option>
								    </select>
					&nbsp;<label id="countrylabel" class="errorlabels"><?php echo $countryerr; ?></label><br/> <br/>
					
					&nbsp;Age<br/>&nbsp;<input type="text" name="age" placeholder="Age" size="30"  onblur="myphonevalid2(this)"/> 
	                &nbsp;<label id="agelabel" class="errorlabels"><?php echo $ageerr; ?></label><br/> <br/>
	                
	                &nbsp;Pay<br/>&nbsp;<input type="text" name="pay" placeholder="Pay" size="30"  onblur="myphonevalid3(this)"/> 
	                &nbsp;<label id="paylabel" class="errorlabels"><?php echo $payerr; ?></label><br/> <br/>	            	         
	                &nbsp;<input id="loginbutton" type="submit" value="ADD->"/>
  

				</form>
			</div>
		</div>
	    


			<script type="text/javascript" src="nihal_ad_script.js"></script>
	</body>
</html>