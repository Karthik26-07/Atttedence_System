<?php

include 'dbconnect.php';



session_start();

if (isset($_POST['save'])) {
    $Student_ID = $_POST['studentid'];
    $_SESSION['Student'] = array();
    array_push($_SESSION['Student'], $Student_ID);





    $Subject_Id = $_POST['subjectid'];
    $_SESSION['Subject'] = array();
    array_push($_SESSION['Subject'], $Subject_Id);

    $Subject_Id = $_POST['subjectid'];
    $subject = $Subject_Id[0];


    foreach ($_POST["check"] as $key => $value) {
        echo "<h1>Key: .$key.; Value: .$value.<br />\n</h1>";
        $table = "INSERT INTO attedence(subid,studid,ispresent) " .
                "VALUES ('$subject','$key', '$value')";
        if ($con->query($table) === TRUE) {
//"<script>alert('Succesfullly Updated');</script>";
//"<script>window.location.href='Adminpage.php'</script>";
        } else {
            echo "Err or: " . $table . "<br>" . $con->error;
        }
    }
}
header('location:facultypage.php')
?>