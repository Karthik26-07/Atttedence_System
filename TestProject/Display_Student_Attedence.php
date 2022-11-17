
<?php
include 'dbconnect.php';
session_start();
$sub_ID = $_GET['subname'];
$sql = "SELECT add_student.Name,

add_student.id,
subject_management.subId,


        subject_management.subSemester,
        subject_management.subName
        FROM add_student
        JOIN subject_management
        ON add_student.Semister =subject_management.subSemester
        WHERE subId='$sub_ID'";
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
            .text{
                text-align: left;
                padding: 2px 20px;
                width: 150px;


            }
            .leftbox {
                float:right;



            }

        </style>


    </head>
    <body>


        <form class=" card stud   shadow-lg p-3 mb-5 bg-white rounded" method="post" id="form">
            <div class="form-group ">
                <!--Total Class: <input class="text"type="text" value="<?php // echo $class                                 ?>" readonly>-->
            </div>
            <?php // } ?>
            <div class="form-group">
                <table class="table  table-striped table-hover ">
                    <thead>
                        <tr>
                            <th scope=col>S.NO</th>

                            <th scope=col>Student Name</th>
                            <th scope=col>Total Attedence</th>
                            <th scope=col>Percentage</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($rows)) {
                            foreach ($rows as $row) {
                                $Subject_id = $row['subId'];
//                                echo "\nSubject:$Subject_id";
                                $Student_id = $row['id'];
//                                echo "\n Student: $Student_id";
                                $name = [];
                                $percent = [];
                                $sub;
                                $query = "SELECT sum(ispresent) as total FROM attedence WHERE  subid=' $Subject_id  '  AND studid='$Student_id'";
                                $result1 = mysqli_query($con, $query);
                                if ($result1->num_rows > 0) {

                                    $name = $result1->fetch_all(MYSQLI_ASSOC);
                                }
                                $query2 = "SELECT COUNT(ispresent) as total_class FROM attedence WHERE  subid=' $Subject_id  '  AND studid='$Student_id'";
                                $result2 = mysqli_query($con, $query2);

                                if ($result2->num_rows > 0) {

                                    $percent = $result2->fetch_all(MYSQLI_ASSOC);
                                }
                                $_SESSION['percent'] = array();
                                array_push($_SESSION['percent'], $percent);

//                                var_dump($percentage);
//                                var_dump($percent);
                                ?>   <tr>
                                    <td ><?php echo $j++ ?> </td>

                                    <td  value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?> </td>
                                    <?php
                                    foreach ($name as $names) {
//                                        var_dump($names);
                                        $sum = $names['total'];
                                        ?>
                                        <td ><?php echo $sum ?></td>
                                        <?php
                                        foreach ($percent as $pe) {
                                            $per = $pe['total_class'];

                                            $_SESSION['percent'] = array();
                                            array_push($_SESSION['percent'], $per);
                                            $percentage = ($sum * 100) / $per;
                                            ?>
                                            <td ><?php echo $percentage ?>%</td>
                                            <?php
                                        }
                                        ?>


                                        <?php
                                    }
                                    ?>

                                    <?php
                                }
                            }
                            ?>
                    <div class="leftbox">
                        <label> Total Class:</label>
                        <input class="text" type="text "   value="<?php echo $pe['total_class']; ?>" readonly>
                        <br>
                    </div>
                    </tbody>
                </table>
                <div style="text-align:center;">

                    <button class="button btn-secondary" id="save" name="save" type="submit">Close</button>
                </div>

            </div>


        </form>


    </body>
</html>
<?php
//$C = count($Student_id);
//for ($i = 0; $i < $C; $i++) {
//
//
//    $count = [];
//
//    if ($result1->num_rows > 0) {
//        var_dump($result1);
//        $count = $result->fetch_all(MYSQLI_ASSOC);
//    }
//}
//
?>





