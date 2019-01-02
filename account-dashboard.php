<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    include("includes/header.php"); 
    
    //restrict access if user is not logged in
    if(!$_SESSION['loggedInUser_name']){
        header("Location: index.php");
    }
    //connect database
    include("includes/functions.php");
   
?>
    <body>
        <!--Welcome Banner-->
        <section id="section-welcome">
            <div class="container">
                <h1 class="text-center">Welcome <?php echo $_SESSION['loggedInUser_name'] ?></h1>
                <p>Let's see what your social life is like today. </p>
                <a href="account-logout.php"><button>Logout</button></a>
            </div>
        </section>

        <?php include("includes/footer.php"); ?>
    </body>
</html>