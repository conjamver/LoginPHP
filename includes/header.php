<?php 

?>
<head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/main.css">
   
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>
    
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">   
        <a class="navbar-brand" href="index.php">Account X Plus</a>
        
        <!-- Links -->
        <!-- If there is a session -->
        <?php
        if ($_SESSION['loggedInUser_name']){
            
            ?>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="account-dashboard.php">Welcome <?php echo $_SESSION["loggedInUser_name"]; ?></a>
            </li>
        </ul>
        
        <!-- If no session-->
        <?php
        }else{ ?>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">You are not logged in</a>
            </li>
        </ul> 
        <?php
        }
        ?>
        
    </div> 
</nav>