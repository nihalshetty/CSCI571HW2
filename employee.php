<?php ob_start();session_start(); ?>

<!DOCTYPE html>

<?php 
	 $fullname= $_SESSION['Firstname']." ". $_SESSION['Lastname'];
	if( !(isset($_SESSION['Type_id']) && $_SESSION['Type_id'] == 3) )
	{
	     header('Location: login.php');
	}
?>
<html>
	<head>
			<title>
				employee.com
			</title>
			<link rel="stylesheet" type="text/css" href="nihal_emp_support.css"/>	
	</head>
	<body id="body" onclick="checktime()">
		<?php

		 if( $_SERVER["REQUEST_METHOD"]== "POST")
		  {

		 		 if(isset($_SESSION['Username']))
                  {
                       unset($_SESSION['Username']);
                       unset($_SESSION['Firstname']);
                       unset($_SESSION['Lastname']);
                       unset($_SESSION['Type_id']);

                  }

                       header('Location: login.php');
		       	  

		    }


		?>
    	<div id="container">

			<div id="logo">
				<img src="logofinal1.png" alt="bigbanglogo" width="500" height="100" style="margin-left:5px;" />

			</div>

			<div id="top1" class="transparent" height="150px">
				<h1 id="welcome" >Welcome <?php echo $fullname; ?></h1>
				
				<div id="firstset">
					<br/>&nbsp;<a href="newfood.php" target="idisplay" style="text-decoration:none;color: red;border: solid 1px white;">Add a New Food/Drinks item</a><br/>
					<br/>&nbsp;<a href="editfood.php" target="idisplay" style="text-decoration:none;color: red;border: solid 1px white;">Edit an Food/Drinks item</a><br/>
					<br/>&nbsp;<a href="deletefood.php" target="idisplay" style="text-decoration:none;color: red;border: solid 1px white;">Delete an Food/Drinks item</a><br/>
                </div>

                <div id="secondset">
					<br/>&nbsp;<a href="newfoodtype.php" target="idisplay" style="text-decoration:none;color: red;border: solid 1px white;">Add a New Food/Drinks category item</a><br/>
					<br/>&nbsp;<a href="editfoodtype.php" target="idisplay" style="text-decoration:none;color: red;border: solid 1px white;">Edit an Food/Drinks category item</a><br/>
					<br/>&nbsp;<a href="deletefoodtype.php" target="idisplay" style="text-decoration:none;color: red;border: solid 1px white;">Delete an Food/Drinks category item</a><br/>
			    </div>

				<div id="thirdset">
					<br/>&nbsp;<a href="newsales.php" target="idisplay" style="text-decoration:none;color: red;border: solid 1px white;">Add a New  item on special sales section</a><br/>
					<br/>&nbsp;<a href="editsales.php" target="idisplay" style="text-decoration:none;color: red;border: solid 1px white;">Edit an item on special sales section</a><br/>
					<br/>&nbsp;<a href="deletesales.php" target="idisplay" style="text-decoration:none;color: red;border: solid 1px white;">Delete an item on speical sales section</a><br/>
			    </div>
			</div>

			<div id="foriframe">
				<iframe src="" name="idisplay" class="transparent" seamless></iframe>
			</div>

			<div id="logout">
				<form name="admininfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				 &nbsp;<input id="logoutbutton" type="submit" value="LOGOUT->" />
				</form>
			</div>
		</div>

		<div id="quote" align="right">
		          <p id="firstline" style="font-size:30px"> "Life is Uncertain. </p>
		          <p id="firstline"style="font-size:30px" ><span style="color:#FFFFFF;">Eat</span>&nbsp;First"<br/>-Ernest Ulmer</p>
		          <br/>
		          <br/>
	    </div>
	    
		 <div id="footer"  >
          	Private Policy. Copy Right &copy; 2014, 13 Restaurant &amp; Lounge Bar. All Rights Reserved.
          </div>




	</body>
</html>


