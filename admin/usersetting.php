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

if ($userRow['role'] == "reception"||$userRow['role'] == "manager") {
    header("location:home.php");
}

ob_start();
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>HORTAINRISE HOTEL</title>
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
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">

                        <li>
                            <a class="active-menu" href="settings.php"><i class="fa fa-dashboard"></i>User Dashboard</a>
                        </li>




                </div>

            </nav>
            <!-- /. NAV SIDE  -->

            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">
                                ADMINISTRATOR<small> accounts </small>
                            </h1>
                        </div>
                    </div> 


                    <?php
                    include ('db.php');
                    $sql = "SELECT * FROM `login`";
                    $re = mysqli_query($con, $sql)
                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>User name</th>
                                                    <th>Password</th>

                                                    <th>Role</th>
                                                    <th>Status</th>                                            
                                                    <th>Update</th>                                            
                                                    <th>Change</th>
                                                    <th>Remove</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                while ($row = mysqli_fetch_array($re)) {

                                                    $id = $row['id'];
                                                    $us = $row['usname'];
                                                    $ps = $row['pass'];
                                                    $rl = $row['role'];

                                                    $ac = $row['active'];
                                                    $act_vert = "Active";

                                                    $act_invert = "Deactivate";

                                                    if ($ac == "0") {
                                                        $act_vert = "Deactive";
                                                        $act_invert = "Activate";
                                                    }

                                                    if ($id % 2 == 0) {
                                                        echo"<tr class='gradeC'>
													<td>" . $id . "</td>
													<td>" . $us . "</td>
													<td>" . $ps . "</td>
													<td>" . $rl . "</td>
                                                                                                        <td>" . $act_vert . "</td>
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=usersettingac.php?eid=" . $id . " <button class='btn btn-default'> <i class='fa fa-edit' ></i> " . $act_invert . "</button></td>
                                                                                                            													<td><a href=usersettingdel.php?eid=" . $id . " <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>

												</tr>";
                                                    } else {
                                                        echo"<tr class='gradeU'>
												<td>" . $id . "</td>
													<td>" . $us . "</td>
													<td>" . $ps . "</td>
													<td>" . $rl . "</td>
                                                                                                        <td>" . $act_vert . "</td>
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=usersettingac.php?eid=" . $id . " <button class='btn btn-default'> <i class='fa fa-edit' ></i>  " . $act_invert . "</button></td>
                                                                                                                                                                                                                   													<td><a href=usersettingdel.php?eid=" . $id . " <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
   
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
                                    Add New Admin
                                </button>
                                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Add the User name and Password</h4>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Add new User name</label>
                                                        <input name="newus"  class="form-control" placeholder="Enter User name">
                                                    </div>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>User Role</label>

                                                        <select name="newrl" class="form-control">
                                                            <option value="admin">Admin</option>
                                                            <option value="manager">Manager</option>
                                                            <option value="reception">Reception</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input name="newps"  class="form-control" placeholder="Enter Password">
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
    $newus = $_POST['newus'];
    $newps = $_POST['newps'];
    $newrl = $_POST['newrl'];

    $newsql = "Insert into login (usname,pass, role) values ('$newus','$newps', '$newrl')";
    if (mysqli_query($con, $newsql)) {
        echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
    }
    header("Location: usersetting.php");
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
                                                        <label>Change User name</label>
                                                        <input name="usname" value="<?php echo $us; ?>" class="form-control" placeholder="Enter User name">
                                                    </div>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>User Role</label>

                                                        <select name="newrl" class="form-control">
                                                            <option value="<?php echo $rl; ?>"><?php echo $rl; ?></option>

                                                            <option value="admin">Admin</option>
                                                            <option value="manager">Manager</option>
                                                            <option value="reception">Reception</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Change Password</label>
                                                        <input name="pasd" value="<?php echo $ps; ?>" class="form-control" placeholder="Enter Password">
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
    $usname = $_POST['usname'];
    $passwr = $_POST['pasd'];
    $uprl = $_POST['newrl'];

    $upsql = "UPDATE `login` SET `usname`='$usname',`pass`='$passwr', role = '$uprl' WHERE id = '$id'";
    if (mysqli_query($con, $upsql)) {
        echo' <script language="javascript" type="text/javascript"> alert("User name and password update") </script>';
    }

    header("Location: usersetting.php");
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
