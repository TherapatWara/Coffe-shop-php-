<html>


<link rel="stylesheet" href="setting-style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&family=Lato:ital,wght@1,300&family=Open+Sans:wght@300&family=Prompt:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head><meta charset="UTF-8">
    <script>
                    function changetheme() {
                    var topnav = document.getElementById("topnav");
                    var menu = document.getElementById("menu");
                    topnav.style.background = "#27374D";
                    menu.style.background = "#526D82";
                    var body = document.getElementById("body");
                    body.style.background = "#3b5273";
                }
    </script>
</head>
<body id="body">

<div class="topnav" id="topnav">     
          
            <a href="setting.php"><img src="./image/logo.png" height="30px" ></a>
            <a class = "linkbutt" style="color:#FBB813;" href="frist.php">Shop</a>
            <a class = "linkbutt" href="showquery.php">Query</a>
            <a class = "linkbutt" href="logout.php">logout</a>
            <a class = "cartbutt" href="cart.php"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>             
            <button class = "button-color" onclick="changetheme()">dark mode  <i class="fa-solid fa-moon fa-xl" style="color: #000000;"></i></button>
             
</div>
<div class="menu" id="menu">
<a href="InSertUpdateDelete/insert.php"><button>INSERT</button></a>
<a href="InSertUpdateDelete/update.php"><button>UPDATE</button></a>
<a href="InSertUpdateDelete/delete.php"><button>DELETE</button></a>
</div>
</body>
</html>