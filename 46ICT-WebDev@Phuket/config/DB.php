<?php

$conn = mysqli_connect($server,$user,$pass,$DB);

if(!$conn){
    print_r("Error:" .  mysqli_connect_error());
}


?>