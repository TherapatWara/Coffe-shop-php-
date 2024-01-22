<?php
session_start();

// ตรวจสอบว่ามีตัวแปรเซสชัน "cart" หรือไม่
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array(); // ถ้ายังไม่มี ให้สร้างอาร์เรย์ว่าง
}

// ตรวจสอบว่ามีการส่งค่า menu_No มาจากหน้าแสดงรายการเมนูหรือไม่
if (isset($_GET["menu_No"])) {
    $menu_No = $_GET["menu_No"];
    // เพิ่ม menu_No ลงในรถเข็น (อาร์เรย์เซสชัน "cart")
    $_SESSION["cart"][] = $menu_No;
}


// เชื่อมต่อกับฐานข้อมูล (อาจต้องปรับแต่งตามเครื่องหมายคำถามสำหรับการเชื่อมต่อ)
include "connect.php";

// สร้างคำสั่ง SQL เพื่อดึงข้อมูลเมนูจากฐานข้อมูล
if (empty($_SESSION["cart"])) {
    $sql = "SELECT * FROM menu WHERE 1=0"; // กำหนด SQL เป็นเงื่อนไขเท็จ
} else {
    $sql = "SELECT * FROM menu WHERE menu_No IN (" . implode(",", $_SESSION["cart"]) . ")";
}

$stmt = $pdo->prepare($sql);
$stmt->execute();

// นับจำนวนแต่ละชนิดของสินค้าในรถเข็น
$cartItemCount = array_count_values($_SESSION["cart"]);
?>


<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&family=Lato:ital,wght@1,300&family=Open+Sans:wght@300&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <header>
             <div class="topnav">  
            <a href="setting.php"><img src="./image/logo.png" height="30px" alt="Logo"></a>
            <nav>
                <a class="linkbutt" style="color:#FBB813;" href="frist.php">Shop</a>
                <a class="linkbutt" href="showquery.php">Query</a>
                <a class="linkbutt" href="logout.php">logout</a>
            </nav>
            </div>
        </header>
        <img src="./image/topcart.png" height="300">
        <main class="content">
            <?php if (!empty($cartItemCount)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Menu No</th>
                            <th>Menu Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $stmt->fetch()): ?>
                            <tr>
                                <td><?= $row["menu_No"] ?></td>
                                <td><?= $row["menu_Name"] ?></td>
                                <td><?= $row["price"] * $cartItemCount[$row["menu_No"]] ?></td>
                                <td><?= $cartItemCount[$row["menu_No"]] ?></td>
                                <td>
                                    <a href="remove_from_cart.php?menu_No=<?= $row["menu_No"] ?>">ลด</a>&nbsp;
                                    <a href="add_from_cart.php?menu_No=<?= $row["menu_No"] ?>">เพิ่ม</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <form action="add_to_sql.php" method="POST">
                    <input type="submit" class="confirm-button" value="Confirm Purchase">
                </form>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </main>
        <footer class="footer">
            
        </footer>
    </div>
</body>
</html>