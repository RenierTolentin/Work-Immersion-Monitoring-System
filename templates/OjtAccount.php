<?php
    include('../config/serverSideScriptStudent.php');  
    if($_SESSION['status'] !== true){
        header('location: ../choose.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ojtAccount.css">
    <title>ADD - OJT Account</title>
</head>
<body >
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
            <p><img src="../img/exclamation.png" alt=""> Type the fullname of trainee(Firstname/Lastname/M.I)</p>
            <p><img src="../img/exclamation.png" alt=""> Input trainees Student Number </p>
            <p><img src="../img/exclamation.png" alt=""> Input trainees School Name</p>
            <p><img src="../img/exclamation.png" alt=""> Input trainees Department during Work Immersion</p>
            <p><img src="../img/exclamation.png" alt=""> Input trainees Mobile Number</p>
        </div>
    </article>

    <form  tabindex="-1" method="POST" class="slider" enctype="multipart/form-data" id="blurBackground">
        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">

            <div class="slide first">
                <section class="childSection adjust">
                    <a href="../choose.php"><img src="../img/previous.png" alt="back-arrow"></a>
                    <h3>Verify you first!</h3>
                </section>
              
                <div class="verifyAccountForm">
                    <div class="firstContent">
                        <h3>OJT Account</h3>
                        <div class="backgroundDiv">
                            <img src="../img/student.png" alt="" class="studentImage">
                            <a onclick="toggleUserGuide()">User Guide</a>
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
                </div>
            </div>

            <div class="slide">
                <section class="childSection adjust">
                    <a href="../choose.php"><img src="../img/previous.png" alt="back-arrow"></a>
                    <h3>Final Step: New Account</h3>
                </section>

                <div class="verifyAccountForm">
                    <div class="thirdContent">
                        <div class="toRounded">
                            <img src="../img/avatar.png" id="profileDisplay" onclick="addImage()">
                            <label for="">Add a Photo</label>
                            <input type="file" name="profileImage" id="profileImage" class="profileImage" onchange="displayImage(this)">
                            <div class="showError"><?php echo $errors['profileImage']; ?></div>

                            <input type="text" placeholder="Lastname Firstname M.I" name='fullName'oninput="this.value = this.value.autocapitalize()" value="<?php echo htmlspecialchars($fullName) ?>" autocomplete="off">
                            <div class="showError"><?php echo $errors['fullName']; ?></div>

                            <input type="text" placeholder="Student Number" name='studentNumber' oninput="this.value = this.value.toUpperCase()" value="<?php echo htmlspecialchars($studentNumber) ?>" autocomplete="off">
                            <div class="showError"><?php echo $errors['studentNumber']; ?></div>
                        </div>
                    </div>
            
                    <div class="fourthContent">
                        <input type="text" placeholder="School Name" name='schoolName' oninput="this.value = this.value.toUpperCase()" value="<?php echo htmlspecialchars($schoolName) ?>" autocomplete="off">
                        <div class="showError"><?php echo $errors['schoolName']; ?></div>

                        <input type="text" placeholder="Department" name='department' oninput="this.value = this.value.toUpperCase()" value="<?php echo htmlspecialchars($department) ?>" autocomplete="off">
                        <div class="showError"><?php echo $errors['department']; ?></div>

                        <input type="text" placeholder="Contact Number" name='contantNumber' value="<?php echo htmlspecialchars($contantNumber) ?>" autocomplete="off">
                        <div class="showError"><?php echo $errors['contantNumber']; ?></div>

                        <button type="submit" name='create'>Create Account</button>    
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation-manual"><!-- Start of .navigation-manual-->
                <label for="radio1" class="manual-btn">Preview</label>
                <label for="radio2" class="manual-btn">Next</label>
            </div><!-- End of .navigation-manual-->
    </form>
    <script type="text/javascript" src="../javascript/createAccount.js"></script>
</body>
</html>

