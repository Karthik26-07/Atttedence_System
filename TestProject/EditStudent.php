<?php
include 'dbconnect.php';

error_reporting(0);
session_start();
$names = $_GET['name'];
$_SESSION['name'] = $_GET['name'];

mysqli_select_db($con, "attedence_system");
$sql = "select * from add_student where id='$names' ";
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


            <title>Student page</title>

            <style>
                .stud{
                    width: 40%;
                    left:7%;

                }
            </style>



        </head>

    </head>
    <body>
        <form class=" card stud my-5  shadow-lg p-3 mb-5 bg-white rounded" name="save" method="post"  action="updatestud.php">

            <div class="row justify-content-center align-items-center">
                <h1>Edit </h1>
            </div>

            <div class="form-group">
                <label for="inputname">Name</label>
                <input type="name" class="form-control" name="E_name" value="<?php echo $row_ah['Name']; ?> " required>
            </div>
            <div class="form-group">
                <label for="inputphone">Phonenumber</label>
                <input type="phone" class="form-control" id="phno" name="E_phno" min="1000000000" max="9999999999" value="<?php echo $row_ah['Phonenumber']; ?> " required>
            </div>
            <div class="form-group">
                <label for="inputname">Age</label>
                <input type="name" class="form-control" id="exampleinputname" name="E_age" value="<?php echo $row_ah['Age']; ?> "required>
            </div>




            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleInputemail" placeholder="name@example.com" name="E_email" value="<?php echo $row_ah['Email']; ?> "required>
            </div>

            <div class="form-group">
                <label for="inputaddress">Address</label>
                <input type="address" class="form-control" id="exampleInputaddress" name="E_address" value="<?php echo $row_ah['Address']; ?> " required>
            </div>
            <div class="form-group">
                <label for="inputphonenum">Parents Phonenumber</label>
                <input type="parentsphone" class="form-control" id="parentsphno" name="E_p_phonenum" min="1000000000" max="9999999999" value="<?php echo $row_ah['ParentPhonenum']; ?> " required>
            </div>



            <div class="form-group">
                <label for="exampleFormControlSelect1">Semester</label>
                <select class="form-control" id="exampleFormControlSelect1" name="E_sem">
                    <option value="" id="namesid" name="E_sem"><?php echo $row_ah['Semister']; ?>
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
                <label for="inputpass">Password</label>
                <input type="studentpass" class="form-control" id="parentspass" name="password" value="<?php echo $row_ah['password']; ?>"required>
            </div>
            <button class="btn btn-primary my-2 btn-1g" name="save" value="save" id="save"type="submit">Save</button>

            <a class="btn btn-secondary" data-dismiss="modal" href="editviewstude.php">Cancel</a>
        <?php } ?>

    </form>








    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
