<?php
include "connect.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="frist-style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&family=Lato:ital,wght@1,300&family=Open+Sans:wght@300&family=Prompt:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <script>
            var idnum = {};
            var count = 0; 
            function addToCart(menuNo) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "cart.php?menu_No=" + menuNo, true);
                xhr.send();

            }

            function pushtocart() {
                var idnumStr = idnum.join(',');
                window.location.href = "cart.php?menu_No=" + idnum;
            }
            
            function changetheme() {
                var content = document.getElementById("content");
                var topnav = document.getElementById("topnav");
                var serchbox = document.getElementById("serch-box");
                content.style.background = "#526D82";
                topnav.style.background = "#27374D";
                serchbox.style.background = "#526D82";
            }
      
        </script>
            
    </head>
<body>
    
    <div class="wrapper">
        <div class="topnav" id="topnav">   
            <a href="setting.php"><img src="./image/logo.png" height="30px" ></a>
            <a class = "linkbutt" style="color:#FBB813;" href="frist.php">Shop</a>
            <a class = "linkbutt" href="logout.php">logout</a>
            <a class = "linkbutt" href="showquery.php">Query</a>
            <a class = "cartbutt" href="cart.php"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>
            <button class = "button-color" onclick="changetheme()">Dark</button>
             
        </div>
            <form  class="serch-box" id="serch-box">
                <br><input type="text" id="serch-name" name="serch-name" placeholder="  ค้นหาเมนู">
                
                 
                <button type="submit" style="border: none; background: none; cursor: pointer; color: #005210; " >
                    <i class="fa-solid fa-magnifying-glass fa-xl"></i> 
                </button>
         
            </form>
        <div class="content" id="content">
          
            <?php
                $itemsPerPage = 10; // กำหนดจำนวนรายการที่จะแสดงในแต่ละหน้า
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;                
                $offset = ($page - 1) * $itemsPerPage;
                $stmt = $pdo->prepare("SELECT * FROM menu LIMIT $offset, $itemsPerPage");
                $stmt->execute();
            ?>
            <?php while ($row = $stmt->fetch()): ?>
            <div class="menu" id="menu">  
                <img src='image/<?= $row["menu_Name"] ?>.jpg'>
                <p id="nametag">
                    <?= $row["menu_Name"] ?><br>
                </p>
                <p id="pricetag">
                    <?= $row["price"] . " บาท   " ?>
                </p>
                <div class="container">
                    <i id="center-button" class="fa-solid fa-cart-plus fa-2xl" name="bt-cart" onclick="addToCart(<?php echo $row["menu_No"]; ?>)"></i> <br><br>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        <div class="pagination">
            <?php if ($page > 1): ?>
            <a href="?page=<?= ($page - 1) ?>">หน้าก่อนหน้า</a>

            <?php endif; ?>

            <?php
            $stmt->closeCursor(); // ปิดการค้นหาคิวรี่ก่อนหน้า
            $stmt = $pdo->query("SELECT COUNT(*) FROM menu");
            $totalItems = $stmt->fetchColumn();
            $totalPages = ceil($totalItems / $itemsPerPage);

            if ($page < $totalPages): ?>

            <a href="?page=<?= ($page + 1) ?>">หน้าถัดไป</a>

            <?php endif; ?>
         </div>
    </div>
</body>
</html>