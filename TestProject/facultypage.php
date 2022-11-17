<?php
// put your code
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


        <title>faculty page</title>
        <style>



        </style>
    </head>
    <body>

        <nav class="navbar navbar-light bg-info">
            <span class="navbar-brand mb-0 h1">Faculty</span>

            <ul class="nav nav-pills nav-fill "  >

                <li class="nav-item dropdown ">
                    <button class="nav-link dropdown-toggle px-5 btn-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Attedence</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id="button" href="">New</a>

                        <a class="dropdown-item" id="view" href="">View</a>

                    </div>
                </li>
            </ul>
            <ul class="nav nav-pills nav-fill px-5 ">

                <li class="nav-item ">
                    <a class="nav-link active  px-5" href="index.php">Logout</a>
                </li>
            </ul>

        </nav>
        <form class="my-5">

            <div id="new"><b></div>





            <div id="display"><b></div>

        </form>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>

            $("#button").click(function (e) {
                $.ajax({
                    type: "GET",
                    url: "new_option_faculty.php",
                    data: {}, //sending the data to the displayStudent.php

                    success: function (result) {

                        $("#new").html(result);  // print the result
                        return;
                    }

                });
                e.preventDefault();
            });


        </script>
        <script>

            $("#view").click(function (e) {
                $.ajax({
                    type: "GET",
                    url: "faculty_view _module.php",
                    data: {},

                    success: function (result) {

                        $("#display").html(result);  // print the result
                        return;
                    }

                });
                e.preventDefault();
            });


        </script>


    </body>
</html>