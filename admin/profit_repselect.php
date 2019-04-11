<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
include('db.php');

$user_id = $_SESSION['user_id'];
$sql2 = "SELECT * FROM login WHERE id = '$user_id'";
$result2 = mysqli_query($con, $sql2);
$userRow = mysqli_fetch_array($result2, MYSQLI_ASSOC);

if ($userRow['role'] != "admin" || $userRow['role'] != "admin") {
    header("location:home.php");
}
$Page_title = 'HORTAINRISE HOTEL - Salary';





?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $Page_title ?></title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
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
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Profit Report <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Select Duration
                        </div>
                        <div class="panel-body">
						<form name="form" method="post" action="profit_repdir.php">
                        <div class="form-group">
                                            <label>Type</label>
                                            <select name="type" class="form-control" required>
                                                        <option value="room">Room Booking  </option>
                                                        <option value="hall">Banquet Hall Booking </option>
                                                        <option value="cafe">Cafetaria Booking </option>
                                                        <option value="pool">Swimming Pool Booking </option>
                                                                          
                                            </select>
                                            
                               </div>
							  
								<div class="form-group">
                                            <label>Year</label>
                                            <select name="year" class="form-control" required>
                                            <option value="2018">2018 </option>
                                                        <option value="2019">2019 </option>
                                                        <option value="2020">2020 </option>
                                                        <option value="2021">2021 </option>
                                                        <option value="2022">2022 </option>
                                                        <option value="2023">2023 </option>
                                                        <option value="2024">2024 </option>
                                                        <option value="2025">2025 </option>
                                                        <option value="2026">2026 </option>
                                                        <option value="2027">2027 </option>
                                                        <option value="2028">2028 </option>
                                                        <option value="2029">2029 </option>
                                                        <option value="2030">2030 </option>                         
                                            </select>
                                            
                               </div>
                               <div class="form-group">
                                            <label>Month</label>
                                            <select name="month" class="form-control" required>
                                            
                                                        <option value="01" >January </option>
                                                        <option value="02" >February </option>
                                                        <option value="03" >March </option>
                                                        <option value="04" >April </option>
                                                        <option value="05" >May</option>
                                                        <option value="06" >June </option>
                                                        <option value="07" >July </option>
                                                        <option value="08" >August </option>
                                                        <option value="09" >September </option>
                                                        <option value="10" >October </option>
                                                        <option value="11" >November </option>
                                                        <option value="12" >December </option>                         
                                            </select>
                                            
                               </div>
                               <div class="form-group">
                                            <label>date</label>
                                            <select name="date" class="form-control" >
                                                        <option value="" selected> </option>
                                                        <option value="01">01 </option>
                                                        <option value="02">02 </option>
                                                        <option value="03">03 </option>
                                                        <option value="04">04 </option>
                                                        <option value="05">05 </option>
                                                        <option value="06">06 </option>
                                                        <option value="07">07 </option>
                                                        <option value="08">08 </option>
                                                        <option value="09">09 </option>
                                                        <option value="10">10 </option>
                                                        <option value="11">11 </option>
                                                        <option value="12">12 </option>
                                                        <option value="13">13 </option>
                                                        <option value="14">14 </option>
                                                        <option value="15">15 </option>
                                                        <option value="16">16 </option>
                                                        <option value="17">17 </option>
                                                        <option value="18">18 </option>
                                                        <option value="19">19 </option>
                                                        <option value="20">20 </option>
                                                        <option value="21">21 </option>
                                                        <option value="22">22 </option>
                                                        <option value="23">23 </option>
                                                        <option value="24">24 </option>
                                                        <option value="25">25 </option>
                                                        <option value="26">26 </option>
                                                        <option value="27">27 </option>
                                                        <option value="28">28 </option>
                                                        <option value="29">29 </option>
                                                        <option value="30">30 </option>
                                                        <option value="31">31 </option>
                                                                                 
                                            </select>
                                            
                               </div>
							 <input type="submit" name="generate" value="Genarate" class="btn btn-primary"> 
							</form>
							
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
