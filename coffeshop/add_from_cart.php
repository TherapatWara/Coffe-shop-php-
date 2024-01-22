<?php
session_start();


// ตรวจสอบว่ามีการส่งค่า menu_No มาจากหน้าแสดงรายการเมนูหรือไม่
if (isset($_GET["menu_No"])) {
    $menu_No = $_GET["menu_No"];
    $_SESSION["cart"][] = $menu_No;
}

// หลังจากเพิ่มสินค้าเรียบร้อย ให้กลับไปยังหน้ารายการสินค้าที่คุณต้องการ
header("Location: cart.php");
?>