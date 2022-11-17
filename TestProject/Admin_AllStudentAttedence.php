
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
            @media print {
                .printPageButton {
                    display: none;
                }
            }

        </style>


    </head>
    <body>
        <?php
        include 'dbconnect.php';
        $semester = $_GET['semname'];
        $sql = "SELECT
        add_student.Name,
        add_student.id,
        subject_management.subId,
        subject_management.subSemester,
        subject_management.subName
        FROM add_student
        JOIN subject_management
        ON add_student.Semister =subject_management.subSemester
        WHERE subSemester='" . $semester . "'
        GROUP BY subId,id";
        $result = mysqli_query($con, $sql);
        $j = 1;
        $i = 1;

        $prev_subject = NULL;

        while ($row = mysqli_fetch_assoc($result)) {
            $Subject_id = $row['subId'];
            $sub = $row['subName'];

            $Student_id = $row['id'];

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

            foreach ($name as $names) {
                $sum = $names['total'];
                foreach ($percent as $pe) {
                    $per = $pe['total_class'];
                    $percentage = ($sum * 100) / $per;


                    if ($Subject_id === $prev_subject) {
                        ?>
                    <tr>
                        <td ><?php echo $j++ ?> </td>

                        <td  value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?> </td>

                        <td ><?php echo $sum ?></td>

                        <td ><?php echo $percentage ?>%</td>
                    </tr>

                    <?php
                    $prev_subject = $Subject_id;
                } else {
                    ?>
                    <div class="form-group ">
                        <table class="table  table-striped table-hover " id="table(<?php echo $i++ ?>)">
                            <div class="leftbox">
                                <label><b> Subject:</b></label>
                                <input  type="text "   value="<?php echo $sub; ?>" readonly>

                            </div>

                            <div class="leftbox px-3">
                                <label ><b> Total Class:</b></label>
                                <input class="text" type="text "   value="<?php echo $pe['total_class']; ?>" readonly>
                                <br>
                            </div>
                            <div>
                                <a class="button btn-secondary" id="printPageButton" href="javascript:void(0);" onclick="printPage();">Print</a>
                            </div>

                            <thead>
                                <tr>
                                    <th scope=col>S.NO</th>

                                    <th scope=col>Student Name</th>
                                    <th scope=col>Total Attedence</th>
                                    <th scope=col>Percentage</th>

                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td ><?php echo $j++ ?> </td>

                                    <td  value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?> </td>

                                    <td ><?php echo $sum ?></td>

                                    <td ><?php echo $percentage ?>%</td>
                                </tr>
                                <?php
                                $prev_subject = $Subject_id;
                            }
                        }
                    }
                    ?>
                </tbody>
                <?php
            }
            ?>
        </table>




    </div>

    <script type="text/javascript">
        function printPage() {
            for (int i = 1; i < n; i++) {
                var tableData = '<table border="1">' + document.getElementById("table(i)")[0].innerHTML + '</table>';
                var data = '<button id="printPageButton" onclick="window.print()">Print this page</button>' + tableData;
                myWindow = window.open('', '', 'width=800,height=600');
                myWindow.innerWidth = screen.width;
                myWindow.innerHeight = screen.height;
                myWindow.screenX = 0;
                myWindow.screenY = 0;
                myWindow.document.write(data);
                myWindow.focus();
            }
        }
        ;
    </script>

</body>
</html>