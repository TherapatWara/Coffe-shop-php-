<html>
<head>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&family=Lato:ital,wght@1,300&family=Open+Sans:wght@300&family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <form action="login_emp_sql.php" method="get">
            <section class="input-login">
                <h1>Enter your employee ID</h1>
                <input type="text" name="emp_Id" class="input-button" pattern="[0-9]{4}"><br>
                <input type="submit" class="login-button" value="LOGIN" name="login_user">
            </section>
        </form>
    </header>
</body>
</html>