<?php
    include('config/serverSideScriptStudent.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminsLogIn.css">
    <title>Student Login</title>
</head>
<body>
    <a class="preview" href="templates/chooseLogIn.php"> <!-- START a.preview -->
        <img src="img/previous.png">
        <p>Preview</p>
    </a> <!-- END a.preview -->
    
    <a class="createAccount" href="choose.php"> <!-- START a.createAccount -->
        <img src="img/add-friend.png">
        <p>Sign Up</p>
    </a> <!-- END a.createAccount -->

    <form action="studentsLogIn.php" class="mainForm" method="POST" enctype="multipart/form-data"> <!-- START form.mainForm -->
        <div class="welcome"> <!-- START div.welcome -->
            <p>Welcome to <span>WI:MS! </span>Log into your WIMS </br>account</p>
        </div> <!-- END div.welcome -->
        <img src="img/studentFace.png" alt="" class="displayOperator">
        <div id="AdminLogIn" action="" class="InputGroup"> <!-- START div.InputGroup -->
            <div class="showError"><?php echo $errors['emailAccount']; ?></div>
            <input type="text" class="designInput" placeholder="Email Account" name="emailAccount" value="<?php echo htmlspecialchars($emailAccount)?>" autocomplete="off">
            <input type="password" class="designInput" placeholder="Password" name="password1" autocomplete="off">
            <input type="password" class="designInput" placeholder="RFID" name="rfid" autocomplete="off">
            <a href="templates/forgotPasswordStudent.php" class="forgotPassword">Forgot Password?</a>
            <button <?php echo $rfid?>type="submit" class="submit" name="logInStudent">Log in</button>
        </div> <!-- END div.InputGroup -->
    </form> <!-- END form.mainForm -->
    <script src="javascript/login.js" type="text/javascript"></script>
</body>
</html>