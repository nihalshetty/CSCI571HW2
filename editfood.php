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
				editfood.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_emp_support.css"/>	
	</head>
	<body onload="updatetypenew()" >
			
    	<?php
      				  
      		  $itemnameerr ="";
			  $itemname=$ingredient=$spicy=$Type= $side=$addon=$price="";
				      
                     

			  $itemnamen=$ingredientn=$spicyn=$Typen=$siden=$addonn=$pricen="";
              
              $f1=$f2=$f3=$f4=$f5=$f6=$f7=0;

			 if( $_SERVER["REQUEST_METHOD"]== "POST")
			   {
				           

				  if(empty($_POST["itemname"]))
				   {
				           
				           $itemnameerr="Item Name is required.";
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


				               
				  if(empty($_POST["itemnamenew"]))
				   {
				           	 	
				          $itemnamen="";
				          $f1=0;
				                
				   }
				  else
				  {

				         $itemnamen= test_input($_POST["itemnamenew"]);
				         $f1=1;

				         // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$itemnamen))
				          {      
				          	     $f1=0;
 							 	 $itemnamen = "Only letters and white space allowed"; 
					      }
				   } 

				               
				  if(empty($_POST["ingrdientsnew"]))
				   {
				         $ingredientn="";
				         $f2=0;
				   }
				  else
				   {

				         $ingredientn= test_input($_POST["ingrdientsnew"]);
				         $f2=1;
				 
				   }

				  if(empty($_POST["spicynew"]))
				   {
				         $spicyn="";
				         $f3=0;
				   }
				  else
				   {

				         $spicyn= test_input($_POST["spicynew"]);
				         $f3=1;

				         // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$spicyn))
				          {      
				          	     $f3=0;
 							     $spicyn = "Only letters and white space allowed"; 
								 
						  }
			        } 
							
				   if(empty($_POST["typenew"]))
				    {
				         $Typen="";
				         $f4=0;
				    }
				   else
				    {

				         $Typen= test_input($_POST["typenew"]);
				         $f4=1;

				       
						 if (!preg_match("/^[0-9]*$/",$Typen))
						  {

							  $Typen="";
				           	  $f4=0;
						  }
						 else
						  {
								 $f4=1;
						  }

				    } 
 

                 if(empty($_POST["pricenew"]))
                  {
				          $pricen="";
				          $f5=0;
				  }
				 else
				  {
				         $pricen= test_input($_POST["pricenew"]);
				         $f5=1;


				            	 
				      
					     if (!preg_match("/^[0-9]*$/",$pricen))
						  {

							      $pricen="";
				           	 	  $f5=0;
						  }
						 else
						  {
								  $f5=1;
						  }
				  } 

				 if(empty($_POST["sidenew"]))
				  {
				         $siden="";
				         $f6=0;
				  }
				 else
				  {

				         $siden= test_input($_POST["sidenew"]);
				         $f6=1;

				         // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$siden))
				          {     
				                  $f6=0;
 							 	  $siden = "Only letters and white space allowed"; 
						  }
				  }
				               
				 if(empty($_POST["addonew"]))
				  {
				         $addonn="";
				         $f7=0;
				  }
				 else
				  {

				         $addonn= test_input($_POST["addonew"]);
				         $f7=1;

				         // validation
				         if (!preg_match("/^[a-zA-Z ]*$/",$addonn))
				          {     
				                 $f7=0;
 							 	 $addonn = "Only letters and white space allowed"; 
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
			  $itemname = mysqli_real_escape_string($con,$itemname);
		      
		      //query              
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


                            // querries for updating the database
                            if($f1 == 1)
                             {  
                             	$itemnamen = mysqli_real_escape_string($con,$itemnamen);
                             	mysqli_query($con,"UPDATE Food SET Food_name='$itemnamen' WHERE Food_name='$itemname'");
                             }	

                             if($f2 == 1)
                             {  
                             	$ingredientn = mysqli_real_escape_string($con,$ingredientn);
                             	mysqli_query($con,"UPDATE Food SET Food_ingredient='$ingredientn' WHERE Food_name='$itemname'");
                             }

                             if($f3 == 1)
                             {  
                             	$spicyn = mysqli_real_escape_string($con,$spicyn);
                             	mysqli_query($con,"UPDATE Food SET Food_spicy='$spicyn' WHERE Food_name='$itemname'");
                             }	
							
							 if($f4 == 1)
                             {  
                             	$Typen = mysqli_real_escape_string($con,$Typen);
                             	mysqli_query($con,"UPDATE Food SET Food_type_id='$Typen' WHERE Food_name='$itemname'");
                             }

                             if($f5 == 1)
                             {
                             	$pricen = mysqli_real_escape_string($con,$pricen);
                             	mysqli_query($con,"UPDATE Food SET Food_price='$pricen' WHERE Food_name='$itemname'");
                             }

                             if($f6 == 1)
                             {  
                             	$siden = mysqli_real_escape_string($con,$siden);
                             	mysqli_query($con,"UPDATE Food SET Food_side='$siden' WHERE Food_name='$itemname'");
                             }

                             if($f7 == 1)
                             {  
                             	$addonn = mysqli_real_escape_string($con,$addonn);
                             	mysqli_query($con,"UPDATE Food SET Food_addon='$addonn' WHERE Food_name='$itemname'");
                             }

							mysqli_close($con);

   		 ?>



    	<div id="container">

			<div id="top3" class="transparent" height="150px">

				<form name="logininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

					<h1 id="welcome" >Enter the Existing food/drink item..</h1><br/>
					<hr/>
					&nbsp;Item Name<br/>&nbsp;<input type="text" name="itemname" placeholder="Item Name" value="<?php echo $itemname; ?>" size="30" onblur="myitemnamevalid(this)" onkeyup="showHint(this.value)"/> 
	                &nbsp;<label id="itemlabel" class="errorlabels"><?php echo $itemnameerr; ?></label><br/> <br/>
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/>
	                
	                <h1 id="details" >Details of the Item..</h1><br/>
	                <h2 id="h2">Item Name</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="fulllabel" class="errorlabels">Item Name-<?php echo $itemname; ?></label><br/>
	                &nbsp;<input id="itemnew" type="text" name="itemnamenew" placeholder="Item Name" size="30"  style="display:none;" onblur="myitemnamevalid1(this)"/><br/><br/>
	                 
	                
	                <h2 id="h2">Item Ingredients & Spicyness</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="inglabel" class="errorlabels">Ingredients-<?php echo $ingredient; ?></label><br/>
	                &nbsp;<input id="ingnew" type="text" name="ingrdientsnew" placeholder="Ingredients" size="30"style="display:none;" onblur="myingvalid(this)"/><br/> 
	                

	                &nbsp;<label id="spicylabel" class="errorlabels">Spicyness-<?php echo $spicy; ?></label><br/>
	                &nbsp;<input id="spicenew" type="text" name="spicynew" placeholder="Spicy" size="30"style="display:none;" onblur="myspicevalid(this)" /><br/>
	                 
	                <h2 id="h2">Type & Price</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="typlabel" class="errorlabels">Type-<?php echo $Type; ?></label><br/>
	                <!-- &nbsp;<input id="tynew" type="text" name="typenew" placeholder="Email" size="30"style="display:none;" onblur="mytypvalid(this)"/><br/> --> 
	                &nbsp; <select id="tynew" name="typenew" style="display:none;" >
						                	<option value="0">Select</option>
	
								    </select><br/>


	                &nbsp;<label id="pricelabel" class="errorlabels">Price-<?php echo $price; ?></label><br/>
	                &nbsp;<input id="pricenew" type="text" name="pricenew" placeholder="Price" size="30"style="display:none;" onblur="mypricevalid(this)"/><br/><br/> 
	                
	                
	                
	                <h2 id="h2">Provided as a Side</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="sidelabel" class="errorlabels">Side-<?php echo $side; ?></label><br/>
	                &nbsp;<input id="sidenew" type="text" name="sidenew" placeholder="Side" size="30"style="display:none;" onblur="mysidevalid(this)"/><br/> 
	                
	                
	                <h2 id="h2">Can be added on</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="addonlabel" class="errorlabels">Addons-<?php echo $addon; ?></label><br/>
	                &nbsp;<input id="addnew" type="text" name="addonew" placeholder="Add on" size="30" style="display:none;" onblur="myaddonvalid(this)"/><br/>
	                

	                &nbsp;<input id="loginbutton" type="button" value="EDIT->" onclick="displayedit()"/>
	                &nbsp;<input id="loginbutton" type="submit" value="SAVE->"/>
			    </form>
			</div>
			
		</div>
		 

     <script type="text/javascript" src="nihal_emp_script.js"></script>
	</body>
</html>
