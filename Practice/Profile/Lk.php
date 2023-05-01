<?php

    $Email = $_COOKIE["login"];
    $name2; $surname; $phone;
    if(empty($_COOKIE["login"])){
        header('Location: ../index.php');
        die();
    }

    $Connection = new PDO("mysql:host = localhost;port=3306;dbname=practice", "root", "1234");
    $data = $Connection->query("SELECT Path from users where Email = '$Email'");


    $result = $data->fetchAll();

    $data2 = $Connection->query("SELECT Name, Surname, Phone from users where Email = '$Email'");

    foreach($data2 as $row){
        $name2 = $row["Name"];
        $surname = $row["Surname"];
        $phone = $row["Phone"];
    }
    //$imgName = $Connection->query("SELECT Path from users where Email = '$Email'");

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
                    <img  id = "imgProfHead" src="./img/<?php echo $result[0]["Path"]?>">
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

    <!-- Колонка справа -->
    <div class = menu-selected>
        <div class="imgPlace">
            <img  id = "imgProf" src="./img/<?php echo $result[0]["Path"]?>">
        </div>
        <!-- Отправка иизображения -->
        <form action = 'addFile.php' method = "POST" enctype="multipart/form-data" class = "postInfo">
            <label class="input-file">
            <input type="file" name="file">		
            <span><b>Выберите файл</b></span>
            </label>

            <div class="data">
                <div class="nameData" id = "data">
                    <label class="Name">Имя: </label>
                    <input class = "NameInput" id = "inputs" name = "emailName" value = "<?php echo $name2?>">
                </div>

                <div class="SurnameData" id = "data">
                    <label class="Surname">Фамилия: </label>
                    <input class = "SurnameInput" id = "inputs" name = "surname" value = "<?php echo $surname?>">
                </div>

                <div class="EmailData" id = "data">
                    <label class="Email">Почта: </label>
                    <input class = "EmailInput" id = "inputs" value = "<?php echo $_COOKIE['login']?>" >
                </div>

                <div class="PhoneData" id = "data">
                    <label class="Phone">Телефон: </label>
                    <input class = "PhoneInput" id = "inputs" name = "phone" value = "<?php echo $phone?>">
                </div>

                <button class="Save" type = "sumbit"><b>Сохранить</b></button>
                </div>
            </div>
        </form>
        <!-- Отправка информации -->
        <form action = "" method = "POST" class = "postInfo">
        </form>
        
<script>
    $('.input-file input[type=file]').on('change', function(){
	let file = this.files[0];
	$(this).next().html(file.name);
});
</script>
</body>
</html>
