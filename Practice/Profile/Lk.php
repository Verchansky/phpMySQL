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
    <link href="Lk.css" type="text/css" rel="stylesheet">
    <title>Личный кабинет</title>
</head>
<body>
    <!-- Header -->
    <nav class="navbar">
        <div class="container">
        <a class = 'navbar-logo'><b>Профиль</b></a>
            <div class = "nawbar-wrap">
                <a class = "user"><b>Пользователь: <?php echo $_COOKIE["login"]?></b></a>
                <div class="wrapper exmpl">
                    <img src = "../test3.jpg">
                </div>
            </div>
        </div>
    </nav>

    <!-- Колонка кнопок слева -->
    <div class = menu-select>
        <form method="post" class ="lkForm">
            <button class = 'lkButt' disabled>Личный кабинет</button>
        </form>
        <form method = "post" class = 'OrderBTN'>
            <button class = 'OrderButt'>Заказы</button>
        </form>
        <button class = 'ChangePassButt'>...</button>
        <button class = 'ChangePassButt'>...</button>  
        <form action="../profile.php" method="post" class = "BackFrom">
            <button class = 'BackBTN'>Назад</button>
        </form>

    </div>

    <div class = menu-selected>
        <div class="imgPlace">
        </div>        
        <button class="chooseFile"><b>Выбрать файл</b></button>
        
        <form action = "" method = "post" class =  "postInfo">
        <div class="data">
            <div class="nameData" id = "data">
                <label class="Name">Имя: </label>
                <input class = "NameInput" id = "inputs">
            </div>

            <div class="SurnameData" id = "data">
                <label class="Surname">Фамилия: </label>
                <input class = "SurnameInput" id = "inputs">
            </div>

            <div class="EmailData" id = "data">
                <label class="Email">Почта: </label>
                <input class = "EmailInput" id = "inputs">
            </div>

            <div class="PhoneData" id = "data">
                <label class="Phone">Телефон: </label>
                <input class = "PhoneInput" id = "inputs">
            </div>

            <button class="Save"><b>Сохранить</b></button>
        </div>
    </div>
        </form>
        
</body>
</html>
