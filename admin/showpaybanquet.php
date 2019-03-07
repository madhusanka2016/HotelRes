<?php
include('db.php');

$email2 = $_REQUEST['sid'];

$getid = "SELECT id FROM banquetbook  where stat = 'Not Conform' and Email = '$email2'";
$result2 = mysqli_query($con, $getid);
$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);

$sid = $row['id'];

?>
<html>
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
    <body>




        <?php
        ob_start();
        include ('db.php');

        $pid = $sid;



        $sql = "select * from banquetbook where id = '$pid' ";
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
            //$nhall = $row['Nroom'];
            $light = $row['Light'];
            $cindate = $row['cinDate'];
            $cintime = $row['cinTime'];
            $nodays = $row['nodays'];
        }
        ?>
        <header>
            <h1>Information of Guest</h1>
            <address >
                <p>HORTAIN RISE HOTEL,</p>
                <p>Hortain Plain Road,<br>Nuwaraeliya,<br>Sri Lanka.</p>
                <p>(+94) 65 222 44 55</p>
            </address>
            <span><img alt="" src="assets/img/hortain.png"></span>
        </header>

        <form method="post" action="banquetPay.php">
            <input hidden="" value="<?php echo $sid; ?>" name="pid"/>
            <input type="submit" style="background: #0078A5; color: #fff; padding: 5px" onclick="location.href = ''" name="pay" value="Pay Online" class="btn btn-primary"> 
        </form>

        <article>
            <h1></h1>
            <address >

                <p><br></p>
                <p>Customer Name  : -  <?php echo $title . $Fname . " " . $lname; ?><br></p>
            </address>
            <table class="meta">
                <tr>
                    <th><span >Customer ID</span></th>
                    <td><span ><?php echo $id; ?></span></td>
                </tr>
                <tr>
                    <th><span >Check in Date</span></th>
                    <td><span ><?php echo $cindate; ?> </span></td>
                </tr>
                <tr>
                    <th><span >Check in Time</span></th>
                    <td><span ><?php echo $cintime; ?> </span></td>
                </tr>

            </table>



            <table >
                <tr> 
                    <td>Customer phone : -  <?php echo $phone; ?> </td>

                    <td>Customer email : -  <?php echo $email; ?> </td>
                </tr>
                <tr> 
                    <td>Customer Country : -  <?php echo $country; ?> </td>
                    <td>Customer National : -  <?php echo $National; ?> </td>
                </tr>
            </table>
            <br>
            <br>
            <table class="inventory">
                <thead>
                    <tr>
                        <th><span >Item</span></th>
                        

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><span ><?php echo $thall; ?></span></td>
                        

                    </tr>
                    <tr>
                        <td><span ><?php echo $farrange; ?>  Bed </span></td>
                        

                    </tr>
                    <tr>
                        <td><span ><?php echo $light; ?>  </span></td>
                        

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
                                    echo "<script type='text/javascript'> window.location='banquetPay.php?sid=" . $sid . "'</script>";
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