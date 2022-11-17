 <?php
       include 'dbconnect.php';
       error_reporting(0);
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {


            $SubjectId = $_POST['subid'];
           $facId = $_POST['facid'];

          if ($facId == '' || $SubjectId == '') {
                echo "<script>alert(' Please select the both name of subject and faculty');</script>";
            
           } else {


               $sql = "insert into manage_mapping(Faculty_Id,Subject_Id)"
                       . "values ('$facId','$SubjectId')";
           }
            if ($con->query($sql) === TRUE) {
                echo "<script>alert('Succesfullly Added');</script>";
               
            } else {
               echo "Error: " . $sql . "<br>" . $con->error;   //display error message .
            }
}
        ?>

