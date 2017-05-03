
<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: userprofile.php"); // Redirecting To Home Page
}
?>