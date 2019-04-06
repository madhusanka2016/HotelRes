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
$Page_title = 'Cafetaria Booking';


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
				
				
				$sql ="Select * from cafebook where id = '$id'";
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
                            Cafetaria Booking<small>	<?php echo  $curdate; ?> </small>
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
											<th>
											<?php 
											if($Type == '3'){
												$payment = 5000;
											}
											elseif($Type == '5'){
												$payment = 10000;
											}
											elseif($Type == '12'){
												$payment = 13000;
											}
											elseif($Type == '6'){
												$payment = 15000;
											}
											elseif($Type == '24'){
												$payment = 20000;
											}
											if($Type == '3'){
												echo'3 Hours Booking';
											}
											elseif($Type == '5'){
												echo'5 Hours Booking';
											}
											elseif($Type == '12'){
												echo'Half Day Booking';
											}
											elseif($Type == '6'){
												echo'Evening Booking';
											}
											elseif($Type == '24'){
												echo'Full Day Booking';
											}
											
											
											?>
											</th>
                                            
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
															<option value="Reject">Reject</option>
															
															
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
						$confirmed = "select * from cafebook where cindate = '$cin' and stat='Conform'";
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
													<td>".$row['cinTime']."</td><td>";
													if($row['Type'] == '3'){
														echo'3 Hours Booking';
													}
													elseif($row['Type'] == '5'){
														echo'5 Hours Booking';
													}
													elseif($row['Type'] == '12'){
														echo'Half Day Booking';
													}
													elseif($row['Type'] == '6'){
														echo'Evening Booking';
													}
													elseif($row['Type'] == '24'){
														echo'Full Day Booking';
													}

											echo "
													
											</td></tr>";
												
											
											
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
									$urb = "UPDATE `cafebook` SET `stat`='$st', `payment`='$payment' WHERE id = '$id'";
									
								 if( mysqli_query($con,$urb))
											{	
												 echo "<script type='text/javascript'> alert('Cafetaria booking is conform')</script>";
												echo "<script type='text/javascript'> window.location='cafebooking.php'</script>";
												
												
												
												
												
											}
									
                                        
							}	
							elseif($st=="Reject")
							{
									$urb = "UPDATE `cafebook` SET `stat`='$st' WHERE id = '$id'";
									
								 if( mysqli_query($con,$urb))
											{	
												 echo "<script type='text/javascript'> alert('Cafetaria booking is Rejected')</script>";
												echo "<script type='text/javascript'> window.location='cafebooking.php'</script>";
												
												
												
												
												
											}
									
                                        
							}	
					
						}
					
									
									
							
						?>