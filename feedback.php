<?php

require_once("config.php");

$username = $password = $empid = $email_id = $dept = "";
$username_err = $password_err = $empid_err = $email_id_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if username is empty 

    if (empty(trim($_POST["email_id"]))) {
        $username_err = "Email ID cannot be blank.";
    } else {

    $sql = "SELECT id FROM register WHERE  email_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {

            mysqli_stmt_bind_param($stmt, "s", $param_email_id);
            // Set value of $param_username
            $param_email_id = trim($_POST["email_id"]);

            // Try to execute the Statement
            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST["uname"]);
                }
            } else {
                echo ("Something Went Wrong !!");
            }
        }
    }
    mysqli_stmt_close($stmt);

    // Check for password 
    if (empty(trim($_POST["password"]))) {
        $password_err = "Password cannot be empty ";
    } else if (strlen(trim($_POST["password"])) < 5) {
        $password_err = "Password cannot be less than 5 characters ";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check for confirm password 
    if (trim($_POST["cpassword"]) != trim($_POST["password"])) {
        $password_err = "Password do not match ";
    }

    // Check for email id
    if (empty(trim($_POST["email"]))) {
        $email_err = "Email cannot be empty ";
    }
    else if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format";
    }
    else{
        $email_id = trim($_POST["email"]);
    }

    // Check for employee id
    if (empty(trim($_POST["empid"]))) {
        $username_err = "ID cannot be blank.";
    }
    else if (!is_numeric(trim($_POST["empid"]))) {
        $empid_err = "Invalid ID";
    }
    else{
        $empid = trim($_POST["empid"]);
    }

    $dept = trim($_POST["dept"]);

//  if there were no errors, then insert into database
if (empty($username_err) && empty($password_err) &&  empty($confirmpass_err)) {
    $sql = "INSERT INTO register(empid, uname, email, password, dept, created) VALUES(?, ?, ?, ?, ?, current_timestamp()) ";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stnt, "ss", $param_username, $param_password, $param_email, $param_empid, $param_dept);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_empid = $empid ;
        $param_email = $email_id ;
        $param_dept = $dept ;

        //Try to execute
        if (mysqli_stmt_execute(($stmt))) {

            header("location: login.php");
        } else {
            echo ("Something went wrong..... Cannot Redirect");
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
    <link href="style.css" rel="stylesheet">
    <title>Feedback </title>
</head>

<body>
    <div class="main-container">
        <header>
            <marquee behavior="scroll" direction="left">
                <pre> Telecommunications Consultants India Limited.                                  Telecommunications Consultants India Limited.                                  Telecommunications Consultants India Limited.</pre>
            </marquee>
            <h2> COMPLAINT MANAGEMENT SYSTEM</h2>
        </header>
        <nav>
            <div class="nav-bar-menu" id="home"
                onclick="location.href = `http://localhost/php/CMS/welcome.php`">Home</div>
            <div class="nav-bar-menu" id="login" onclick=" location.href = `http://localhost/php/CMS/login.php`">Lodge a
                Complaint</div>
            <div class="nav-bar-menu" id="status" onclick=" location.href = `http://localhost/php/CMS/status.php` ">
                Check Status</div>
            <div class="nav-bar-menu selected" id="feedback" onclick="location.href = `http://localhost/php/CMS/feedback.php` ">
                Feedback</div>
            <div class="nav-bar-menu">Admin</div>
        </nav>
        <article>
            <img src="./partials/tcillogo.png" alt="logo" id="logo" />
            <div class="manual">
                <h3> Feedback Form</h3>
                <form class="feedback-form">
                    <label for="email">Email ID: </label>
                    <br>
                    <input type="email" name="email" id="email">
                    <br>
                    <label for="empid">Employee ID: </label>
                    <br>
                    <input name="empid" type="text" id="empid">
                    <br>
                    <label for="complaint-no">Complaint Number: </label>
                    <br>
                    <input type="text" name="complaint-no" id="comlaint-no">
                    <br>
                    <label for="message"> Message/Comments: </label>
                    <br>
                    <textarea id="message" name="message" rows="4" cols="50" autofocus>Write here...</textarea>
                    <br>
                    <a href="javascript:$('form').submit();" class="sub">Submit</a>
                    <a href="javascript:$('form').reset();" class="sub">Reset</a>

                </form>
            </div>
            <div class="general">
                <h3>ABOUT</h3>
                <img src="./partials/tcil_office.jpg" alt="tcil_office" id="office" />
                <p class="about"> Telecommunications Consultants India Limited (TCIL) is a government owned engineering
                    and consultancy firm. It is under the ownership of the Department of Telecommunications , Ministry
                    of Communications, Government of India. It was set up in 1978 to give consultations in fields of
                    Telecommunications to developing countries around the world. Started with an initial investment of
                    10lakh. TCIL is present in almost 80 countries, mainly in the Middle East, Africa and Europe.</p>
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