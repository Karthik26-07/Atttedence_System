
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
        <title>view student</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">




        <script>//using javascript make get request to the server 
            //  function showUser(str) {
            //   if (str === "") {
            //   document.getElementById("displayStudent").innerHTML = "";
            //  return;                    
            //  } else {
            //   var xmlhttp = new XMLHttpRequest();
            //  xmlhttp.onreadystatechange = function () {
            //    if (this.readyState === 4 && this.status === 200) {
            //     document.getElementById("displayStudent").innerHTML = this.responseText;
            //  }
            //  };

            //  xmlhttp.open("GET", "displayStudent.php?q="+str,true);
            //  xmlhttp.send();
            // }
            // }



            //using jquery make get request to the server 









        </script>



    </head>
    <body>
        <form >
           
            <br><br>
            <h5>Select the student name from the list</h5>
            <br>

            <div class="col-12 col-md-9">

                <lable for="inputname" id="name"><b>Student Names:</b> </lable>
                <select class="Names" name="selectnameid" id='selectnameid' onchange="myfunction(this.value)"selected="selected">
                    <option value="" selected="selected"  >---Select Name---</option>
                    <?php
                    include 'dbconnect.php';
                    $sql = "select * From add_student";
                    $result = mysqli_query($con, $sql);
                    while ($row_ah = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row_ah['id']; ?> " id="namesid" name="namesid"><?php echo $row_ah['Name']; ?></option>
                    <?php } ?>
                </select>

            </div>
        </div>
    </form>
    <br>
    <div id="displayStudent"><b> </b></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

                    function myfunction(str) {
                        if (str === "") {
                            $("#displayStudent").html("");  // print the empty result
                            return;
                        } else {


                            $.ajax({
                                type: "GET",
                                url: "displayStudent.php",
                                data: {p: str}, //sending the data to the displayStudent.php

                                success: function (result) {

                                    $("#displayStudent").html(result);  // print the result
                                    return;
                                }

                            });
                        }
                    }

    </script>

</body>
</html>
