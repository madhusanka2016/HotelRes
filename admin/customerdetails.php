<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}


include('db.php');

$user_id = $_SESSION['user_id'];
$sql2 = "SELECT * FROM login WHERE id = '$user_id'";
$result2 = mysqli_query($con, $sql2);
$userRow = mysqli_fetch_array($result2, MYSQLI_ASSOC);

if ($userRow['role'] == "reception") {
    header("location:home.php");
}

$Page_title = 'HORTAINRISE HOTEL';

ob_start();
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $Page_title ?> </title>
        <!-- Bootstrap Styles-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FontAwesome Styles-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
        <link href="assets/css/custom-styles.css" rel="stylesheet" />
        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    </head>
    <body id="print">
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
                            
                    <li>
                        <a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                    </li>
					<li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                    <li>
                        <a href="profit_rep.php"><i class="fa fa-sign-out fa-fw"></i> Profit Report</a>
                    </li>
                    <li>
                        <a class="active-menu" href="employee.php"><i class="fa fa-sign-out fa-fw"></i> Employee</a>
                    </li>
                    <li>
                        <a  href="attendance.php"><i class="fa fa-sign-out fa-fw"></i> Employee Attendance</a>
                    </li>
                            <li>
                                <a  href="customerdetails.php"><i class="fa fa-sign-out fa-fw"></i> Customer Details</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                ADMINISTRATOR<small> Customers </small>
                            </h1>
                        </div>
                    </div> 


                  

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>FName</th>
                                                    <th>LName</th>
                                                    <th>Email</th>
                                                    <th>National</th>
                                                    <th>Country</th>
                                                    <th>Phone</th>
                                                    <th>Edit</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                    <?php
                    
                    $sql = "SELECT * FROM roombook";
                    $re = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($re)) {

                        
                        $id = $row['id'];
                        echo '
                        
                        
                        <div class="modal fade" id="edit'. $row['id'] .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Customer Details - '. $row['id'] .'</h4>
                                    </div>
                                    <form method="post">
                                            
                                        <div class="modal-body">
                                                <div class="form-group">
                                                <label>Title*</label>
                                                <select name="title" class="form-control" required >
                                                    <option value selected ></option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Miss.">Miss.</option>
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                    <option value="Prof.">Prof.</option>
                                                    <option value="Rev .">Rev .</option>
                                                    <option value="Rev . Fr">Rev . Fr .</option>
                                                </select>
                                                </div>
                                                <div class="form-group">
                                            <label>First Name</label>
                                            <input name="fname" class="form-control" required>
                                            
                                            </div>
                                            <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input name="lname" class="form-control" required>
                                                            
                                            </div>
                                            <div class="form-group">
                                                            <label>Email</label>
                                                            <input name="email" type="email" class="form-control" required>
                                                            
                                            </div>
                                            <div class="form-group">
                                                            <label>Nationality*</label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="nation"  value="Sri Lankan" checked="">Sri Lankan
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="nation"  value="Non Sri Lankan ">Non Sri Lankan 
                                                            </label>
                                        
                                                </div>
                                            

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                            <input type="submit" name="in" value="Add" class="btn btn-primary">
                                                </form>

                                        </div>
                                </div>
                            </div>
                       ';

    if ($id % 2 == 1) {
        echo"<tr class='gradeC'>
            
													<td>" . $row['id'] . " </td>
													<td>" . $row['Title'] . "</td>
                                                                                                        <td> " . $row['FName'] . "</td> 
                                                                                                        <td>" . $row['LName'] . "</td>
													<td>" . $row['Email'] . "</td>
													<td>" . $row['National'] . "</td>
                                                                                                        <td>" . $row['Country'] . "</td>
                                                                                                        <td>" . $row['Phone'] . "</td>
                                                                                                        <td><button class='btn btn-primary btn' data-toggle='modal' data-target='#edit". $row['id'] ."'> Edit </buttpn></td>
													</tr>";
    } else {
        echo"<tr class='gradeU'>
													<td>" . $row['id'] . " </td>
													<td>" . $row['Title'] . "</td>											
													<td>" . $row['FName'] . "</td>
													<td>" . $row['LName'] . "</td>
													<td>" . $row['Email'] . "</td>
													<td>" . $row['National'] . "</td>
													<td>" . $row['Country'] . "</td>
                                                    <td>" . $row['Phone'] . "</td>	
                                                    <td><button class='btn btn-primary btn' data-toggle='modal' data-target='#edit". $row['id'] ."'> Edit </buttpn></td>
													</tr>";
                                      
                                                    }
                                                }
                                                ?>
                 <header>
                    <h1><center>Customer Report</center></h1>
			
                    <p align="right"><span><img alt="" src="assets/img/hortain.png">
                        </span></p>
                    <address >				
				<p>HORTAIN RISE HOTEL,<br>Horton Plain Road,<br>Nuwaraeliya,<br>Sri Lanka.</p>
				<p>(+94) 65 222 44 55</p>
			</address>
		</header>

                                            </tbody>
                                        </table>
                                    </div>
                                        <a href="customerdetailsprint.php"> <input type="button" name="add" value="Print" class="btn btn-primary">   </a>                                            
                                </div>
                            </div>
                            <!--End Advanced Tables -->




                    <!-- /. PAGE INNER  -->
                                        </div>
                                        <!-- /. PAGE WRAPPER  -->
                                        <!-- /. WRAPPER  -->
                                        <!-- JS Scripts-->
                                        <!-- jQuery Js -->
                                        <script src="assets/js/jquery-1.10.2.js"></script>
                                        <!-- Bootstrap Js -->
                                        <script src="assets/js/bootstrap.min.js"></script>
                                        <!-- Metis Menu Js -->
                                        <script src="assets/js/jquery.metisMenu.js"></script>
                                        <!-- DATA TABLE SCRIPTS -->
                                        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
                                        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $('#dataTables-example').dataTable();
                                            });
                                        </script>
                                        <!-- Custom Js -->
                                        <script src="assets/js/custom-scripts.js"></script>
                                        </body>
                                        </html>
                                        <script>
                                            Morris.Bar({
                                                element: 'chart',
                                                data: [<?php echo $chart_data; ?>],
                                                xkey: 'date',
                                                ykeys: ['profit'],
                                                labels: ['Profit'],
                                                hideHover: 'auto',
                                                stacked: true
                                            });
                                        </script>

<script>

function printel(){
    var w = window.open('', 'PRINT', 'height=3508, width = 2480');
    w.document.write(document.getElementById("print").innerHTML);
    w.document.close();
    w.focus();
    w.print();
    w.close();
    return true;
}

</script>