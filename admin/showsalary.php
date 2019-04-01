<?php
include('db.php');
if(isset($_POST['print'])){
    $empid = $_POST['emp'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    if($month=='1') {
        $monthdis ='January';
    }
    elseif($month=='2') {
        $monthdis ="February";
    }
    elseif($month=='3') {
        $monthdis ="March";
    }
    elseif($month=='4') {
        $monthdis ="April";
    }
    elseif($month=='5') {
        $monthdis ="May";
    }
    elseif($month=='6') {
        $monthdis ="June";
    }
    elseif($month=='7') {
        $monthdis ="July";
    }
    elseif($month=='8') {
        $monthdis ="August";
    }
    elseif($month=='9') {
        $monthdis ="September";
    }
    elseif($month=='10') {
        $monthdis ="October";
    }
    elseif($month=='11') {
        $monthdis ="November";
    }elseif($month=='12') {
        $monthdis ="December";
    }
                                                
       

    $sql2 = "SELECT * FROM employee WHERE id = '$empid'";
    $result2 = mysqli_query($con, $sql2);
    $userRow = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $sid = $userRow['id'];

}

//$email2 = $_REQUEST['sid'];
$getid = "SELECT max(id) as id FROM roombook";

//$getid = "SELECT * FROM roombook  where stat = 'Not Conform' and email = '$email2'";
$result2 = mysqli_query($con, $getid);
$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);

// $room = $row['TRoom'];
// $Bed =  $row['Bed'];
 $ava = "SELECT place FROM room  ";
$result3 = mysqli_query($con, $ava);
$row1 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$state = $row1['place'];



