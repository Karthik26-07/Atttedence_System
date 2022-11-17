<?php
include 'dbconnect.php';

error_reporting(0);
session_start();
$subname2 = $_GET['subject1'];
$_SESSION['sname'] = $_GET['subject1'];

mysqli_select_db($con, "faculty_register");
$sql = "select * from subject_management where subId='$subname2' ";
$result = mysqli_query($con, $sql);
while ($row_ah = mysqli_fetch_assoc($result)) {
    ?>
    <!DOCTYPE html>

    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


            <title>faculty page</title>

            <style>
                .stud{
                    width: 40%;
                    left:7%;

                }
            </style>


        </head>

    </head>
    <body>
        <form class=" card stud my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="updatesubject.php">
            <div class="row justify-content-center align-items-center">
                <h1>Add Subject</h1>    
            </div>

            <div class="form-group">
                <label for="name">Subject Name</label>
                <input type="name" class="form-control" id="exampleFormControlInput1" name="subname" value="<?php echo $row_ah['subName']; ?> "required>
            </div>
            <div class="form-group">
                <label for="subcode">Subject Code</label>
                <input type="subcode" class="form-control" id="exampleFormControlInput2" name="subcode"value="<?php echo $row_ah['subCode']; ?> "required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Semester</label>
                <select class="form-control" id="exampleFormControlSelect1" name="subsem">
                    <option value="" id="sunsem" name="subsem"><?php echo $row_ah['subSemester']; ?>

                    <option>1 Semester</option>
                    <option>2 Semester</option>
                    <option>3 Semester</option>
                    <option>4 Semester</option>
                    <option>5 Semester</option>
                    <option>6 Semester</option>
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control"  name="subdes" id="exampleFormControlTextarea1" rows="3"  required>="<?php echo $row_ah['subDescription']; ?> "</textarea>
            </div>
            <button class="btn btn-primary my-2 btn-1g" type="submit">Save</button>
            <a class="btn btn-secondary my-2 btn-1g" href="EditSubject.php" type="submit">Cancel</a

        <?php } ?>

    </form> 

</body>
</html>
