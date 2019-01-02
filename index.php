<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    include("includes/header.php"); 
    include("includes/functions.php");
    //declare variables
   $nameErr = $errorMessage = "";
    
    //When the form is submitted
    if(isset($_POST['create_account'])){
         
        
        //sanitise the data
        $name = validateFormData($_POST['name']);
        $email = validateFormData($_POST['email']);
        $password1 = validateFormData($_POST['password1']);
        $password2 = validateFormData($_POST['password2']);
        
        //connect to database
        include('includes/connection.php');
        //check that all fields are filled out
        if($name && $email && $password1){
            
            //check that name is only letters and whitespace
            if(!preg_match("/^[a-zA-Z ]*$/",$name)){
                $nameErr = "<div class='alert alert-danger'><strong>Error:</strong> Name can only have letters or whitespaces. </div>";
            }else{
                //don't display error message
                $nameErr = "";
            }
            
            //If passwords match and have a length greater than 6
            if($password1 == $password2 && strlen($password1) > 6 ){
                $hashed_password = password_hash($password1,PASSWORD_DEFAULT); 
                
                //set session variables and restrict access to other pages
                $_SESSION['loggedInUser_name'] = $name;
                
                //query the database
                $query = "INSERT INTO users(name, email, password) VALUES('$name','$email','$hashed_password')";
                mysqli_query($conn,$query);

                //bring user to new page
                header("Location: account-success.php");
            }else{
                $errorMessage = "<div class='alert alert-danger'><strong>Error:</strong> Passwords do not match and must be more than 6 characters in length. </div>";
            }
    }else{
            $errorMessage = "<div class='alert alert-danger'><strong>Error:</strong> Please fill out all fields. </div>";
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
                    <!--SIGN IN FOR EXISTING USERS -->
                    <div class="col-md-6">
                        <h3>Sign In</h3>
                        <!--FORM START -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <label>Email: </label>
                            <br>
                            <input type="email" name="user_email" maxlength="32" value='' placeholder="Enter email here">
                            <br>
                            <label>Password: </label>
                            <input type="password" maxlength="32" name="user_pwd" placeholder="Enter password here">
                            <br>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Login" name="login_account">
                        </form>
                        
                    </div>
                      <!--Create account section -->
                    <div class="col-md-6">
                        <h3>Create Account</h3>
                        <?php echo $errorMessage ?>
                        <?php echo $nameErr ?>
                        <!--FORMS START -->
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <label>Name: </label>
                            <br>
                            <input type="text" name="name" maxlength="12" value='<?php echo $name; ?>'>
                            <br>
                            <label>Email: </label>
                            <br>
                            <input type="email" name="email" maxlength="32" value='<?php echo $email; ?>'>
                            <br>
                            <label>Password: </label>
                            <br>
                            <input type="password" maxlength="32" name="password1" placeholder="Enter password here">
                            <br>
                            <label>Confirm Password: </label>
                            <br>
                            <input type="password"  maxlength="32" name="password2" placeholder="Enter password here">
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