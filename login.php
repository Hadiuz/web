<?php 
    require_once('classes/Head.php');  
    require_once('classes/Datenbank.php');

    
    $head = new Head();
    $db = new Datenbank();


    echo "<!DOCTYPE html>";
    echo "<html>";
    $head->printHead("Login"); 

?>
<body>
    <div class="maindiv">
    <h1>Login</h1>

   
     <form action="login.php" method="POST">

        <div class="input">
           <p class="namestyle">Username:</p>
           <input type="text" name="username">
        </div>

        <div class="input">
           <p class="namestyle">Password:</p>
           <input type="password" name="password">
        </div>

        <div class="clear"></div>

        <input type="submit" name="submit"> 
     </form> 
</div>

   <?php 
        
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            

            $user = $db->mysqlGetUser($_POST);

            $row = mysqli_fetch_assoc($user);
            

            if($row == null){
                echo "Password oder Username falsch";
            }else{
                    session_start();
                    $_SESSION = $row;
                    
                    header('Location:index.php');
                }
            }

        
    
   ?>

</body>
</html>