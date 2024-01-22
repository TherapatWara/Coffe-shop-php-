<?php include "connect.php"; ?>
<html>
    <body>
        <?php
            $idemp = $_GET["emp_Id"];
            $stmt = $pdo->prepare("SELECT * FROM employee");
            $stmt->execute();
            $i=0;
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
            <?=$row["emp_Id"]?><?=$row ["emp_Name"]?><br>
            <?php $i++ ?>
        </div>
        <?php endwhile; ?>
        <?php 
            echo"$i";
            echo"$idemp";
        ?>
        <?php
        $found = false;
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            if ($idemp == $row["emp_Id"]) {
                setcookie("empid", $idemp, time() + 3600 * 24);
                $found = true;
                break;
            }
        }
        if (!$found) {
            header("Location: login_emp.php");
        } else {
            header("Location: frist.php");
        }        

        ?>
    </form>
    </body>
</html>