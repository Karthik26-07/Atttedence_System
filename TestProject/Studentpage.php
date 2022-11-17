<?php include 'Navbar.php';
?>
<?php
include 'dbconnect.php';

$Name = $Phonenumber = $Email = $Parentsphone = $Address = $Semister = $Student_password = "";
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {
    $Name = filter_input(INPUT_POST, 'name');
    $Age = filter_input(INPUT_POST, 'age');
    $Phonenumber = filter_input(INPUT_POST, 'phno');
    $Email = filter_input(INPUT_POST, 'email');
    $Parentsphone = filter_input(INPUT_POST, 'p_phonenum');
    $Address = filter_input(INPUT_POST, 'address');
    $Semister = filter_input(INPUT_POST, 'sem');
    $Student_password = filter_input(INPUT_POST, 'password');
    $sql = "insert into add_student(Name,Age,Email,Phonenumber,ParentPhonenum,Address,Semister,password)"
            . "values ('$Name','$Age','$Email', '$Phonenumber','$Parentsphone','$Address','$Semister','$Student_password')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Succesfullly Registered');</script>";
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
    <form class=" card stud my-5  shadow-lg p-3 mb-5 bg-white rounded" method="post"  action="">

        <div class="row justify-content-center align-items-center">
            <h1>Add Student</h1>
        </div>

        <div class="form-group">
            <label for="inputname">Name</label>
            <input type="name" class="form-control" id="exampleinputname" name="name" required>
        </div>
        <div class="form-group">
            <label for="inputphone">Phonenumber</label>
            <input type="phone" class="form-control" id="phno" name="phno" min="1000000000" max="9999999999" required>
        </div>
        <div class="form-group">
            <label for="inputname">Age</label>
            <input type="name" class="form-control" id="exampleinputname" name="age" required>
        </div>




        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleInputemail" placeholder="name@example.com" name="email" required>
        </div>

        <div class="form-group">
            <label for="inputaddress">Address</label>
            <input type="address" class="form-control" id="exampleInputaddress" name="address" required>
        </div>
        <div class="form-group">
            <label for="inputphonenum">Parents Phonenumber</label>
            <input type="parentsphone" class="form-control" id="parentsphno" name="p_phonenum" min="1000000000" max="9999999999" required>
        </div>



        <div class="form-group">
            <label for="exampleFormControlSelect1">Semester</label>
            <select class="form-control" id="exampleFormControlSelect1" name="sem" required>
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
            <input type="studentpass" class="form-control" id="parentspass" name="password" required>
        </div>


        <button class="btn btn-primary my-2 btn-1g" type="submit">Save</button>

    </form>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
