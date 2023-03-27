<?php include 'Navbar.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Mapping</title>
        <style>
            .stu{
                width: 80%;
                left:7%;

            }
            .stuts{
                width: 90%;
                left:7%;

            }

            .button {

                border: none;
                color: white;
                padding: 8px 30px;
                text-align: center;
                text-decoration: none;
                border-radius: 8px;
                font-size: 16px;
                margin: 2px 2px;

                width: 150px;






            }




        </style>



        </head>
    <body>


                <div class="form-row">

            <div class="form-group  col-md-6 ">
                <form class="card stu my-5  shadow-lg p-3 bg-white rounded " method="post" action="" >



                    <div class="form-group my-5">

                        Faculty Name: <select class=" " name="facltyid"  id="facltyid" selected="selected">

                            <option value="" selected="selected"  >--Select Name--</option>
                            <?php
                            include 'dbconnect.php';
                            $sql = "select * from faculty_register";
                            $result = mysqli_query($con, $sql);
                            while ($row_ah = mysqli_fetch_assoc($result)) {
                                ?>

                                <option value="<?php echo $row_ah['id']; ?> "><?php echo $row_ah['name']; ?></option>

                            <?php } ?>

                        </select>


                    </div>
                    


                    <div class="form-group ">

                        Subject  Name: <select class="" name="selectnameid" id='selectnameid'  selected="selected">
                            <option value="" selected="selected"  >--Select Name--</option>
                            <?php
                            include 'dbconnect.php';
                            $sqli = "select * from subject_management";
                            $result1 = mysqli_query($con, $sqli);
                            while ($row = mysqli_fetch_assoc($result1)) {
                                ?>
                                <option value="<?php echo $row['subId']; ?> " ><?php echo $row['subName']; ?>[<?php echo $row['subCode']; ?>]</option>

                            <?php }?>
                        </select>

                    </div>


                    <br>
                    <div style="text-align:center;">

                    <button class="button btn-primary mb-4 " name="button" id="button" type="submit" >MAP</button>
                    </div>


            </div>


        </form>



        <div class="form-group col-md-6">
            <div class="stuts my-5 card shadow-lg p-3 bg-white rounded "id="map"></div>
        </div>
    </div>  


    <?php
    //  include 'dbconnect.php';
    // if (isset($_POST['button'])) {
    //$SubjectId = $_POST['selectnameid'];
    // $facId = $_POST['facltyid'];
    /// if ($facId == '' || $SubjectId == '') {
    // echo "<script>alert(' Please select the both name of subject and faculty');</script>";
    //   echo "<script>window.location.href='Mapping.php'</script>";
    //  } else {
    //      $sql = "insert into manage_mapping(Faculty_Id,Subject_Id)"
    //            . "values ('$facId','$SubjectId')";
    //  }
    //if ($con->query($sql) === TRUE) {
    //  echo "<script>alert('Succesfullly Added');</script>";
    //echo "<script>window.location.href='Mapping.php'</script>";
    //} else {
    //  echo "Error: " . $sql . "<br>" . $con->error;   //display error message .
    //}
    //}
    ?>



   
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script >


        $(document).ready(function () {
            
                $.ajax({
                    type: "GET",
                    url: "insertmap.php",

                    dataType: 'html',
                    timeout: 1000,
                    success: function (result) {
                        $('#map').html(result);

                    },

                    error: function (err) {

                        console.warn(err.responseJSON.errors);  // print the error result
                        return;
                    }


                });


            
            $("#button").click(function (e) {
              
  var userDetails = {
                    facid: $('#facltyid').val(),
                    subid: $('#selectnameid').val()
                };
                $.ajax({
                    type: "POST",

                    url: "updatemap.php",
                    data: userDetails,
                    async: false,
                    success: function (response) {
                        $("#facltyid").val("");
                        $("#selectnameid").val("");
                          location.reload();

                    },
                    error: function () {
                        console.log("there is some error");
                    }
                });


                



                e.preventDefault();



            });


        });
    </script>



</body>

</html>