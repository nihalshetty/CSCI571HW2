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
				deletefood.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_emp_support.css"/>	
	</head>
	<body>

    	<?php
      				 
      		  $confirmerr= $itemnameerr ="";
			  $confirm=$itemname=$ingredient="";
			  $spicy=$Type= $side=$addon=$price="";
				      
				      
                       

				  if( $_SERVER["REQUEST_METHOD"]== "POST")
				   {
				          
				          if(empty($_POST["itemname"]))
				           {
				           	 	$itemnameerr="Item name is required.";

				           }
				          else
				           {

				            	 $itemname= test_input($_POST["itemname"]);

				            	  // validation
				                 if (!preg_match("/^[a-zA-Z ]*$/",$itemname))
				        		  {
 							 		  $itemnameerr = "Only letters and white space allowed"; 
								  }
				           } 
			   
				          if(empty($_POST["confirmdelete"]))
				           {
				           	 	//$confirmerr="Confirmation is required.";
				           }
				          else
				           {
				            	 $confirm= test_input($_POST["confirmdelete"]);

				            	 // validation
				                 if (!preg_match("/^[a-zA-Z ]*$/",$confirm))
				        		  {
 							 		  $confirmerr = "Only letters and white space allowed"; 
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

		           // connecting to the database

			       $con=mysqli_connect("localhost","root","lionelm10","restaurant");
				   
				   // Check connection
				   if (mysqli_connect_errno()) 
				    {
						  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				    }
		                    

		            //escape variables for security
		            $itemname = mysqli_real_escape_string($con,$itemname);
		            $confirm = mysqli_real_escape_string($con,$confirm);
		                    
				    // query 
				    $result = mysqli_query($con,"SELECT * FROM Food WHERE Food_name='$itemname'");
		                      	                      
				   while($row = mysqli_fetch_array($result)) 
				    {	      
					     $itemname= $row['Food_name'];
					     $ingredient = $row['Food_ingredient'];
						 $spicy= $row['Food_spicy'];
						 $Type1= $row['Food_type_id'];
						 
						 // getting the type
					     $result1=mysqli_query($con,"SELECT Food_type_name FROM Food_type WHERE Food_type_id='$Type1'");
							       
						 if ($row1=mysqli_fetch_array($result1))
						  {    	  
							   $Type= $row1['Food_type_name'];
						  }
						
						 $price= $row['Food_price'];
						 $side = $row['Food_side'];
						 $addon= $row['Food_addon'];

				    }

				   if('YES' === $confirm)
				    {
                           mysqli_query($con,"DELETE FROM Food WHERE Food_name='$itemname'");
				    }

				   mysqli_close($con);

   		 ?>
    	<div id="container">
			
			<div id="top3" class="transparent" height="150px">
				
				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					
					<h1 id="welcome" >Enter the Existing food/drink item..</h1><br/>
					<hr/>
					
					&nbsp;Item Name<br/>&nbsp;<input type="text" name="itemname" placeholder="Item Name" value="<?php echo $itemname; ?>" size="30" onblur="myitemnamevalid(this)"/> 
	                &nbsp;<label id="itemlabel" class="errorlabels"><?php echo $itemnameerr; ?></label><br/> <br/>
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/>
	                
	                <h1 id="details" >Details of the Item..</h1><br/>
	                <h2 id="h2">Item Name</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="fulllabel" class="errorlabels">Item Name-<?php echo $itemname; ?></label><br/>
	                &nbsp;<input id="itemnew" type="text" name="itemnamenew" placeholder="Item Name" size="30"  style="display:none;"/><br/><br/>
	                 
	                
	                <h2 id="h2">Item Ingredients & Spicyness</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="ingredientlabel" class="errorlabels">Ingredients-<?php echo $ingredient; ?></label><br/>
	                &nbsp;<input id="ingnew" type="text" name="ingrdientsnew" placeholder="Ingredients" size="30"style="display:none;"/><br/> 
	                

	                &nbsp;<label id="spicylabel" class="errorlabels">Spicyness-<?php echo $spicy; ?></label><br/>
	                &nbsp;<input id="spicenew" type="text" name="spicynew" placeholder="Spicy" size="30"style="display:none;"/><br/>
	                 
	                <h2 id="h2">Type & Price</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="typelabel" class="errorlabels">Type-<?php echo $Type; ?></label><br/>
	                &nbsp;<input id="tynew" type="text" name="typenew" placeholder="Email" size="30"style="display:none;"/><br/> 
	                


	                &nbsp;<label id="pricelabel" class="errorlabels">Price-<?php echo $price; ?></label><br/>
	                &nbsp;<input id="pricenew" type="text" name="pricenew" placeholder="Price" size="30"style="display:none;"/><br/><br/> 
	                
	                
	                
	                <h2 id="h2">Provided as a Side</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="sidelabel" class="errorlabels">Side-<?php echo $side; ?></label><br/>
	                &nbsp;<input id="sidenew" type="text" name="sidenew" placeholder="Side" size="30"style="display:none;"/><br/> 
	                
	                
	                <h2 id="h2">Can be added on</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="addonlabel" class="errorlabels">Addons-<?php echo $addon; ?></label><br/>
	                &nbsp;<input id="addnew" type="text" name="addonew" placeholder="Add on" size="30" style="display:none;"/>
	                

	                &nbsp;<input id="confirmdel" type="text" name="confirmdelete" placeholder="YES or NO AND PRESS CONFIRM" size="30" style="display:none;" onblur="myconfirmvalid(this)"/><br/>
	                &nbsp;<label id="confirmlabel" class="errorlabels"><?php echo $confirmerr; ?></label><br/>
	                &nbsp;<input id="loginbutton" type="button" value="DELETE->" onclick="displayedit1()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="CONFIRM->"/>			 
			    </form>
			
			</div>
			
		</div>
		 

      <script type="text/javascript" src="nihal_emp_script.js"></script>
	</body>
</html>
