<?php

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {

    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
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
            <div class="nav-bar-menu selected" id="home" onclick="location.href = `http://localhost/php/CMS/welcome.php`">Home</div>
            <div class="nav-bar-menu" id="login" onclick=" location.href = `http://localhost/php/CMS/login.php`">Lodge a Complaint</div>
            <div class="nav-bar-menu" id="status" onclick=" location.href = `http://localhost/php/CMS/status.php` ">Check Status</div>
            <div class="nav-bar-menu" id="feedback" onclick="location.href = `http://localhost/php/CMS/feedback.php` ">Feedback</div>
            <div class="nav-bar-menu" id="profile">Profile</div>
            <div class="nav-bar-menu" id="name"><span class="material-icons-outlined">
                    account_circle
                </span><?php echo "Welcome " . $_SESSION["username"] ?></div>

        </nav>
        <article>
            <img src="./partials/tcillogo.png" alt="logo" id="logo" />
            <div class="manual">
                <h4>Welcome to the E-complaint portal of TCIL.</h4><br>
                Due to COVID-19 pandemic and the ongoing restrictions which come as a part and parcel of the pandemic, we have devised this platform to ensure smooth functioning of the organisation. All Employees are requested to use this forum to address their greivances at the earliest. Follow the steps mentioned below in order to navigate through the website:
                <br><br>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>

                </ul>

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