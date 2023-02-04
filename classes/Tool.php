<?php

class Tool
{
    public function headerButton($name, $header, $cssClass = "button"){

        echo "<div class=\"".$cssClass."\">",
        "<form method=\"POST\">",
        "<input type=\"submit\" name=\"".$name."\" value=\"".$name."\" />",
        "</form>",
        "</div>";


        if(isset($_POST[$name])) {

            header($header);
        }
    }

}