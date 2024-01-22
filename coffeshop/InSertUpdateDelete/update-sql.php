<?php
include "../connect.php";

try {
    $stmt = $pdo->prepare("UPDATE menu SET price = :price WHERE menu_Name = :menuName");
    $stmt->bindParam(':price', $_POST["price"]);
    $stmt->bindParam(':menuName', $_POST["menu_Name"]);

    if ($stmt->execute()) {
        header("location: ../frist.php");
    } else {
        echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล";
    }
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาด SQL: " . $e->getMessage();
}
?>
