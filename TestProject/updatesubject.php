<?php

include 'dbconnect.php';
session_start();
$suname = $_SESSION['sname'];


if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {
    $Subjname = $_POST['subname'];
    $Subjcode = $_POST['subcode'];
    $Subjsem = $_POST['subsem'];
    $Subjdes = $_POST['subdes'];





    $sql = "update subject_management set subName='$Subjname', subCode='$Subjcode', subSemester='$Subjsem' ,subDescription='$Subjdes' where subId='$suname'";


    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Succesfullly updated');</script>";
        echo "<script>window.location.href='EditSubject.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
