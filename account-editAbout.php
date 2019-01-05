<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    //setting the session email to local variable
   // $emailID = $_SESSION['loggedInUser_email'];
    //restrict access if user is not logged in
    if(!$_SESSION['loggedInUser_name']){
        header("Location: index.php");
    }
    
    include("includes/header.php");
    include("includes/functions.php");
   
    //connect database
    include("includes/connection.php");
 
    
    //when we submit
    if(isset($_POST['btn_aboutMe'])){
        //santising data
        $txt_aboutMe = validateFormData($_POST['txt_aboutMe']);
        $emailID = $_SESSION["loggedInUser_email"];
        //query and result
        $query = "UPDATE users SET about = '$txt_aboutMe'
        WHERE email='$emailID'";
        
        //store result
        $result = mysqli_query($conn, $query);
        
        //if there is a result from query
        if($result){
            $_SESSION["loggedInUser_about"] = $txt_aboutMe;
            header("location: account-dashboard.php?aboutMe-success");
        }else{
            echo "error: Unknown Error." . mysqli_error($conn);
        }
        
    }
   
?>
    <body>
        <section id="section-content">
            <div class="container">
            <h2>Edit About me</h2>
                <!-- FORM FOR EDITING ABOUT ME -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                     <!-- The text area -->
                    <input type="text" name="txt_aboutMe" class="form-control" placeholder="Enter information here" >
                    <br>
                    <input class="btn btn-primary" type="submit" value="Submit" name="btn_aboutMe">
                </form>
            </div>
          
        </section>

        <?php include("includes/footer.php"); ?>
    </body>
</html>