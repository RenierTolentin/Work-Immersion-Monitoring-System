<?php

    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'register');
    // checking of the connection exist
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }

    $errors = $pin = "";
    $errors = ['pin'=>""];

    if(isset($_POST['pin'])){
        $pin = mysqli_real_escape_string($conn, $_POST['pin']);
        $sql = "SELECT pin FROM adminregister WHERE pin='$pin'";
        $result = mysqli_query($conn, $sql);
        if(empty($_POST['pin'])){
            $errors['pin'] = 'Empty: Put uniformed Pin <br />';
        }elseif(!preg_match('/^[0-9]+$/', $pin)){
            $errors['pin'] = 'Error: Combination of number is neeeded<br />';
        }elseif(mysqli_num_rows($result) == 0){
            $errors['pin'] = 'Error: NO such Pin exist<br />';
        }

        if(array_filter($errors)){
        }else{
            $pin = mysqli_real_escape_string($conn, $_POST['pin']);
            $sql = "SELECT pin FROM adminregister WHERE pin='$pin'";
            $result = mysqli_query($conn, $sql);   
                if(mysqli_num_rows($result) > 0){
                    $_SESSION['status'] = true;
                    header('location: ../choose.php');
                }
        }
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        text-decoration: none;
        list-style-type: none;
    }

    body{
        width: 100%;
        height: 100%;
        background: #4d7ee5;
    }

    a.preview{
    width: 100%;
    max-width: 130px;
    position: absolute;
    left: 10px;
    top: 10px;
    color: #4d7ee5;
    padding: 7px 0px;
    background: #f0efef;
    border-radius: 10px;
    box-shadow: 4px 4px #2727a8;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    }

    a.preview p{
        position: relative;
        top: 7px;
        margin-left: 5px ;
    }

    div.showError{
        font-size: 11px;
        color: white;
        padding: 7px 0px;
        box-sizing: border-box;
    }

    form{
        text-align: center;
        padding-top: 220px;
    }

    form img{
        width: 110px; 
        height: 100px;

    }

    form section{
        margin-top: 10px;
        color: white
    }

    section h1{
        font-size: 20px;
        padding: 4px 10px;
        color: white;
    }

    section input{
        font-size: 20px;
        text-align: center;
        padding: 4px 10px;
        box-sizing: border-box;
        outline: none;
        border: 0;
        text-transform: uppercase;
    }

</style>
<body>

    <a class="preview" href="../index.php"> <!-- START a.preview -->
        <img src="../img/previous.png">
        <p>Preview</p>
    </a> <!-- END a.preview -->

    <form method="POST">
        <img src="../img/loading.gif" alt="loading">
        <section>
            <h1>PIN: Required</h1>
            <input type="password" name="pin" placeholder="pin" autofocus="autofocus" autocomplete="off">
            <div class="showError"><?php echo $errors['pin']; ?></div>
        </section>
    </form>   
</body>
</html>