 <?php
    
        include 'dbconnect.php';
        session_start();
$name=$_SESSION['name'];


if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {
        $Ename = $_POST['E_name'];
        $Ephone = $_POST['E_phno'];
        $Eage = $_POST['E_age'];
        $E_mail = $_POST['E_email'];
        $Eaddress = $_POST['E_address'];
        $Eparentphone = $_POST['E_p_phonenum'];
        $Esemister = $_POST['E_sem'];
  



        $sql = "update add_student set Name='$Ename', Age='$Eage', Email='$E_mail' ,Phonenumber='$Ephone', "
                . "ParentPhonenum='$Eparentphone', Address='$Eaddress', Semister='$Esemister' where id='$name'";
      
          
           if ($con->query($sql) === TRUE) {
        echo "<script>alert('Succesfullly updated');</script>";
        echo "<script>window.location.href='editviewstude.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

}      
   
    ?>


