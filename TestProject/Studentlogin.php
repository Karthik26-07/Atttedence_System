<?php
$phone_error = $pass1_error = $msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['phonenum'])) {
        $phone_error = " Phone number is Required";
    } else if (empty($_POST['pass'])) {
        $pass1_error = "Password  is required";
//        $msgEncoded2 = base64_encode($msg2);
//        header("location:Adminlogin.php?msg2=" . $msgEncoded2);
    } else {
        $Passes = $_POST['pass'];
        $Phones = $_POST['phonenum'];

//Accesing input from the login form
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
            .error {color: #FF0001;}

        </style>

    </head>
    <body>

        <nav class="navbar navbar-light bg-info">
            <span class="navbar-brand mb-0 h1">Student Login</span>
        </nav>
        <form class=" card index my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="row justify-content-center align-items-center">
                <h1>LOGIN</h1>
            </div>





            <div class="form-group">
                <label for="inputphonenumber">Phone Number</label>
                <input type="text" class="form-control" id="exampleInputphone" name="phonenum">
                <span class="error"> <?php echo $phone_error; ?> </span>


            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
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
                <?php // echo $msg;    ?>
            </div>
            <button class="btn btn-primary my-2 btn-1g" name="login"type="submit">Login</button>





        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    </body>
</html>
<?php
include 'dbconnect.php';
session_start();
if (isset($_POST['login'])) {
    if ($phone_error == "" && $pass1_error == "") {


        $Phones = $_POST['phonenum'];
        $Passes = $_POST['pass'];

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
        }
    }
} else {

}
?>