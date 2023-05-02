<?php

    $Email = $_COOKIE["login"];
    if(empty($_COOKIE["login"])){
        header('Location: index.php');
        die();
    }

    $Connection = new PDO("mysql:host = localhost;port=3306;dbname=practice", "root", "1234");
    $data = $Connection->query("SELECT Path from users where Email = '$Email'");
    $result = $data->fetchAll();

    $RequestOrders = 
    "SELECT idOrders, users.Email, products.ProductName, status.StatusName 
    FROM orders, users, status, products
    where orders.User = users.idUsers 
    and
    orders.OrderInfo = products.idproducts
    and
    orders.Status = status.idStatus
    and
    (users.Email = '$Email')
    and 
    orders.Status = 1";

    $resultBD = $Connection->query($RequestOrders);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="Zakaz.css" type="text/css" rel="stylesheet">
    <title>Профиль</title>
</head>

<body>
     <!-- Header -->
     <nav class="navbar">
        <div class="container">
        <a class = 'navbar-logo'><b>Профиль</b></a>
            <div class = "nawbar-wrap">
                <a class = "user"><b>Пользователь: <?php echo $_COOKIE["login"]?></b></a>
                    <img  id = "imgProfHead" src="../img/<?php echo $result[0]["Path"]?>">
        </div>
    </nav>

    <!-- Колонка кнопок слева -->
    <div class = menu-select>
        <form method="post" class ="lkForm" action = '../Lk.php'>
            <button class = 'lkButt'><span>Личный кабинет</span></button>
        </form>

        <form>
            <button class = 'OrderButt'>Создать заказ</button>
        </form>

        <form>
            <button id = 'menuButtOrder' class = 'OrderButt1' disabled>Поступившие заказы</button> 
        </form>

        <form method = "post", action = "../WaitZakaz/WZakaz.php">
            <button class = 'lkButt'>Ожидающие заказы</button> 
        </form>

        <form action="../PostZakaz/exit.php" method="post">
            <button class = 'BackBTN'>Назад</button>
        </form>

    </div>



    <div class = menu-selected>
        <div class="table">
            <div class = "tableData">
            <table>
            <?php
                echo "
                <thead>
                <tr>
                 <th>Номер Заказа</th>
                 <th>Получатель</th>
                 <th>Заказ</th>
                 <th>Статус</th>
                 </tr>
                </thead>";

                while($rowT = $resultBD->fetch()){
                    echo "<tbody>
                        <tr>";
                        echo "<td>" . $rowT["idOrders"] . "</td>";
                        echo "<td>" . $rowT["Email"] . "</td>";
                        echo "<td>" . $rowT["ProductName"] . "</td>";
                        echo "<td>" . $rowT["StatusName"] . "</td>";
                    echo "</tbody>
                    </tr>";
                }
                ?>
                
            </table>
            </div>
        </div>
        
    </div>
</body>
</html>
