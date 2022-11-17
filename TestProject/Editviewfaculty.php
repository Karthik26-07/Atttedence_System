  <?php
include 'dbconnect.php';

error_reporting(0);
session_start();
$fname2= $_GET['f_name1'];
$_SESSION['name1'] = $_GET['f_name1'];

mysqli_select_db($con, "faculty_register");
$sql = "select * from faculty_register where id='$fname2' ";
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
   
    <form class=" card stud my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="updatefaculty.php?">

        <div class="row justify-content-center align-items-center">
            <h1>Edit</h1>    
        </div>

        <div class="form-group">
            <label for="inputname">Name</label>
            <input type="name" class="form-control" id="exampleinputname" name="fname" value="<?php echo $row_ah['name']; ?> "required>
        </div>
        <div class="form-group">
            <label for="inputphone">Phonenumber</label>
            <input type="phone" class="form-control" id="phno" name="fphno" min="1000000000" max="9999999999" value="<?php echo $row_ah['phonenumber']; ?> "required>
        </div>
 <div class="form-group">
            <label for="inputphone">Age</label>
            <input type="age" class="form-control" id="age" name="fage" value="<?php echo $row_ah['age']; ?> " required>
        </div>




        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleInputemail" placeholder="name@example.com" name="femail" value="<?php echo $row_ah['email']; ?> " required>
        </div>

        <div class="form-group">
            <label for="inputaddress">Address</label>
            <input type="address" class="form-control" id="exampleInputaddress" name="faddress" value="<?php echo $row_ah['address']; ?> " required>
        </div>
        <div class="form-group">
            <label for="inputphonenum">Password</label>
            <input type="inputpass" class="form-control" id="parentsphno" name="fpass" value="<?php echo $row_ah['password']; ?> "required>
        </div>

        <button class="btn btn-primary my-2 btn-1g" type="submit">Save</button>
        <a class="btn btn-secondary" data-dismiss="modal" href="Editfaculty.php">Cancel</a>


<?php } ?>

           </form>








    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


       
    </body>
</html>





   
    
