<?php

$con = mysqli_connect('localhost', 'root', '', 'attedence_system');

if ($con->connect_error) {
    die("Connection failure: "
            . $con > connect_error);
}
?>
