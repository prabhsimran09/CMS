<?php
if(isset($_SESSION["usertype"])){

    if($_SESSION["username"] == "admin"){
        header("location: complaints.php");
    }else{
        header("location: profile.php");
    }
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
            <div class="nav-bar-menu selected" id="home" >Home</div>
            <div class="nav-bar-menu" id="login" onclick=" location.href = `http://localhost/php/CMS/login.php`">Log In</div>
            <div class="nav-bar-menu" id="feedback" onclick="location.href = `http://localhost/php/CMS/feedback.php` ">Feedback</div>
        </nav>
        <article>
            <img src="./partials/tcillogo.png" alt="logo" id="logo" />
            <div class="manual">
                <h4>Welcome to the E-complaint portal of TCIL.</h4><br>
                <br>
                Due to COVID-19 pandemic and the ongoing restrictions which come as a part and parcel of the pandemic, we have devised this platform to ensure smooth functioning of the organisation. All Employees are requested to use this forum to address their greivances at the earliest. Follow the steps mentioned below in order to navigate through the website:
                <br><br>
                <ul>
                    <li> Navigate to <a class="a" href="./login.php" >Lodge a Complaint</a> Section.</li>
                    <br>
                    <li> If you are an existing user, then straight away LogIn to lodge a complaint. </li>
                    <br>
                    <li> New Users should <a class="a" href="./register.php">Register</a> in order to enter their complaints.</li>
                    <br>
                    <li> Use the <a href="./feedback.php" class="a">Feedback</a> tab to express your reviews about our system.<br>
                     We are open to any viable changes for consumer satisfaction.</li>
                     <br>
                    <li> The <a href="./login.php" class="a" >Check status</a> tab helps you check the status of your complaint.<br>
                    It appears once you Login to the system</li>

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
</body>

</html>