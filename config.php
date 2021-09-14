<?php

// Set the values for ser , host and database 

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "admin_panel";

// Set up a connection 
$con = mysqli_connect($server_name,$db_username,$db_password,$db_name);

if(!$con)
{   
    // if unable to connect to network 
    die("Connection failed: " . mysqli_connect_error());
    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
                            <h2 class="card-title"> Database Failure</h2>
                            <p class="card-text"> Please Check Your Database Connection.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}
else if($con)
{
    // echo "Database Connected";
}
?>