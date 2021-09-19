<?php

require_once "config.php";
session_start();
$username = $_SESSION["username"];
$empid = $_SESSION["empid"] ;

    
    $sql = mysqli_query($con, "SELECT * FROM complaints order by complaint_id");
    
    if(mysqli_num_rows($sql) == 0){

        echo "<script> alert('No Complaint found');</script>";

    }  


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>All Complaints</title>
</head>
<body>
    <div class="main-container">
        <header>
            <marquee behavior="scroll" direction="left">
                <pre> Telecommunications Consultants India Limited.                                  Telecommunications Consultants India Limited.                                  Telecommunications Consultants India Limited.</pre>
            </marquee>
            <h2> COMPLAINT MANAGEMENT SYSTEM</h2>
            <a class="log" href="logout.php">Log Out</a>
        </header>
        <nav>
            <!-- <div class="nav-bar-menu " id="home" onclick="location.href = `http://localhost/php/CMS/welcome.php`">Home</div> -->
            <div class="nav-bar-menu selected" id="profile" >All Complaints</div>
            
            <div class="uname" style=" margin-left:78em;"><span class="material-icons-outlined">
                    account_circle
                  
                </span> 
                <div style="font-weight:bold; font-size: 1.2em; padding: 10px;"><?php echo $username ; ?></div>
                </div>

        </nav>
        <article>
            <img src="./partials/tcillogo.png" alt="logo" id="logo" />
            <div class="manual">
                <table class="t1">
                    <tr>
                        <th>Complaint ID</th>
                        <th>Employee ID</th>
                        <th>Username</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    <?php 
                        $item =  $initial_status = "";
                        while($row = mysqli_fetch_row($sql)) {

                            switch($row[3]){
        
                               case '1': {
                                          $item = "CPU";
                                          break; 
                                        }
                               case '2': {
                                          $item = "Monitor";
                                          break;
                                        }
                               case '3': { 
                                         $item = "Printer";
                                         break;
                                        }
                               case '4': { 
                                         $item = "Scanner";
                                         break;
                                        }
                               case '5':{
                                         $item = "Keyboard";
                                         break;
                                        }
                               case '6':{
                                         $item = "Mouse";
                                         break;
                                        }
                               case "7":{
                                        $item = "Ethernet";
                                        break;
                                       }
                              default :{
                                        $item = "-" ;
                                        break ;
                                       }
                             }
                    ?>
                    <tr class="row" id="r">
                         <td><?php echo $row[0] ; ?></td>
                         <td><?php echo $row[1] ; ?></td>
                         <td><?php echo $row[2] ; ?></td>
                         <td><?php echo $item ; ?></td>
                         <td class="dd"><?php
                           $initial_status = $row[5] ;
                           if($row[5] == "resolved") echo $row[5] ;
                           else{
                               echo "<select name='status' id='st'>  <option value='$row[5]' selected disabled hidden>$row[5]</option><option value='new'>New</option><option value='processing'>Processing</option><option value='resolved'>Resolved</option> </select>";
                           }
                         ?> </td>
                         <td><?php echo $row[4] ; ?></td>
                    </tr>
                  
                    <?php
                        }
                    ?>
                </table>
                <div style="margin-left: 400px; margin-top:20px;">
                   <button type="submit" class="ssub">Save</button>
                   <button type="reset" class="sub">Reset</button>
                </div>

            </div>
            <div class="general">
                <h3>ABOUT</h3>
                <img src="./partials/tcil_office.jpg" alt="tcil_office" id="office" />
                <p class="about"> Telecommunications Consultants India Limited (TCIL) is a government owned engineering and consultancy firm. It is under the ownership of the Department of Telecommunications , Ministry of Communications, Government of India. It was set up in 1978 to give consultations in fields of Telecommunications to developing countries around the world. Started with an initial investment of 10lakh. TCIL is present in almost 80 countries, mainly in the Middle East, Africa and Europe.</p>
                </marquee>

            </div>
        </article>
        <footer>
            <marquee behavior="scroll" direction="left" loop="">
                <pre>Helpline: XXXXXXXX92   ;  Email: this@this.com                                    Helpline: XXXXXXXX92   ;  Email: this@this.com                                    Helpline: XXXXXXXX92   ;  Email: this@this.com</pre>
            </marquee>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./script.js"></script>
    </div>
    <?php 

       if(isset($_COOKIE["c_id"])){

          $c_id = $_COOKIE["c_id"];
          $e_id = $_COOKIE["e_id"];
          $uname = $_COOKIE["uname"];
          $item = $_COOKIE["item"];
          $final_status = $_COOKIE["status"];
          $date = $_COOKIE["date"]; 

          $sql = mysqli_query($con, "UPDATE complaints SET status = '".$final_status."' , date = current_timestamp() where complaint_id = '".$c_id."'");

          if(!$sql){
              echo "<script> alert('Error: Changes not saved');</script>";
            }
          else{
            
             $email = $_SESSION['email'] ;
             $log = "INSERT INTO logs (`e_id`, `status_from`, `status_to`, `status_by`, `date`) VALUES ( ?, ?, ?, ? ,current_timestamp()) ";
             $stmt = mysqli_prepare($con, $log);
  
              if ($stmt) {
                 mysqli_stmt_bind_param($stmt, "ssss", $param_eid, $param_sf, $param_st, $sb);
  
                  // Set these parameters
                 $param_eid = $e_id;
                 $param_sf = $initial_status;
                 $param_st = $final_status;
                 $sb = $email ;
  
                 //Try to execute
                 if (!mysqli_stmt_execute(($stmt))) {
                     echo "<script> alert('Something went wrong..... Try again') ;</script>";
                     exit;
                 }
                //  else{
                //     echo "<script> alert('Changes Saved Successfully !!');</script>";
                //  }
                }
            }
       
         mysqli_close($con) ;
        }
 
    ?>
    
</body>
</html>