<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                padding: 5px;
            }

            th {text-align: left;}
        </style>

    </head>
    <body>

        <?php
        include 'dbconnect.php';

        error_reporting(0);


        $subid = $_GET['sub'];



        $sql = "select * From subject_management where subId='$subid'";

        $result = mysqli_query($con, $sql);

        echo "<table =form-control>
<tr>
<th>Subject Name</th>
<th>Subject Code</th>
<th>Semester</th>
<th>Description</th>

</tr>";

        while ($row = mysqli_fetch_assoc($result)) {




            echo "<tr>";
            echo "<td>" . $row['subName'] . "</td>";
            echo "<td>" . $row['subCode'] . "</td>";
            echo "<td>" . $row['subSemester'] . "</td>";
            echo "<td>" . $row['subDescription'] . "</td>";


            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>
