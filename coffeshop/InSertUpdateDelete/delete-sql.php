<?php include "../connect.php" ?>
<?php
    $stmt = $pdo->prepare("DELETE FROM menu WHERE menu_Name=?");
    $stmt->bindParam(1, $_GET["menu_Name"]); // ก าหนดค่าลงในต าแหน่ง ?
    if ($stmt->execute()) // เริ่มลบข้อมูล
    header("location: ../frist.php"); // กลับไปแสดงผลหน้าข้อมูล
?>