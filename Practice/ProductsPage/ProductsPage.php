<?php

    $Email = $_COOKIE["login"];
    if(empty($_COOKIE["login"])){
        header('Location: index.php');
        die();
    }

    $Connection = new PDO("mysql:host = localhost;port=3306;dbname=practice", "root", "1234");
    $data = $Connection->query("SELECT Path from users where Email = '$Email'");

    $ProductsRequest = ("SELECT * FROM products");
    $dataProd = $Connection->query($ProductsRequest);



    $result = $data->fetchAll();
    $resultProd = $dataProd->fetch();


    $products = array();
    while($productInfo = $dataProd->fetch())
    {
        $products[] = $productInfo;
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
    <link href="ProductsPage.css" type="text/css" rel="stylesheet">
    <title>Профиль</title>
</head>

<body>
     <!-- Header -->
     <nav class="navbar">
        <div class="container">
        <a class = 'navbar-logo'><b>Товары</b></a>
            <div class = "nawbar-wrap">
                <a class = "user"><b>Пользователь: <?php echo $_COOKIE["login"]?></b></a>
                    <img  id = "imgProfHead" src="../Profile/img/<?php echo $result[0]["Path"]?>">
        </div>
    </nav>

    <!-- Список товаров -->
    <div class = "Products">
            <?php foreach ($products as $product):?>
					<div class="pr" data-id="<?=$product['idproducts']?>">
						<div class="product">
                            <img  id = "imgProd" src="../ProductsIMG/<?php echo $product["Path"]?>">
							<span class="product-name"><?=$product['ProductName']?></span>
							<span class="product_price"><?=$product['Price']?></span>
                            <form method = "POST" class = "test">
							<button id="buyBTN" class = "buyBTNT"><b>Купить</b></button>
                            </form>
						</div>
					</div>
			<?php endforeach?>
    </div>
</body>
</html>
