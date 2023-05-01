<?php
$errorReg = "";
//Проверка заполенения полей
if(!empty($_POST["email"]) && !empty($_POST["password"]))
    {
        //Получение данных с инпутов
        $email = $_POST["email"];
        $password = $_POST["password"];

        //Обработка подключения к базе
        try
        {   
            //Подлкючение к базе
            $Connection = new PDO("mysql:host = localhost;port=3306;dbname=practice", "root", "1234");
            $flag = True;

             //Запрос к базе
            $sqlLog = "SELECT Email from users";
            $result = $Connection->query($sqlLog);

            //Цикл на проверку входа
            foreach($result as $row)
            {
                if($_POST["email"] == $row["Email"])
                {
                    $flag = FALSE;
                }
            }

            //Добавление пользователя
            if($flag)
            {

                $sqlInsert = "INSERT INTO users VALUES ('$email', '$password')";
                $InsertValues = $Connection->query($sqlInsert);
                if($InsertValues > 0)
                {
                    $errorReg = "Пользователь создан!";
                }
                else
                {
                    $errorReg = "Ошибка! Пользователь не создан!";
                }
            } 
            
            else
            {
                $errorReg = "Пользователь уже существует!";
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
    <title>Регистарция</title>
</head>
<body>
    <div class = "container">
    <h2>Регистрация</h2>
        <form method = "POST" action = "">
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
            <button class="sumbit"><b>Зарегистрироваться</b></button>
        </div>
        <a href = "index.php">Войти</a>
        <p id = "error"> <?php echo $errorReg ?> </p>
        </form>
    </div>
</body> 
</html>