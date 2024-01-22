<?php include "../connect.php" ?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM menu ");
    $stmt->execute();  
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../setting-style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&family=Lato:ital,wght@1,300&family=Open+Sans:wght@300&family=Prompt:wght@300&display=swap" rel="stylesheet">
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
<a href="../setting.php"><button class="back"  style="margin-top:20px">back</button></a>
<main>
<?php while ($row = $stmt->fetch()) : ?>
    <div class="menuu">
        
        <form action="update-sql.php" method="post">
            <img src='../image/<?=$row["menu_Name"]?>.jpg' width='200'><br>
                <input type="text" name="menu_Name" value="<?=$row["menu_Name"]?>" hidden><br>
                Price: <input type="number" name="price" value="<?=$row["price"]?>"><br>
            <input type="submit" class="fix" value="แก้ไข">
        </form>
    </div> 
<?php endwhile; ?>
</main>
</body>
</html>