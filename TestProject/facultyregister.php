<?php include 'Navbar.php';
?>
<?php
include 'dbconnect.php';
$nameErr = $ageErr = $emailErr = $mobilenoErr = $addErr = $passErr = "";


$R_Name = $R_Phonenumber = $R_Email = $R_Address = $R_Password = $R_Age = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    if (empty($_POST["inputname"])) {
        $nameErr = "Name is required";
    } else {
        $R_Name = $_POST["inputname"];
// check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $R_Name)) {
            $nameErr = "Only alphabets and white space are allowed";
        }
    }

    if (empty($_POST["inputphno"])) {
        $mobilenoErr = "Phone no is required";
    } else {
        $R_Phonenumber = $_POST["inputphno"];
// check if mobile no is well-formed
        if (!preg_match("/^[0-9]*$/", $R_Phonenumber)) {
            $mobilenoErr = "Only numeric value is allowed.";
        }
//check mobile no length should not be less and greator than 10
        if (strlen($R_Phonenumber) != 10) {
            $mobilenoErr = "Mobile no must contain 10 digits.";
        }
    }
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $R_Age = $_POST["age"];
// check if mobile no is well-formed
        if (!preg_match("/^[0-9]*$/", $R_Age)) {
            $ageErr = "Only numeric value is allowed.";
        }
    }
    if (empty($_POST["inputemail"])) {
        $emailErr = "Email is required";
    } else {
        $R_Email = $_POST["inputemail"];
// check that the e-mail address is well-formed
        if (!filter_var($R_Email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["inputaddress"])) {
        $addErr = "Address is required";
    } else {
        $R_Address = $_POST["inputaddress"];
    }
    if (empty($_POST["inputpass"])) {
        $passErr = "Password is required";
    } else {
        $R_Password = $_POST["inputpass"];
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


        <title>Student page</title>

        <style>
            .stud{
                width: 40%;
                left:7%;

            }
            .error {color: #FF0001;}

        </style>


    </head>

</head>
<body>
    <form class=" card stud my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="row justify-content-center align-items-center">
            <h1>Add Faculty</h1>
        </div>

        <div class="form-group">
            <label for="inputname">Name</label>
            <input type="name" class="form-control" id="exampleinputname" name="inputname">
            <span class="error"> <?php echo $nameErr; ?> </span>

        </div>
        <div class="form-group">
            <label for="inputphone">Phonenumber</label>
            <input type="phone" class="form-control" id="phno" name="inputphno" min="1000000000" max="9999999999" >
            <span class="error"><?php echo $mobilenoErr; ?> </span>

        </div>
        <div class="form-group">
            <label for="inputphone">Age</label>
            <input type="age" class="form-control" id="age" name="age" >
            <span class="error"> <?php echo $ageErr; ?> </span>

        </div>




        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleInputemail" placeholder="name@example.com" name="inputemail">
            <span class="error"> <?php echo $emailErr; ?> </span>

        </div>

        <div class="form-group">
            <label for="inputaddress">Address</label>
            <input type="address" class="form-control" id="exampleInputaddress" name="inputaddress">
            <span class="error"> <?php echo $addErr; ?> </span>

        </div>
        <div class="form-group">
            <label for="inputphonenum">Password</label>
            <input type="inputpass" class="form-control" id="parentsphno" name="inputpass">
            <span class="error"><?php echo $passErr; ?> </span>

        </div>

        <button class="btn btn-primary my-2 btn-1g" name="submit" type="submit">Register</button>


    </form>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>
</html>
<?php
include 'dbconnect.php';
if (isset($_POST['submit'])) {
    if ($nameErr == "" && $ageErr == "" && $emailErr == "" && $mobilenoErr == "" && $addErr == "" && $passErr == "") {
        $sql = "insert into faculty_register(name,phonenumber,age,email,address,password)"
                . "values ('$R_Name','$R_Phonenumber','$R_Age','$R_Email','$R_Address','$R_Password')";

        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Succesfullly Registered');</script>";
            echo "<script>window.location.href='Adminpage.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {

    }
}
?>