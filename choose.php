<?php
    session_start();
    if($_SESSION['status'] !== true){
        header('location: templates/verifytoSignUp.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/chooseLogIn.css">
    <title>Choose: Log-In Method</title>
</head>
<body>

    <nav><!-- START nav -->
        <ul><!-- START ul -->
            <img src="img/wimslogo.png" alt="attendancelogo">
        </ul><!-- END nav -->
    </nav><!-- END main -->

    <section class="childSection"> <!-- START section.childSection -->
        <a href="config/sessionEnds.php"><img src="img/previous.png" alt=""></a>
        <h3>Sign Up</h3>
    </section> <!-- END section.childSection -->

    <main> <!-- START main -->
        <a href="templates/addAdminAccount.php" class="choose"> <!-- START a.choose -->
            <h3>Admin: Add Account</h3>
            <img src="img/admin.png" alt="">
        </a> <!-- START a.choose -->
        
        <a href="templates/OjtAccount.php"class="choose"> <!-- START a.choose -->
            <h3>Student: Add Account</h3>
            <img src="img/student.png" alt=""> 
        </a> <!-- END a.choose -->
    </main> <!-- START main -->
</body>
</html>