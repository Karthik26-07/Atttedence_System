 <?php include 'Navbar.php';
?>
<?php
  include 'dbconnect.php';

$R_Name = $R_Phonenumber = $R_Email   = $R_Address = $R_Password =$R_Age= "";
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) == "POST") {
    $R_Name = filter_input(INPUT_POST, 'inputname');
    $R_Phonenumber = filter_input(INPUT_POST, 'inputphno');
    $R_Age=filter_input(INPUT_POST, 'age');
    $R_Email = filter_input(INPUT_POST, 'inputemail');
   
    $R_Address = filter_input(INPUT_POST, 'inputaddress');
    $R_Password = filter_input(INPUT_POST, 'inputpass');

    $sql = "insert into faculty_register(name,phonenumber,age,email,address,password)"
            . "values ('$R_Name','$R_Phonenumber','$R_Age','$R_Email','$R_Address','$R_Password')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Succesfullly Registered');</script>";
        echo "<script>window.location.href='Adminpage.php'</script>";
    } else {
        echo "Error: " . $sql. "<br>" . $con->error;
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
            <h1>Add Faculty</h1>    
        </div>

        <div class="form-group">
            <label for="inputname">Name</label>
            <input type="name" class="form-control" id="exampleinputname" name="inputname" required>
        </div>
        <div class="form-group">
            <label for="inputphone">Phonenumber</label>
            <input type="phone" class="form-control" id="phno" name="inputphno" min="1000000000" max="9999999999" required>
        </div>
 <div class="form-group">
            <label for="inputphone">Age</label>
            <input type="age" class="form-control" id="age" name="age" required>
        </div>




        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleInputemail" placeholder="name@example.com" name="inputemail" required>
        </div>

        <div class="form-group">
            <label for="inputaddress">Address</label>
            <input type="address" class="form-control" id="exampleInputaddress" name="inputaddress" required>
        </div>
        <div class="form-group">
            <label for="inputphonenum">Password</label>
            <input type="inputpass" class="form-control" id="parentsphno" name="inputpass" required>
        </div>

        <button class="btn btn-primary my-2 btn-1g" type="submit">Register</button>


           </form>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


       
    </body>
</html>
