<?php include "connect.php" ?>

<html>
    <head>
        <meta charset="utf-8">
        <script>
            function errorinput(){
                header("Location: connect.php");
            }
        </script>    
    </head>
<body>
    <?php

    if (isset($_POST["login_user"])){
        $emp_Id = $_POST["emp_Id"];
        $emp_Phone = $_POST["emp_Phone"];

        if(empty($emp_Id)){
            errorinput();
        }

        if(empty($emp_Phone)){
            errorinput();
        }

    }

    
    ?>
    
    <?="ชื่อสมาชิก:" . $row["emp_Name"]?><br><?="โทร:" . $row["emp_Phone"]?><br><?="อีเมล์:" . $row["emp_DOB"]?><br><hr> 

</body>
</html>