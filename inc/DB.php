<?php


/* Database config */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tea');


$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/* End config */


/* Common Function*/
function clean($str)
{
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $str = @trim($str);
    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return $con->real_escape_string($str);
}

