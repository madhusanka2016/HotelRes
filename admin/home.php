<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}

$Page_title = 'Administrator';

?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $Page_title ?>	</title>
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
                            Status <small>Home Page</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
						include ('db.php');
						$sql = "select * from roombook";
						$re = mysqli_query($con,$sql);
						$rn =0;
						while($row=mysqli_fetch_array($re) )
						{
								$new = $row['stat'];
								$cin = $row['cin'];
								$id = $row['id'];
								if($new=="Not Conform")
								{
									$rn = $rn + 1;
									
								
								}
						
						}
						
									
									

						
				?>

					<div class="row">
                <div class="col-md-12">
                    
                      <!-- End  Basic Table  --> 
                                        </div>
                                    </div>
                                

								<?php
								
								$rsql = "SELECT * FROM `roombook`";
								$rre = mysqli_query($con,$rsql);
								$rc =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Conform")
										{
											$rc = $rc + 1;
											
											
											
										}
										
								
								}
						
								?>
									<?php
								
								$rsql = "SELECT * FROM `roombook`";
								$rre = mysqli_query($con,$rsql);
								$rr =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Reject")
										{
											$rr = $rr + 1;
											
											
											
										}
										
								
								}
						
								?>
                                
                
								<?php
								
								$rsql = "SELECT * FROM `banquetbook`";
								$rre = mysqli_query($con,$rsql);
								$hn =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Not Conform")
										{
											$hn = $hn + 1;
											
											
											
										}
										
								
								}
						
								?>
                                
                                
								<?php
								
								$rsql = "SELECT * FROM `banquetbook`";
								$rre = mysqli_query($con,$rsql);
								$hc =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Conform")
										{
											$hc = $hc + 1;
											
											
											
										}
										
								
								}
								?>
                                
                                
								<?php
								
								$rsql = "SELECT * FROM `banquetbook`";
								$rre = mysqli_query($con,$rsql);
								$hr =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Reject")
										{
											$hr = $hr + 1;
											
											
											
										}
										
								
								}
								?>
                                
                                
                                
                                
                                        
									
                                        
										<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Room Bookings 
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr>
								<td width="200px"><b>New 	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $rn;
								
								
								
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Confirmed </b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $rc;
								
								
								
								?> </button></td>
							</tr>
							<tr>
								<td><b>Rejected	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $rr;
								
								
								
								?> </button></td>
							</tr>
							
							
						</table>
						
						
						
                        
						
						</div>
						<div class="panel-heading">
                            Banquet Hall  Bookings 
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr >
								<td width="200px"><b>New 	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $hn;
								
								
								
								?> </button></td>
							</tr>
							<tr>
								<td><b>Confirmed </b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $hc;
								
								
								
								?> </button></td>
							</tr>
							<tr>
								<td><b>Rejected 	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $hr;
								
								
								
								?> </button></td>
							</tr>
							
							
						</table>
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>

					<?php
								
								$rsql = "SELECT * FROM `cafebook`";
								$rre = mysqli_query($con,$rsql);
								$cn =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Not Conform")
										{
											$cn = $cn + 1;
											
											
											
										}
										
								
								}
								?>
								<?php
								
								$rsql = "SELECT * FROM `cafebook`";
								$rre = mysqli_query($con,$rsql);
								$cc =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Conform")
										{
											$cc = $cc + 1;
											
											
											
										}
										
								
								}
								?>

<?php
								
								$rsql = "SELECT * FROM `cafebook`";
								$rre = mysqli_query($con,$rsql);
								$cr =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Reject")
										{
											$cr = $cr + 1;
											
											
											
										}
										
								
								}
								?>
								<?php
								
								$rsql = "SELECT * FROM `poolbook`";
								$rre = mysqli_query($con,$rsql);
								$pn =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Not Conform")
										{
											$pn = $pn + 1;
											
											
											
										}
										
								
								}
								?>
								<?php
								
								$rsql = "SELECT * FROM `poolbook`";
								$rre = mysqli_query($con,$rsql);
								$pc =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Conform")
										{
											$pc = $pc + 1;
											
											
											
										}
										
								
								}
								?>
								<?php
								
								$rsql = "SELECT * FROM `poolbook`";
								$rre = mysqli_query($con,$rsql);
								$pr =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$br = $row['stat'];
										if($br=="Reject")
										{
											$pr = $pr + 1;
											
											
											
										}
										
								
								}
								?>
					<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Cafetaria Bookings 
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr>
								<td width="200px"><b>New 	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $cn;
								
								
								
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Confirmed </b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $cc;
								
								
								
								?> </button></td>
							</tr>
							<tr>
								<td><b>Rejected	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $cr;
								
								
								
								?> </button></td>
							</tr>
							
							
						</table>
						
						
						
                        
						
						</div>
						<div class="panel-heading">
                            Swimming Pool  Bookings 
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr >
								<td width="200px"><b>New 	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $pn;
								
								
								
								?> </button></td>
							</tr>
							<tr>
								<td><b>Confirmed </b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $pc;
								
								
								
								?> </button></td>
							</tr>
							<tr>
								<td><b>Rejected 	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $pr;
								
								
								
								?> </button></td>
							</tr>
							
							
						</table>
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
					<?php
								
								$rsql = "SELECT * FROM `room`";
								$rre = mysqli_query($con,$rsql);
								$sinr =0;
								$supr =0;
								$dr =0;
								$gr =0;
								while($row=mysqli_fetch_array($rre) )
								{		
										$stat = $row['place'];
										$room = $row['type'];

										if($stat=="Free")
										{

											if($room=="Superior Room")
											{
											$sinr = $sinr + 1;	
											}
											elseif($room=="Single Room")
											{
											$supr = $supr + 1;	
											}
											elseif($room=="Deluxe Room")
											{
											$dr = $dr + 1;	
											}
											elseif($room=="Guest House")
											{
											$gr = $gr + 1;	
											}
											
											
											
										}
										
								
								}
								?>
					<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Available Room Details
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr>
								<td><b>Superior Room	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $supr;
								
								
								
								?> </button></td>
							</tr>
							<tr>
								<td><b>Guest House</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $gr;
								
								
								
								?> </button></td>
							</tr>
							<tr>
								<td><b>Single Room	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $sinr;
								
								
								
								?> </button></td>
							</tr>
							<tr>
								<td><b>Deluxe Room</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									
											echo $dr;
								
								
								
								?> </button></td>
							</tr>
							
						</table>
						
						
						
                        
						
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>

                <!-- /. ROW  -->
				
            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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