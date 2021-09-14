<?php
// This script will handle login
$_SESSION["logged_in"] = false ;
session_start();

require_once "config.php" ;

///check if user has already logged in
if (isset($_SESSION["username"])) {

    header("location: profile.html");
    $_SESSION["logged_in"] = true ;
    exit;
} 
else{
 
// Define variables and initialize with empty values
$username = $password =  "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){

        $username_err = "Please enter a username.";
        echo "<script> alert('$username_err');</script>";

    } else if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){

        $username_err = "Username can only contain letters, numbers, and underscores.";
        echo "<script> alert('$username_err');</script>";
    } else{

        // Prepare a select statement
        $username = $_POST["username"];
        $password = $_POST["pass"];
        
        $sql = mysqli_query($con,"SELECT username, password, empid FROM register WHERE username ='".$username."' AND password = '" .$password ."'");
        $row = mysqli_fetch_row($sql);
        if(mysqli_num_rows($sql) > 0 )
        { 
            $_SESSION["logged_in"] = true; 
            $_SESSION['username'] = $username;
            $_SESSION["empid"] = $row[2] ;
            
            header("location: profile.php");
        }else{
            echo "<script> alert('Username does not exist');</script>";
        }
    }
}
    // Close connection
    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User LogIn</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
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
            <div class="nav-bar-menu" id="home" onclick="location.href = `http://localhost/php/CMS/welcome.php`">Home</div>
            <div class="nav-bar-menu selected" id="login" onclick=" location.href = `http://localhost/php/CMS/login.php`">Lodge a Complaint</div>
            <!-- <div class="nav-bar-menu" id="status" onclick=" location.href = `http://localhost/php/CMS/status.php` ">Check Status</div> -->
            <div class="nav-bar-menu" id="feedback" onclick="location.href = `http://localhost/php/CMS/feedback.php` ">Feedback</div>
            
        </nav>
        <article>
            <img src="./partials/tcillogo.png" alt="logo" id="logo" />
            <div class="manual">
                <form class="login-form" name="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validation()">
                    <img src="https://img.icons8.com/wired/64/000000/login-rounded-right.png" class="icon" />

                    <br>
                    <label for="username">Username : </label>
                    <input type="text" id="username" name="username" placeholder="Enter here" pattern="[a-zA-Z0-9]+" required>
                    <br>
                    <br>
                    <label for="pass">Password : </label>

                    <input type="password" id="pass" name="pass" placeholder="Enter password" required>

                    <p class="warning">
                        Note: In case of New User, First Sign Up.
                    </p>

                    <button type="submit" class="bt" >Log In</button>
                    <button type="button" onclick="window.location.href='register.php'" class="bt">Sign Up</a>

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
        <script src="script.js"></script>
</body>

</html>