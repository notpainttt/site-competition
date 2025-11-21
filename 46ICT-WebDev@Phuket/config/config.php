<?php
session_start();
$burl = "http://localhost/";

//config
$server = "localhost";
$user = "root";
$pass = "";
$DB = "music-shop";

//function
function check_login() {
    global $burl;
    if(empty($_SESSION['user'])){
        header("Location: $burl");
        exit;
    }
}

function check_perm(){
    global  $burl;
    check_login();
    if ($_SESSION['user']['role_id'] != 1 || $_SESSION['user']['role_id'] != 2){
        header("Location: $burl");
        exit;
    }
}

function sweet($title,$txt,$icon,$url){
    global $burl;
    echo '<script>Swal.fire({
        title: "'. $title .'",
        text: "'. $txt .'",
        icon: "'. $icon .'"
      }).then((result) => {
        window.location.href  = "'. $burl . $url .'";
      })</script>';
}

function detectSqlInjection($input) {
    // List of SQL keywords and characters often used in SQL injection attacks
    $sqlPatterns = [
        "SELECT", "INSERT", "UPDATE", "DELETE", "DROP", "UNION",
        "FROM", "WHERE", "HAVING", "TABLE", "--", "/*", "*/", ";"
    ];
    
    // Convert input to lowercase for case-insensitive matching
    $input = strtolower($input);
    
    // Check for SQL patterns in the input
    foreach ($sqlPatterns as $pattern) {
        if (strpos($input, strtolower($pattern)) !== false) {
            return true; // Potential SQL injection detected
        }
    }
    
    // Check for multiple occurrences of single quotes
    if (substr_count($input, "'") > 2) {
        return true; // Potential SQL injection detected
    }
    
    // No SQL injection patterns detected
    return false;
}
include "DB.php";
?>