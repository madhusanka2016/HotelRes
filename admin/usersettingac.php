<?php


include ('db.php');

			
			$id =$_GET['eid'];		
			$newsql ="update `login` set active = !active WHERE id ='$id' ";
			if(mysqli_query($con,$newsql))
				{
				echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
							
						
				}
			header("Location: usersetting.php");
		
?>


