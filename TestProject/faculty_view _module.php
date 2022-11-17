
<?php
include 'dbconnect.php';
error_reporting(0);
session_start();
$phonenum = $_SESSION['phone'];
$facpass = $_SESSION['pass'];
$sql = "select * from faculty_register  where phonenumber='$phonenum' and password='$facpass '";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $subIds = $row['id'];
}
?>





<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            .stu{
                width: 30%;
                left:30%;

            }

        </style>

        <title>new faculty</title>
    </head>
    <body>


        <form class="card stu my-5  shadow-lg p-3 bg-white rounded " method="post" action="" >

            <div class="form-group ">

                Subject  Name: <select class="" name="selectnameid" id='selectnameid'  onchange="subject(this.value)"selected="selected">
                    <option value="" selected="selected"  >--Select Name--</option>
                    <?php
                    include 'dbconnect.php';
                    $sqli = "SELECT
                             subject_management.subId,
                             subject_management.subName
                             FROM subject_management
                             JOIN manage_mapping
                             ON subject_management.subId=manage_mapping.Subject_Id
                             WHERE Faculty_Id='$subIds'";
                    $result1 = mysqli_query($con, $sqli);
                    while ($row = mysqli_fetch_assoc($result1)) {
                        ?>
                        <option value="<?php echo $row['subId']; ?> " ><?php echo $row['subName']; ?></option>

                    <?php } ?>
                </select>

            </div>
        </form>
        <form class="my-5">

            <div id="subnames"><b></b></div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
                    function subject(sub) {


                        if (sub === "") {
                            $("#subnames").html("");
                            return;
                            // print the empty result

                        } else {


                            $.ajax({
                                type: "GET",
                                url: "Display_Student_Attedence.php",
                                data: {subname: sub}, //sending the data to the displayStudent.php

                                success: function (result) {

                                    $("#subnames").html(result);
                                    return;
                                    // print the result

                                }

                            });
                        }

                        e.preventDefault();


                    }



        </script>

    </body>
</html>
