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


        $namesid = $_GET['p'];


        mysqli_select_db($con, "attedence_system");
        $sql = "select * from add_student where id='$namesid' ";
        $result = mysqli_query($con, $sql);

        echo "<table =form-control>
<tr>
<th>Name</th>
<th>Age</th>
<th>Email</th>
<th>PhoneNumber</th>
<th>ParentsPhonenumber</th>
<th>Address</th>
<th>Semester</th>
<th>Password</th>
</tr>";

        while ($row = mysqli_fetch_assoc($result)) {




            echo "<tr>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Age'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Phonenumber'] . "</td>";
            echo "<td>" . $row['ParentPhonenum'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Semister'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";


            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>
