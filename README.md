# CMS

Welcome to my Complaint management system !!


This is a system built for employees to organise their complaints and improve the efficiency of their work.

This project is built on HTL5, CSS, JQUERY on the front end and MySql, PHP on the back end.

There are 5 main files that contain most of the code and the flow of the project is mentioned below :

Welcome.php: It is the primary page of the software system which enables users to know how to use this system.

Login.php: Users can navigate to this page to login into their existing account.For a new Employee of the company, He must register before lodging a complaint.

register.php : User has to Signup with the system before lodging a complaint. This page contains an HTML form which takes the users' credentials and an account is created.

config.php : Establish connection to the datatbase.

Feedback.php : Users can leave in their messages in this form so that we can track and resolve the glitches time to time..

Profile.php : After you successfully login to the system, you are taken to this page. Here, you can lodge your complaint or check the status of an existing complaint.

status.php : This file takes the compalint number as input and shows the current status of the complaint in another file called table.php.

table.php: This file displays the record fetched from the dataabse in the form of an HTML table.

logout.php : This is used to logout from the system.
