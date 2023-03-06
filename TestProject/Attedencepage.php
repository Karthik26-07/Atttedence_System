<?php
include 'dbconnect.php';
$subname3 = $_GET['name'];
$_SESSION['subname'] = $_GET['name'];
$sql = "SELECT add_student.Name,

add_student.id,
subject_management.subId,


        subject_management.subSemester,
        subject_management.subName
        FROM add_student
        JOIN subject_management
        ON add_student.Semister =subject_management.subSemester
        WHERE subId='$subname3'";
$result = mysqli_query($con, $sql);
$j = 1;
$rows = [];

if ($result->num_rows > 0) {

    $rows = $result->fetch_all(MYSQLI_ASSOC);
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

        <title>Attedence</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            .stud{
                width: 50%;
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
        <form class=" card stud   shadow-lg p-3 mb-5 bg-white rounded" method="post" id="form"action="UpdateAttedence.php">

            <div class="form-group">
                <table class="table  table-striped table-hover ">
                    <thead>
                        <tr>
                            <th scope=col>S.NO</th>

                            <th scope=col>Student Name</th>
                            <th scope=col>Attedence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($rows)) {
                            foreach ($rows as $row) {
                                ?>   <tr>
                                    <td ><?php echo $j++ ?> </td>

                                    <td><?php echo $row['Name']; ?> </td>
                                    <td>



                                        <input type="hidden" id="check" name="check[<?php echo $row['id']; ?>]" id="" value="0" >

                                        <input type="checkbox" id="check" name="check[<?php echo $row['id']; ?>]" id="checkboxs" value="1"  checked >
                                    </td>
                                    <td>  <input type="hidden" name="studentid[]"  id="studentid" value="<?php echo $row['id']; ?>">
                                    </td>
                                    <td>  <input type="hidden" name="subjectid[]" id="subjectid" value="<?php echo $row['subId']; ?>">
                                    </td>
                            </tbody>
                            <?php
                    }
                    }
                    ?>
                </table>
                <div style="text-align:center;">

                    <button class="button btn-primary" id="save" name="save" type="submit">Save</button>
                </div>

            </div>


        </form>


    </body>
</html>
