<?php

    $Email = $_COOKIE["login"];
    if(empty($_COOKIE["login"])){
        header('Location: index.php');
        die();
    }

    $Connection = new PDO("mysql:host = localhost;port=3306;dbname=practice", "root", "1234");
    $data = $Connection->query("SELECT Path from users where Email = '$Email'");


    $result = $data->fetchAll();
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
                    <img  id = "imgProfHead" src="./Profile/img/<?php echo $result[0]["Path"]?>">
        </div>
    </nav>

    <!-- Колонка кнопок слева -->
    <div class = menu-select>
        <form method="post" class ="lkForm" action = './Profile/Lk.php'>
            <button class = 'lkButt'><span>Личный кабинет</span></button>
        </form>

        <form>
            <button class = 'OrderButt'>Создать заказ</button>
        </form>

        <form action = "./Profile/PostZakaz/Zakaz.php" method="post">
            <button id = 'menuButt' class = 'OrderButt'>Поступившие заказы</button> 
        </form>

        <form action = "./Profile/WaitZakaz/WZakaz.php" method="post">
            <button id = 'menuButt' class = 'OrderButt'>Ожидающие заказы</button> 
        </form>

        <form action="./exit.php" method="post">
            <button class = 'BackBTN'>Выход</button>
        </form>

    </div>



    <div class = menu-selected>
        
    </div>
</body>
</html>
