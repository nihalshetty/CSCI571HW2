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
			newfood.com
		</title>
		<link rel="stylesheet" type="text/css" href="nihal_emp_support.css"/>
	</head>
	<body onload="updatetype()">
    
    <!-- php scripts begins here --> 
    <!-- first we perform security checks -->
    <?php
      
		      $itemname=$ingredient=$spicy=$type= $side=$addon=$price="";
		      $itemnameerr=$ingredienterr=$spicyerr=$typeerr= $sideerr=$addonerr=$priceerr="";
		      $count=1;
		      $flag=0;

		      
		      if( $_SERVER["REQUEST_METHOD"]== "POST")
		       {
		          
		           if(empty($_POST["itemname"]))
		           {
		           	 	$itemnameerr="Item name is required.";
		           }
		           else
		           {

		            	 $itemname= test_input($_POST["itemname"]);
		            	 $count++;
		            	 // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$itemname))
				          {
 							 	 $itemnameerr = "Only letters and white space allowed"; 
 							 	 $count--;
						  }
		            } 


		           if(empty($_POST["typeid"]))
		           {
		           	 	$typeerr="Type id is required.";
		           }
		           else
		           {

		            	 $type= test_input($_POST["typeid"]);
		            	 $count++;
		            	 
						  if (!preg_match("/^[0-9]*$/",$type))
						   { 
						   	 $typeerr="Employee Type is not valid.";
							 $count--;
						   }
						  else
						   {
							  $typeerr="";
						   }
		            } 


		          if(empty($_POST["ingredient"]))
		           {
				        $ingredienterr="Ingredients is required.";
		           }
				 else
				  {

				        $ingredient= test_input($_POST["ingredient"]);
				        $count++;
			      } 


				 if(empty($_POST["spicy"]))
				  {
				       	$spicyerr="Spicyness is required.";
				  }
				 else
				  {
				        $spicy= test_input($_POST["spicy"]);
				        $count++;
				  } 


				 if(empty($_POST["price"]))
				  {
				       $priceerr="Price is required.";
				           	 
				  }
				 else
				  {

				      $price= test_input($_POST["price"]);
				      $count++;
				            	  
					 if (!preg_match("/^[0-9]*$/",$price))
				      {
						  $priceerr="Employee Type is not valid.";
						  $count--;
					  }
					 else
					 {
						  $priceerr="";
					 }
				            
				  } 

				 if(empty($_POST["side"]))
				  {
				      $sideerr="Side order is required.";
				           	 	
				  }
				 else
				  {

				      $side= test_input($_POST["side"]);
				      $count++;

					  // validation
					  if (!preg_match("/^[a-zA-Z ]*$/",$side))
					   {
	 					    $sideerr = "Only letters and white space allowed";
	 						$count--; 
					   }
				            	
				  }

				  if(empty($_POST["addon"]))
				  {
				           	 	
				      $addonerr="Addon is required.";
				           	 	
				  }
				 else
				  {

				       $addon= test_input($_POST["addon"]);
				       $count++;
				            	 
				  }
		         
		       
		       }

		      
		      function test_input($data) 
		       {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
			   }

				if($count == 8 )
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
					$itemname = mysqli_real_escape_string($con,$itemname);
					$type = mysqli_real_escape_string($con,$type);
					$ingredient = mysqli_real_escape_string($con,$ingredient);
					$spicy = mysqli_real_escape_string($con,$spicy);
					$price = mysqli_real_escape_string($con,$price);
					$side = mysqli_real_escape_string($con,$side);
					$addon = mysqli_real_escape_string($con,$addon);
		

					if($flag == 1)
					{			
			                      
					       $sql="INSERT INTO Food (Food_name, Food_type_id, Food_ingredient, Food_spicy, Food_price, Food_side, Food_addon)
					             VALUES ('$itemname', '$type', '$ingredient','$spicy','$price','$side','$addon')";

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
					
					<h1 id="enter"> Enter New Food Details...</h1>
					<hr/>
					
					&nbsp;Item Name<br/>&nbsp;<input type="text" name="itemname" placeholder="Item name" size="30" onblur="myitemnamevalid(this)" />
					&nbsp;<label id="itemlabel" class="errorlabels"><?php echo $itemnameerr; ?></label> <br/> <br/>
					
					<!-- &nbsp;Type id<br/>&nbsp;<input type="text" name="typeid" placeholder="Type id" size="30" onblur="mytypvalid(this)"/>  -->
					&nbsp;Type<br/>
					&nbsp;	  <select id="typeid" name="typeid">
						                	<option value="0">Select</option>
	
								    </select>
	                &nbsp;<label id="typlabel" class="errorlabels"><?php echo $typeerr; ?></label><br/> <br/>
	               
	                &nbsp;Ingredients<br/>&nbsp;<input type="text" name="ingredient" placeholder="Ingredients" size="30" onblur="myingvalid(this)"/> 
	                &nbsp;<label id="inglabel" class="errorlabels"><?php echo $ingredienterr; ?></label><br/> <br/>
	              
	                &nbsp;Spicyness<br/><input type="radio" name="spicy" value="not spicy"/>&nbsp;no&nbsp;spicy
						                <input type="radio" name="spicy" value="medium"/>&nbsp;medium&nbsp;spicy
						                <input type="radio" name="spicy" value="very spicy"/>&nbsp;very&nbsp;spicy 
	                &nbsp;<label id="spicylabel" class="errorlabels"><?php echo $spicyerr; ?></label><br/> <br/>
	               
	                &nbsp;Price<br/>&nbsp;<input type="text" name="price" placeholder="Price" size="30" onblur="mypricevalid(this)" /> 
	                &nbsp;<label id="pricelabel" class="errorlabels"><?php echo $priceerr; ?></label><br/> <br/>
	                
	                &nbsp;Side<br/>&nbsp;<input type="text" name="side" placeholder="Side" size="30" onblur="mysidevalid(this)"/> 
	                &nbsp;<label id="sidelabel" class="errorlabels"><?php echo $sideerr; ?></label><br/> <br/>
					
					&nbsp;Addon<br/>
						       <select id="addon" name="addon">
						                	<option value="0">Select</option>
											<option value="cheese">Cheese</option>
											<option value="garden salad">Garden Salad</option>
											<option value="garlic bread">Garlic Bread</option>
								    </select>
					&nbsp;<label id="addonlabel" class="errorlabels"><?php echo $addonerr; ?></label><br/> <br/>
						            	         
	                &nbsp;<input id="loginbutton" type="submit" value="ADD->"/>
  

				</form>
			</div>
		</div>
	    


		 <script type="text/javascript" src="nihal_emp_script.js"></script>
	</body>
</html>