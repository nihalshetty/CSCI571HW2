<?php ob_start();session_start(); ?>
<!DOCTYPE html>
<?php 

if( !(isset($_SESSION['Type_id']) && $_SESSION['Type_id'] == 2) )
{
     header('Location: login.php');
}
?>
<html>
	<head>
		<title>
			employeedetail.com
		</title>
		<link rel="stylesheet" type="text/css" href="nihal_manager_support.css"/>	
	</head>
	<body onload="updateemp()" >
			 
    	<?php
      				  
      		  $firstnameerr = $lastnameerr=$employeetypeerr=$pricelowererr=$priceuppererr="";	     
			  $firstname = $lastname=$employeetype=$pricelower=$priceupper="";	     
              $f1=$f2=$f3=$f4=$f5=0;

		     if( $_SERVER["REQUEST_METHOD"]== "POST")
		      {
				           

				 if(empty($_POST["firstname"]))
				  {
				          $firstnameerr="Firstname is required.";
				          $f4=0;
				  }
				 else
				  {

				         $firstname= test_input($_POST["firstname"]);
				         $f4=1;

				         if (!preg_match("/^[a-zA-Z ]*$/",$firstname))
				          {     
				                  $f4=0;
 							 	  $firstnameerr = "Only letters and white space allowed"; 
						  }
				  } 


				 if(empty($_POST["lastname"]))
				  {
				         $lastnameerr="Lastname is required.";
				         $f5=0;
				  }
				 else
				  {
				         $lastname= test_input($_POST["lastname"]);
				         $f5=1;

				         if (!preg_match("/^[a-zA-Z ]*$/",$lastname))
				          {      
				          	     $f5=0;
 							     $lastnameerr = "Only letters and white space allowed"; 
						  }
				  } 



				 if(empty($_POST["employeetype"]))
				  {
				         $employeetypeerr=" Employee Type is Required";
				         $f1=0;
				  }
				 else
				  {

				         $employeetype= test_input($_POST["employeetype"]);
				         $f1=1;


				            	 		
					     if (!preg_match("/^[0-9]*$/",$employeetype))
						  {

							     $f1=0;
							     $employeetypeerr="Employee Type is not valid.";
						  }
						 else
						  {
								 $f1=1;
								 $employeetypeerr="";
						  }
				  } 

				 if(empty($_POST["pricelower"]))
				  {
				         $pricelowererr="Price Lower is required.";
				         $f2=0;
				  }
				 else
				  {

				         $pricelower= test_input($_POST["pricelower"]);
				         $f2=1;

				            	 		

				         if (!preg_match("/^[0-9]*$/",$pricelower))
						 {

							      $f2=0;
								  $pricelowererr="Price lower is not valid.";
					     }
						else
						 {
								 $f2=1;
								 $pricelowererr="";
						 }
				  }

		          if(empty($_POST["priceupper"]))
		           {
				          $priceuppererr="Price Upper is Required.";
				          $f3=0;
				   }
				  else
				   {

				         $priceupper= test_input($_POST["priceupper"]);
				         $f3=1;

				     
					     if (!preg_match("/^[0-9]*$/",$priceupper))
						 {

							  $f3=0;
							  $priceuppererr="Price upper is not valid.";
						 }
					    else
						 {
							  $f3=1;
							  $priceuppererr="";
						 }
				  } 
						// con put here

					 

			               $con=mysqli_connect("localhost","root","lionelm10","restaurant");
						 
						   // Check connection
						  if (mysqli_connect_errno()) 
						   {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
						   }

							if($f4 == 1 && $f5 == 1 && $f1 ==1)
							{
								$f6=1;
							}

							if($f2 == 1 && $f3 == 1 && $f1 ==1)
							{
								$f7=1;
							}
							if($f4 == 1 && $f5 == 1 && $f2 ==1 && $f3==1)
							{
								$f8=1;
							}

							if($f4 == 1 && $f5 == 1 && $f1 ==1 && $f2 ==1 && $f3==1)
							{
								$f9=1;
							}



		                    
							 if($f1 == 1)
                             {   
                             	$employeetype = mysqli_real_escape_string($con,$employeetype);
                             	$result =mysqli_query($con,"SELECT * FROM Employee INNER JOIN Employee_type ON Employee.Type_id = Employee_type.Type_id  WHERE Employee_type.Type_id='$employeetype'");
                             }

                              

                             if($f2 == 1 && $f3 == 1)
                             {  
                             	$pricelower = mysqli_real_escape_string($con,$pricelower);
                             	$priceupper = mysqli_real_escape_string($con,$priceupper);
                             	$result = mysqli_query($con,"SELECT * FROM Employee WHERE Pay BETWEEN '$pricelower' AND '$priceupper' ");
                             }

                             	
							
							 if($f4 == 1 && $f5 == 1)
                             {  
                             	$firstname = mysqli_real_escape_string($con,$firstname);
                             	$lastname = mysqli_real_escape_string($con,$lastname);
                             	$result = mysqli_query($con,"SELECT * FROM Employee WHERE Firstname='$firstname' AND Lastname = '$lastname'");
                             }

                             if($f6==1)
                             { // name and employee type
                             	$firstname = mysqli_real_escape_string($con,$firstname);
                             	$lastname = mysqli_real_escape_string($con,$lastname);
                             	$employeetype = mysqli_real_escape_string($con,$employeetype);
                             	//query
                             	$result = mysqli_query($con,"SELECT * FROM Employee INNER JOIN Employee_type ON Employee.Type_id = Employee_type.Type_id  WHERE Employee_type.Type_id='$employeetype' OR Employee.Firstname='$firstname' AND Employee.Lastname = '$lastname'");


                             }

                             if($f7==1)
                             { //employee type and price
                             	$employeetype = mysqli_real_escape_string($con,$employeetype);
                             	$pricelower = mysqli_real_escape_string($con,$pricelower);
                             	$priceupper = mysqli_real_escape_string($con,$priceupper);
                             	//query

                             	$result = mysqli_query($con,"SELECT * FROM Employee INNER JOIN Employee_type ON Employee.Type_id = Employee_type.Type_id  WHERE Employee_type.Type_id='$employeetype' OR Employee.Pay BETWEEN '$pricelower' AND '$priceupper'");



                             }

                             if($f8==1)
                             { //name and price
                             	$firstname = mysqli_real_escape_string($con,$firstname);
                             	$lastname = mysqli_real_escape_string($con,$lastname);
                             	$pricelower = mysqli_real_escape_string($con,$pricelower);
                             	$priceupper = mysqli_real_escape_string($con,$priceupper);
                             	//query

                             	$result = mysqli_query($con,"SELECT * FROM Employee INNER JOIN Employee_type ON Employee.Type_id = Employee_type.Type_id  WHERE Employee.Firstname='$firstname' AND Employee.Lastname = '$lastname' OR Employee.Pay BETWEEN '$pricelower' AND '$priceupper'");
                             }

                              if($f9==1)
                             { //name and price and employe type
                             	$firstname = mysqli_real_escape_string($con,$firstname);
                             	$lastname = mysqli_real_escape_string($con,$lastname);
                             	$employeetype = mysqli_real_escape_string($con,$employeetype);
                             	$pricelower = mysqli_real_escape_string($con,$pricelower);
                             	$priceupper = mysqli_real_escape_string($con,$priceupper);
                             	//query

                             	$result = mysqli_query($con,"SELECT * FROM Employee INNER JOIN Employee_type ON Employee.Type_id = Employee_type.Type_id  WHERE Employee.Firstname='$firstname' AND Employee.Lastname = '$lastname' OR Employee.Pay BETWEEN '$pricelower' AND '$priceupper' OR Employee.Type_id='$employeetype'");


                             }


  
		                      
		                      
		                        

							while($row = mysqli_fetch_array($result)) {
		           
							      $fullname= $row['Firstname'] . " " . $row['Lastname'];
							      $username = $row['Username'];
							      $password= $row['PASSWORD'];
							      //$typeid= $row['Type_id'];
							       $typeid1= $row['Type_id'];
							      $result1=mysqli_query($con,"SELECT Type_name FROM Employee_type WHERE Type_id='$typeid1'");
							       if ($row1=mysqli_fetch_array($result1)) {
							       	  
							       	  $typeid= $row1['Type_name'];
							       }
							      $email= $row['Email'];
							      $phone = $row['Phone'];
							      $birthdate= $row['Birthdate'];
							      $gender = $row['Gender'];
							      $age= $row['Age'];
							      $address = $row['Address'];
							}

						//	mysqli_close($con);
		
				        
				         
				     	 }

				      
				     	 function test_input($data)
				     	    {
							  $data = trim($data);
							  $data = stripslashes($data);
							  $data = htmlspecialchars($data);
							  return $data;
							}


   		 ?>



          	<div id="container">
			<div id="top3" class="transparent" height="150px">
				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<h1 id="welcome" >Enter the  Employees name you want to view..</h1><br/>
					<hr/>
					&nbsp;First Name<br/>&nbsp;<input id="firstname" type="text" name="firstname" placeholder="firstname" value="<?php echo $firstname;?>"   size="30" onblur="myfirstnamevalid(this)" onkeyup="showHint2(this.value)"/> 
	                &nbsp;<label id="firstlabel" class="errorlabels" style="display:none;"><?php echo $firstnameerr; ?></label><br/> <br/>
	                &nbsp;Last Name<br/>&nbsp;<input id="lastname" type="text" name="lastname" placeholder="lastname" value="<?php echo $lastname;?>"   size="30"  onblur="mylastnamevalid(this)" onkeyup="showHint3(this.value)"/> 
	                &nbsp;<label id="lastlabel" class="errorlabels" style="display:none;"><?php echo $lastnameerr; ?></label><br/> <br/>
	               <!--  &nbsp;<input id="loginbutton" type="button" value="PRESS To ENTER DETAIL->" onclick="displayed4()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/><br/><br/> -->
	                

	                <h1 id="welcome" >Enter the Employee Type you want to view..</h1><br/>
					<hr/>
					<!-- &nbsp;Employee Type<br/>&nbsp;<input id ="employeetype" type="text" name="employeetype" placeholder="Employee Type" value="<?php echo $employeetype; ?>"  size="30" onblur="myphonevalid1(this)"/> 
					 -->
					 &nbsp;Employee&nbsp;Type<br/>
					 &nbsp;	  <select id="employeetype" name="employeetype">
						                	<option value="0">Select</option>
	
								    </select>
	                &nbsp;<label id="employeetypelabel" class="errorlabels" style="display:none;" ><?php echo $employeetypeerr; ?></label><br/> <br/>
	               <!--  &nbsp;<input id="loginbutton" type="button" value="PRESS To ENTER DETAIL->" onclick="displayed5()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/><br/><br/> -->
 					
 					<h1 id="welcome" >Enter the pay range of Employee you want to view..</h1><br/>
					<hr/>
					&nbsp;Price lower<br/>&nbsp;<input id="pricelower" type="text" name="pricelower" placeholder="Price Lower" value="<?php echo $pricelower; ?>"  size="30" onblur="mypricelowervalid(this)"/> 
	                &nbsp;<label id="pricelowerlabel" class="errorlabels" style="display:none;" ><?php echo $pricelowererr; ?></label><br/> <br/>
	                &nbsp;Price upper<br/>&nbsp;<input id="priceupper" type="text" name="priceupper" placeholder="Price Upper" value="<?php echo $priceupper; ?>"  size="30" onblur="mypriceuppervalid(this)"/>
	                &nbsp;<label id="priceupperlabel" class="errorlabels" style="display:none;" ><?php echo $priceuppererr; ?></label><br/> <br/>
	                <!-- &nbsp;<input id="loginbutton" type="button" value="PRESS To ENTER DETAIL->" onclick="displayed6()"/> -->
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/><br/><br/>


	                <h1 id="details" >Details of the Employee..</h1><br/>
	                <h2 id="h2">Full Name</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="fulllabel" class="errorlabels">Name<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) {  $fullname= $row['Firstname'] . " " . $row['Lastname'];  echo "<br/>&nbsp;".$i.") "; echo $fullname; $i++; } }?></label><br/><br/>
	                <!-- &nbsp;<input id="firstnew" type="text" name="firstnamenew" placeholder="firstname" size="30"  style="display:none;"/> 
	                &nbsp;<input id="lastnew" type="text" name="lastnamenew" placeholder="lastname" size="30" style="display:none;"/><br/><br/> -->
	                 
	                
	                <h2 id="h2">Login Details</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="userlabel" class="errorlabels">Username<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){  mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) { $username = $row['Username'];  echo "<br/>&nbsp;".$i.") "; echo $username; $i++; } } ?></label><br/><br/>
	                <!-- &nbsp;<input id="usernew" type="text" name="usernamenew" placeholder="username" size="30"style="display:none;"/><br/> 
	                 -->

	                &nbsp;<label id="passwordlabel" class="errorlabels">Password<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) { $password= $row['PASSWORD'];  echo "<br/>&nbsp;".$i.") "; echo $password; $i++;} }?></label><br/><br/>
	                <!-- &nbsp;<input id="passnew" type="text" name="passwordnew" placeholder="password" size="30"style="display:none;"/><br/> -->
	                

	                &nbsp;<label id="typelabel" class="errorlabels">Employee Type<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) {  $typeid1= $row['Type_id'];
							      $result1=mysqli_query($con,"SELECT Type_name FROM Employee_type WHERE Type_id='$typeid1'");
							       if ($row1=mysqli_fetch_array($result1)) {
							       	  
							       	  $typeid= $row1['Type_name'];
							       }  echo "<br/>&nbsp;".$i.") "; echo $typeid; $i++;} } ?></label><br/><br/>
	               <!--  &nbsp;<input id="typenew" type="text" name="typidnew" placeholder="id" size="30" style="display:none;"/><br/><br/>  -->
	                
	                
	                <h2 id="h2">Email & Phone</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="emaillabel" class="errorlabels">Email<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) {   $email= $row['Email']; echo "<br/>&nbsp;".$i.") ";  echo $email; $i++; } } ?></label><br/><br/>
	                <!-- &nbsp;<input id="emnew" type="text" name="emailnew" placeholder="Email" size="30"style="display:none;"/><br/> 
	                 -->


	                &nbsp;<label id="phonelabel" class="errorlabels">Phone<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) {  $phone = $row['Phone'];  echo "<br/>&nbsp;".$i.") "; echo $phone; $i++;} } ?></label><br/><br/>
	               <!--  &nbsp;<input id="phnew" type="text" name="phonenew" placeholder="Phone" size="30"style="display:none;"/><br/><br/>  -->
	                
	                
	                
	                <h2 id="h2">Personal Information</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="birthlabel" class="errorlabels">Birthdate<?php  if( $_SERVER["REQUEST_METHOD"]== "POST"){mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) {   $birthdate= $row['Birthdate'];  echo "<br/>&nbsp;".$i.") "; echo $birthdate; $i++; } } ?></label><br/><br/>
	                <!-- &nbsp;<input id="birnew" type="text" name="birthnew" placeholder="Birthdate" size="30"style="display:none;"/><br/> --> 
	                


	                &nbsp;<label id="genderlabel" class="errorlabels">Gender<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) {  $gender = $row['Gender'];  echo "<br/>&nbsp;".$i.") "; echo $gender; $i++; } } ?></label><br/><br/>
	               <!--  &nbsp;<input id="gennew" type="text" name="gendernew" placeholder="Gender" size="30"style="display:none;"/><br/>  -->
	                

	                &nbsp;<label id="agelabel" class="errorlabels">Age<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) { $age= $row['Age'];  echo "<br/>&nbsp;".$i.") "; echo $age; $i++;} } ?></label><br/><br/>
	                <!-- &nbsp;<input id="agnew" type="text" name="agenew" placeholder="Age" size="30"style="display:none;"/><br/><br/>
	                 -->
	                <h2 id="h2">Address</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="addresslabel" class="errorlabels">Address<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) { $address = $row['Address'];  echo "<br/>&nbsp;".$i.") "; echo $address; $i++;}  mysqli_close($con); }?></label><br/><br/>
	              
	                <!-- &nbsp;<input id="addnew" type="text" name="addressnew" placeholder="address" size="30" style="display:none;" class="update"/><br/> -->
	                

	                <!-- &nbsp;<input id="loginbutton" type="button" value="EDIT->" onclick="displayedit()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="SAVE->"/> -->
			    </form>
			</div>
			
		</div>
		 

     <script type="text/javascript" src="nihal_man_script.js"></script>
	</body>
</html>
