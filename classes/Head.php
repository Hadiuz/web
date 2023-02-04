<?php 
    class  Head{
        public function __constructor(){}
        
        public function printHead($titel){
        echo    "<head>";
            echo    "<meta charset='utf-8'>";
            echo    "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
            echo    "<title>$titel</title>";
            echo    "<meta name='viewport' content='width=device-width, initial-scale=1'>";
            echo    "<link rel='stylesheet' type='text/css' media='screen' href='style/MainCSS.css'>";
            echo    "<script src='main.js'></script>";
        echo    "</head>";
        }
        
        public function printLog($user){
            require_once "Tool.php";
            $tool = new Tool();
          
            if($user->getData() != null){
                echo "<br>";
                
                echo $user->getData()['vorname'];

                echo "<div class=\"logButton\">",
                "<form method=\"POST\">",
                "<input type=\"submit\" name=\"logout\" value=\"Logout\" />",
                "</form>",
                "</div>";

                
                if(isset($_POST['logout'])) {
                    $user->reset();
                    session_destroy();
                    header("Refresh:0");
                }
            
            }else{
                echo "<div class=\"logButton\">",
                "<form method=\"POST\">",
                "<input type=\"submit\" name=\"login\" value=\"Login\" />",
                "<input type=\"submit\" name=\"register\" value=\"Register\" />",
                "</form>",
                "</div>";

                if(isset($_POST['login'])){
                    header("Location:login.php");
                }
                if(isset($_POST['register'])){
                    header("Location:register.php");
                }
                //$tool->headerButton("Login", "Location:login.php", "logButton");
                //$tool->headerButton("Register", "Location:register.php", "logButton");
                
           
            }

        }
    }
?>