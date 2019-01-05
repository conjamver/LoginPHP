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
                <a href="account-logout.php"><button class="btn btn-danger">Logout</button></a>
            </div>
        </section>
        <section id="section-content">
            <div class="container">
            <h2>About</h2>
            <?php 
    //check if we have an about section otherwise display default content.
    if(strlen($_SESSION["loggedInUser_about"]) > 0){
            echo "<p> $_SESSION[loggedInUser_about] </p>"; 
    }else{
        echo "<p> No content to show.</p>";
    }            
            ?>
            <a href="account-editAbout.php"><button class="btn btn-primary">Edit</button></a>
            </div>
          
        </section>

        <?php include("includes/footer.php"); ?>
    </body>
</html>