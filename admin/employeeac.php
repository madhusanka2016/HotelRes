<?php


include ('db.php');

			
			$id =$_GET['eid'];		
			$newsql ="update `employee` set status = 0 WHERE id ='$id' ";
			if(mysqli_query($con,$newsql))
				{
				echo' <script language="javascript" type="text/javascript"> alert("Employee deactivated") </script>';
							
						
				}
			header("Location: employee.php");
		
?>


