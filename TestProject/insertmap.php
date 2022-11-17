<?php
include './dbconnect.php';


$sql = "SELECT


  faculty_register.name,
 manage_mapping.isenabled,
 manage_mapping.id,
  subject_management.subName
FROM faculty_register
JOIN manage_mapping
  ON faculty_register.id =manage_mapping.Faculty_Id
JOIN subject_management
  ON subject_management.subId = manage_mapping.Subject_Id
     ORDER BY manage_mapping.id DESC ";

$result = mysqli_query($con, $sql);









$i = 1;
$row = [];
if ($result->num_rows > 0) {

    $row = $result->fetch_all(MYSQLI_ASSOC);
}
?>




<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            td, th {
                border-bottom: 1px solid #DDD;
                padding: 8px;
                text-align: left;
            }

            tr:hover {background_color: #D6EEEE;}
        </style>
        <meta charset="UTF-8">
        <title>sub details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    </head>
    <body>
        <table class="table  table-striped">
            <thead>
                <tr>
                    <th scope=col>S.no</th>
                    <th scope=col>Faculty Name</th>
                    <th scope=col>Subject Name</th>

                    <th scope=col>Status</th>
                    <th scope=col>Action</th>


                </tr>
            </thead>


            <tbody>
                <?php
                if (!empty($row)) {
                    foreach ($row as $row) {
                        ?>   <tr>
                            <td><?php echo $i++ ?> </td>
                            <td><?php echo $row['name']; ?> </td>
                            <td><?php echo $row['subName']; ?></td>
                            <td> <?php
                                if ($row['isenabled'] == 0) {
                                    echo 'Deactive';
                                } else {
                                    echo 'Active';
                                }
                                ?></td>
                            <td   class="edit" id="<?= $row['id'] ?>"> <?php
                                if ($row['isenabled'] == ' 0') {
                                    echo '<p> <button type="button"  onclick="change(' . $row['id'] . ');" class="btn btn-success" >Enable</button></p>';
                                } else if ($row['isenabled'] == ' 1') {
                                    echo '<p> <button type="button" onclick="change(' . $row['id'] . ');" class="btn btn-danger" >Disable</button></p>';
                                }
                                ?></td>
                         <!--   <td id="names<=// $row['id'] ?>" -->
                            <?php
                            // if ($row['isenabled'] == 1) {
                            //  echo '
                            // <button type="button" class="btn-success" onclick="change(' . $row['id'] . ');" > Enabled </button>';
                            /// } else {
                            /// echo ' <button type="button" class="btn-danger" onclick="change(' . $row['id'] . ');" > Disable </button>';
                            // }
                            ///
                            ?>

                                            <!--      <td>
                                  <centre>
                                        <div class="form-control custom-switch">
                                            <input class="custom-control-input"  <?php // if($row['isenabled']=='1'){     echo "checked";}   ?> onclick="change(('.$row['id'].')" type="checkbox" id="customSwitch1">

                                        </div>


                                    </centre>



                                                    </td>-->
                        </tr>

                        <?php
                    }
                }
                ?>
            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <script type="text/javascript"  >


            function change(id) {


                $.ajax({
                    type: "POST",
                    url: "mapbutton.php",

                    data: {id: id},
                    timeout: 10000,
                    success: function () {
                        location.reload();
                        window.location.href = "Mapping.php";
                    }





                });
                event.preventDefault();
            }

        </script>

    </body>
</html>
