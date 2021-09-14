<?php

require_once("config.php");

$email = $contact = $message = "";
$email_err = $contact_err  = $message_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if username is empty 

    if(empty(trim($_POST["message"]))){

        $message_err = "text Area can't be empty ";
        echo "<script> alert('$message_err');</script>" ;
    }

    // check for validation
    if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please Enter Valid Email ID";
        echo "<script> alert('$email_err '); </script>" ; 
    }

    $email = $_POST["email"] ;
    $contact = $_POST["contact"];
    $message = $_POST["message"];

    if (empty($email_err) && empty($contact_err) &&  empty($message_err)){

          
        $sql = " INSERT INTO feedback ( `email`, `contact`, `message`, `dt`) VALUES(?, ?, ?,  current_timestamp()) ";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_contact, $param_message);

            // Set these parameters
            $param_contact = $contact;
            $param_message = $message;
            $param_email = $email;

            //Try to execute
            if (mysqli_stmt_execute(($stmt))) {

                echo "<script> alert('Feedback recorded !!');</script>" ;
                header("location: welcome.php");
            } else {
                echo "<script> alert('Something went wrong..... Cannot Redirect') ;</script>";
            }
        }else{
            echo " <script> alert('Can't sign up with these details'); </script> ";
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
            <div class="nav-bar-menu selected" id="feedback" onclick="location.href = `http://localhost/php/CMS/feedback.php` ">
                Feedback</div>
        </nav>
        <article>
            <img src="./partials/tcillogo.png" alt="logo" id="logo" />
            <div class="manual">
                <h3> Feedback Form</h3>
                <form class="feedback-form" method="POST">
                    <label for="email">Email ID: </label>
                    <br>
                    <input type="email" name="email" id="email" required>
                    <br>
                    <label for="contact">Contact Number: </label>
                    <br>
                    <input name="contact" type="tel" id="contact" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                    <small>Format: 123-456-7810</small><br>
                    <br>
                    <label for="message"> Message/Comments: </label>
                    <br>
                    <textarea id="message" name="message" rows="4" cols="50" autofocus required>Write here...</textarea>
                    <br>
                    <button type="submit" class="sub">Submit</button>
                    <button type="reset" class="sub">Reset</button>

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