<!DOCTYPE html>
<html lang="en">
<?php 
    include("includes/header.php"); 
    session_start();
    include("includes/functions.php");
    $username = $_POST["name"];
   
    
?>
    <body>
        <!--INTRODUCTION -->
        <section id="section-welcome">
            <div class="container">
                <h1 class="text-center">Your account has been succesfully created!</h1>
                <p>Welcome <?php echo $username ?> </p>
                <p>You can now login with your new account.</p>
                
            </div>
        </section>

        <?php include("includes/footer.php"); ?>
    </body>
</html>