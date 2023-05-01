<?php
//Пользователь заходит в личный кабнет если куки сохранены
if(!empty($_COOKIE['login']))
{
    header('Location: ./profile.php');
    die();
}

//Проверка заполенения полей
$errorAuto = "";
if(!empty($_POST["email"]) && !empty($_POST["password"]))
    {
        //Получение данных с инпутов
        $email = $_POST["email"];
        $password = $_POST["password"];

        try
        {   
            //Подлкючение к базе
            $Connection = new PDO("mysql:host = localhost;port=3306;dbname=practice", "root", "1234");
            $flag = False;

             //Запрос к базе
            $sqlLog = "SELECT Email, Password from users";
            $result = $Connection->query($sqlLog);

            //Цикл на проверку входа
            foreach($result as $row)
            {
                if($email == $row["Email"] && $password == $row["Password"])
                {
                    $flag = True;
                }
            }

            //Создание куки, переход на другую страницу
            if($flag)
            {
                setcookie('login', $email, time() + 1800, "/");
                header('Location: ./profile.php');
                die();
            } 

            else
            {
                $errorAuto = "Неверный пользователь или пароль";
            }

        }

        catch(PDOException $e)
        {
            echo "Ошибка: " . $e ->getMessage();
            phpinfo();
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Авторизация</title>
</head>
<body>
    <div class = "container">
    <h2>Авторизация</h2>
        <form method = "post" action = "">
        <div class="email">
            <label class = "emailText"><b>Email</b></label>
            <br>
            <input type="text" class="emailInput" name = "email">
        </div>

         <div class="password">
            <label class = "PasswordText"><b>Password</b></label>
            <br>
            <input type="password" class="PasswordInput" name = "password">
        </div>

        <div class="buttonSumbit">
            <br>
            <button class="sumbit"><b>Войти</b></button>
        </div>
        <a href = "Registration.php">Регистарция</a><br>
        <p id = "error"> <?php echo $errorAuto ?> </p>
        </form>
    </div>
</body>
</html>