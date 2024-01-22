<?php
session_start();

// ตรวจสอบว่ามีตัวแปรเซสชัน "cart" หรือไม่
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array(); // ถ้ายังไม่มี ให้สร้างอาร์เรย์ว่าง
}

// เชื่อมต่อกับฐานข้อมูล
include "connect.php";

// สร้างคำสั่ง SQL เพื่อดึงข้อมูลเมนูจากฐานข้อมูล
if (empty($_SESSION["cart"])) {
    $sql = "SELECT * FROM menu WHERE 1=0"; // กำหนด SQL เป็นเงื่อนไขเท็จ
} else {
    $sql = "SELECT * FROM menu WHERE menu_No IN (" . implode(",", $_SESSION["cart"]) . ")";
}

$stmt = $pdo->prepare($sql);
$stmt->execute();

$stmt2 = $pdo->prepare("SELECT MAX(bill_Id) FROM bill");
$stmt2->execute();
$row = $stmt2->fetch();

$maxmenu = $pdo->prepare("SELECT MAX(menu_No) FROM menu");
$maxmenu->execute();
$row3 = $maxmenu->fetch();


$stmt3 = $pdo->prepare("SELECT menu.menu_No,menu.price FROM menu");
$stmt3->execute();
$row2 = $stmt3->fetch();

// แสดงค่า session "cart"
$cart = $_SESSION["cart"];
$maxIndex = max(array_keys($cart));
$maxid = $row3["MAX(menu_No)"];
$maxbill = $row["MAX(bill_Id)"];

// สร้างตัวแปรใหม่เพื่อจัดเรียงค่าใน session "cart"
$newCart = array();
$count = 0;

for ($x = 0; $x <= $maxIndex; $x++) {
    if (isset($_SESSION["cart"][$x])) {
        if ($_SESSION["cart"][$x] != 0) {
            $newCart[$count] = $_SESSION["cart"][$x];
            $count++;
        }
    }
}
// กำหนด session "cart" ใหม่
$_SESSION["cart"] = $newCart;


$result = 0;

// วนลูปเพื่อคำนวณราคารวมของสินค้าใน session "cart"
foreach ($_SESSION["cart"] as $cartItem) {
    $sql = "SELECT price FROM menu WHERE menu_No = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cartItem]);
    $row = $stmt->fetch();

    if ($row) {
        $result += $row["price"];
    }
}
//insert ข้อมูลเข้าตาราง bill
$addto = $pdo->prepare("INSERT INTO bill VALUES (NULL, :result, current_timestamp());");
$addto->bindParam(':result', $result);
$addto->execute();


$empid = $_COOKIE["empid"];
$making_detail = '';
//insert ข้อมูลเข้าตาราง makings
for($k=0;$k<= $maxIndex;$k++){
    $addmaking = $pdo->prepare("INSERT INTO makings VALUES (NULL,:making_detail,:emp_Id,:bill_Id,:manu_No)");
    $addmaking->bindParam(':making_detail',$making_detail);
    $addmaking->bindParam(':emp_Id',$empid);
    $addmaking->bindParam(':bill_Id',$maxbill);
    $addmaking->bindParam(':manu_No',$_SESSION["cart"][$k]);
    $addmaking->execute();
}
//insert ข้อมูลเข้า sql เสร็จแล้วทำ cart ให้เป็นค่าว่าง
$_SESSION["cart"] = array();
//ไปหน้า frist.php
header("Location: frist.php");
exit();


?>