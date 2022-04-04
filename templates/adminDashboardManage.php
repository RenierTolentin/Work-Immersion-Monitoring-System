<?php

    session_start();
    if($_SESSION['status'] !== true){
        header('location: ../adminsLogIn.php');
    }

    $conn = mysqli_connect('localhost', 'root', '', 'register');
    // checking of the connection exist
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }
    $rfidSession = mysqli_real_escape_string($conn, $_SESSION['rfidSession']);

    $rfidFill = $emailAccount = $pin =  "";
    $errors = ['rfidFill'=>"", 'emailAccount'=>"", 'pin'=>""];

    if(isset($_POST['update'])){
        $rfidFill = mysqli_real_escape_string($conn, $_POST['rfidFill']);
        $emailAccount = mysqli_real_escape_string($conn, $_POST['emailAccount']);
        $pin = mysqli_real_escape_string($conn, $_POST['pin']);

        if(empty($_POST['emailAccount'])){
            $errors['emailAccount'] = 'Empty: Put proper G-mail account <br />';
        }elseif(!preg_match('/^[a-zA-Z0-9\.]+\@gmail.com$/', $emailAccount)){
            $errors['emailAccount'] = 'Error: Use a proper gmail format';
        }

        if(array_filter($errors)){
        }else{
            $sql = "UPDATE adminregister SET rfid='$rfidFill', emailaccount='$emailAccount', pin='$pin' WHERE rfid='$rfidSession'";
            if(mysqli_query($conn, $sql)){
                header("location: adminDashboardManage.php?rfid=$rfidSession");
            }else{
                echo 'query error: ' . mysqli_error($conn);
            }
        }
    }

    if(isset($_POST['delete'])){
        $sql = "DELETE FROM adminregister WHERE rfid='$rfidSession'";
        if(mysqli_query($conn, $sql)){
            header('location: ../templates/adminDashboardTrainee.php');
        }else{
            echo 'query error: ' . mysqli_error($conn);
        }
        $_SESSION = array();
        session_destroy();
        header('location: ../adminsLogIn.php');
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminDashboardManage.css">
    <title>Admin Dashboard - MANAGE</title>
</head>
<body>
    <div class="loader">
        <img src="../img/loading.gif" alt="loading">
    </div>

    <form class="userGuide" method="POST" id="popUpDelete"> <!-- START form.userGuide -->
        <h3>Are you sure you want to delete this account?</h3>
        <div class="first"> <!-- START div.first -->
            <p>If YES this account will automatically logout</p>
            <input type="submit" value="NO">
            <input type="submit" name="delete" value="YES">
        </div> <!-- END div.first -->
    </form> <!-- END form.userGuide -->

    <nav> <!-- START nav -->
        <img src="../img/wimslogo.png" alt="wimslogo">
        <a id="navigate" onclick="toggleNavigationBar()"></a>
        <ul id="toToggle"> <!-- START ul -->
            <li class="current"><a href="" class="current">Manage</a></li>
            <li><a href="../adminDashboard.php?rfid=<?php echo $rfidSession?>">Home</a></li>
            <li><a href="adminDashboardTrainee.php?rfid=<?php echo $rfidSession?>">Trainees</a></li>
        </ul> <!-- START ul -->
    </nav> <!-- START nav -->

    <div id="blurBackground">
        <section class="childSection">
            <h3>Update and Delete</h3>
        </section>

        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'register');
            // checking of the connection exist
            if(!$conn){
                echo 'connection error: ' . mysqli_connect_error();
            }

            $rfid = mysqli_real_escape_string($conn, $_GET['rfid']);
            $sql = "SELECT * FROM adminregister WHERE rfid='$rfid'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_num_rows($query);

                while($row = mysqli_fetch_assoc($query)){
                ?>
                <form class='adminInfo' method="POST">
                    <img src="../img/admin.png">
                            
                    <div class="first">
                        <input readonly name="rfidFill" class='traineesImageNext addStyle'  autocomplete="off" value="<?php echo htmlspecialchars($row['rfid'])?>"></input><br>
                        <div class="showError"><?php echo $errors['rfidFill']; ?></div>
                        <p class='traineesImageNext title'>RFID</p><br>

                        <input name="emailAccount" class='GetFullWidth'  autocomplete="off" value="<?php echo htmlspecialchars($row['emailaccount'])?>"><br>
                        <div class="showError"><?php echo $errors['emailAccount']; ?></div>
                        <p class='getFull title'>Email Account</p><br>

                        <input type="password" name="pin" class='GetFullWidth'  autocomplete="off" value="<?php echo htmlspecialchars($row['pin'])?>"/><br>
                        <p class='getFull title'>Pin</p><br>

                        <input onclick="toggleUserGuideDelete()" type="button" class="delete" value="delete">
                        <input name="update" type="submit" class="update" value="update">
                    </div>
                </form>
        <?php
            }
        ?>
    </div>

   <script>
        window.addEventListener("load", function(){
            let loader = document.querySelector(".loader");
            loader.className += " loaderHidden";
        });

       function toggleNavigationBar(){
        let toggleNavigation = document.getElementById('toToggle');
        toggleNavigation.classList.toggle('open');
        }

        function toggleUserGuideDelete(){
            let blurBackground = document.getElementById('blurBackground');
            blurBackground.classList.toggle('active');
            let popUpDelete = document.getElementById('popUpDelete');
            popUpDelete.classList.toggle('active');
        }

        function toggleUserGuideUpdate(){
            let blurBackground = document.getElementById('blurBackground');
            blurBackground.classList.toggle('active');
            let popUpUpdate = document.getElementById('popUpUpdate');
            popUpUpdate.classList.toggle('active');
        }
   </script>
</body>
</html>