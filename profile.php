<?php
 include 'config.php' ;
 session_start();
 $insert = false ;
 $username = $_SESSION["username"];
 $empid = $_SESSION["empid"] ;

 $err = "" ;

 $eid = $uname = $item = $status = "" ;

 if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $eid = $_POST["empid"];


    $sql =  mysqli_query($con," SELECT * FROM complaints WHERE e_id = '" .$eid ."'" );

    if (mysqli_num_rows($sql) != 0){
        
       ;
        while($row = mysqli_fetch_row($sql)) {

            if($row[5] != "resolved" && $row[3] == $_POST["item"] ){
                $err = " Complaint still in process !";
                echo "<script> alert('$err'); </script>";
            }
        }
    }


    if(empty($err)){
        
        $uname = $_POST["username"];
        $status = "New" ;
        $item = $_POST["item"];
        $sql = " INSERT INTO complaints (`e_id`, `username`, `i_id`,`date`, `status`) VALUES(?, ?, ?,  current_timestamp(), ?) ";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $param_eid, $param_uname, $param_iid, $status);

            // Set these parameters
            $param_eid = $eid;
            $_SESSION["empid"] = $eid ;
            $param_uname = $uname;
            $param_iid = $item;

        //Try to execute
        if (!mysqli_stmt_execute(($stmt))) {

            echo "<script> alert('Something went wrong..... Try again') ;</script>";
            exit;
        }else {
            $id = mysqli_insert_id($con) ;
            echo "<script> alert('Complaint Succesfully Lodged with complaint number = $id !! ');</script>" ;
         }

    }else{
        echo " <script> alert('Can't lodge complaint with these details') ;</script> ";
    }
        
     mysqli_stmt_close($stmt);     
    }
 }
mysqli_close($con);



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>PROFILE CREDENTIALS</title>
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
            <div class="nav-bar-menu" id="history" onclick="location.href = `http://localhost/php/CMS/history.php` ">All Complaints</div>
            
            <div class="uname"><span class="material-icons-outlined">
                    account_circle
                  
                </span> 
                <div style="font-weight:bold; font-size: 1.2em; padding: 10px"><?php echo $username ; ?></div>
                </div>

        </nav>
        <article>
            <img src="./partials/tcillogo.png" alt="logo" id="logo" />
            <div class="manual">
                <div class="content">
                   <div class="details">
                       <div class="pers">
                         <img src="./partials/person.jpg" width="200px" >
                         <div style="padding: 10px;"> Username: <?php echo $username ; ?> </div>
                         <div> Employee ID: <?php echo $empid ; ?></div>
                        </div>
                    </div>

                   <form class="comp-form" id="comp-form" method="POST">
                      <label for="empid">Employee ID:</label>
                      <input name="empid" type="number" value="<?php echo $empid ; ?>" required/>

                      <label for="username">Username:</label>
                      <input name="username" type="text" value="<?php echo $username ; ?>" required>

                      <label for="item">Item:</label>
                      <select name="item">
                          <option value="none" selected disabled hidden> Select an Option </option>
                          <option value="1">CPU</option>
                          <option value="2">Monitor</option>
                          <option value="3">Printer</option>
                          <option value="4">Scanner</option>
                          <option value="5">Mouse</option>
                           <option value="6">Keyboard</option>
                         <option value="7">Ethernet</option>
                        </select>
                        
                        <div>
                        <button type="submit" class="sub" form="comp-form">Submit</button>
                        <button type="reset" class="sub" form="comp-form">Reset</button>
                       </div>
                    </form>
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
    </div>
    
</body>
</html>