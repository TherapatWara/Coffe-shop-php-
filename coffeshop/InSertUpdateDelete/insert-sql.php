<?php include "../connect.php" ?>
<?php
    $filename = $_POST["menu_Name"].".jpg"; //เปลี่ยนชื่อ file ให่เป็น .jpg
    $tempname = $_FILES["image"]["tmp_name"];  //จะเก็บไว้ใน tempname
    $folder = "../image/" . $filename; //folder ที่เก็บรูป จะเอารูปมาเก็บไว้ที่ folder
    //print_r($_FILES["image"]);
    move_uploaded_file($tempname, $folder); //ย้ายไฟล์ จาก tempname ไปยัง folder
    $stmt = $pdo->prepare("INSERT INTO menu VALUES (NULL, ?, ?)");
    $stmt->bindParam(1, $_POST["menu_Name"]);
    $stmt->bindParam(2, $_POST["price"]);
    $stmt->execute(); // เริ่มเพิ่มข้อมูล
    $pid = $pdo->lastInsertId(); // ขอคีย์หลักที่เพิ่มส าเร็จ

    header("location: ../frist.php");
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
</body>
</html>