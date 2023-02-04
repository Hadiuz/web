<?php 
    require_once('classes/Head.php');  
    require_once('classes/Datenbank.php');
    
    $head = new Head();
    $db = new Datenbank();

    echo "<!DOCTYPE html>";
    echo "<html>";
    $head->printHead("Divbox"); 

?>
<body>
    <h1>Abfrage</h1>

   
     <form action="divbox.php" method="POST">
         
        <div class="input">
            <p class="namestyle">Vorname:</p>
            <input type="text" name="vorname">
        </div>

        <div class="input">
            <p class="namestyle">Nachname:</p>
            <input type="text" name="nachname">
        </div>

        <div class="clear"></div>

        <div class="input">
           <p class="namestyle">Username:</p>
           <input type="text" name="username">
        </div>

        <div class="input">
           <p class="namestyle">EMail:</p>
           <input type="email" name="email"> 
        </div>

            <div class="clear"></div>

        <div class="input">
           <p class="namestyle">Password:</p>
           <input type="password" name="password">
        </div>

        <div class="input">
            <p class="namestyle">Password:</p>
            <input type="password" name="password2">
        </div>

        <div class="clear"></div>

        <input type="submit" name="submit"> 
     </form> 
    

   <?php 
        if(isset($_POST['submit'])){
            $bool = true;
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $email = $_POST['email'];

            if($password!=$password2){
                $bool=false;
                echo "passwörter sind nicht gleich";
            }
            if(strlen($vorname)<=1){
                $bool = false;
                echo "Fehler beim Namen";
            }
            if($bool){

                $sql_content = "nutzer (vorname, nachname, email, password, username) VALUE('"
                .$_POST['vorname']."','".$_POST['nachname']."','".$_POST['email']."','".$_POST['password']."','".$_POST['username']."');";
    
                $db->mysqlEntry($sql_content);
                
                header('Location:index.php');
                //header( 'Location: http://localhost/web/index.php' );  
            	//exit;
            }
            //echo "<a href=\"index.php\">Index</a>";
        }

        function printForm(){
        echo "<div class=\"nameinput\">";
            echo "<p class=\"namestyle\">Vorname:</p>";
            echo "<input type=\"text\" name=\"vorname\">";
        echo "</div>";

        }
      
   ?>

</body>
</html>