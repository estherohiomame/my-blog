 <?php
 
 function isValidLength($str, $min = 8, $max = 20) {
    $length = strlen($str);
    if ($length < $min || $length > $max) {
        echo "false <br>";
    } else {
        echo "true <br>";
    }
    echo strlen($str);
}

echo isValidLength("problems");