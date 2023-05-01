<?php

   echo $Email = $_COOKIE['login'];
   //Сохранение файла в папку 
    if(!empty($_FILES["file"]))
    {   
        //var_dump($_FILES["file"]);
        $file = $_FILES["file"];
        $name = $file['name'];
        $pathFile = __DIR__.'/img/'.$name;
        
        $name2 = $_POST["emailName"];
        $surname = $_POST["surname"];
        $phone = $_POST["phone"];

        try
        {   
            //Подлкючение к базе
            $Connection = new PDO("mysql:host = localhost;port=3306;dbname=practice", "root", "1234");
            $flag = FALSE;
    
            $sqlInsert = "UPDATE users
            set Path = '$name', Name = '$name2', Surname = '$surname', Phone = '$phone' 
            where Email = '$Email'";
            $InsertValues = $Connection->query($sqlInsert);
    
    
        }
    
        catch(PDOException $e)
        {
            echo "Ошибка: " . $e ->getMessage();
            phpinfo();
        } 

    }
        
    if(!move_uploaded_file($file["tmp_name"], $pathFile)){
            echo 'Файл не загрузился';
        
    }


    header("Location: ./Lk.php");

?>