<html>
    <?php 
        require_once('classes/Head.php');  
        $head = new Head();

        require_once('classes/Datenbank.php');
        $db = new Datenbank();

        require_once('classes/User.php');
        $user = new User();

        $db->mysqlConnect();

        echo "<!DOCTYPE html>";
        echo "<html>";
        $head->printHead("Index"); 

        session_start();
        $user->setData($_SESSION);
        
        
        echo "<body>";
       
            echo "<h1>Startseite</h1>";
            echo "Diese Seite hat absolut nichts zu bieten";



            $head->printLog($user);



      
    ?>
   
    </body>
</html>