<?php
include ('db.php');			
$id =$_GET['eid'];		
$newsql ="DELETE FROM `employee` WHERE id ='$id' ";
if(mysqli_query($con,$newsql))
{
echo '<script>alert("Deleted Successfully") </script>' ;
 
				}else {header("Location: employee.php");
                                 echo '<script>alert("Sorry ! Check The System") </script>' ;
                                 
                                }                           	
?>


