<?php

    require 'PHPMailer/src/PHPMailer.php';   
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $errors = ['sendersName'=>"",'sendersEmail'=>"",'sendersMessage'=>""];

    if(isset($_POST['sendEmail'])){
        $sendersName = $_POST['sendersName'];
        $sendersEmail = $_POST['sendersEmail'];
        $sendersMessage = $_POST['sendersMessage'];

        if(empty($_POST['sendersName'])){
            $errors['sendersName'] = "Empty: Please provide your name <br/>";
        }
        if(empty($_POST['sendersEmail'])){
            $errors['sendersEmail'] = 'Empty: Put a proper email address <br />';
        }elseif(!preg_match('/^[a-zA-Z0-9\.]+\@gmail.com$/', $sendersEmail)){
            $errors['sendersEmail'] = 'Error: Use a proper email format';
        }
        if(empty($_POST['sendersMessage'])){
            $errors['sendersMessage'] = "Empty: Provide here your suggestions and feedbacks <br/>";
        }

        if(array_filter($errors)){
            echo '<p style="position: absolute;
                            top: 8px;
                            left: 10px;
                            background: #4d7ee5;
                            color: white;
                            font-size: 13px;
                            width: 95%;
                            max-width: 470px;
                            padding: 20px;
                            text-align: center;
                            box-sizing: border-box;
                            z-index: 2;">Contact: There was an error to your Input, Please fill up the form again!</p>';
        }else{
            $mail = new PHPMailer(true);
            $mail->isSMTP();   
            $mail->Host = "smtp.gmail.com";                     
            $mail->SMTPAuth   = true;                                 
            $mail->Username   = "OfficialWIMS2021@gmail.com";                    
            $mail->Password   = "alkalinedasher";                               
            $mail->SMTPSecure = "tsl"; 
            $mail->Port       = 587;               
            $mail->isHTML(true);

            $mail->setFrom('OfficialWIMS2021@gmail.com', 'WIMS!');     //TRANSMITTER
            $mail->addAddress('OfficialWIMS2021@gmail.com');           //RECEIVER
            $mail->Subject = "WIMS: Message Recieved";
            $mail->Body = "<h3>Name: $sendersName <br>
                               Email Address: $sendersEmail <br>
                               Message: $sendersMessage <br>
                           </h3>";
            $mail->send();

            header('location: ../WIMS/templates/successfullySent.php');
        }
    }
?>
