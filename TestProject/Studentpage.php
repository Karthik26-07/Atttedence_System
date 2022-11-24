<?php include 'Navbar.php';
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
    <?php
    $nameErr = $ageErr = $emailErr = $mobilenoErr = $parentphoneErr = $addErr = $passErr = "";

    $Name = $Phonenumber = $Email = $Parentsphone = $Address = $Semister = $Student_password = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {



        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        }
        // check if name only contains letters and whitespace
        else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
            $nameErr = "Only alphabets and white space are allowed";
        } else if (empty($_POST["age"])) {
            $ageErr = "Age is required";
        }
        // check if mobile no is well-formed
        else if (!preg_match("/^[0-9]*$/", $_POST["age"])) {
            $ageErr = "Only numeric value is allowed.";
        } else if (empty($_POST["phno"])) {
            $mobilenoErr = "Phone no is required";
        }
        // check if mobile no is well-formed
        else if (!preg_match("/^[0-9]*$/", $_POST["phno"])) {
            $mobilenoErr = "Only numeric value is allowed.";
        }
        //check mobile no length should not be less and greator than 10
        else if (strlen($_POST["phno"]) != 10) {
            $mobilenoErr = "Mobile no must contain 10 digits.";
        } else if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        }
        // check that the e-mail address is well-formed
        else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else if (empty($_POST["p_phonenum"])) {
            $parentphoneErr = "Parents phone number is required";
        }
        // check if mobile no is well-formed
        else if (!preg_match("/^[0-9]*$/", $_POST["p_phonenum"])) {
            $parentphoneErr = "Only numeric value is allowed.";
        }
        //check mobile no length should not be less and greator than 10
        else if (strlen($_POST["p_phonenum"]) != 10) {
            $parentphoneErr = "Mobile no must contain 10 digits.";
        } else if (empty($_POST["address"])) {
            $addErr = "Address is required";
        } else if (empty($_POST["password"])) {
            $passErr = "Password is required";
        } else {



            $Name = $_POST["name"];
            $Student_password = $_POST["password"];
            $Address = $_POST["address"];
            $Parentsphone = $_POST["p_phonenum"];
            $Email = $_POST["email"];
            $Phonenumber = $_POST["phno"];
            $Age = $_POST["age"];
            $Semister = $_POST["sem"];

//
        }
    }
    ?>
    <form class=" card stud my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="row justify-content-center align-items-center">
            <h1>Add Student</h1>
        </div>

        <div class="form-group">
            <label for="inputname">Name</label>
            <input type="name" class="form-control" id="exampleinputname" name="name">
            <span class="error"><?php echo $nameErr; ?> </span>
        </div>
        <div class="form-group">
            <label for="inputphone">Phonenumber</label>
            <input type="phone" class="form-control" id="phno" name="phno" min="1000000000" max="9999999999" >
            <span class="error"><?php echo $mobilenoErr; ?> </span>

        </div>
        <div class="form-group">
            <label for="inputname">Age</label>
            <input type="name" class="form-control" id="exampleinputname" name="age" >
            <span class="error"> <?php echo $ageErr; ?> </span>

        </div>




        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleInputemail" placeholder="name@example.com" name="email" >
            <span class="error"> <?php echo $emailErr; ?> </span>

        </div>

        <div class="form-group">
            <label for="inputaddress">Address</label>
            <input type="address" class="form-control" id="exampleInputaddress" name="address">
            <span class="error"> <?php echo $addErr; ?> </span>

        </div>
        <div class="form-group">
            <label for="inputphonenum">Parents Phonenumber</label>
            <input type="parentsphone" class="form-control" id="parentsphno" name="p_phonenum" min="1000000000" max="9999999999">
            <span class="error"> <?php echo $parentphoneErr; ?> </span>

        </div>



        <div class="form-group">
            <label for="exampleFormControlSelect1">Semester</label>
            <select class="form-control" id="exampleFormControlSelect1" name="sem">
                <option>1 Semester</option>
                <option>2 Semester</option>
                <option>3 Semester</option>
                <option>4 Semester</option>
                <option>5 Semester</option>
                <option>6 Semester</option>

            </select>
        </div>
        <div class="form-group">
            <label for="inputpass">Password</label>
            <input type="studentpass" class="form-control" id="parentspass" name="password" >
            <span class="error"><?php echo $passErr; ?> </span>

        </div>


        <button class="btn btn-primary my-2 btn-1g" name="submit" id="submit" type="submit">Save</button>

    </form>
    <?php
    include 'dbconnect.php';
    if (isset($_POST['submit'])) {
        if ($nameErr == "" && $ageErr == "" && $emailErr == "" && $mobilenoErr == "" && $parentphoneErr == "" && $addErr == "" && $passErr == "") {

            $sql = "insert into add_student(Name,Age,Email,Phonenumber,ParentPhonenum,Address,Semister,password)"
                    . "values ('$Name','$Age','$Email', '$Phonenumber','$Parentsphone','$Address','$Semister','$Student_password')";

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









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
