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


        $fname = $_GET['f_name'];


        mysqli_select_db($con, "faculty_register");
        $sql = "select * from faculty_register where id='$fname' ";
        $result = mysqli_query($con, $sql);

        echo "<table =form-control>
<tr>
<th>Name</th>
<th>PhoneNumber</th>

<th>Age</th>
<th>Email</th>
<th>Address</th>
<th>Password</th>
</tr>";

        while ($row = mysqli_fetch_assoc($result)) {




            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['phonenumber'] . "</td>";

            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";

            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>
