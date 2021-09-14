<?php

require_once "config.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $comp_no = $_POST["complaint-no"];
    $sql = mysqli_query($con, "SELECT * FROM complaints where complaint_id = '".$comp_no."'");
    
    if(mysqli_num_rows($sql) == 0){

        echo "<script> alert('No Complaint found');</script>";

    }else{

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

            $_SESSION["empid"] = $row[1];
            $_SESSION["cmpid"] = $row[0];
            $_SESSION["status"] = $row[5] ;
            $_SESSION["dt"] = $row[4];
            $_SESSION["item"] = $item ;

         header("location: table.php");

        }
    }
   
   mysqli_close($con) ;
}


?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Check status</title>
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
            <div class="nav-bar-menu" id="home" onclick="location.href = `http://localhost/php/CMS/welcome.php`">Home</div>
            <div class="nav-bar-menu" id="login" onclick=" location.href = `http://localhost/php/CMS/profile.php`">Profile</div>
            <div class="nav-bar-menu selected" id="status" onclick=" location.href = `http://localhost/php/CMS/status.php` ">Check Status</div>
            <div class="nav-bar-menu" id="feedback" onclick="location.href = `http://localhost/php/CMS/feedback.php` ">Feedback</div>
        </nav>
        <article>
            <img src="./partials/tcillogo.png" alt="logo" id="logo" />
            <div class="manual" id="manual">
                <form class="status-form" method="POST">
                    <label for="complaint-no">Complaint Number: </label>
                    <br>
                    <input type="text" name="complaint-no" id="complaint-no" placeholder="Enter here" required>
                    <br>
                    <!-- <label for="empid">Employee ID: </label>
                    <br>
                    <input type="text" name="empid" id="empid" placeholder="Enter here"> -->
                    <button type="submit" class="sub">Submit</button>
                    <button type="reset" class="sub">Reset</a>
                </form>
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

    <script src="script.js"></script>
</body>

</html>