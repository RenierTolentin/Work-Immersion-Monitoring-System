<?php   
    $conn = mysqli_connect('localhost', 'root', '', 'register');
    // checking of the connection exist
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }

    $rfid = $emailAccount =  $fullName = $studentNumber  = $department = $contactNumber = "";
    $errors = ['rfid'=>'', 'emailAccount'=>'', 'fullName'=>'', 'studentNumber'=>'', 'department'=>'', 'contactNumber'=>''];
    $rfidSession = mysqli_real_escape_string($conn, $_SESSION['rfidSession']);

    if(isset($_POST['update'])){
        $rfid = mysqli_real_escape_string($conn, $_POST['rfid']);
        $emailAccount = mysqli_real_escape_string($conn, $_POST['emailAccount']);
        $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
        $studentNumber = mysqli_real_escape_string($conn, $_POST['studentNumber']);
        $department = mysqli_real_escape_string($conn, $_POST['department']);
        $contactNumber = mysqli_real_escape_string($conn, $_POST['contactNumber']);

        if(empty($_POST['fullName'])){
            $errors['fullName'] = 'Empty : put a full name <br />';
        }elseif(!preg_match('/(^[a-zA-Z-]+\s[a-zA-Z-]+\s[a-zA-Z\.]+)$/', $fullName)){
            $errors['fullName'] = 'Error: Use a proper format <br />';
        }

        if(empty($_POST['studentNumber'])){
            $errors['studentNumber'] = 'Empty : put the student number <br />';
        }
        
        if(empty($_POST['department'])){
            $errors['department'] = 'Empty : put desired department <br />';
        }

        if(!preg_match('/^(09|\+639)\d{9}$/', $contactNumber)){
            $errors['contactNumber'] = 'Error: Use a proper format <br />';
        } 

        if(array_filter($errors)){
        }else{
            $sql = "UPDATE studentregister SET rfid='$_POST[rfid]', studentnumber='$_POST[studentNumber]', fullname='$_POST[fullName]', emailaccount='$_POST[emailAccount]', department='$_POST[department]', mobilenumber='$_POST[contactNumber]' WHERE rfid='$_GET[rfid]'";
            if(mysqli_query($conn, $sql)){
                header("location: ../templates/adminDashboardTrainee.php?rfid=$rfidSession");
            }else{
                echo 'query error: ' . mysqli_error($conn);
            }
        }
    }

    if(isset($_POST['delete'])){
        $sql = "DELETE FROM studentregister WHERE rfid='$_GET[rfid]'";
        if(mysqli_query($conn, $sql)){
            header("location: ../templates/adminDashboardTrainee.php?rfid=$rfidSession");
        }else{
            echo 'query error: ' . mysqli_error($conn);
        }
    }
?>