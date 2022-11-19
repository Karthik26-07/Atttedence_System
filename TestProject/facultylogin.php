




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
            .error {color: #FF0001;}
        </style>

    </head>
    <body>
        <?php
        $phone_error = $pass1_error = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['phone'])) {
                $phone_error = " Phone number is Required";
            } else {
                $Phone = $_POST['phone'];
            }
            if (empty($_POST['password'])) {
                $pass1_error = "Password  is required";
            } else {

                $Pass = $_POST['password'];
            }
        }
        ?>

        <nav class="navbar navbar-light bg-info">
            <span class="navbar-brand mb-0 h1">Faculty Login</span>
        </nav>
        <form class=" card index my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="row justify-content-center align-items-center">
                <h1>LOGIN</h1>
            </div>





            <div class="form-group">
                <label for="inputphonenumber">Phone Number</label>
                <input type="text" class="form-control" id="exampleInputphone" name="phone">

                <span class="error"> <?php echo $phone_error; ?> </span>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" >
                <span class="error"> <?php echo $pass1_error; ?> </span>

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
        <?php
        include 'dbconnect.php';
        session_start();
        if (isset($_POST['login'])) {


            if ($phone_error == "" && $msg == "" && $pass1_error == "") {
                $Phone = $_POST['phone'];
                $Pass = $_POST['password'];

                $sql = "select * from faculty_register where phonenumber='$Phone' and password='$Pass'";
                $result = mysqli_query($con, $sql);



                while ($row = mysqli_fetch_assoc($result)) {
                    $ph = $row['phonenumber'];
                    $pa = $row['password'];
                    $_SESSION['phone'] = $row['phonenumber'];
                    $_SESSION['pass'] = $row['password'];
                }

                if ($Phone == $ph && $Pass == $pa) { //validating the input data
                    header("location:facultypage.php?");
                    exit();
                } else {

                    $msg = "Invalid user id or Password";
                    $msgEncoded = base64_encode($msg);
                    header("location:facultylogin.php?msg=" . $msgEncoded);


                    exit();
                }
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    </body>
</html>
