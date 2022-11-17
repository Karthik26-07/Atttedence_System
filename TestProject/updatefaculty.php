<?php
    
        include 'dbconnect.php';
        session_start();
$name3=$_SESSION['name1'];


if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {
        $F_name = $_POST['fname'];
        $F_phone = $_POST['fphno'];
        $F_age = $_POST['fage'];
        $F_mail = $_POST['femail'];
        $F_address = $_POST['faddress'];
        $F_password = $_POST['fpass'];
       
  



        $sql = "update faculty_register set name='$F_name', age='$F_age', email='$F_mail' ,phonenumber='$F_phone', "
                . " Address='$F_address', password='$F_password' where id='$name3'";
      
          
           if ($con->query($sql) === TRUE) {
        echo "<script>alert('Succesfullly updated');</script>";
        echo "<script>window.location.href='Editfaculty.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

}      
   
    ?>
