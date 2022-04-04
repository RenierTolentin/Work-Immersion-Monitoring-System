<?php
    session_start();
    if($_SESSION['status'] !== true){
        header('location: ../adminsLogIn.php');
    }

    include('../config/indexRfidSystemAdmin.php');
    $rfid = mysqli_real_escape_string($conn, $_SESSION['rfidSession']);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboardTemplates.css">
    <title>Admin Dashboard - TRAINEE</title>
</head>
<body>
    <div class="loader">
        <img src="../img/loading.gif" alt="loading">
    </div>
    
    <nav>
        <img src="../img/wimslogo.png" alt="wimslogo">
        <a id="navigate" onclick="toggleNavigationBar()"></a>
        <ul id="toToggle">
        <li><a href="adminDashboardManage.php?rfid=<?php echo $rfid?>">Manage</a></li>
            <li><a href="../adminDashboard.php?rfid=<?php echo $rfid?>">Home</a></li>
            <li class="current"><a class="current" href="">Trainees</a></li>
        </ul>
    </nav> 
    
    <form method="POST" enctype="multipart/form-data">
        <div class="second">
            <h2>Quick View</h2>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>RFID</th>
                        <th>Fullname</th>
                        <th>Department</th>
                        <th>Mobile number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $displaylog = mysqli_query($conn,"SELECT * FROM studentregister ORDER BY id DESC LIMIT 20");
                        while ($row = mysqli_fetch_assoc($displaylog)) { ?>
                        <tr>
                            <td><?php echo "<img src='../img/uploadedImages/".$row['uploadedimage']."' >";?></td>
                            <td><?php echo $row['rfid']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['mobilenumber']; ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="first">
            <input type="text" placeholder="RFID" name="searchBox" autocomplete="off" autofocus="autofocus"> 
            <button type="submit" name="search" class="search">Search</button>
            <?php
            if(isset($_POST['search'])){
                $search = mysqli_real_escape_string($conn, $_POST['searchBox']);
                $sql = "SELECT * FROM studentregister WHERE rfid LIKE '%$search%'";
                $query = mysqli_query($conn, $sql);
                $result = mysqli_num_rows($query);
        
                if($result > 0){
                    while($row = mysqli_fetch_assoc($query)){
                        echo "<div class='traineeInfo'>
                        <img src='../img/uploadedImages/".$row['uploadedimage']."' >
                        <p class='traineesImageNext addStyle'>".$row['rfid']."</p>
                        <p class='traineesImageNext title'>RFID</p>
                        <p class='traineesImageNext addStyle'>".$row['studentnumber']."</p>
                        <p class='traineesImageNext title'>Student Number</p>
                        <p class='GetFullWidth'>".$row['fullname']."</p>
                        <p class='getFull title'>Fullname</p>
                        <p class='GetFullWidth'>".$row['emailaccount']."</p>
                        <p class='getFull title'>Email Account</p>
                        <p class='GetFullWidth'>".$row['department']."</p>
                        <p class='getFull title'>Department</p>
                        <p class='GetFullWidth'>".$row['mobilenumber']."</p>
                        <p class='getFull title'>mobile number</p>
                        <a href='traineesFullView.php?rfid=".$row['rfid']."' type='submit' class='manage'>Manage</a>
                        </div>";
                    }
                }
            }
            ?>
        </div>
    </form>
    <script type="text/javascript">
        window.addEventListener("load", function(){
            let loader = document.querySelector(".loader");
            loader.className += " loaderHidden";
        });

        function toggleNavigationBar(){
        let toggleNavigation = document.getElementById('toToggle');
        toggleNavigation.classList.toggle('open');
    }
    </script>
</body>
</html>