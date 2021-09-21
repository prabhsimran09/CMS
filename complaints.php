<?php

session_start();
$username = $_SESSION["username"];
$empid = $_SESSION["empid"] ;
 

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
            <form class="admin" method="POST">

               <label for="ustatus" class="lab">Select Status:</label>
               <select name="ustatus" id="ust" required>
                  <option value="resolved">Resolved</option>
                  <option value="processing">Processing</option>
                  <option value="new">New</option>
                </select>
               
               <label class="lab">Select Date:</label>

               <label for="dt1" class="lab" >FROM:</label>
               <input type="date" name="dt1" id="d1" required>

               <label for="dt2" class="lab">TO:</label>
               <input type="date" name="dt2" id="d2" required>

               <button type="submit" class="asub" id="go">Go</button>
               <button type="reset" class="asub" id="res">Reset</button>

            </form>
            <?php 
                
                require_once "config.php";
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    $user_status = $_POST["ustatus"];
                    $d1 = $_POST["dt1"];
                    $d2 = $_POST["dt2"];
                
                    $sql = mysqli_query($con, " SELECT * FROM complaints where status = '".$user_status."' AND date >= '".$d1."' AND date <= '".$d2."'");
                   
                    if(mysqli_num_rows($sql) == 0){
                
                        echo "<script> alert('No Complaint found');</script>";
                
                    } 
            
            ?>
                <table class="t1" id="t1">
                    <tr>
                        <th>Complaint ID</th>
                        <th>Employee ID</th>
                        <th>Username</th>
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
                    <tr class="row" id="r">
                         <td><?php echo $row[0] ; ?></td>
                         <td><?php echo $row[1] ; ?></td>
                         <td><?php echo $row[2] ; ?></td>
                         <td><?php echo $item ; ?></td>
                         <td class="dd"><?php
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
                <?php }?>

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
    <?php 
    
       if(isset($_COOKIE["c_id"])){

          $c_id = $_COOKIE["c_id"];
          $e_id = $_COOKIE["e_id"];
          $uname = $_COOKIE["uname"];
          $item = $_COOKIE["item"];
          $final_status = $_COOKIE["status"];
          $date = $_COOKIE["date"];
          $initial_status = "" ;
        //   if($final_status== "Processing" || $final_status == "processing")
        //     { $initial_status = "new" ;}
    
        //   else if($final_status == "Resolved" || $final_status == "resolved")
        //    {  $initial_status = "processing";}

          $result = mysqli_query( $con, "SELECT * FROM complaints where complaint_id = '".$c_id."'");
          if(mysqli_num_rows($result)!= 0){
            while($row = mysqli_fetch_row($result)){
                $initial_status = $row[5];
            }
          

          $sql = mysqli_query($con, "UPDATE complaints SET status = '".$final_status."' , date = current_timestamp() where complaint_id = '".$c_id."'");
          if(!$sql){
              echo "<script> alert('Error: Changes not saved');</script>";
            }
          else{
            
             $email = $_SESSION['email'] ;
             $log = "INSERT INTO logs (`e_id`, `status_from`, `status_to`, `status_by`, `date`) VALUES ( ?, ?, ?, ? ,current_timestamp()) ";
             $stmt = mysqli_prepare($con, $log);
             echo "<script> alert('Changes Saved Successfully !!');</script>";
  
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
                }
            }
        }
        
       
         mysqli_close($con) ;
        }
 
    ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="./script.js"></script>
</body>
</html>