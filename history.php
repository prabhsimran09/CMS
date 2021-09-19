<?php

require_once "config.php";
session_start();
$username = $_SESSION["username"];
$empid = $_SESSION["empid"] ;

    
    $sql = mysqli_query($con, "SELECT * FROM complaints where e_id = '".$empid."' order by complaint_id ;");
    
    if(mysqli_num_rows($sql) == 0){

        echo "<script> alert('No Complaint found');</script>";

    }  
   mysqli_close($con) ;

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
            <div class="nav-bar-menu " id="home" onclick="location.href = `http://localhost/php/CMS/welcome.php`">Home</div>
            <div class="nav-bar-menu selected" id="profile" >Profile</div>
            <div class="nav-bar-menu" id="status" onclick=" location.href = `http://localhost/php/CMS/status.php` ">Check Status</div>
            <div class="nav-bar-menu" id="feedback" onclick="location.href = `http://localhost/php/CMS/feedback.php` ">Feedback</div>
            <div class="nav-bar-menu" id="history" onclick="location.href = `http://localhost/php/CMS/history.html` ">All Complaints</div>
            
            <div class="uname"><span class="material-icons-outlined">
                    account_circle
                  
                </span> 
                <div style="font-weight:bold; font-size: 1.2em; padding: 10px"><?php echo $username ; ?></div>
                </div>

        </nav>
        <article>
            <img src="./partials/tcillogo.png" alt="logo" id="logo" />
            <div class="manual">
                <table>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    <?php 
                        $item = "";
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
                    <tr>
                         <td><?php echo $row[0] ; ?></td>
                         <td><?php echo $item ; ?></td>
                         <td><?php echo $row[5] ; ?></td>
                         <td><?php echo $row[4] ; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>

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
    </div>
    
</body>
</html>