<?php
if(empty($_COOKIE["login"])){
    header('Location: index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="Profile.css" type="text/css" rel="stylesheet">
    <title>Профиль</title>
</head>
<body>
    <!-- Header -->
    <nav class="navbar">
        <div class="container">
        <a class = 'navbar-logo'><b>Профиль</b></a>
            <div class = "nawbar-wrap">
                <a class = "user"><b>Пользователь: <?php echo $_COOKIE["login"]?></b></a>
                <div class="wrapper exmpl">
                    <img src = "./test3.jpg">
                </div>
            </div>
        </div>
    </nav>

    <!-- Колонка кнопок слева -->
    <div class = menu-select>
        <form method="post" class ="lkForm" action = './Profile/Lk.php'>
            <button class = 'lkButt'><span>Личный кабинет</span></button>
        </form>
        <button class = 'OrderButt'>Заказы</button>
        <button class = 'ChangePassButt'>...</button>
        <button class = 'ChangePassButt'>...</button>    
        <button class = 'ChangePassButt'>...</button>

    </div>



    <div class = menu-selected>
        
    </div>
</body>
</html>
