<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    include("includes/header.php"); 
    include("includes/functions.php");
   
?>
    <body>
        <!--INTRODUCTION -->
        <section id="section-welcome">
            <div class="container">
                <h1 class="text-center">Your account has been succesfully created!</h1>
                <p>Welcome <?php $_SESSION['loggedInUser_name'];?> </p>
                <p>You can now use your new account.</p>
            </div>
        </section>

        <?php include("includes/footer.php"); ?>
    </body>
</html>