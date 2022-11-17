<?php
include 'dbconnect.php';
session_start();

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {
    $Phones = filter_input(INPUT_POST, 'phonenum');
    $Passes = filter_input(INPUT_POST, 'pass');

    $sql = "select * from add_student where Phonenumber='$Phones' and password='$Passes'";
    $result = mysqli_query($con, $sql);



    while ($row = mysqli_fetch_assoc($result)) {
        $Student_phone = $row['Phonenumber'];
        $Student_pass = $row['password'];
        $_SESSION['Stud_phone'] = $row['Phonenumber'];
        $_SESSION['Stud_Password'] = $row['password'];
    }

    if ($Phones == $Student_phone && $Passes == $Student_pass) { //validating the input data
        header("location:StudentAttedenceView.php?");
        exit();
    } else {

        $msg = "Invalid user id or Password";
        $msgEncoded = base64_encode($msg);
        header("location:Studentlogin.php?msg=" . $msgEncoded);


        exit();
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
        <style>
            .index{
                width: 40%;
                left:25%;

            }
        </style>

    </head>
    <body>
        <nav class="navbar navbar-light bg-info">
            <span class="navbar-brand mb-0 h1">Student Login</span>
        </nav>
        <form class=" card index my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="">

            <div class="row justify-content-center align-items-center">
                <h1>LOGIN</h1>
            </div>





            <div class="form-group">
                <label for="inputphonenumber">Phone Number</label>
                <input type="text" class="form-control" id="exampleInputphone" name="phonenum" required>


            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
            </div>
            <div class="text-danger">

                <?php
                $msg = base64_decode(filter_input(INPUT_GET, 'msg')); {

                    if ($msg != "") {
                        echo $msg;
                    }
                }
                ?>
            </div>
            <button class="btn btn-primary my-2 btn-1g" name="login"type="submit">Login</button>





        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    </body>
</html>
