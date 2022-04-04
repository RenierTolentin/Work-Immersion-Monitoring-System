<?php
    include('../config/serverSideScriptAdmin.php');
    if($_SESSION['status'] !== true){
        header('location: ../choose.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/addAdminAccount.css">
    <title>ADD - Admin Account</title>
</head>
<body>
    <nav><!-- start nav -->
        <ul><!-- start ul -->
            <img src="../img/wimslogo.png" alt="attendancelogo">
        </ul><!-- end nav -->
    </nav><!-- end main -->

    <article class="popUp" id="userGuidePopUp">
        <a onclick="toggleUserGuide()"><img src="../img/close-button.png" alt="close-button"></a>
        <h3>User Guide</h3>
        <div>
            <p><img src="../img/exclamation.png" alt=""> Tap trainees Radio Frequency Identification</p>
            <p><img src="../img/exclamation.png" alt=""> User a proper Gmail account(Only Accept's Gmail account)</p>
            <p><img src="../img/exclamation.png" alt=""> Create a strong password(Greater than 9 or Less than 21)</p>
            <p><img src="../img/exclamation.png" alt=""> Re-type your desired password</p>
            <p><img src="../img/exclamation.png" alt=""> Choose an image of trainee</p>
        </div>
    </article>

    <form class="firstForm" method="POST" enctype="multipart/form-data" id="blurBackground">
        <section class="childSection adjust">
            <a href="../choose.php"><img src="../img/previous.png" alt="back-arrow"></a>
            <h3>Verify you first!</h3>
        </section>

        <div class="verifyAccountForm">
            <div class="firstContent">
                <h3>Admin Account</h3>
                <div class="backgroundDiv">
                    <img src="../img/admin.png" alt="">
                    <button type="button" onclick="toggleUserGuide()">User Guide</button>
                </div>
            </div>

            <div class="secondContent secondContentAdjust">
                <input type="text" placeholder="rfid*" name="rfid" value="<?php echo htmlspecialchars($rfid) ?>" autocomplete="off">
                <div class="showError"><?php echo $errors['rfid']; ?></div>

                <input type="text" placeholder="Email Account" name="emailAccount" value="<?php echo htmlspecialchars($emailAccount) ?>" autocomplete="off">
                <div class="showError"><?php echo $errors['emailAccount']; ?></div>
                
                <input type="password" placeholder="Password" name="password1" value="<?php echo htmlspecialchars($password1) ?>" autocomplete="off">
                <div class="showError"><?php echo $errors['password1']; ?></div>
                
                <input type="password" placeholder="Verify Password" name="verifyPassword" value="<?php echo htmlspecialchars($verifyPassword) ?>" autocomplete="off">
                <div class="showError"><?php echo $errors['verifyPassword']; ?></div>
            </div>

            <div class="thirdContent">
                <div class="toRounded">
                    <img src="../img/avatar.png" id="profileDisplay" onclick="addImage()">
                    <label for="">Add a Photo</label>
                    <input type="file" id="profileImage" name="profileImage" class="profileImage" onchange="displayImage(this)">
                    <div class="showError"><?php echo $errors['profileImage']; ?></div>

                    <button name="submit"><a>Create</a></button>
                </div>
            </div>
        </div>
    </form>   
    <script type="text/javascript" src="../javascript/createAccount.js"></script>
</body>
</html>