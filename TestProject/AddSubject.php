<?php include 'Navbar.php';
?>

<?php
include 'dbconnect.php';
$subname = $subcode = $subsem = $subdescription = "";
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {
    $subname = $_POST['subjectname'];
    $subcode = $_POST['subjectcode'];
    $subsem = $_POST['subsemester'];
    $subdescription = $_POST['subdescription'];
    
     $sql = "insert into subject_management(subName,subCode,subSemester,subDescription)"
            . "values ('$subname','$subcode','$subsem','$subdescription')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Succesfullly Added');</script>";
        echo "<script>window.location.href='Adminpage.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Subject page</title>
        <style>
            .stud{
                width: 40%;
                left:7%;

            }
        </style>

    </head>
    <body>
       
        <form class=" card stud my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="">
            <div class="row justify-content-center align-items-center">
                <h1>Add Subject</h1>    
            </div>

            <div class="form-group">
                <label for="name">Subject Name</label>
                <input type="name" class="form-control" id="exampleFormControlInput1" name="subjectname">
            </div>
            <div class="form-group">
                <label for="subcode">Subject Code</label>
                <input type="subcode" class="form-control" id="exampleFormControlInput2" name="subjectcode">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Semester</label>
                <select class="form-control" id="exampleFormControlSelect1" name="subsemester">
                    <option>1 Semester</option>
                    <option>2 Semester</option>
                    <option>3 Semester</option>
                    <option>4 Semester</option>
                    <option>5 Semester</option>
                    <option>6 Semester</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="subdescription"></textarea>
            </div>
            <button class="btn btn-primary my-2 btn-1g" type="submit">Add</button>

        </form> 













       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    </body>
</html>
