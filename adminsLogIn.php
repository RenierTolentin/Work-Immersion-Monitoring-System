<?php
    include('config/serverSideScriptAdmin.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminsLogIn.css">
    <title>Admin Login</title>
</head>
<body>
    <a class="preview" href="templates/chooseLogIn.php"> <!-- START a.preview -->
        <img src="img/previous.png">
        <p>Preview</p>
    </a> <!-- END a.preview -->
    <a class="createAccount" href="choose.php">  <!-- START a.createAccount -->
        <img src="img/add-friend.png">
        <p>Sign Up</p>
    </a> <!-- END a.createAccount -->

    <form class="mainForm" method="POST" enctype="multipart/form-data"> <!-- START form.mainForm -->
        <div class="welcome"> <!-- START div.welcome -->
            <p>Welcome to <span>WI:MS! </span>Log into your WIMS </br>account</p>
        </div> <!-- START div.welcome -->
        <img src="img/adminFace.png" alt="" class="displayOperator">
        <div id="AdminLogIn" action="" class="InputGroup"> <!-- START div.AdminLogIn -->
            <div class="showError"><?php echo $errors['emailAccount']; ?></div>
            <input type="text" class="designInput" placeholder="Email Account" name="emailAccount" value="<?php echo htmlspecialchars($emailAccount)?>" autocomplete="off">
            <input type="password" class="designInput" placeholder="password" name="password1" autocomplete="off">
            <input type="password" class="designInput" placeholder="RFID" name="rfid" autocomplete="off">
            <a href="templates/forgotPasswordAdmin.php" class="forgotPassword">Forgot Password?</a>
            <button type="submit" class="submit" name="logInAdmin">Log in</button>
        </div> <!-- END div.AdminLogIn -->
    </form> <!-- END form.mainForm -->

    <script src="javascript/login.js" type="text/javascript"></script>
</body>
</html>