<?php
session_start();

if (isset($_GET["menu_No"])) {
    $menu_NoToRemove = $_GET["menu_No"];
    // หากมีการส่ง menu_No มาจากลิงก์ "ลบ"
    // ให้ค้นหาและลบ menu_No นี้ออกจากตัวแปร $_SESSION["cart"]
    $cartKey = array_search($menu_NoToRemove, $_SESSION["cart"]);
    if ($cartKey !== false) {
        unset($_SESSION["cart"][$cartKey]);
    }
}

// หลังจากลบสินค้าเรียบร้อยแล้ว ให้กลับไปที่หน้า cart.php
header("Location: cart.php");
exit;
?>
