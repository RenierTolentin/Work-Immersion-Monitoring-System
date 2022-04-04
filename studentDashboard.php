<?php
     session_start();
     if($_SESSION['status'] !== true){
         header('location: studentsLogIn.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/studentDashboard.css">
    <title>Student Dashboard</title>
</head>
<body>
    <div class="loader">
        <img src="img/loading.gif" alt="loading">
    </div>

    <form class="userGuide" method="POST" id="userGuidePopUp"> <!-- START form#userGuidePopUp -->
        <h3>Are you sure you want to logout?</h3>
        <div class="first"> <!-- START div.first -->
            <a href="">NO</a>
            <a href="config/logout.php">YES</a>
        </div> <!-- END div.first -->
    </form> <!-- END form#userGuidePopUp -->

    <nav> <!-- START nav -->
        <img src="img/wimslogo.png" alt="wimslogo">
        <ul> <!-- START ul -->
            <li class="current"><a href="" class="current">Trainee</a></li>
        </ul> <!-- END ul -->
    </nav> <!-- END nav -->

    <main> <!-- START main -->
        <form method="GET" id="blurBackground" class="wrapForm"> <!-- START form#blurBackground -->
            <article class="mainArticle"> <!-- START article.mainArticle -->
                <div class="first">  <!-- START div.first -->
                    <p>Number of Days</p>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'register');
                        // checking of the connection exist
                        if(!$conn){
                            echo 'connection error: ' . mysqli_connect_error();
                        }

                        $rfid = mysqli_real_escape_string($conn, $_GET['rfid']);
                        $sql = "SELECT * FROM dtr WHERE rfid='$rfid'";
                        $query = mysqli_query($conn, $sql); 
                        $row = mysqli_num_rows($query);
                        echo "<h1>$row</h1> ";
                    ?>
                </div> <!-- END div.first -->

                <div class="second"> <!-- START div.second -->
                    <p>Number of Hours</p>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'register');
                        // checking of the connection exist
                        if(!$conn){
                            echo 'connection error: ' . mysqli_connect_error();
                        }
                        $rfid = mysqli_real_escape_string($conn, $_GET['rfid']);

                        $timeInresult = mysqli_query($conn, "SELECT time_in FROM dtr WHERE rfid='$rfid'");
                        $timeInArray = Array();
                        while ($row = mysqli_fetch_array($timeInresult, MYSQLI_ASSOC)) {
                            $timeInArray[] = ($row['time_in']);   
                            $timeInSum =  array_sum($timeInArray);
                        }

                        $timeOutresult = mysqli_query($conn, "SELECT time_out FROM dtr WHERE rfid='$rfid'");
                        $timeOutArray = Array();
                        while ($row = mysqli_fetch_array($timeOutresult, MYSQLI_ASSOC)) {
                            $timeOutArray[] = ($row['time_out']);   
                            $timeOutSum =  array_sum($timeOutArray);
                        }


                        $OverTimeInresult = mysqli_query($conn, "SELECT ot_in FROM dtr WHERE rfid='$rfid'");
                        $OverTimeInArray = Array();
                        while ($row = mysqli_fetch_array($OverTimeInresult, MYSQLI_ASSOC)) {
                            $OverTimeInArray[] = ($row['ot_in']);   
                            $OverTimeInSum =  array_sum($OverTimeInArray);
                        }

                        $OverTimeOutresult = mysqli_query($conn, "SELECT ot_out FROM dtr WHERE rfid='$rfid'");
                        $OvertimeOutArray = Array();
                        while ($row = mysqli_fetch_array($OverTimeOutresult, MYSQLI_ASSOC)) {
                            $OvertimeOutArray[] = ($row['ot_out']);   
                            $OvertimeOutSum =  array_sum($OvertimeOutArray);
                        }

                        $timeDiff = abs($timeInSum - $timeOutSum);
                        $OverTimeDiff = abs($OverTimeInSum - $OvertimeOutSum);


                        if($OverTimeDiff == ""){
                            $timeDiff = abs($timeInSum - $timeOutSum);
                            echo"<h1>$timeDiff</h1>";
                        }else{
                            $timeSum = abs($timeDiff + $OverTimeDiff);
                            echo"<h1>$timeSum</h1>";
                        }


                    ?>
                </div> <!-- END div.second -->
            </article>  <!-- END article.mainArticle -->

            <table> <!-- START table -->
                <thead> <!-- START thead -->
                    <tr> <!-- START tr -->
                        <th>DATE</th>
                        <th>Time-in</th>
                        <th>Time-out</th>
                        <th>Over Time-in</th>
                        <th>Over Time-out</th>
                    </tr> <!-- END tr -->
                </thead> <!-- END thead -->

                <tbody> <!-- START tbody -->
                    <?php 
                        $conn = mysqli_connect('localhost', 'root', '', 'register');
                        // checking of the connection exist
                        if(!$conn){
                            echo 'connection error: ' . mysqli_connect_error();
                        }

                        $rfid = mysqli_real_escape_string($conn, $_GET['rfid']);
                        $sql = "SELECT * FROM dtr  WHERE rfid='$rfid' ORDER BY id DESC";
                        $displaydtr = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($displaydtr)) { ?>
                        <tr>
                            <td><?php echo $row['edate']; ?></td>
                            <td><?php echo $row['time_in']; ?></td>
                            <td><?php echo $row['time_out']; ?></td>
                            <td><?php echo $row['ot_in']; ?></td>
                            <td><?php echo $row['ot_out']; ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody> <!-- END tbody -->
            </table> <!-- END table -->

            <section> <!-- START section -->
                <article> <!-- START article -->
                    <img src="img/studentFace.png" alt="studentFace">
                </article> <!-- END article -->
                <div class="studentInfo">
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'register');
                        // checking of the connection exist
                        if(!$conn){
                            echo 'connection error: ' . mysqli_connect_error();
                        }
                        $rfid = mysqli_real_escape_string($conn, $_GET['rfid']);
                        $sql = "SELECT * FROM studentregister  WHERE rfid='$rfid'";
                        $displayInfo = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($displayInfo)){ ?>
                        <p><img src="img/name.png" alt="name"><span><?php echo $row['fullname']?></span></p>
                        <p><img src="img/bar-code.png" alt="bar-code"><span><?php echo $row['studentnumber']?></span></p>
                        <p><img src="img/school-name.png" alt="school-name"><span><?php echo $row['schoolname']?></span></p>
                        <p><img src="img/portfolio.png" alt="portfolio"><span><?php echo $row['department']?></span></p>
                        <p><img src="img/phone-call.png" alt="phone-call"><span><?php echo $row['mobilenumber']?></span></p>
                    <?php
                        }
                    ?>
                </div>
                <a onclick="toggleUserGuide()" type="button" class="showPopUp"><p>Log Out</p></a>
            </section> <!-- END section -->
        </form> <!-- END form#blurBackground -->
    </main> <!-- END main -->

    <script>
    function toggleUserGuide(){
        let blurBackground = document.getElementById('blurBackground');
        blurBackground.classList.toggle('active');
        let userGuidePopUp = document.getElementById('userGuidePopUp');
        userGuidePopUp.classList.toggle('active');
    }

    window.addEventListener("load", function(){
        let loader = document.querySelector(".loader");
        loader.className += " loaderHidden";
    });
    </script>
</body>
</html>