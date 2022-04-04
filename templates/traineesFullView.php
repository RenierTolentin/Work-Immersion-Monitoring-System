<?php
    session_start();
    if($_SESSION['status'] !== true){
        header('location: ../adminsLogIn.php');
    }
    
    include('../config/manageStudent.php');
    $rfidSession = mysqli_real_escape_string($conn, $_SESSION['rfidSession']);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/traineesFullView.css">
    <title>Admin Dashboard - TRAINEE</title>
</head>
<body>
    
    <nav>
        <img src="../img/wimslogo.png" alt="wimslogo">
        <ul>
            <li class="current"><a class="current" href="">Trainee</a></li>
        </ul>
    </nav> 

    <form class="userGuide" method="POST" id="userDeletionPopUp"> <!-- START form.userGuide -->
        <h3>Are you sure you want to Delete this account?</h3>
        <div class="first"> <!-- START div.first -->
            <input type="submit" href="" value="NO">
            <input type="submit" name="delete" value="YES">
        </div> <!-- END div.first -->
    </form> <!-- END form.userGuide -->

    <div id="blurBackground">
        <section class="childSection">
            <a href="../templates/adminDashboardTrainee.php?rfid=<?php echo $rfidSession?>"><img src="../img/previous.png" alt=""></a>
            <h3>Update and Delete</h3>
        </section>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'register');
            // checking of the connection exist
            if(!$conn){
                echo 'connection error: ' . mysqli_connect_error();
            }

            $rfid = mysqli_real_escape_string($conn, $_GET['rfid']);
            $sql = "SELECT * FROM studentregister WHERE rfid='$rfid'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_num_rows($query);

                while($row = mysqli_fetch_assoc($query)){
                ?>
                <form class='traineeInfo' method="POST">
                    <img src="../img/student.png">
                        
                    <div class="first">
                        <input name="rfid" class='GetFullWidth' readonly value="<?php echo htmlspecialchars($row['rfid'])?>"><br>
                        <p class='getFull title' style="margin-top: 5px">RFID</p><br>

                        <input name="studentNumber" class='traineesImageNext addStyle'  autocomplete="off" value="<?php echo htmlspecialchars($row['studentnumber'])?>"><br>
                        <div class="showError"><?php echo $errors['studentNumber']; ?></div>
                        <p class='traineesImageNext title'>Student Number</p><br>

                        <input name="fullName" class='GetFullWidth'  autocomplete="off" value="<?php echo htmlspecialchars($row['fullname'])?>"/><br>
                        <div class="showError"><?php echo $errors['fullName']; ?></div>
                        <p class='getFull title'>Fullname</p><br>      
                    </div>

                    <div class="second">
                        <input name="emailAccount" class='GetFullWidth'  autocomplete="off" value="<?php echo htmlspecialchars($row['emailaccount'])?>"><br>
                        <div class="showError"><?php echo $errors['emailAccount']; ?></div>
                        <p class='getFull title'>Email Account</p><br>
                        
                        <input name="department" class='GetFullWidth' autocomplete="off" value="<?php echo htmlspecialchars( $row['department'])?>"><br>
                        <div class="showError"><?php echo $errors['department']; ?></div>
                        <p class='getFull title'>Department</p><br>

                        <input name="contactNumber" class='GetFullWidth' autocomplete="off" value="<?php echo htmlspecialchars($row['mobilenumber'])?>"><br>
                        <div class="showError"><?php echo $errors['contactNumber']; ?></div>
                        <p class='getFull title'>Contact Number</p><br>
                    </div>

                    <div class="third">
                        <input onclick="toggleLogDelete()" type="button" class="delete" name="delete" value="DELETE">
                        <input type="submit" class="update" name="update" value="UPDATE">
                    </div>
                </form>
        <?php
                }
        ?>
    </div>

    <script>
        function toggleLogDelete(){
            let confirmDeletion = document.getElementById('blurBackground');
            confirmDeletion.classList.toggle('active');
            let userDeletionPopUp = document.getElementById('userDeletionPopUp');
            userDeletionPopUp.classList.toggle('active');
        }
    </script>
</body>
</html>