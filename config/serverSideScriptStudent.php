<?php 
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'register');
    // checking of the connection exist
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }

    $rfid = $emailAccount = $password1 = $verifyPassword = $fullName = $studentNumber = $schoolName = $department = $contantNumber = "";
    $errors = ['rfid'=>'', 'emailAccount'=>'' ,'password1'=>'', 'verifyPassword'=>'', 'profileImage'=>"", 'fullName'=>'', 'studentNumber'=>'', 'schoolName'=>'', 'department'=>'', 'contantNumber'=>''];

    if(isset($_POST['create'])){
        $rfid = mysqli_real_escape_string($conn, $_POST['rfid']);
        $emailAccount = mysqli_real_escape_string($conn, $_POST['emailAccount']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
        $studentNumber = mysqli_real_escape_string($conn, $_POST['studentNumber']);
        $schoolName = mysqli_real_escape_string($conn, $_POST['schoolName']);
        $department = mysqli_real_escape_string($conn, $_POST['department']);
        $contantNumber = mysqli_real_escape_string($conn, $_POST['contantNumber']);
        $profileImage = time() . '_' . basename($_FILES['profileImage']['name']);

        $sql = "SELECT * FROM studentregister WHERE rfid='$rfid'";
        $result = mysqli_query($conn, $sql);
        if(empty($_POST['rfid'])){
            $errors['rfid'] = 'Empty: Put uniformed RF number <br />';
        }elseif(!preg_match('/^[0-9]+$/', $rfid)){
            $errors['rfid'] = 'Error: Use a uniformed RFID number';
        }elseif(mysqli_num_rows($result) == 1){
            $errors['rfid'] = 'Error: RFID already in use <br />';
        }
        
        $sql = "SELECT * FROM studentregister WHERE emailaccount='$emailAccount'";
        $result = mysqli_query($conn, $sql);
        if(empty($_POST['emailAccount'])){
            $errors['emailAccount'] = 'Empty: Put proper G-mail account <br />';
        }elseif(!preg_match('/^[a-zA-Z0-9\.]+\@gmail.com$/', $emailAccount)){
            $errors['emailAccount'] = 'Error: Use a proper gmail format';
        }elseif(mysqli_num_rows($result) == 1){
            $errors['emailAccount'] = 'Error: Email account already exist';
        }

        if(empty($_POST['password1'])){
            $errors['password1'] = "Empty: Put a secure password </br>";
        }elseif(strlen($_POST['password1']) <= 9){
            $errors['password1'] = "Password is too short </br>";
        }elseif(strlen($_POST['password1']) >= 21){
            $errors['password1'] = "Password is to long </br>";
        }

        if(empty($_POST['verifyPassword'])){
            $errors['verifyPassword'] = 'Empty: Retype your password';
        }
        elseif($_POST['verifyPassword'] !== $_POST['password1']){
            $errors['verifyPassword'] = 'This should match the entered password above';
        }
        
        if(empty($_POST['fullName'])){
            $errors['fullName'] = 'Empty : put a full name <br />';
        }

        if(empty($_POST['studentNumber'])){
            $errors['studentNumber'] = 'Empty : put the student number <br />';
        }

        if(empty($_POST['schoolName'])){
            $errors['schoolName'] = 'Empty : put the school name <br />';
        }

        if(empty($_POST['department'])){
            $errors['department'] = 'Empty : put desired department <br />';
        }
        
        if(empty($_POST['contantNumber'])){
            $errors['contantNumber'] = 'Empty : put the mobile number <br />';
        }elseif(!preg_match('/^(09|\+639)\d{9}$/', $contantNumber)){
            $errors['contantNumber'] = 'Error: Use a proper format <br />';
        }    
        
        $targetFolder = '../img/uploadedImages/' . $profileImage;
        // storing temporary file then sending it to the target folder
        if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFolder)){
        }else{
             $errors['profileImage'] = 'Empty: Put an image <br />';
        }

        if(array_filter($errors)){
        }else{
            $password1 = md5($password1);
            $insertData = "INSERT INTO studentregister (rfid, emailaccount, password1, fullname, studentnumber, schoolname, department, mobilenumber, uploadedimage) VALUES ('$rfid', '$emailAccount', '$password1', '$fullName', '$studentNumber', '$schoolName', '$department', '$contantNumber', '$profileImage')";

            if(mysqli_query($conn, $insertData)){
                $_SESSION['status'] = true;
                header("location: ../templates/accountSuccessfullyCreated.php");
            }else{
                echo 'query error: ' . mysqli_error($conn);
            }                                                                       
        }
    }

    if(isset($_POST['logInStudent'])){
        $emailAccount = mysqli_real_escape_string($conn, $_POST['emailAccount']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $rfid = mysqli_real_escape_string($conn, $_POST['rfid']);

        if(array_filter($errors)){
        }else{
            $password1 = md5($password1);
            $getData = "SELECT * FROM studentregister WHERE emailaccount='$emailAccount' AND password1='$password1' AND rfid='$rfid'";
            $result = mysqli_query($conn, $getData);   
            if(mysqli_num_rows($result) == 1){
                $rfid = $_POST['rfid'];
                $_SESSION['username'] = "$emailAccount";
                $_SESSION['status'] = true;
                header("location: studentDashboard.php?rfid=$rfid");
            }elseif(empty($_POST['emailAccount']) || empty($_POST['password1']) || empty($_POST['rfid'])){
                $errors['emailAccount'] = 'Empty: Put a valid Username and Password';
            }elseif(($_POST['emailAccount']) !== mysqli_num_rows($result) || ($_POST['password1']) !== mysqli_num_rows($result) || ($_POST['rfid']) !== mysqli_num_rows($result)){
                $errors['emailAccount'] = 'Error: Input doesnt match <br />';
            }else{
                header('location: studentsLogIn.php');
            }
        }
    } 
?>