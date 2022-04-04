<?php

    require '../PHPMailer/src/PHPMailer.php';   
    require '../PHPMailer/src/SMTP.php';
    require '../PHPMailer/src/Exception.php';
    $conn = mysqli_connect('localhost', 'root', '', 'register');
    // checking of the connection exist
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $errors = $emailAccount = "";
    $errors = ['emailAccount'=>''];

    if(isset($_POST['sendConfirmation'])){
        $emailAccount = mysqli_real_escape_string($conn, $_POST['emailAccount']);
        $sql = "SELECT * FROM studentregister WHERE emailaccount='$emailAccount'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            $code = uniqid(true);
            $sql= "INSERT INTO passwordreset(code, emailAccount) VALUES ('$code', '$emailAccount')";
            $query = mysqli_query($conn, $sql);  
            if(!$query){
                exit("Could'nth generate a code");
            }
            $mail = new PHPMailer(true);
            $mail->isSMTP();   
            $mail->Host = "smtp.gmail.com";                     
            $mail->SMTPAuth   = true;                                 
            $mail->Username   = "OfficialWIMS2021@gmail.com";                    
            $mail->Password   = "alkalinedasher";                               
            $mail->SMTPSecure = "tsl"; 
            $mail->Port       = 587;  

            $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/createNewPasswordStudent.php?code=$code";
            $mail->isHTML(true);
            $mail->setFrom('OfficialWIMS2021@gmail.com', 'WIMS!');     //TRANMITTER
            $mail->addAddress($emailAccount);                          //RECEIVER
            $mail->addReplyTo('OfficialWIMS2021@gmail.com');
            $mail->Subject = "WIMS Account Recovery";
            $mail->Body = "Click <a href='$url'>this</a> link to reset your password";
        
            $mail->send();
            echo '<p style="font-family: Trebuchet MS, Lucida Sans Unicode, Lucida Grande, Lucida Sans, Arial, sans-serif;
                    padding: 20px 0px;
                    background: #5891ed;
                    color: white;
                    font-size: 20px;
                    text-align: center;
                    width: 80%;
                    border-radius: 10px;
                    box-sizing: border-box;
                    border: 3px solid #e0e0e0;
                    transition: 2s;
                    position: absolute;
                    margin: -340px auto 0px;">Message has been sent to your email account, Please follow the instruction to recover your account! </br> You can close this page.</p>';
        }else{
            $errors['emailAccount'] = "Error: Email doesn't exist <br />";
        }
    }
    
?>