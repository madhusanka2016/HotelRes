<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}

include('db.php');


$Page_title = 'Administrator';
if(!isset($_GET["id"]))
		{
				
			 header("location:home.php");
		}
		else {
				
				;
                $range = $_GET['id'];
        }

?> 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $Page_title ?>HORTAINRISE HOTEL</title>
        <!-- Bootstrap Styles-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FontAwesome Styles-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />

        
        <link rel="stylesheet" href="assets/css/morris.css">
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js//raphael-min.js"></script>
            <script src="assets/js/morris.min.js"></script>


            <!-- Custom Styles-->
            <link href="assets/css/custom-styles.css" rel="stylesheet" />
            <!-- Google Fonts-->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
            <!-- TABLE STYLES-->
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
                    <a class="navbar-brand" href="home.php"><?php echo $_SESSION["user"]; ?> </a>
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
                                Profit Report<small> On <?php echo $range?> </small>
                            </h1>
                        </div>
                    </div> 
                    <!-- /. ROW  -->


                    <div class="row">

                                        <div class="col-md-12">
                                            <!-- Advanced Tables -->
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div id="print" class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Date</th>
            
                                                                    <th>Profit</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>

<?php
$sql = "select * from cafebook where cinDate like '$range%'  ";
$re = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($re)) {

    $id = $row['id'];

    if ($id % 2 == 1) {
        echo"<tr class='gradeC'>
													<td>" . $row['id'] . " </td>
													<td>" . $row['Title'] . " " . $row['FName'] . " " . $row['LName'] . "</td>
													<td>" . $row['cinDate'] . "</td>
													
													
													
													
													<td>$" . $row['payment'] . "</td>
													
													</tr>";
    } else {
        echo"<tr class='gradeU'>
        <td>" . $row['id'] . " </td>
													<td>" . $row['Title'] . " " . $row['FName'] . " " . $row['LName'] . "</td>
													<td>" . $row['cinDate'] . "</td>
													
													
													
													
													<td>$" . $row['payment'] . "</td>
													</tr>";
    }
}
?>
                <header>
                    <h1><center>Profit Report - Cafetaria Booking</center></h1>
			
                    <p align="right"><span><img alt="" src="assets/img/hortain.png">
                        </span></p>
                    <address >				
				<p>HORTAIN RISE HOTEL,<br>Horton Plain Road,<br>Nuwaraeliya,<br>Sri Lanka.</p>
				<p>(+94) 65 222 44 55</p>
			</address>
		</header>
		<article>
			

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <a href="profit_repcafeprint.php?id=<?php echo $range?>";><button class="btn academy-btn mt-30" >Print</button> </a>
                                                </div>
                                            </div>
                                            <!--End Advanced Tables -->
                                        </div>
                                        </div>
                                        <!-- /. ROW  -->

                                        </div>

                                        </div>


                                        </div>
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