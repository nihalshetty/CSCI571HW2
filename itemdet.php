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
			itemdetail.com
		</title>
		<link rel="stylesheet" type="text/css" href="nihal_manager_support.css"/>	
	</head>
	<body onload="updatetype()">
			
    	<?php
      				 
      		  $itemnameerr=$itemtypenameerr=$pricerangeerr="";
			  $itemname=$itemtypename=$pricerange="";
				      
              $f1=$f2=$f3=$f4=0;

			 if( $_SERVER["REQUEST_METHOD"]== "POST")
			  {
				                    
				  if(empty($_POST["itemname"]))
				   {
				          $itemnameerr="Item Name is required.";
				          $f4=0;
				   }
				  else
				   {

				          $itemname= test_input($_POST["itemname"]);
				          $f4=1;

				          // validation
				       	  if (!preg_match("/^[a-zA-Z ]*$/",$itemname))
				           {     
				                  $f4=0;
 							 	  $itemnameerr = "Only letters and white space allowed"; 
						   }

				    }


				              

				  if(empty($_POST["itemtypename"]))
				   {
				           	 	
				          $itemtypenameerr="Item Type Error is required. ";
				          $f1=0;			                
				   }
				  else
				   {

				         $itemtypename= test_input($_POST["itemtypename"]);
				         $f1=1;

					     if (!preg_match("/^[0-9]*$/",$itemtypename))
						  {

							     $f1=0;
							     $itemtypenameerr="Price lower is not valid.";;
						  }
						 else
						  {
								 $f1=1;
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
		                    
							if ($f1== 1 && $f4== 1)
							 {
								$f5=1;
							 }

							if ($f1== 1 && $f2== 1 && $f3 == 1) 
							 {
								$f6=1;
							 }

							if ($f4== 1 && $f2== 1 && $f3 == 1) 
							 {
								$f7=1;
							 } 

							if ($f1== 1 && $f2== 1 && $f3 == 1 && $f4== 1) 
							 {
								$f8=1;
							 }
		                

		                     // querries for updating the database
                            if($f1 == 1)
                             {   
                             	$itemtypename = mysqli_real_escape_string($con,$itemtypename);
                             	$result =mysqli_query($con,"SELECT * FROM Food INNER JOIN Food_type ON Food.Food_type_id = Food_type.Food_type_id  WHERE Food_type.Food_type_id='$itemtypename'");
                             }	

                             if($f2 == 1 && $f3 == 1)
                             { 
                                $pricelower = mysqli_real_escape_string($con,$pricelower);
                             	$priceupper = mysqli_real_escape_string($con,$priceupper);
                             	$result = mysqli_query($con,"SELECT * FROM Food WHERE Food_price BETWEEN '$pricelower' AND '$priceupper' ");

                             }

                             	
							
							 if($f4 == 1)
                             {  
                             	$itemname = mysqli_real_escape_string($con,$itemname);
                             	$result = mysqli_query($con,"SELECT * FROM Food WHERE Food_name='$itemname'");
                             }

                             if($f5 == 1)
                             { // if item name and item type name is given
                             	$itemname = mysqli_real_escape_string($con,$itemname);
                             	$itemtypename = mysqli_real_escape_string($con,$itemtypename);
                             	//query
                             	$result = mysqli_query($con,"SELECT * FROM Food INNER JOIN Food_type ON Food.Food_type_id = Food_type.Food_type_id  WHERE Food_type.Food_type_id='$itemtypename' OR Food.Food_name='$itemname'");


                             }

                              if($f6 == 1)
                             {  
                                // if item type name and price is given
                             	$itemtypename = mysqli_real_escape_string($con,$itemtypename);
                             	$pricelower = mysqli_real_escape_string($con,$pricelower);
                             	$priceupper = mysqli_real_escape_string($con,$priceupper);
                             	//query
                             	$result = mysqli_query($con,"SELECT * FROM Food INNER JOIN Food_type ON Food.Food_type_id = Food_type.Food_type_id  WHERE Food_type.Food_type_id='$itemtypename' OR Food.Food_price BETWEEN '$pricelower' AND '$priceupper'");
                             	
                             }

                              if($f7 == 1)
                             {  
                                // if item name and price name is given
                             	$itemname = mysqli_real_escape_string($con,$itemname);
                             	$pricelower = mysqli_real_escape_string($con,$pricelower);
                             	$priceupper = mysqli_real_escape_string($con,$priceupper);
                             	//query
                             	$result = mysqli_query($con,"SELECT * FROM Food INNER JOIN Food_type ON Food.Food_type_id = Food_type.Food_type_id  WHERE Food.Food_name='$itemname' OR Food.Food_price BETWEEN '$pricelower' AND '$priceupper'");

                             }

                              if($f8 == 1)
                             { 
                                // if item name and item type name and price  is given
                             	$itemtypename = mysqli_real_escape_string($con,$itemtypename);
                             	$itemname = mysqli_real_escape_string($con,$itemname);
                             	$pricelower = mysqli_real_escape_string($con,$pricelower);
                             	$priceupper = mysqli_real_escape_string($con,$priceupper);
                             	//query
                             	$result = mysqli_query($con,"SELECT * FROM Food INNER JOIN Food_type ON Food.Food_type_id = Food_type.Food_type_id  WHERE Food.Food_name='$itemname' OR Food.Food_price BETWEEN '$pricelower' AND '$priceupper' OR Food_type.Food_type_id='$itemtypename'");
                            
                             }
  
		                        

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

					<h1 id="welcome" >Enter the Item you want to view..</h1><br/>
					<hr/>
					&nbsp;Item Name<br/>&nbsp;<input id="itemname" type="text" name="itemname" placeholder="Item Name" value="<?php echo $itemname; ?>"  size="30" onblur="myitemnamevalid(this)" onkeyup="showHint(this.value)"/> 
	                &nbsp;<label id="itemlabel" class="errorlabels" style="display:none;"><?php echo $itemnameerr; ?></label><br/> <br/>
	                <!-- &nbsp;<input id="loginbutton" type="button" value="PRESS To ENTER DETAIL->" onclick="displayed1()"/> -->
	                <!-- &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/><br/><br/> -->
	                
	                <h1 id="welcome" >Enter the Item Type you want to view..</h1><br/>
					<hr/>
					<!-- &nbsp;Item Type Name<br/>&nbsp;<input id="itemtypename" type="text" name="itemtypename" placeholder="Item Type Name" value="<?php echo $itemtypename; ?>"  size="30" onblur="myitemtypenamevalid(this)" onkeyup="showHint1(this.value)"/> 
					 -->
					 &nbsp;Type<br/>
					 &nbsp;	   <select id="itemtypename" name="itemtypename">
						                	<option value="0">Select</option>
	
								    </select>
	                &nbsp;<label id="itemtypelabel" class="errorlabels" style="display:none;"><?php echo $itemtypenameerr; ?></label><br/> <br/>
	                <!-- &nbsp;<input id="loginbutton" type="button" value="PRESS To ENTER DETAIL->" onclick="displayed2()"/> -->
	                <!-- &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/><br/><br/> -->
 					
 					<h1 id="welcome" >Enter the price range of Item you want to view..</h1><br/>
					<hr/>
					&nbsp;Price lower<br/>&nbsp;<input id="pricelower" type="text" name="pricelower" placeholder="Price Lower" value="<?php echo $pricelower; ?>"  size="30" onblur="mypricelowervalid(this)"/> 
	                &nbsp;<label id="pricelowerlabel" class="errorlabels" style="display:none;" ><?php echo $pricelowererr; ?></label><br/> <br/>
	                &nbsp;Price upper<br/>&nbsp;<input id="priceupper" type="text" name="priceupper" placeholder="Price Upper" value="<?php echo $priceupper; ?>"  size="30" onblur="mypriceuppervalid(this)"/>
	                &nbsp;<label id="priceupperlabel" class="errorlabels" style="display:none;" ><?php echo $priceuppererr; ?></label><br/> <br/>
	                <!-- &nbsp;<input id="loginbutton" type="button" value="PRESS To ENTER DETAIL->" onclick="displayed3()"/> -->
	                &nbsp;<input id="loginbutton" type="submit" value="DISPLAY->"/><br/><br/>



	                <h1 id="details" >Details of the Item..</h1><br/>
	                <h2 id="h2">Item Name</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="fulllabel" class="errorlabels">Name<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1; while($row = mysqli_fetch_array($result)) { $itemname= $row['Food_name'];
		            echo "<br/>&nbsp;".$i.") "; echo $itemname; $i++;} }?></label><br/><br/>
	                <!-- &nbsp;<input id="itemnew" type="text" name="itemnamenew" placeholder="Item Name" size="30"  style="display:none;"/><br/><br/> -->
	                 
	                
	                <h2 id="h2">Item Ingredients & Spicyness</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="ingredientlabel" class="errorlabels">Ingredients<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0);  $i=1; while($row = mysqli_fetch_array($result)) {  $ingredient = $row['Food_ingredient']; 
	                echo "<br/>&nbsp;".$i.") "; echo $ingredient; $i++;} } ?></label><br/><br/>
	                <!-- &nbsp;<input id="ingnew" type="text" name="ingrdientsnew" placeholder="Ingredients" size="30"style="display:none;"/><br/> --> 
	                

	                &nbsp;<label id="spicylabel" class="errorlabels">Spicyness<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0);  $i=1; while($row = mysqli_fetch_array($result)) { $spicy= $row['Food_spicy']; echo "<br/>&nbsp;".$i.") ";; echo $spicy;  $i++; } }?></label><br/><br/>
	                <!-- &nbsp;<input id="spicenew" type="text" name="spicynew" placeholder="Spicy" size="30"style="display:none;"/><br/> -->
	                 
	                <h2 id="h2">Type & Price</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="typelabel" class="errorlabels">Type<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1;  while($row = mysqli_fetch_array($result)) {  $Type1= $row['Food_type_id'];
							      // getting the type
							       $result1=mysqli_query($con,"SELECT Food_type_name FROM Food_type WHERE Food_type_id='$Type1'");
							       if ($row1=mysqli_fetch_array($result1)) {
							       	  
							       	  $Type= $row1['Food_type_name'];
							       } echo "<br/>&nbsp;".$i.") "; echo $Type; $i++;} }?></label><br/><br/>
	               <!--  &nbsp;<input id="tynew" type="text" name="typenew" placeholder="Email" size="30"style="display:none;"/><br/> --> 
	                


	                &nbsp;<label id="pricelabel" class="errorlabels">Price<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1;  while($row = mysqli_fetch_array($result)) { $price= $row['Food_price']; echo "<br/>&nbsp;".$i.") "; echo $price; $i++;} }?></label><br/><br/>
	               <!--  &nbsp;<input id="pricenew" type="text" name="pricenew" placeholder="Price" size="30"style="display:none;"/><br/><br/> --> 
	                
	                
	                
	                <h2 id="h2">Provided as a Side</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="sidelabel" class="errorlabels">Side<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1;  while($row = mysqli_fetch_array($result)) { $side = $row['Food_side']; echo "<br/>&nbsp;".$i.") "; echo $side; $i++; } } ?></label><br/><br/>
	               <!--  &nbsp;<input id="sidenew" type="text" name="sidenew" placeholder="Side" size="30"style="display:none;"/><br/>  -->
	                
	                
	                <h2 id="h2">Can be added on</h2><br/>
	                <hr id="hr"/>
	                &nbsp;<label id="addonlabel" class="errorlabels">Addons<?php if( $_SERVER["REQUEST_METHOD"]== "POST"){ mysqli_data_seek($result, 0); $i=1;  while($row = mysqli_fetch_array($result)) {  $addon= $row['Food_addon']; echo "<br/>&nbsp;".$i.") "; echo $addon; $i++;} mysqli_close($con); }?></label><br/><br/>
	                <!-- &nbsp;<input id="addnew" type="text" name="addonew" placeholder="Add on" size="30" style="display:none;"/><br/> -->
	                

	                
	               <!--  &nbsp;<input id="loginbutton" type="submit" value="SAVE->"/> -->
			    </form>
			    
			</div>
			
		</div>
		 

     <script type="text/javascript" src="nihal_man_script.js"></script>
	</body>
</html>
