<?php

    $conn = mysqli_connect('localhost', 'root', '', 'register');
    // checking of the connection exist
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }

    if(!isset($_GET['code'])){
        header('location: ../studentsLogIn.php');
    }

    $code = $_GET['code'];
    $query = "SELECT emailaccount FROM passwordreset WHERE code='$code'";
    $getEmailQuery = mysqli_query($conn, $query);

    if(mysqli_num_rows($getEmailQuery) == 0){
        exit("cant find page");
    }

    $errors = ['password1'=>'', 'verifyPassword'=>''];

    if(isset($_POST['resetPassword'])){
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $verifyPassword = mysqli_real_escape_string($conn, $_POST['verifyPassword']);

        if(empty($_POST['password1'])){
            $errors['password1'] = "Empty: Put a secure password <br />";
        }elseif(strlen($_POST['password1']) <= 9){
            $errors['password1'] = "Password is too short <br />";
        }elseif(strlen($_POST['password1']) >= 21){
            $errors['password1'] = "Password is to long <br />";
        }

        if(empty($_POST['verifyPassword'])){
            $errors['verifyPassword'] = 'Empty: Retype your password <br />';
        }
        elseif($_POST['verifyPassword'] !== $_POST['password1']){
            $errors['verifyPassword'] = 'This should match the entered password above <br />';
        }

        if(array_filter($errors)){
        }else{
            $password1 = $_POST['password1'];
            $encrytedPassword = md5($password1);

            $row = mysqli_fetch_array($getEmailQuery);
            $emailAccount = $row['emailaccount'];
            $sql = "UPDATE studentregister SET password1='$encrytedPassword' WHERE emailaccount='$emailAccount'";
            $query = mysqli_query($conn, $sql);

            if($query){
             $sql = "DELETE FROM passwordreset WHERE code='$code'";
             $query = mysqli_query($conn, $sql);
             header('location: ../studentsLogIn.php');
            }else{
                exit("Something went wrong");
            }
        }
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forgotPassword.css">
    <title>Create New Password</title>
</head>
<body>
    <img src="../img/studentFace.png" alt="" class="displayOperator">

    <form method="POST">
        <h3>Create a new password!</h3>
        <input type="password" name="password1" placeholder="Password" style="margin: 5px 0px;" autocomplete="off">
        <div class="showError"><?php echo $errors['password1']; ?></div>
        <input type="password" name="verifyPassword" placeholder="Confirm password" autocomplete="off">
        <div class="showError"><?php echo $errors['verifyPassword']; ?></div>
        <button type="submit" name="resetPassword">Confirm</button>
    </form>
</body>
</html>