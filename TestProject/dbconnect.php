<?php

$con = mysqli_connect('localhost', 'root', '1234', 'attedence_system');

if ($con->connect_error) {
    die("Connection failure: "
            . $con > connect_error);
}
?>
