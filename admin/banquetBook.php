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

$Page_title = 'Administrator';

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
				
				
	$sql = "select * from banquetbook where id = '$id' ";
        $re = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($re)) {
            $id = $row['id'];
            $title = $row['Title'];
            $Fname = $row['FName'];
            $lname = $row['LName'];
            $email = $row['Email'];
            $National = $row['National'];
            $country = $row['Country'];
            $phone = $row['Phone'];
            $thall = $row['THall'];
            $farrange = $row['Farrange'];
            $nhall = $row['NRoom'];
            $light = $row['Light'];
            $cindate = $row['cinDate'];
            $cintime = $row['cinTime'];
            $nodays = $row['nodays'];
            $sta = $row ['stat'];		
				}		
	}

			?> 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo $Page_title ?>	</title>
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
                            Banquet Hall Booking<small>	<?php echo  $curdate; ?> </small>
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
                                            <th><?php echo $title. $Fname. $lname; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Email</th>
                                            <th><?php echo $email; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Nationality </th>
                                            <th><?php echo $National; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Country </th>
                                            <th><?php echo $country;  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Phone No </th>
                                            <th><?php echo $phone; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Type of the Hall </th>
                                            <th><?php echo $thall; ?></th>
                                            
                                        </tr>
										
										<tr>
                                            <th>Flower Arrangements </th>
                                            <th><?php echo $farrange; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Lighting</th>
                                            <th><?php echo $light; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Check-in Date </th>
                                            <th><?php echo $cindate; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Check-in Time</th>
                                            <th><?php echo $cintime; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>No of days</th>
                                            <th><?php echo 1; ?></th>
                                            
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
					
					<?php
						$rsql ="select * from banquet";
						$rre= mysqli_query($con,$rsql);
						$r =0 ;
						$sc =0;
						$gh = 0;
						$sr = 0;
						$dr = 0;
						while($rrow=mysqli_fetch_array($rre))
						{
							$r = $r + 1;
							$s = $rrow['type'];
							$p = $rrow['place'];
							if($s=="Magenta" )
							{
								$sc = $sc+ 1;
							}
							
							if($s=="Merigold")
							{
								$gh = $gh + 1;
							}
							if($s=="Citadel" )
							{
								$sr = $sr + 1;
							}
							if($s=="Victorian Lobby" )
							{
								$dr = $dr + 1;
							}
							
						
						}
						?>
						
						<?php
						$csql ="select * from payment";
						$cre= mysqli_query($con,$csql);
						$cr =0 ;
						$csc =0;
						$cgh = 0;
						$csr = 0;
						$cdr = 0;
						while($crow=mysqli_fetch_array($cre))
						{
							$cr = $cr + 1;
							$cs = $crow['troom'];
							
							if($cs=="Magenta"  )
							{
								$csc = $csc + 1;
							}
							
							if($cs=="Merigold" )
							{
								$cgh = $cgh + 1;
							}
							if($cs=="Citadel" )
							{
								$csr = $csr + 1;
							}
							if($cs=="Victorian Lobby" )
							{
								$cdr = $cdr + 1;
							}
							
						
						}
				
					?>
					<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Available Hall Details
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr>
								<td><b>Magenta Banquet Hall</b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									$f1 =$sc - $csc;
									if($f1 <=0 )
									{	$f1 = "NO";
										echo $f1;
									}
									else{
											echo $f1;
									}
								
								
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Merigold Banquet Hall</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								$f2 =  $gh -$cgh;
								if($f2 <=0 )
									{	$f2 = "NO";
										echo $f2;
									}
									else{
											echo $f2;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Citadel Banquet Hall</b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php
								$f3 =$sr - $csr;
								if($f3 <=0 )
									{	$f3 = "NO";
										echo $f3;
									}
									else{
											echo $f3;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Victorian Lobby Banquet Hall</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f4 =$dr - $cdr; 
								if($f4 <=0 )
									{	$f4 = "NO";
										echo $f4;
									}
									else{
											echo $f4;
									}
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Total Halls</b> </td>
								<td> <button type="button" class="btn btn-danger btn-circle"><?php 
								
								$f5 =$r-$cr; 
								if($f5 <=0 )
									{	$f5 = "NO";
										echo $f5;
									}
									else{
											echo $f5;
									}
								 ?> </button></td> 
							</tr>
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
									$urb = "UPDATE `banquetbook` SET `stat`='$st' WHERE id = '$id'";
									if( mysqli_query($con,$urb))
									{	
										//echo "<script type='text/javascript'> alert('Guest Room booking is conform')</script>";
										//echo "<script type='text/javascript'> window.location='home.php'</script>";
										 $type_of_hall = 0;       
												if($thall=="Magenta")
												{
													$type_of_hall = 320;
												
												}
												else if($thall=="Merigold")
												{
													$type_of_hall = 220;
												}
												else if($thall=="Citadel")
												{
													$type_of_hall = 180;
												}
												else if($thall=="Victorian Lobby")
												{
													$type_of_hall = 150;
												}
												
												
												
												
												if($farrange=="Artificial")
												{
													$type_of_bed = $type_of_hall * 1/100;
												}
												else if($farrange=="Fresh")
												{
													$type_of_bed = $type_of_hall * 2/100;
												}														
												else if($farrange=="None")
												{
													$type_of_bed = $type_of_hall * 0/100;
												}
												
												
												if($light=="Stage Only")
												{
													$type_of_meal=$type_of_bed * 0;
												}
												else if($light=="Color Changing")
												{
													$type_of_meal=$type_of_bed * 2;
																												
												}else if($light=="Half Board")
												{
													$type_of_meal=$type_of_bed * 3;
												
												}else if($light=="Full Board")
												{
													$type_of_meal=$type_of_bed * 4;
												}
												
												
												$ttot = $type_of_hall* $days * $nhall;
												$mepr = $type_of_meal * $days;
												$btot = $type_of_bed *$days;
												
												$fintot = $ttot + $mepr + $btot ;
													
													//echo "<script type='text/javascript'> alert('$count_date')</script>";
												$psql = "INSERT INTO `payment`(`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`,`meal`, `mepr`, `btot`,`fintot`,`noofdays`) VALUES ('$id','$title','$fname','$lname','$troom','$bed','$nroom','$cin','$cout','$ttot','$meal','$mepr','$btot','$fintot','$days')";
												
												if(mysqli_query($con,$psql))
												{	$notfree="NotFree";
													$rpsql = "UPDATE `banquet` SET `place`='$notfree',`cusid`='$id' where seats ='$bed' and type='$thall' ";
													if(mysqli_query($con,$rpsql))
													{
													echo "<script type='text/javascript'> alert('Booking Conform')</script>";
													echo "<script type='text/javascript'> window.location='banquetbook.php'</script>";
													}
													
													
												}
										
									}
							
								
					}		
								
									if($f1=="NO" )
								{
									echo "<script type='text/javascript'> alert('Sorry! Not Available Magenta Hall ')</script>";
								}
								else if($f2 =="NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Not Available Merigold')</script>";
										
									}
									else if ($f3 == "NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Not Available Citadel')</script>";
									}
										else if($f4=="NO")
										{
										echo "<script type='text/javascript'> alert('Sorry! Not Available Victorian Lobby')</script>";
										}
										
							
					
						}
					
									
									
							
						?>