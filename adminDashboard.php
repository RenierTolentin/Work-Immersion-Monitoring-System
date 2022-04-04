<?php
    session_start();
    if($_SESSION['status'] !== true){
        header('location: adminsLogIn.php');
    }

    $conn = mysqli_connect('localhost', 'root', '', 'register');
    // checking of the connection exist
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }

    $rfid = mysqli_real_escape_string($conn, $_SESSION['rfidSession']);
    if(isset($_POST['yes'])){
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location: templates/chooseLogIn.php');
    }

    if(isset($_POST['delete'])){
        $sql = "DELETE FROM time_log";
        if(mysqli_query($conn, $sql)){
            header("location: adminDashboard.php?=$rfid");
        }else{
            echo 'query error: ' . mysqli_error($conn);
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminDashboard.css">
    <title>Admin Dashboard - HOME</title>
</head>
<body>
    <div class="loader">
        <img src="img/loading.gif" alt="loading">
    </div>

    <form class="userGuide" method="POST" id="userGuidePopUp"> <!-- START form.userGuide -->
        <h3>Are you sure you want to logout?</h3>
        <div class="first"> <!-- START div.first -->
            <input type="submit" href="" value="NO">
            <input type="submit" name="yes" value="YES">
        </div> <!-- END div.first -->
    </form> <!-- END form.userGuide -->

    <form class="userGuide" method="POST" id="userDeletionPopUp"> <!-- START form.userGuide -->
        <h3>Are you sure you want to Delete all the record in Time log?</h3>
        <div class="first"> <!-- START div.first -->
            <input type="submit" href="" value="NO">
            <input type="submit" name="delete" value="YES">
        </div> <!-- END div.first -->
    </form> <!-- END form.userGuide -->

    <nav> <!-- START nav -->
        <img src="img/wimslogo.png" alt="wimslogo">
        <a id="navigate" onclick="toggleNavigationBar()"></a>
        <ul id="toToggle"> <!-- START ul -->
            <li><a href="templates/adminDashboardManage.php?rfid=<?php echo $rfid?>">Manage</a></li>
            <li class="current"><a class="current" href="">Home</a></li>
            <li><a href="templates/adminDashboardTrainee.php?rfid=<?php echo $rfid?>">Trainees</a></li>
        </ul> <!-- START ul -->
    </nav> <!-- START nav -->

    <main> <!-- START main -->
        <form method="POST" class="wrapForm" id="blurBackground"> <!-- START form#blurBackground -->
            <article class="mainArticle"> <!-- START article.mainArticle -->
                <div class="first">  <!-- START div.first -->
                    <p>Number of Trainees</p>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'register');
                        // checking of the connection exist
                        if(!$conn){
                            echo 'connection error: ' . mysqli_connect_error();
                        }
                        $sql = "SELECT id FROM studentregister ORDER BY id";
                        $query = mysqli_query($conn, $sql); 
                        $row = mysqli_num_rows($query);
                        echo "<h1>$row</h1> ";
                    ?>
                </div> <!-- END div.first -->

                <div class="second"> <!-- START div.second -->
                    <p>Overall Trainees Log</p>
                    <?php
                        $sql = "SELECT time FROM time_log ORDER BY time";
                        $query = mysqli_query($conn, $sql); 
                        $row = mysqli_num_rows($query);
                        echo "<h1>$row</h1> ";
                    ?>
                </div> <!-- END div.second -->
            </article>  <!-- END article.mainArticle -->

            <article class="secondArticle"> <!-- START article.secondArticle -->
                <div id=time> <!-- START div#time -->
                    <div>
                        <span id="hours">00</span>
                        <p class="displayTime">Hours</p>
                    </div>
                    <div>
                        <span id="minutes">00</span>
                        <p class="displayTime">Minutes</p>
                    </div>
                    <div>
                        <span id="seconds">00</span>
                        <p class="displayTime">Seconds</p>
                    </div>
                </div> <!-- END div#time -->

                <div class="scan"> <!-- START div.scan -->
                    <p>Tap or Type Students RFID</p>
                    <input id="EPN" name="searchbox" autofocus="autofocus" autocomplete="off"  placeholder="RFID"/>
                    <button name="search">Search</button>
                </div> <!-- END div.scan -->
            </article> <!-- END article.secondArticle -->

            <?php
                if(isset($_POST['search'])){
                    $search = mysqli_real_escape_string($conn, $_POST['searchbox']);
                    $sql = "SELECT * FROM studentregister WHERE rfid LIKE '%$search'";
                    $query = mysqli_query($conn,$sql);
                    if($row = mysqli_fetch_assoc($query)){
                    echo "<div class='studentInfo'>
                            <p class='GetFullWidth'>".$row['fullname']."</p>
                            <p class='traineesImageNext addStyle'>".$row['rfid']."</p>
                          </div>";
                    }
                }
            ?>

            <table > <!-- START table -->
                <thead> <!-- START thead -->
                    <tr> <!-- START tr -->
                        <th>Date</th>
                        <th>Time_in</th>
                        <th>Time_out</th>
                        <th>OVER: Time_in</th>
                        <th>OVER: Time_out</th>
                    </tr> <!-- END tr -->
                </thead> <!-- END thead -->
                
                <tbody> <!-- START tbody -->
                    <?php 
                        if(isset($_POST['search'])){
                            $search = mysqli_real_escape_string($conn, $_POST['searchbox']);
                            $sql = "SELECT * FROM dtr WHERE rfid LIKE '%$search'";
                            $query = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($query)){?>
                        <tr>
                            <td><?php echo $row['edate']; ?></td>
                            <td><?php echo $row['time_in']; ?></td>
                            <td><?php echo $row['time_out']; ?></td>
                            <td><?php echo $row['ot_in']; ?></td>
                            <td><?php echo $row['ot_out']; ?></td>
                        </tr>
                    <?php   
                            }
                        }
                    ?>
                </tbody> <!-- END tbody -->
            </table> <!-- END table -->

            <section method="GET" class="manage"> <!-- START section -->
                <article> <!-- START article -->
                    <img src="img/adminFace.png" alt="adminFace">
                </article> <!-- START article -->
                <a onclick="toggleLogDelete()" class="showPopUp"><p>Delete Log</p></a>
                <a onclick="toggleUserGuide()" type="button" class="showPopUp"><p>Log Out</p></a>
            </section> <!-- END section -->
        </form> <!-- END form#blurBackground -->
    </main> <!-- END main -->
    <script type="text/javascript" src="javascript/adminDashboard.js"></script>
    <script type="text/javascript" src="javascript/setIntervalTable.js"></script>
</body>
</html>
