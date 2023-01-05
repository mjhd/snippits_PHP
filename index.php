<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>

    <h1>PHP executes, H2 is visible:</h1>
    
    <!--<?php echo "-" . "-" . ">";
    
                echo "<h2>FLOOP</h2>";
                
    
    echo "<" . "!" . "-" . "-"; ?>-->
    
    <a href="./hidden_PHP.html">See with PHP hidden</a>

    <br /><br />

    <?php

        // JSON making data storage great again:
    
        $val1 = '["7", "8", "9"]';
        $val2 = '"hello"';
        var_dump(json_decode($val1));
        var_dump(json_decode($val2));
        #  |
        #  v
        #array(3) {
        #  [0]=>
        #  string(1) "7"
        #  [1]=>
        #  string(1) "8"
        #  [2]=>
        #  string(1) "9"
        #}
        
        #string(5) "hello"

        echo "<br /><br />";

        $assoc_array = Array("first"=>11, "second"=>"vlorp");
        $key = array_keys($assoc_array); 
        
        for( $i = 0; $i < sizeof($key); $i++) { 
          echo "key: $key[$i] ; ";
          echo "value: " . $assoc_array[$key[$i]] . "<br />";
        }
    
    ?>

    <!--
    This script places a badge on your repl's full-browser view back to your repl's cover
    page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
    teal, blue, blurple, magenta, pink!
    -->
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>