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

if ($userRow['role'] == "manager"||$userRow['role'] == "reception") {
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
                                ADMINISTRATOR<small> Employees </small>
                            </h1>
                        </div>
                    </div> 


                    <?php
                    include ('db.php');
                    if(isset($_POST['search'])){
                        $empname = $_POST['searchbox'];
                        
                        $sql = "SELECT * FROM `employee` where status = 1 and name Like '%$empname%'";
                        $re = mysqli_query($con, $sql)  ;

                    }
                    else{
                        $sql = "SELECT * FROM `employee` where status = 1";
                        $re = mysqli_query($con, $sql)  ;      
                    }
                    
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                <div class="search-container">
                    <form action="employee.php" method="post">
                    <div class="form-group">
                <input type="text" placeholder="Search.." name="searchbox" >
                <button type="submit" class="btn btn-default" name="search"><i class="fa fa-search"></i></button>
                </div>
                        </form>
                            </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Emp No</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Contact</th>
                                                    <th>Join Date</th>

                                                    <th>Update</th>                                            
                                                    <th>Change</th>
                                                    <th>Remove</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                while ($row = mysqli_fetch_array($re)) {

                                                    $id = $row['id'];
                                                    $no = $row['emp_no'];
                                                    $na = $row['name'];
                                                    $de = $row['designation'];
                                                    $co = $row['contact'];

                                                    $jd = $row['join_date'];
                                                    $act_invert = "Deactivate";
                                                    $act_vert = "Active";

                                                    if ($id % 2 == 0) {
                                                        echo"<tr class='gradeC'>
													<td>" . $id . "</td>
													<td>" . $no . "</td>
													<td>" . $na . "</td>
													<td>" . $de . "</td>
                                                                                                        <td>" . $co . "</td>
                                                                                                        <td>" . $jd . "</td>

													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=usersettingac.php?eid=" . $id . " <button class='btn btn-default'> <i class='fa fa-edit' ></i> " . $act_invert . "</button></td>
                                                                                                            													<td><a href=employeedel.php?eid=" . $id . " <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>

												</tr>";
                                                    } else {
                                                        echo"<tr class='gradeU'>
                                                                                                    
													<td>" . $id . "</td>
													<td>" . $no . "</td>
													<td>" . $na . "</td>
													<td>" . $de . "</td>
                                                                                                        <td>" . $co . "</td>
                                                                                                        <td>" . $jd . "</td>
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=employeeac.php?eid=" . $id . " <button class='btn btn-default'> <i class='fa fa-edit' ></i>  " . $act_invert . "</button></td>
                                                                                                                                                                                                                   													<td><a href=employeedel.php?eid=" . $id . " <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
   
												</tr>";
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                            <div class="panel-body">
                                <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal1">
                                    Add New Employee
                                </button>
                                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Add employee details</h4>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Add new employee no</label>
                                                        <input name="newno"  class="form-control" placeholder="Enter Employee No">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Add new employee name</label>
                                                        <input name="newname"  class="form-control" placeholder="Enter Employee Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Add contact no</label>
                                                        <input name="newcon" type="tel" class="form-control" placeholder="Enter Employee Contact">
                                                    </div>



                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <select name="newdes" class="form-control" required>
                                                                <option value="admin">ADMINISTRATOR</option>
                                                                <option value="manager">MANAGER</option>
                                                                <option value="reception">RECEPTION</option>                           
                                                        </select>                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date Joined</label>
                                                        <input name="newdate" type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="Enter date joined">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                    <input type="submit" name="in" value="Add" class="btn btn-primary">
                                                        </form>

                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php                         
                            if (isset($_POST['in'])) {
                                $newno = $_POST['newno'];
                                $newname = $_POST['newname'];
                                $newdes = $_POST['newdes'];
                                $newjd = $_POST['newdate'];
                                $newcon = $_POST['newcon'];
                                


                                $newsql = "Insert into employee (emp_no, name, join_date, designation, contact) values "
                                        . "('$newno','$newname', '$newjd', '$newdes', '$newcon')";
                                if (mysqli_query($con, $newsql)) 
                                        {
                                    echo '<script>alert("Registered Successfully") </script>' ;
                                    header("Location: employee.php");
				}else {
                                 echo '<script>alert("Sorry ! Check The System") </script>' ;
                                }
                            }
                            
                            ?>

                            <div class="panel-body">

                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Change the User name and Password</h4>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Add new employee no</label>
                                                        <input name="newno"  class="form-control" placeholder="Enter Employee No">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Add new employee name</label>
                                                        <input name="newname"  class="form-control" placeholder="Enter Employee Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Add contact sssno</label>
                                                        <input name="newcon" type="tel" class="form-control" placeholder="Enter Employee Contact">
                                                    </div>



                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <select name="newdes" class="form-control" required>
                                                                <option value="admin">ADMINISTRATOR</option>
                                                                <option value="manager">MANAGER</option>
                                                                <option value="reception">RECEPTION</option>                           
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date Joined</label>
                                                        <input name="newdate" type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" placeholder="Enter date joined">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                    <input type="submit" name="up" value="Update" class="btn btn-primary">
                                                        </form>

                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /. ROW  -->
                    <?php
                    if (isset($_POST['up'])) {
                        
                        $id = $_POST['id'];
                                $newno = $_POST['newno'];
                                $newname = $_POST['newname'];
                                $newdes = $_POST['newdes'];
                                $newjd = $_POST['newdate'];
                                $newcon = $_POST['newcon'];

                        $upsql = "UPDATE `employee` SET `emp_no`='$newno',`name`='$newname', `designation` = '$newdes', "
                                . "`contact` = '$newcon', `joined_date` = '$newjd' WHERE id = '$id'";
                        if (mysqli_query($con, $upsql)) {
                            echo' <script language="javascript" type="text/javascript"> alert("Employee updated") </script>';
                        }

                        header("Location: employee.php");
                    }
                    ob_end_flush();
                    ?>



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
