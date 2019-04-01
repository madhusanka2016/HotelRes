<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
date_default_timezone_set("Asia/Colombo");
include('db.php');


if(isset($_SESSION['user'])){
$user_id = $_SESSION['user_id'];
$sql2 = "SELECT * FROM login WHERE id = '$user_id'";
$result2 = mysqli_query($con, $sql2);
$userRow = mysqli_fetch_array($result2, MYSQLI_ASSOC);

if ($userRow['role'] == "user") {
    header("location:home.php");
}
}
$Page_title = 'Pool Booking';


?> 

<?php
		if(!isset($_GET["rid"]))
		{
				
			 header("location:index.php");
		}
		else {
				$curdate=date("Y/m/d");
				include ('db.php');
				$id = $_GET['rid'];
				
				
				$sql ="Select * from poolbook where id = '$id'";
				$re = mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($re))
				{
					$id = $row['id'];
					$title = $row['Title'];
					$fname = $row['FName'];
					$lname = $row['LName'];
					$email = $row['Email'];
					$nat = $row['National'];
					$country = $row['Country'];
					$Phone = $row['Phone'];
					$Type = $row['Type'];
					
					$cin = $row['cinDate'];
					$cint = $row['cinTime'];
					
					$sta = $row['stat'];
					
					
				
				
				}
					
					
				
		
	}
		
		
		
			?> 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $Page_title ?> 	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
		<?php include('includes/sidebar.php'); ?>

        <!-- /. NAV SIDE  -->
		
		
		

        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Swimming Pool Booking<small>	<?php echo  $curdate; ?> </small>
                        </h1>
                    </div>
					
					
					<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Booking Conformation
                        </div>
                        <div class="panel-body">
							
							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                            <th>DESCRIPTION</th>
                                            <th>INFORMATION</th>
                                            
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th><?php echo $title.$fname.$lname; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Email</th>
                                            <th><?php echo $email; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Nationality </th>
                                            <th><?php echo $nat; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Country </th>
                                            <th><?php echo $country;  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Phone No </th>
                                            <th><?php echo $Phone; ?></th>
                                            
                                        </tr>
										
										<tr>
                                            <th>Type </th>
											<?php 
											if($Type == '1'){
												$payment = 250;
											}
											elseif($Type == '2'){
												$payment = 500;
											}
											elseif($Type == '5'){
												$payment = 1000;
											}
											elseif($Type == '24'){
												$payment = 2500;
											}
												if($Type == '1'){
													echo'<th>One Hour Booking</th>';
												}
												elseif($Type == '2'){
													echo'<th>Two Hours Booking</th>';
												}
												elseif($Type == '5'){
													echo'<th>Five Hours Booking</th>';
												}
												elseif($Type == '24'){
													echo'<th>Full Day Booking</th>';
												}
											
											
											?>
                                            
                                        </tr>
										
										<tr>
                                            <th>Check-in Date </th>
                                            <th><?php echo $cin; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Check-In Time</th>
                                            <th><?php echo $cint; ?></th>
                                            
                                        </tr>
										
										<tr>
                                            <th>Status Level</th>
                                            <th><?php echo $sta; ?></th>
                                            
                                        </tr>
                                   
                                  
                                        
                                        
                                    
                                </table>
                            </div>
                        
					
							
                        </div>
                        <div class="panel-footer">
                            <form method="post">
										<div class="form-group">
														<label>Select the Conformation</label>
														<select name="conf"class="form-control">
															<option value selected>	</option>
															<option value="Conform">Conform</option>
															
															
														</select>
										 </div>
							<input type="submit" name="co" value="Conform" class="btn btn-success">
							
							</form>
                        </div>
                    </div>
					</div>
					
					
						
						
					<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Confirmed Bookings On <?php echo $cin; ?>
                        </div>
						<?php
						$confirmed = "select * from poolbook where cindate = '$cin' and stat='Conform'";
						$comrow = mysqli_query($con,$confirmed)
						?>
                        <div class="panel-body">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Checkin Time</th>
                                            <th>Duration</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
										while($row= mysqli_fetch_array($comrow))
										{
											echo "<tr class=odd gradeX>
													<td>".$row['cinTime']."</td>";
													if($row['Type'] == '1'){
														echo'<th>One Hour Booking</th>';
													}
													elseif($row['Type'] == '2'){
														echo'<th>Two Hours Booking</th>';
													}
													elseif($row['Type'] == '5'){
														echo'<th>Five Hours Booking</th>';
													}
													elseif($row['Type'] == '24'){
														echo'<th>Full Day Booking</th>';
													}

											echo "
													
												</tr>";
												
											
											
										}
									?>
                                    </tbody>
                                </table>
						
						
						
                        
						
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
                </div>
                <!-- /. ROW  -->
				
                </div>
                <!-- /. ROW  -->
				
				
				
				
         </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>

<?php
						if(isset($_POST['co']))
						{	
							$st = $_POST['conf'];
							
							 
							
							if($st=="Conform")
							{
									$urb = "UPDATE `poolbook` SET `stat`='$st', `payment`='$payment' WHERE id = '$id'";
									
								 if( mysqli_query($con,$urb))
											{	
												 echo "<script type='text/javascript'> alert('Guest Room booking is conform')</script>";
												echo "<script type='text/javascript'> window.location='poolbooking.php'</script>";
												
												
												
												//  $type_of_room = 0;       
												// 		if($troom=="Superior Room")
												// 		{
												// 			$type_of_room = 320;
														
												// 		}
												// 		else if($troom=="Deluxe Room")
												// 		{
												// 			$type_of_room = 220;
												// 		}
												// 		else if($troom=="Guest House")
												// 		{
												// 			$type_of_room = 180;
												// 		}
												// 		else if($troom=="Single Room")
												// 		{
												// 			$type_of_room = 150;
												// 		}
														
														
														
														
											
															
												// 			//echo "<script type='text/javascript'> alert('$count_date')</script>";
												// 		$psql = "INSERT INTO `payment`(`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`,`meal`, `mepr`, `btot`,`fintot`,`noofdays`) VALUES ('$id','$title','$fname','$lname','$troom','$bed','$nroom','$cin','$cout','$ttot','$meal','$mepr','$btot','$fintot','$days')";
														
												// 		if(mysqli_query($con,$psql))
												// 		{	$notfree="NotFree";
												// 			$rpsql = "UPDATE `room` SET `place`='$notfree',`cusid`='$id' where bedding ='$bed' and type='$troom' ";
												// 			if(mysqli_query($con,$rpsql))
												// 			{
												// 			echo "<script type='text/javascript'> alert('Booking Conform')</script>";
												// 			echo "<script type='text/javascript'> window.location='roombook.php'</script>";
												// 			}
															
															
												// 		}
												
											}
									
                                        
							}	
					
						}
					
									
									
							
						?>