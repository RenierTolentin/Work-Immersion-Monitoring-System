<?php
    session_start();
    if($_SESSION['status'] !== true){
        header('location: ../choose.php');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfully Created!</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        text-decoration: none;
        list-style-type: none;
    }

    main{
        background: #4d7ee5;
        width: 100%;
        height: 100%;
    }

    main img{
        width: 110px; 
        height: 100px;
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%,-50%)
    }

    main section{
        margin-top: 20px;
        position: absolute;
        width: 95%;
        top: 55%;
        left: 50%;
        transform: translate(-50%,-50%);
        box-sizing: border-box;
        text-align: center;
        color: white
    }

    main section h1{
        display: inline-block;
        padding-bottom: 30px;
        margin-bottom: 20px;
        font-size: 12px;
    }

    main section > a{
        display: inline-block;
        background: white;
        color: #4d7ee5;
        padding: 8px 15px;
        margin-top: 10px;
        font-weight: 800;
        font-size: 14px;
        border-radius: 7px;
    }

</style>
<body>
    <main>
        <img src="../img/loading.gif" alt="loading">
        <section>
            <h1>Account Successfully Created</h1>
            <a href="../choose.php">OKAY</a>
        </section>
    </main>    
</body>
</html>