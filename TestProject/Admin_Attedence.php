<?php include 'Navbar.php';
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
                width: 40%;
                left:7%;

            }

        </style>

        <title>new faculty</title>
    </head>
    <body>


        <form class="card stu my-5  shadow-lg p-3 bg-white rounded " method="post" action="" >
            <div class="row justify-content-center align-items-center">
                <h2>Attedence</h2>
            </div>
            <br>


            <div class="form-group ">

                <label>  <b>   Semester:</b></label> <select class="" name="selectnameid" id='selectnameid'  onchange="semester(this.value)"selected="selected">
                    <option value="" selected="selected"  >--Select Semester--</option>
                    <?php
                    include 'dbconnect.php';

                    $sql = "SELECT DISTINCT subSemester
                            FROM subject_management";
                    $result1 = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result1)) {
                        ?>
                        <option><?php echo $row['subSemester']; ?></option>

                    <?php } ?>
                </select>

            </div>
        </form>
        <form class="my-5">

            <div id="displaysem"><b></b></div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
                    function semester(sem) {


                        if (sem === "") {
                            $("#displaysem").html("");
                            return;
                            // print the empty result

                        } else {


                            $.ajax({
                                type: "GET",
                                url: "Admin_AllStudentAttedence.php",
//                                url: "Admin-1.php",
                                data: {semname: sem

                                }, //sending the data to the displayStudent.php

                                success: function (result) {

                                    $("#displaysem").html(result);
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