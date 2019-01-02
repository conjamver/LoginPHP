<!DOCTYPE html>
<html lang="en">
<?php
//did the user's browser send a cookie for a session?
if (isset($_COOKIE[session_name()])){
    //empty the cookie and last for a day
   setcookie(session_name(),'',time()-86400,'/');
}

//clear all session variables
session_unset();

//session destroy
session_destroy();

include('includes/header.php');
?>

<h1>Logged out</h1>

<p class="lead">You've been logged out. See you next time!</p>

<?php
include('includes/footer.php');
?>
   