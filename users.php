<?php

$insert = false ;
if( isset($_POST['fname'])){
    

$server = "localhost" ;
$username = "root";
$pass = "" ;
$con = new mysqli($server, $username, $pass);
$con->select_db("cms");

if (!$con) {
    die ( "Connection to this database failed due to " . mysqli_connect_error());
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$empid = $_POST['empid'];
$email = $_POST['email'];
$passw = $_POST['passw'];
$dept = $_POST['dept'];


$sql = " INSERT INTO `users` (`fname`, `lname`, `empid`, `email`, `passw`, `dept`,`ticketid`,`dt`) VALUES ('$fname', '$lname', '$empid', '$email', '$passw', '$dept', 'SA234',current_timestamp())"; 

if($con->query($sql) == true){
    //echo "Successfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error ";
}

$con->close() ;
}
?>
