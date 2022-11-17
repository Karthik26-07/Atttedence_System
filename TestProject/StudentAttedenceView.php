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
        <nav class="navbar navbar-light bg-info">
            <span class="navbar-brand mb-0 h1">Student Attedence</span>
            <ul class="nav nav-pills nav-fill px-0 ">

                <li class="nav-item">
                    <a class="nav-link active  px-5" href="index.php">Logout</a>
                </li>
            </ul>

        </nav>


        <form class="card stu my-5  shadow-lg p-3 bg-white rounded " method="post" action="" >
            <div class="row justify-content-center align-items-center">
                <h2>Attedence</h2>
            </div>
            <br>


            <div class="form-group ">

                <label>  <b> Subject  Name:</b></label> <select class="" name="selectnameid" id='selectnameid'  onchange="subjectname(this.value)"selected="selected">
                    <option value="" selected="selected"  >--Select Name--</option>
                    <?php
                    include 'dbconnect.php';
                    session_start();
                    $Student_Phonenumber = $_SESSION['Stud_phone'];
                    $Student_Password = $_SESSION['Stud_Password'];
                    $sql = "SELECT
        add_student.id,
        subject_management.subId,
        subject_management.subSemester,
        subject_management.subName
        FROM add_student
        JOIN subject_management
        ON add_student.Semister =subject_management.subSemester
        WHERE Phonenumber='$Student_Phonenumber' and password='$Student_Password'";

                    $result1 = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result1)) {
                        $_SESSION['student'] = $row['id'];
                        ?>
                        <option value="<?php echo $row['subId']; ?> " ><?php echo $row['subName']; ?></option>

                    <?php } ?>
                </select>

            </div>
        </form>
        <form class="my-5">

            <div id="displayattedence"><b></b></div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
                    function subjectname(name) {


                        if (name === "") {
                            $("#displayattedence").html("");
                            return;
                            // print the empty result

                        } else {


                            $.ajax({
                                type: "GET",
                                url: "IndividualstudentAttedence.php",
                                data: {subjectname: name

                                }, //sending the data to the displayStudent.php

                                success: function (result) {

                                    $("#displayattedence").html(result);
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