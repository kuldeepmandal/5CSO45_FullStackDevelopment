<?php

    $globalVar = "I am global";

    function Try1() {
        // echo $globalVar; 
    }

    function Try2() {
        global $globalVar;
        echo $globalVar;
    }

    echo "<b>Without global:</b><br>";
    Try1(); 

    echo "<br><br><b>With global:</b><br>";
    Try2(); 

?>