<?php
    include('../config/serverSideScriptForgotPasswordAdmin.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forgotPassword.css">
    <title>ADMIN: Forgot Password</title>
</head>
<body>
    <a class="preview" href="../adminsLogIn.php">
        <img src="../img/previous.png">
        <p>Preview</p>
    </a>
    
    <img src="../img/adminFace.png" alt="" class="displayOperator">

    <form acton="forgotPasswordAdmin.php" method="POST" enctype="multipart/form-data">
        <h3>Recover Account</h3>
        <input type="text" name="emailAccount" placeholder="Email Account" value="<?php echo htmlspecialchars($emailAccount) ?>" autocomplete="off">
        <div class="showError"><?php echo $errors['emailAccount']; ?></div>
        <button type="submit" name="sendConfirmation">Send Confirmation</button>
    </form>
</body>
</html>