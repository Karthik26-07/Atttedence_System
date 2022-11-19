



<!doctype html>
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
        session_start();

        $name_error = $msg = $pass_error = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['userid'])) {
                $name_error = " Name Required";
            } else {
                $Userid = $_POST ['userid'];
            }
            if (empty($_POST['password'])) {
                $pass_error = "Password  is required";
//        $msgEncoded2 = base64_encode($msg2);
//        header("location:Adminlogin.php?msg2=" . $msgEncoded2);
            } else {
                $Password = $_POST['password']; //Accesing input from the login form
            }
        }
        ?>
        <nav class="navbar navbar-light bg-info">
            <span class="navbar-brand mb-0 h1">Admin Login</span>
        </nav>
        <form class=" card index my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="row justify-content-center align-items-center">
                <h1>LOGIN</h1>
            </div>





            <div class="form-group">

                <label for="inputphonenumber">User id</label>
                <input type="text" class="form-control" id="exampleInputphone" name="userid"  >
                <span class="error"> <?php echo $name_error; ?> </span>



            </div>


            <div class="form-group">

                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"  >

                <span class="error"> <?php echo $pass_error; ?> </span>

            </div>
            <div class="text-danger">
                <?php
                $msg = base64_decode(filter_input(INPUT_GET, 'msg'));
                {
                    if ($msg != "") {
                        echo $msg;
                    }
                }
                ?>
                <!--<span class="error"> <?php echo $msg; ?> </span>-->

            </div>
            <button class="btn btn-primary my-2 btn-1g" name="submit"type="submit">Login</button>

        </form>
        <?php
        if (isset($_POST['submit'])) {
            if ($name_error == "" && $pass_error == "") {

                if ($Userid == root && $Password == root) {
                    $_SESSION['Userid'] = $Userid;
                    $_SESSION['Password'] = $Password;
                    header("location:Adminpage.php?");
                    exit();
                } else {
                    $msg = "Invalid user id or Password";
                    $msgEncoded = base64_encode($msg);
                    header("location:Adminlogin.php?msg=" . $msgEncoded);
////
                }
            } else {

            }
        }
        ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    </body>
</html>
