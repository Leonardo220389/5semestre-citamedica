<?php

session_start();


// $conn = mysqli_connect(
//     'localhost',
//     'root',
//     '',
//     'agenda_cita'
// );

$conn = mysqli_connect(
    'us-cdbr-east-06.cleardb.net',
    'bbaa316a7e551e',
    'c6343c45',
    'heroku_6c6e3245ad9cedc'
);
$conn->set_charset("utf8");

/* if (isset($conn)) {
    
     echo'DB is connected';
} */

?>
