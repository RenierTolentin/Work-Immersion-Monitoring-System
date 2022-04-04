<?php

  $conn = mysqli_connect('localhost', 'root', '', 'register');
  // checking of the connection exist
  if(!$conn){
      echo 'connection error: ' . mysqli_connect_error();
  }
  if(isset($_GET['rfidNumber'])){
  $rfidNumber = $_GET['rfidNumber'];
	$time = $_GET['hours'].":".$_GET['mins'].":".$_GET['secs'];
	$dtoday = $_GET['dtoday'];
  $rfid = mysqli_real_escape_string($conn, $_SESSION['rfidSession']);
  
  $checkid = mysqli_query($conn,"SELECT * FROM studentregister WHERE rfid = '$rfidNumber'");
	$row = mysqli_fetch_assoc($checkid);
    if(mysqli_num_rows($checkid) != 0){
      $fullname = $row['fullname'];
		  $department = $row['department'];
      $sql = "SELECT * FROM dtr WHERE rfid = '$rfidNumber' AND edate = '$dtoday'";
      $checkdtr = mysqli_query($conn, $sql);  
      if (mysqli_num_rows($checkdtr)==0) { ?>
          <div class="wrapper">
            <div class="modalDialog">
              <div class="modalHeader">
                <h4><?php echo $fullname; ?></h4>
              </div>
              <div class="modalBody">
                <p>You are about to Time-in at <?php echo $time; ?>. 
                Are you sure you want to proceed?</p>
              </div>
              <div class="modalFooter">
                <a href="http://localhost/WIMS/adminDashboard.php?rfid=<?php echo $rfid?>" type="button">No</a>
                <a href="config/dtr_exeAdmin.php?rfidNumber=<?php echo $rfidNumber.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&department='.$department.'&time_in';?>" class="second">Yes</a>
              </div>        
            </div>
          </div>
        <?php
      }else{
        $checktimeout = mysqli_query($conn,"SELECT * FROM dtr WHERE rfid = '$rfidNumber' AND edate = '$dtoday' AND time_out = ''");
			  $checkotin = mysqli_query($conn,"SELECT * FROM dtr WHERE rfid = '$rfidNumber' AND edate = '$dtoday' AND  time_out != '' AND ot_in = ''");
			  $checkotout = mysqli_query($conn,"SELECT * FROM dtr WHERE rfid = '$rfidNumber' AND edate = '$dtoday' AND time_out != '' AND ot_in != '' AND ot_out = ''");
			  $checkall = mysqli_query($conn,"SELECT * FROM dtr WHERE rfid = '$rfidNumber' AND edate = '$dtoday' AND time_out != '' AND ot_in != '' AND ot_out != ''");
        if (mysqli_num_rows($checktimeout)!=0) { ?>
          <div class="wrapper">
            <div class="modalDialog">
              <div class="modalHeader">
                <h4><?php echo $fullname; ?></h4>
              </div>
              <div class="modalBody">
                <p>You are about to Time-out at <?php echo $time; ?>.
                Are you sure you want to proceed?</p>
              </div>
              <div class="modalFooter second">
                <a href="http://localhost/WIMS/adminDashboard.php?rfid=<?php echo $rfid?>" type="button">No</a>
                <a href="config/dtr_exeAdmin.php?rfidNumber=<?php echo $rfidNumber.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&department='.$department.'&time_out'; ?>" class="second">Yes</a>
              </div>
            </div>   
          </div>
          <?php
        }
        if (mysqli_num_rows($checkotin)!=0) { ?>
          <div class="wrapper">
            <div class="modalDialog">
              <div class="modalHeader">
                <h4><?php echo $fullname; ?></h4>
              </div>
              <div class="modalBody">
                <p>OVER TIME: You are about to Time-in at <?php echo $time; ?>.
                Are you sure you want to proceed?</p>
              </div>
              <div class="modalFooter">
                <a href="http://localhost/WIMS/adminDashboard.php?rfid=<?php echo $rfid?>" type="button">No</a>
                <a href="config/dtr_exeAdmin.php?rfidNumber=<?php echo $rfidNumber.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&department='.$department.'&ot_in'; ?>" class="second">Yes</a>
              </div>
            </div> 
          </div>
          <?php
        }
        if (mysqli_num_rows($checkotout)!=0) { ?>
          <div class="modal show" id="myModal3" role="dialog">
            <div class="modalDialog">
              <div class="modalHeader">
                <h4><?php echo $fullname; ?></h4>
              </div>
              <div class="modalBody">
                <p>OVER TIME: You are about to Time-out at <?php echo $time; ?>.
                  Are you sure you want to proceed?</p>
              </div>
              <div class="modalFooter">
                <a href="http://localhost/WIMS/adminDashboard.php?rfid=<?php echo $rfid?>" type="button">No</a>
                <a href="config/dtr_exeAdmin.php?rfidNumber=<?php echo $rfidNumber.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&department='.$department.'&ot_out'; ?>" class="second" >Yes</a>
              </div>
            </div>  
          </div>
          <?php
        }
        if (mysqli_num_rows($checkall)!=0) { ?>
          <div class="modal show" id="myModal3" role="dialog">
            <div class="modalDialog">
              <div class="modalHeader">
                <h4><?php echo $fullname; ?></h4>
              </div>
              <div class="modalBody">
                <p>Your DTR for this day is full. Please contact administrator.</p>
              </div>
              <div class="modalFooter">
                <a href="http://localhost/WIMS/adminDashboard.php?rfid=<?php echo $rfid?>" type="button" class="second">Ok</a>
              </div>
            </div>               
          </div>
          <?php	}
        }
    }else
      { ?>
        <div class="wrapper">
          <div class="modalDialog" style="width: 100%; max-width: 400px">
              <div class="modalheader">
                <h4 class="modal-title text-uppercase"><?php echo $_GET['rfidNumber']; ?></h4>
              </div>
              <div class="modalBody">
                <p>NOT REGISTERED: Please contact Admin</p>
              </div>
              <div class="modalFooter">
                <a href="http://localhost/WIMS/adminDashboard.php?rfid=<?php echo $rfid?>" type="button" class="second">Ok</a>
              </div>
            </div>            
        </div>
      <?php 
      }
    }
?>