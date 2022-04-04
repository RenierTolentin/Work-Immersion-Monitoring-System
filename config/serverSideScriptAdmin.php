<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'register');
    // checking of the connection exist
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }

    $errors = $rfid = $emailAccount = $password1 = $verifyPassword = "";
    $errors = ['rfid'=>'', 'emailAccount'=>'', 'password1'=>'', 'verifyPassword'=>'', 'profileImage'=>''];

    if(isset($_POST['submit'])){
        $rfid = mysqli_real_escape_string($conn, $_POST['rfid']);
        $emailAccount = mysqli_real_escape_string($conn, $_POST['emailAccount']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $profileImage = time() . '_' . $_FILES['profileImage']['name'];


        $sql = "SELECT * FROM adminregister WHERE rfid='$rfid'";
        $result = mysqli_query($conn, $sql);
        if(empty($_POST['rfid'])){
            $errors['rfid'] = 'Empty: Put uniformed RF number <br />';
        }elseif(!preg_match('/^[0-9]+$/', $_POST['rfid'])){
            $errors['rfid'] = 'Error: Scan your RF Identification <br />';
        }elseif(mysqli_num_rows($result) == 1){
            $errors['rfid'] = 'Error: RFID already in use <br />';
        }

        $sql = "SELECT * FROM adminregister WHERE emailaccount='$emailAccount'";
        $result = mysqli_query($conn, $sql);
        if(empty($_POST['emailAccount'])){
            $errors['emailAccount'] = 'Empty: Put a proper email address <br />';
        }elseif(!preg_match('/^[a-zA-Z0-9\.]+\@gmail.com$/', $emailAccount)){
            $errors['emailAccount'] = 'Error: Use a proper email format';
        }elseif(mysqli_num_rows($result) == 1){
            $errors['emailAccount'] = 'Error: Email account already exist';
        }

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

        $targetFolder = '../img/uploadedImages/' . $profileImage;
        // storing temporary file then sending it to the target folder
        if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFolder)){
        }else{
            $errors['pr ofileImage'] = 'Empty: Put an image <br />';
        }

        if(array_filter($errors)){
        }else{
            $password1 = md5($password1);
            $insertData = "INSERT INTO adminregister (rfid, emailaccount, password1, uploadedimage) VALUES ('$rfid', '$emailAccount', '$password1', '$profileImage')";
            if(mysqli_query($conn, $insertData)){
                $_SESSION['status'] = true;
                header("location: ../templates/accountSuccessfullyCreated.php");
            }else{
                echo 'query error: ' . mysqli_error($conn);
            }
        }
    }

    if(isset($_POST['logInAdmin'])){
        $emailAccount = mysqli_real_escape_string($conn, $_POST['emailAccount']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $rfid = mysqli_real_escape_string($conn, $_POST['rfid']);

        if(array_filter($errors)){
        }else{
            $password1 = md5($password1);
            $getData = "SELECT * FROM adminregister WHERE emailaccount='$emailAccount' AND password1='$password1' AND rfid='$rfid'";
            $result = mysqli_query($conn, $getData);   
            if(mysqli_num_rows($result) == 1){
                $rfid = $_POST['rfid'];
                $_SESSION['rfidSession'] = $rfid;
                $_SESSION['username'] = "$emailAccount";
                $_SESSION['status'] = true;
                header("location: adminDashboard.php?rfid=$rfid");
            }elseif(($_POST['emailAccount']) !== mysqli_num_rows($result) || ($_POST['password1']) !== mysqli_num_rows($result) || ($_POST['rfid']) !== mysqli_num_rows($result)){
                $errors['emailAccount'] = 'Username or Password doesnt match <br />';
            }else{
                header('location: adminsLogIn.php');
            }
        }
    } 

    
?>