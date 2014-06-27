<?php ob_start();session_start(); ?>

<!DOCTYPE html>

<?php 

	if( !(isset($_SESSION['Type_id']) && $_SESSION['Type_id'] == 3) )
	{
	     header('Location: login.php');
	}
?>
<html>
	<head>
			<title>
				editfoodtype.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_emp_support.css"/>	
	</head>
	<body  >
			 
    	<?php
      				 
      		  $itemtypenameerr ="";
			  $itemtypename=$description="";
				                        
			  $itemtypenamen=$descriptionn="";
                      
              $f1=$f2=0;

		      if( $_SERVER["REQUEST_METHOD"]== "POST")
		       {
				           
				     if(empty($_POST["itemtypename"]))
				      {
				           	 $itemtypenameerr="Item Name is required.";
				      }
				     else
				      {
				              $itemtypename= test_input($_POST["itemtypename"]);

				              // validation
						      if (!preg_match("/^[a-zA-Z ]*$/",$itemtypename))
						       {
		 							 $itemtypenameerr = "Only letters and white space allowed"; 
							   }
				      }

				               
				     if(empty($_POST["itemtypenamenew"]))
				      {
				           	 	
				           	 $itemtypenamen="";
				           	 $f1=0;				              
				      }
				     else
				      {

				             $itemtypenamen= test_input($_POST["itemtypenamenew"]);
				             $f1=1;

				             // validation
				             if (!preg_match("/^[a-zA-Z ]*$/",$itemtypenamen))
				        	  {      
				        	  	     $f1=0;
 							 		 $itemtypenamen = "Only letters and white space allowed"; 
							  }
				      } 

				               
				     if(empty($_POST["descriptionnew"]))
				      {
				           	 $descriptionn="";
				           	 $f2=0;
				      }
				     else
				      {

				             $descriptionn= test_input($_POST["descriptionnew"]);
				             $f2=1;

				             // validation
				             if (!preg_match("/^[a-zA-Z ]*$/",$descriptionn))
				        	  {        
				        	  	     $f2=0;
 							 		 $descriptionn = "Only letters and white space allowed"; 
							  }
				      }	               
 								         
			   }

				      
			  function test_input($data)
			   {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
			   }

						
			 $con=mysqli_connect("localhost","root","lionelm10","restaurant");
			 
			 // Check connection
			 if (mysqli_connect_errno()) 
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  
			  }
		                    

			 //escape variables for security
			 $itemtypename = mysqli_real_escape_string($con,$itemtypename);

			 //query
			 $result = mysqli_query($con,"SELECT * FROM Food_type WHERE Food_type_name='$itemtypename'");
		                      
		                        

			 while($row = mysqli_fetch_array($result))
			  {
		           
					  $itemtypename= $row['Food_type_name'];
					  $description = $row['Food_description'];
							     
							      
			  }


             // querries for updating the database
                if($f1 == 1)
                 { 
                     $itemtypenamen = mysqli_real_escape_string($con,$itemtypenamen);
                     mysqli_query($con,"UPDATE Food_type SET Food_type_name='$itemtypenamen' WHERE Food_type_name='$itemtypename'");
                 }	

                if($f2 == 1)
                 { 
                     $descriptionn = mysqli_real_escape_string($con,$descriptionn);
                     mysqli_query($con,"UPDATE Food_type SET Food_description='$descriptionn' WHERE Food_type_name='$itemtypename'");
                 }
             
                             
			  mysqli_close($con);

   		 ?>



    	<div id="container">

			<div id="top3" class="transparent" height="150px">

				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

					<h1 id="welcome" >Enter the Existing food/drink type item..</h1><br/>
					<hr/>
					&nbsp;Item Type Name<br/>&nbsp;<input type="text" name="itemtypename" placeholder="Item Type Name" value="<?php echo $itemtypename; ?>" size="30" onblur="myitemtypenamevalid(this)" onkeyup="showHint1(this.value)"/> 
	                &nbsp;<label id="itemtypelabel" class="errorlabels"><?php echo $itemtypenameerr; ?></label><br/> <br/>
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/>
	                
	                <h1 id="details" >Details of the Item Type..</h1><br/>
	                <h2 id="h2">Item Type Name &amp; Description</h2><br/>
	                <hr id="hr"/>
	               
	                &nbsp;<label id="fulllabel" class="errorlabels">Type Name-<?php echo $itemtypename; ?></label><br/>
	                &nbsp;<input id="itemtypenew" type="text" name="itemtypenamenew" placeholder="Item Type Name" size="30"  style="display:none;" onblur="myitemtypenamevalid1(this)"/><br/>
	                
	                &nbsp;<label id="typdesclabel" class="errorlabels">Description-<?php echo $description; ?></label><br/>
	                &nbsp;<input id="descnew" type="text" name="descriptionnew" placeholder="Description" size="30"style="display:none;" onblur="myitemtypedescvalid(this)"/><br/> <br/> 
	                
	               

	                &nbsp;<input id="loginbutton" type="button" value="EDIT->" onclick="displayedit2()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="SAVE->"/>

			    </form>
			    
			</div>
			
		</div>
		 

      <script type="text/javascript" src="nihal_emp_script.js"></script>
	</body>
</html>
