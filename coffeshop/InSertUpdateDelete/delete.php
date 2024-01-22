<?php include "../connect.php" ?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../setting-style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&family=Lato:ital,wght@1,300&family=Open+Sans:wght@300&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <?php
    $stmt = $pdo->prepare("SELECT * FROM menu ");
    $stmt->execute();
    ?>
    <script>
        function confirmDelete(menu_Name) { // ฟังก์ชนจะถูกเรียกถ้าผู้ใช ั คลิกที่ ้ link ลบ
            var ans = confirm("ต้องการลบ" + menu_Name); // แสดงกล่องถามผู้ใช ้
            if (ans==true) // ถ้าผู้ใชกด ้ OK จะเข ้าเงื่อนไขนี้
            document.location = "delete-sql.php?menu_Name=" + menu_Name; // สงรหัสส ่ นค ้าไปให ้ไฟล์ ิ delete.php
        }
    </script>
</head>
<body>
<div class="topnav" id="topnav">     
          
          <a href="../setting.php"><img src="../image/logo.png" height="30px" ></a>
          <a class = "linkbutt" style="color:#FBB813;" href="../frist.php">Shop</a>
          <a class = "linkbutt" href="../showquery.php">Query</a>
          <a class = "linkbutt" href="../logout.php">logout</a>
          <a class = "cartbutt" href="../cart.php"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>             
          <button class = "button-color" onclick="changetheme()">dark mode  <i class="fa-solid fa-moon fa-xl" style="color: #000000;"></i></button>
           
</div>
<a href="../setting.php"><button class="back" style="margin-top:20px">back</button>
<main>
<?php while ($row = $stmt->fetch()) : ?>
    <div class="menuu">
        <img src='../image/<?=$row["menu_Name"]?>.jpg' width='100'><br>
        Name: <?=$row ["menu_Name"]?><br>
        Price: <?=$row ["price"]?><br>
        <?php
            echo "<a href='#'  onclick='confirmDelete(`" . $row["menu_Name"] . "`)' class='fix'>ลบ</a>"
        ?>
    </div>
    
<?php endwhile; ?>
</main>
</body>
</html>