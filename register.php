<?php

require_once("config.php");

$username_err = $password_err = $empid_err = $email_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if username is empty 

    if (empty(trim($_POST["password"])) || empty(trim($_POST["username"])) || empty(trim($_POST["empid"])) || empty($_POST['cpassword']) || empty(trim($_POST["email"])) || empty(trim($_POST["dept"]))) {

        die('Please fill all required fields!');
    }

    $username = trim($_POST["username"]);
    $sql = "Select * from register where username='$username'";

    $result = mysqli_query($con, $sql);

    $num = mysqli_num_rows($result);

    if ($num == 0) {

        if (strlen(trim($_POST["password"])) < 5) {
            $password_err = "Password cannot be less than 5 characters ";
        }
        if (trim($_POST["password"]) != trim($_POST["cpassword"])) {
            $password_err = "Password do not match ";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please Enter Valid Email ID";
            }
        if (!is_numeric(trim($_POST["empid"]))) {
            $empid_err = "Invalid ID";
        } else {
            $password = trim($_POST["password"]);
            $empid = trim($_POST["empid"]);
            $email_id = trim($_POST["email"]);
            $dept = trim($_POST["dept"]);
        }
    } else if ($num > 0) {
        $username_err = "Username not available";
    }

    //  if there were no errors, then insert into database
    if (empty($username_err) && empty($password_err) &&  empty($empid_err) && empty($email_err)) {
        
        $sql = "INSERT INTO register(empid, username, email, password, dept, created) VALUES(?, ?, ?, ?, ?, current_timestamp()) ";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password, $param_email, $param_empid, $param_dept);

            // Set these parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_empid = $empid;
            $param_email = $email_id;
            $param_dept = $dept;

            //Try to execute
            if (mysqli_stmt_execute(($stmt))) {

                header("location: login.php");
            } else {
                echo "<script>alert 'Something went wrong..... Cannot Redirect'</script>";
            }
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
        <form id="sform" action="register.php" method="post" target="_blank">

            <label for="empid">Employee ID:</label>
            <input name="empid" type="text" id="empid"><br>
            <label for="username">Username:</label>
            <input name="username" type="text" id="uname"><br>
            <label for="email">Email ID:</label>
            <input type="email" name="email" id="email"><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="passw"><br>
            <label for="cpassw">Confirm Password:</label>
            <input type="password" name="cpassword" id="cpassw"><br>
            <label for="dept">Department:</label>
            <select name="dept" id="dept" autofocus="">
                <option value="Sales">Sales</option>
                <option value="Marketing">Marketing</option>
                <option value="Networking">Networking</option>
                <option value="Web Development">Web Development</option>
                <option value="Customer Support">Customer Support</option>
                <option value="Admin">Admin</option>
            </select><br>
            <br><br>
            <a href="javascript:$('form').submit();" class="sub">Submit</a>
            <a href="javascript:$('form').reset();" class="sub">Reset</a>
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