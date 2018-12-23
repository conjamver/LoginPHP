<!DOCTYPE html>
<html lang="en">
<?php 
    include("includes/header.php"); 
    session_start();
    
    include("includes/functions.php");
    
    //When the form is submitted
    if(isset($_POST['create_account'])){
        //sanitise the data
        $name = validateFormData($_POST['name']);
        $email = validateFormData($_POST['email']);
        $password1 = validateFormData($_POST['password1']);
        $password2 = validateFormData($_POST['password2']);
        
        
        //connect to database
        include('includes/connection.php');
        
        //If passwords match
        if($password1 == $password2){
            $hashed_password = password_hash($password1,PASSWORD_DEFAULT); //hashed
            
            //query the database
            $query = "INSERT INTO users(name, email, password) VALUES('$name','$email','$hashed_password')";
            mysqli_query($conn,$query);
            
            //bring user to new page
            header("Location: account-success.php");
        }else{
            $errorMessage = "<div class='alert alert-danger'><strong>Error:</strong> Passwords do not match</div>";
        }
    //close the connection
    mysqli_close($conn);
    }
   
    
?>
    <body>
        <!--INTRODUCTION -->
        <section id="section-welcome">
            <div class="container">
                <h1 class="text-center">Welcome to Account X Plus</h1>
                <p>Helping the world <em>since 1997</em></p>
            </div>
        </section>
        <!--SIGN UP/CREATE ACCOUNT -->
        <section id="section-account">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6">
                        <h3>Sign In</h3>
                    </div>
                      <!--Create account section -->
                    <div class="col-md-6">
                        <h3>Create Account</h3>
                        <?php echo $errorMessage ?>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <label>Name: </label>
                            <br>
                            <input type="text" name="name">
                            <br>
                            <label>Email: </label>
                            <br>
                            <input type="email" name="email">
                            <br>
                            <label>Password: </label>
                            <br>
                            <input type="password" name="password1">
                            <br>
                            <label>Confirm Password: </label>
                            <br>
                            <input type="password" name="password2">
                            <br>
                            <small>I have read the terms and conditions.</small>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Create Account" name="create_account">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include("includes/footer.php"); ?>
    </body>
</html>