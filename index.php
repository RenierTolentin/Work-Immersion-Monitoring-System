<?php 
    include('config/indexSendEmail.php');
    include('config/indexRfidSystem.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <title>WIMS: Welcome</title>
</head>
<body>
    <main><!-- START main -->
        <nav><!-- START nav -->
        <img src="img/wimslogo.png" alt="logo" class="logo">
        <a id="navigate" onclick="toggleNavigationBar()"></a>
            <ul id="toToggle"><!-- START ul -->
                <li><a href="templates/learnmore.php">Learn More</a></li>
                <li><a href="templates/faq.php">FAQ</a></li>
                <li><a href="templates/about.php">About</a></li>
                <li><a onclick="toggleUserGuide()" type="button">contact</a></li>
                <form class="popUpContact" method="POST" id="userGuidePopUp"> <!-- START form#userGuidePopUp -->
                    <a onclick="toggleUserGuide()" type="button"><img src="img/close-button.png" alt="close-button" class="closeButton"></a>
                    <h3>Suggestions and Feedback</h3>
                    <div class="border"> <!-- START div.border -->
                        <div class="first"> <!-- START div.first -->
                            <input type="text" placeholder="Your Name" name="sendersName" autocomplete="off">
                            <div class="showError"><?php echo $errors['sendersName']; ?></div>

                            <input type="text" placeholder="Email Address" name="sendersEmail" autocomplete="off">
                            <div class="showError"><?php echo $errors['sendersEmail']; ?></div>
                        
                            <p>San Mateo, Rizal. Philippines</p>
                            <p>OfficialWIMS2021@gmail.com</p>
                            <p>856-235-11</p>
                        </div><!-- END div.first -->

                        <div class="second"> <!-- START div.second -->
                            <textarea name="sendersMessage" placeholder="Message" id="messageBox" autocomplete="off" ></textarea>
                            <div class="showError"><?php echo $errors['sendersMessage']; ?></div>
                            <button name="sendEmail" class="sendEmail" type="submit">Send</button>
                        </div> <!-- END div.second -->
                    </div> <!-- END div.border -->
                </form> <!-- END form#userGuidePopUp -->
            </ul><!-- END nav -->
        </nav><!-- END main -->

        <form id="blurBackground" class="blur" method="GET"><!-- START form#blurBackground -->
            <section class="mainSection"><!-- START section.mainSection -->
                <img src="img/rfid.png" alt="scanning">
                <h4>Work Immersion: Monitoring System for OJT's using RFID</h4>
                <p>This Web Application allows everyone for a less hustle, more hygiene contact less monitoring system</p>
                <span><a href="templates/chooseLogIn.php">Sign In</a></span>
                <span><a href="templates/verifyToSignUp.php">Sign Up</a></span>
            </section><!-- END section.mainSection -->
            
            <article><!-- END article -->
                <img src="img/photo2.png" alt="toscan">
            </article><!-- END article -->

            <div class="scan"> <!-- START div.scan -->
			        <input type="hidden" name="hours" id="hh">
			        <input type="hidden" name="mins" id="mm">
			        <input type="hidden" name="secs" id="ss">
			        <input type="hidden" name="dtoday" id="dateval">
			        <input id="EPN" name="rfidNumber" autofocus="autofocus" autocomplete="off"  placeholder="Scan your rfid"/>
			</div> <!-- END div.scan -->

            <div class="showTable"> <!-- START div.showTable -->
                <table> <!-- START table -->
                    <th>Date</th>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>Time</th>
                    <th>Status</th>
                    <?php
                        $sql = "SELECT * FROM `time_log` ORDER BY id DESC LIMIT 20";
                        $displaylog = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($displaylog)) { ?>
                            <tr>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['department']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                        <?php }
                    ?>
                </table> <!-- END table -->
		    </div>  <!-- END div.showTable -->
        </form> <!-- END form#blurBackground -->
    </main> <!-- END main -->
    <script type="text/javascript" src="javascript/createAccount.js"></script>
    <script type="text/javascript" src="javascript/setIntervalTable.js"></script>
</body>
</html>