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
            
            var idnum = {}; // ต้องใช้ var หรือ let ในการประกาศตัวแปร
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
                var pag = document.getElementById("pag");
                content.style.background = "#526D82";
                topnav.style.background = "#27374D";
                serchbox.style.background = "#526D82";
                pag.style.background ="#526D82";
            }
           
            </script>
            
            
    </head>
<body>
    
    <header>
        <div class="topnav" id="topnav">     
          
            <a href="setting.php"><img src="./image/logo.png" height="30px" ></a>
            <a class = "linkbutt" style="color:#FBB813;" href="frist.php">Shop</a>
            <a class = "linkbutt" href="showquery.php">Query</a>
            <a class = "linkbutt" href="logout.php">logout</a>
            <a class = "cartbutt" href="cart.php"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>             
            <button class = "button-color" onclick="changetheme()">dark mode  <i class="fa-solid fa-moon fa-xl" style="color: #000000;"></i></button>
             
        </div>
             <form  class="serch-box" id="serch-box">
                <br><input type="text" id="serch-name" name="serch-name" placeholder="  ค้นหาเมนู">
                
                 
                <button type="submit" style="border: none; background: none; cursor: pointer; color: #005210; " >
                    <i class="fa-solid fa-magnifying-glass fa-xl"></i> 
                </button>
         
        </form>
        <?php
                $stmt = $pdo->prepare("SELECT * FROM menu WHERE menu_Name LIKE ?");
               
                if (isset($_GET["serch-name"])) {
                    $value = '%' . $_GET["serch-name"] . '%';
                    $stmt->bindParam(1, $value); // ก าหนดชอตัวแปรเงื่อนไขที่จุดที่ก าหนด ื่ ? ไว ้
                     $stmt->execute(); // เริ่มค ้นหา
                        } else {
                        }
               
                
                
            
            ?>
            <?php while ($row = $stmt->fetch()) : ?>
                <div style="padding: 15px; text-align: center">
                
                <img src='image/<?= $row["menu_Name"] ?>.jpg' >
                    <p id="nametag">
                        <?= $row["menu_Name"]  ?><br>
                        
                    </p>
                    <p id="pricetag">
                    <?= $row["price"] ." บาท   " ?>  
                    </p>
                    <br>
                    <i id="center-button" class="fa-solid fa-cart-plus fa-2xl" name="bt-cart" onclick="addToCart(<?php echo $row["menu_No"]; ?>)"></i> <br><br>
                    <br><br><br><a href="frist.php"> <i class="fa-solid fa-arrow-left fa-xl" style="color: #006142;"></i></a>
                    <br><br>
                </div>
            <?php endwhile; ?>
            
        <main id="content">
          
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
                </p><br>
                <div class="container">
                    <i id="center-button" class="fa-solid fa-cart-plus fa-2xl" name="bt-cart" onclick="addToCart(<?php echo $row["menu_No"]; ?>)"></i> <br><br>
                </div>
            </div>
            <?php endwhile; ?>
            </div>
        </main>
        <div class="pagination" id="pag">
                <?php if ($page > 1): ?>
                <a href="?page=<?= ($page - 1) ?>">หน้าก่อนหน้า </a>

                <?php endif; ?>

                <?php
                $stmt->closeCursor(); // ปิดการค้นหาคิวรี่ก่อนหน้า
                $stmt = $pdo->query("SELECT COUNT(*) FROM menu");
                $totalItems = $stmt->fetchColumn();
                $totalPages = ceil($totalItems / $itemsPerPage);

                if ($page < $totalPages): ?>

                <a href="?page=<?= ($page + 1) ?> " > หน้าถัดไป</a>

                <?php endif; ?>
                <br><br>
            </div>
        
        <div class="footer">
            <h1>------------------- Star Bug -------------------</h1><br>
            <img src="image/logo.png" width=200>
        </div>
   </header>
</body>
</html>