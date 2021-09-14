<?php


require_once("config.php");


$username_err = $password_err = $email_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if any field is empty 

    if (empty(trim($_POST["password"])) || empty(trim($_POST["username"]))  || empty($_POST['cpassword']) || empty(trim($_POST["email"])) || empty(trim($_POST["dept"]))) {
 
        die('Please fill all required fields!');
    }


    $username = trim($_POST["username"]);

    $sql =  mysqli_query($con," SELECT username FROM register WHERE username = '" .$username ."'" );

    // check for password 
    if (mysqli_num_rows($sql) == 0) {

        if (strlen(trim($_POST["password"])) < 5) {
            $password_err = "Password cannot be less than 5 characters ";
            echo "<script> alert('$password_err') </script>" ;  
        }
        if (trim($_POST["password"]) != trim($_POST["cpassword"])) {
            $password_err = "Password do not match ";
            echo "<script> alert('$password_err ') </script>" ;
        }
        // check for email
        if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please Enter Valid Email ID";
            echo "<script> alert('$email_err ') </script>" ; 
        }
       
    } else  {
        $username_err = "Username not available";
        echo "<script> alert('$username_err') </script>" ;
    }

    $empid = $_POST["email"];
    $password = $_POST["password"];
    $email_id = $_POST["email"] ;
    $dept = $_POST["dept"] ;
    $usertype = $_POST["usertype"] ;

    //  if there were no errors, then insert into database
    if (empty($username_err) && empty($password_err) &&  empty($empid_err) && empty($email_err)) {

        
        $sql = " INSERT INTO register ( `username`, `email`, `password`, `dept`,`usertype`, `created`) VALUES(?, ?, ?, ?, ?, current_timestamp()) ";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_email, $param_password, $param_dept, $usertype);

            // Set these parameters
            $param_username = $username;
            $param_password = $password;
            $param_email = $email_id;
            $param_dept = $dept;
            $param_usertype = $usertype ;

            //Try to execute
            if (mysqli_stmt_execute(($stmt))) {

                echo "<script> alert('Sign Up Successful !!');</script>" ;
                header("location: login.php");
            } else {
                echo "<script> alert('Something went wrong..... Cannot Redirect') ;</script>";
            }
        }else{
            echo " <script> alert('Can't sign up with these details') ;</script> ";
        }

        mysqli_stmt_close($stmt);
    }
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>signup</title>
</head>

<body>
    <div class="fcontainer">
        <header>
            <marquee behavior="scroll" direction="left">
                <pre> Telecommunications Consultants India Limited.                                  Telecommunications Consultants India Limited.                                  Telecommunications Consultants India Limited.</pre>
            </marquee>
            <h3 id="head">Registration Form For Employees</h3>
        </header>
        <form id="sform" action="register.php" method="post">

           
            
            <label for="username">Username:</label>
            <input name="username" type="text" id="uname" required><br>

            <label for="email">Email ID:</label>
            <input type="email" name="email" id="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="passw" required><br>

            <label for="cpassw">Confirm Password:</label>
            <input type="password" name="cpassword" id="cpassw" required><br>

            <label for="usertype">User Type:</label>
            <select name="usertype" id="usertype" autofocus="true" required><br>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br>

            <label for="dept">Department:</label>
            <select name="dept" id="dept" autofocus="true" required>
                <option value="Sales">Sales</option>
                <option value="Marketing">Marketing</option>
                <option value="Networking">Networking</option>
                <option value="Web Development">Web Development</option>
                <option value="Customer Support">Customer Support</option>
                <option value="Admin">Admin</option>
            </select><br>
            <br>

            <button type="submit" class="sub">Submit</button>
            <button type="reset" value="reset" class="sub">Reset</button>
        </form>
        <footer>
            <marquee behavior="scroll" direction="left" loop="">
                <pre>Helpline: XXXXXXXX92   ;  Email: this@this.com                                    Helpline: XXXXXXXX92   ;  Email: this@this.com                                    Helpline: XXXXXXXX92   ;  Email: this@this.com</pre>
            </marquee>
        </footer>
    </div>
    </footer>
    </div>

    <script src="script.js"></script>

</body>

</html>