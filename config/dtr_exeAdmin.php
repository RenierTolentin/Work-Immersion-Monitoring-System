<?php
	session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'register');
    // checking of the connection exist
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }

	$rfidNumber = $_GET['rfidNumber'];
	$time = $_GET['time'];
	$dtoday = $_GET['dtoday'];
	$fullname = $_GET['fullname'];
	$department = $_GET['department'];
	$rfid = mysqli_real_escape_string($conn, $_SESSION['rfidSession']);

		if (isset($_GET['time_in'])) {
			$insertdtr = mysqli_query($conn,"INSERT INTO `dtr`(`id`, `rfid`, `fullname`, `department`, `edate`, `time_in`) VALUES ('','$rfidNumber','$fullname','$department','$dtoday','$time')");
            $insertlogamin = mysqli_query($conn,"INSERT INTO `time_log`(`id`, `rfid`, `fullname`, `date`, `department`, `status`,`time`) VALUES ('','$rfidNumber','$fullname','$dtoday','$department','time-in','$time')");
		}

		if (isset($_GET['time_out'])) {
			$insertamout = mysqli_query($conn,"UPDATE `dtr` SET `time_out`='$time' WHERE rfid = '$rfidNumber' AND edate = '$dtoday'");
			$insertlogamout = mysqli_query($conn,"INSERT INTO `time_log`(`id`, `rfid`, `fullname`, `date`, `department`, `status`,`time`) VALUES ('','$rfidNumber','$fullname','$dtoday','$department','time-out','$time')");
		}

	    if (isset($_GET['ot_in'])) {
			$insertamout = mysqli_query($conn,"UPDATE `dtr` SET `ot_in`='$time' WHERE rfid = '$rfidNumber' AND edate = '$dtoday'");
			$insertlogotin = mysqli_query($conn,"INSERT INTO `time_log`(`id`, `rfid`, `fullname`, `date`, `department`, `status`,`time`) VALUES ('','$rfidNumber','$fullname','$dtoday','$department','OT: time-in','$time')");
		}

	    if (isset($_GET['ot_out'])) {
			$insertamout = mysqli_query($conn,"UPDATE `dtr` SET `ot_out`='$time' WHERE rfid = '$rfidNumber' AND edate = '$dtoday'");
			$insertlogotout = mysqli_query($conn,"INSERT INTO `time_log`(`id`, `rfid`, `fullname`, `date`, `department`, `status`,`time`) VALUES ('','$rfidNumber','$fullname','$dtoday','$department','OT: time-out','$time')");
		}

	header("Location: http://localhost/WIMS/adminDashboard.php?rfid=$rfid");
 ?>