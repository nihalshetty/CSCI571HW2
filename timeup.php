<?php

 if($_SESSION['Time'] < time() )
 {  
 	                  if(isset($_SESSION['Username']))
                         {
                           unset($_SESSION['Username']);
                           unset($_SESSION['Firstname']);
                           unset($_SESSION['Lastname']);
                           unset($_SESSION['Type_id']);

                         }

                         header('Location: http://127.0.1.1/login.php');

 }
else
{

			$_SESSION['Time']= time()+ 120;

}






?>