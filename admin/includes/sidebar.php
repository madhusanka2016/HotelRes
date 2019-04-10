<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <?php 
                    include('db.php');
                    if(isset($_SESSION['user'])){
                        $user_id = $_SESSION['user_id'];
                        $sql2 = "SELECT * FROM login WHERE id = '$user_id'";
                        $result2 = mysqli_query($con, $sql2);
                        $userRow = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                        
                        if ($userRow['role'] == "reception" || $userRow['role'] == "manager") {
                            echo'
                        
                            <li>
                            <a href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                            </li>
                            
                            ';
                        }
                        
                            echo'
                        
                            <li>
                        <a href="roombooking.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
                    </li>
                            ';
                        
                        
                            echo'
                        
                            <li>
                        <a href="banquetBooking.php"><i class="fa fa-bar-chart-o"></i> Banquet Hall Booking</a>
                    </li>
                            
                            ';
                            echo'
                        
                            <li>
                        <a href="poolbooking.php"><i class="fa fa-bar-chart-o"></i>Swimming Pool Booking</a>
                    </li>
                            
                            ';
                            echo'
                        
                            <li>
                        <a href="cafebooking.php"><i class="fa fa-bar-chart-o"></i> Cafetaria Booking</a>
                    </li>
                            
                            ';
                            
                                echo'
                            
                                <li>
                            <a href="payment.php"><i class="fa fa-qrcode"></i> Payment For Rooms</a>
                        </li>
                                
                                ';
                           
                        
                        
                            echo'
                        
                            <li>
                        <a href="banquetPayment.php"><i class="fa fa-qrcode"></i>Payment for Banquet Halls</a>
                    </li>
                            
                            ';
                            echo'
                        
                            <li>
                        <a href="poolPayment.php"><i class="fa fa-qrcode"></i>Payment for Swimming Pool</a>
                    </li>
                            
                            ';
                            echo'
                        
                            <li>
                        <a href="cafePayment.php"><i class="fa fa-qrcode"></i>Payment for Cafetaria</a>
                    </li>
                            
                            ';
                        
                        
                        if ($userRow['role'] == "admin" || $userRow['role'] == "manager") {
                            echo'
                        
                            <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                            
                            ';
                        }
                        if ($userRow['role'] == "admin" || $userRow['role'] == "manager") {
                            echo'
                        
                            <li>
                        <a href="profit_rep.php"><i class="fa fa-sign-out fa-fw"></i> Profit Report</a>
                    </li>
                            
                            ';
                        }
                        if ($userRow['role'] == "admin") {
                            echo'
                        
                            <li>
                        <a href="employee.php"><i class="fa fa-sign-out fa-fw"></i> Employee</a>
                    </li>
                            
                            ';
                        }
                        if ($userRow['role'] == "admin" || $userRow['role'] == "manager") {
                            echo'
                        
                            <li>
                        <a href="attendance.php"><i class="fa fa-sign-out fa-fw"></i> Employee Attendance</a>
                    </li>
                            
                            ';
                        }
                        if ($userRow['role'] == "admin") {
                            echo'
                        
                            <li>
                        <a href="salary.php"><i class="fa fa-sign-out fa-fw"></i> Employee Salary</a>
                    </li>
                            
                            ';
                        }
                        if ($userRow['role'] == "admin") {
                            echo'
                        
                            <li>
                             
                        <a href="customerdetails.php"><i class="fa fa-sign-out fa-fw"></i> Customer Details</a>
                    </li>
                            
                            ';
                        }
                        echo'
                        
                        <li>
                    <a href="followers.php"><i class="fa fa-qrcode"></i>Followers</a>
                </li>
                        
                        ';
                        }
                    
                    
                    
                    ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    
                   


                    
					</ul>

            </div>

        </nav>