?>
<html id="body">
    <head>
        <meta charset="utf-8">
        <title>Details of Book key</title>

        <style>
            /* reset */

            *
            {
                border: 0;
                box-sizing: content-box;
                color: inherit;
                font-family: inherit;
                font-size: inherit;
                font-style: inherit;
                font-weight: inherit;
                line-height: inherit;
                list-style: none;
                margin: 0;
                padding: 0;
                text-decoration: none;
                vertical-align: top;
            }

            /* content editable */

            *[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

            *[contenteditable] { cursor: pointer; }

            *[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

            span[contenteditable] { display: inline-block; }

            /* heading */

            h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

            /* table */

            table { font-size: 75%; table-layout: fixed; width: 100%; }
            table { border-collapse: separate; border-spacing: 2px; }
            th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
            th, td { border-radius: 0.25em; border-style: solid; }
            th { background: #EEE; border-color: #BBB; }
            td { border-color: #DDD; }

            /* page */

            html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
            html { background: #999; cursor: default; }

            body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
            body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

            /* header */

            header { margin: 0 0 3em; }
            header:after { clear: both; content: ""; display: table; }

            header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
            header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
            header address p { margin: 0 0 0.25em; }
            header span, header img { display: block; float: right; }
            header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
            header img { max-height: 100%; max-width: 100%; }
            header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

            /* article */

            article, article address, table.meta, table.inventory { margin: 0 0 3em; }
            article:after { clear: both; content: ""; display: table; }
            article h1 { clip: rect(0 0 0 0); position: absolute; }

            article address { float: left; font-size: 125%; font-weight: bold; }

            /* table meta & balance */

            table.meta, table.balance { float: right; width: 36%; }
            table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

            /* table meta */

            table.meta th { width: 40%; }
            table.meta td { width: 60%; }

            /* table items */

            table.inventory { clear: both; width: 100%; }
            table.inventory th { font-weight: bold; text-align: center; }

            table.inventory td:nth-child(1) { width: 26%; }
            table.inventory td:nth-child(2) { width: 38%; }
            table.inventory td:nth-child(3) { text-align: right; width: 12%; }
            table.inventory td:nth-child(4) { text-align: right; width: 12%; }
            table.inventory td:nth-child(5) { text-align: right; width: 12%; }

            /* table balance */

            table.balance th, table.balance td { width: 50%; }
            table.balance td { text-align: right; }

            /* aside */

            aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
            aside h1 { border-color: #999; border-bottom-style: solid; }

            /* javascript */

            .add, .cut
            {
                border-width: 1px;
                display: block;
                font-size: .8rem;
                padding: 0.25em 0.5em;	
                float: left;
                text-align: center;
                width: 0.6em;
            }

            .add, .cut
            {
                background: #9AF;
                box-shadow: 0 1px 2px rgba(0,0,0,0.2);
                background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
                background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
                border-radius: 0.5em;
                border-color: #0076A3;
                color: #FFF;
                cursor: pointer;
                font-weight: bold;
                text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
            }

            .add { margin: -2.5em 0 0; }

            .add:hover { background: #00ADEE; }

            .cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
            .cut { -webkit-transition: opacity 100ms ease-in; }

            tr:hover .cut { opacity: 1; }

            @media print {
                * { -webkit-print-color-adjust: exact; }
                html { background: none; padding: 0; }
                body { box-shadow: none; margin: 0; }
                span:empty { display: none; }
                .add, .cut { display: none; }
            }

            @page { margin: 0; }
        </style>

    </head>
    <body  >




        <?php
        ob_start();
        include ('db.php');

        $pid = $sid;



        $sql = "select * from employee where id = '$sid' ";
        $re = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($re)) {
            $id = $row['id'];
            $empno = $row['emp_no'];
            $name = $row['name'];
            $join = $row['join_date'];
            $state = $row['status'];
            $designation = $row['designation'];
            $contact = $row['contact'];
            if($designation=='admin'){
                $payrate=200;
                $nopayrate=200;
                
            }
            elseif($designation=='manager'){
                $payrate=1500;
                $nopayrate=200;
                
            }
            elseif($designation=='reception'){
                $payrate=1200;
                $nopayrate=150;
                
            }
            else{
                $payrate=1000;
                $nopayrate=100;
                
            }

            
        }
        $paytime=$year.'-'.$month;
        $days = "select * from attendance where emp_id = '$sid' and status='In' and date LIKE '$paytime%' ";
        $dayrow = mysqli_query($con, $days);
        $noofdays = 0;
        while ($row = mysqli_fetch_array($dayrow)) {
           $noofdays ++;
            
        }

        ?>
        <header>
            <h1>Monthly Payment For <?php 
            echo $year;
            echo ' ';
            echo $monthdis;


            
            ?>
            </h1>
            <address >
                <p>HORTAIN RISE HOTEL,</p>
                <p>Hortain Plain Road,<br>Nuwaraeliya,<br>Sri Lanka.</p>
                <p>(+94) 65 222 44 55</p>
            </address>
            <span><img alt="" src="assets/img/hortain.png"></span>
        </header>

        <form method="post" action="">
            <input hidden="" value="<?php echo $sid; ?>" name="pid"/>

            <a href="../"><input type="button" style="background: #0078A5; color: #fff; padding: 5px"   name="add" value="Back To Home" class="btn btn-primary"> </a>

            <input type="button" style="background: #0078A5; color: #fff; padding: 5px" onclick="printel()" name="add" value="Print Invoice" class="btn btn-primary"> 
        </form>

        <article>
            <h1></h1>
            <address >

                <p><br></p>
                <p>Employee Name  : -  <?php echo $name ?><br></p>
                <!-- <p>Availability : -  <?php echo $state; ?><br></p> -->
            </address>
            <table class="meta">
                <tr>
                    <th><span >Employee No</span></th>
                    <td><span ><?php echo $empno; ?> </span></td>
                </tr>
                <tr>
                    <th><span >Working Days</span></th>
                    <td><span >20 </span></td>
                </tr>
                <tr>
                    <th><span >Present Days</span></th>
                    <td><span ><?php echo $noofdays; ?> </span></td>
                </tr>
                <tr>
                    <th><span >Absent Days</span></th>
                    <td><span ><?php echo (20-$noofdays); ?> </span></td>
                </tr>
                <tr>
                    <th><span >Approved Leaves</span></th>
                    <td><span >3 </span></td>
                </tr>
                <tr>
                    <th><span >NoPay Leaves</span></th>
                    <td><span ><?php 
                    $nopay =17-$noofdays;
                    if($nopay<0){
                        $nopay = 0;
                    }
                    echo $nopay ?> </span></td>
                </tr>

            </table>



            <table >
                <tr> 
                    <td>Employee Contact Number : -  <?php echo $contact; ?> </td>

                    <td style="text-transformation:uppercase">Employee Designation : -  <?php echo $designation; ?> </td>
                </tr>
                <tr> 
                    <td>Joined Date : -  <?php echo $join; ?> </td>
                    <td>Status: -  <?php if($state=='1'){
                        echo 'Active';
                    }
                    else{
                        echo 'Deactive';
                    } ?> </td>
                </tr>
            </table>
            <br>
            <br>
            <table class="inventory">
                <thead>
                    <tr>
                        <th><span >Reason</span></th>
                        <th><span >No of Days</span></th>
                        <th><span >Rate</span></th>
                        <th><span >Total</span></th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><span >Payments For Present Days</span></td>
                        <td><span ><?php echo $noofdays; ?> </span></td>
                        <td><span >Rs.<?php echo $payrate; ?>.00 </span></td>
                        <td><span >Rs.<?php $totalpay = $noofdays*$payrate;
                        
                        echo $totalpay; ?>.00 </span></td>

                    </tr>
                    <tr>
                        <td><span >Deductions For No Pay Leaves</span></td>
                        <td><span ><?php echo $nopay; ?> </span></td>
                        <td><span >Rs.<?php echo $nopayrate; ?>.00</span></td>
                        <td><span >Rs.<?php $totalnopay =$nopay*$nopayrate;
                        
                        echo $totalnopay; ?>.00</span></td>

                    </tr>
                    <tr>
                        <th colspan='3'><span ><b>Total Payment</b></span></th>
                          <th><span>Rs.<?php $total =$totalpay-$totalnopay;
                        
                        echo $total; ?>.00 </span></th>

                    </tr>
                    
                </tbody>
            </table>


        </article>
        <aside>
            <h1><span >Contact us</span></h1>
            <div >
                <p align="center">Email :- info@hortainrise.com || Web :- www.hortainrise.com || Phone :- +94 52 222 44 55 </p>



                <?php
                if (isset($_POST['pay'])) {
                    $st = 'conform';



                    if ($st == "Conform") {
                        $urb = "UPDATE `roombook` SET `stat`='$st' WHERE id = '$pid'";

                        if ($f1 == "NO") {
                            echo "<script type='text/javascript'> alert('Sorry! Not Available Superior Room ')</script>";
                        } else if ($f2 == "NO") {
                            echo "<script type='text/javascript'> alert('Sorry! Not Available Guest House')</script>";
                        } else if ($f3 == "NO") {
                            echo "<script type='text/javascript'> alert('Sorry! Not Available Single Room')</script>";
                        } else if ($f4 == "NO") {
                            echo "<script type='text/javascript'> alert('Sorry! Not Available Deluxe Room')</script>";
                        } else if (mysqli_query($con, $urb)) {
                            //echo "<script type='text/javascript'> alert('Guest Room booking is conform')</script>";
                            //echo "<script type='text/javascript'> window.location='home.php'</script>";
                            $type_of_room = 0;
                            if ($troom == "Superior Room") {
                                $type_of_room = 320;
                            } else if ($troom == "Deluxe Room") {
                                $type_of_room = 220;
                            } else if ($troom == "Guest House") {
                                $type_of_room = 180;
                            } else if ($troom == "Single Room") {
                                $type_of_room = 150;
                            }




                            if ($bed == "Single") {
                                $type_of_bed = $type_of_room * 1 / 100;
                            } else if ($bed == "Double") {
                                $type_of_bed = $type_of_room * 2 / 100;
                            } else if ($bed == "Triple") {
                                $type_of_bed = $type_of_room * 3 / 100;
                            } else if ($bed == "Quad") {
                                $type_of_bed = $type_of_room * 4 / 100;
                            } else if ($bed == "None") {
                                $type_of_bed = $type_of_room * 0 / 100;
                            }


                            if ($meal == "Room only") {
                                $type_of_meal = $type_of_bed * 0;
                            } else if ($meal == "Breakfast") {
                                $type_of_meal = $type_of_bed * 2;
                            } else if ($meal == "Half Board") {
                                $type_of_meal = $type_of_bed * 3;
                            } else if ($meal == "Full Board") {
                                $type_of_meal = $type_of_bed * 4;
                            }


                            $ttot = $type_of_room * $days * $nroom;
                            $mepr = $type_of_meal * $days;
                            $btot = $type_of_bed * $days;

                            $fintot = $ttot + $mepr + $btot;

                            //echo "<script type='text/javascript'> alert('$count_date')</script>";
                            $psql = "INSERT INTO `payment`(`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`,`meal`, `mepr`, `btot`,`fintot`,`noofdays`) VALUES ('$id','$title','$fname','$lname','$troom','$bed','$nroom','$cin','$cout','$ttot','$meal','$mepr','$btot','$fintot','$days')";

                            if (mysqli_query($con, $psql)) {
                                $notfree = "NotFree";
                                $rpsql = "UPDATE `room` SET `place`='$notfree',`cusid`='$id' where bedding ='$bed' and type='$troom' ";
                                if (mysqli_query($con, $rpsql)) {
                                    echo "<script type='text/javascript'> alert('Booking Conform')</script>";
                                    echo "<script type='text/javascript'> window.location='pay.php?sid=" . $sid . "'</script>";
                                }
                            }
                        }
                    }
                }
                ?>


            </div>
        </aside>
    </body>
</html>

<?php
ob_end_flush();
?>
<script>

function printel(){
    var w = window.open('', 'PRINT', 'height=3508, width = 2480');
    w.document.write(document.getElementById("body").innerHTML);
    w.document.close();
    w.focus();
    w.print();
    w.close();
    return true;
}

</script>