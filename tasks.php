<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once 'connect.php'; // подключаем скрипт
 
if(isset($_POST['description']) && isset($_POST['Author'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $description = htmlentities(mysqli_real_escape_string($link, $_POST['description']));
    $Author= htmlentities(mysqli_real_escape_string($link, $_POST['Author']));
    $id= htmlentities(mysqli_real_escape_string($link, $_POST['id']));


     
    // создание строки запроса
    $query ="INSERT INTO tasks VALUES( $id, '$description','$Author')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>
<h2>Добавить новую задачу</h2>
<form  action="tasks.php" method="POST">

<p>Введите Описание Задачи:<br> 
<input type="text" name="description" /></p>

<p>Введите ваше имя: <br> 
<input type="text" name="Author" /></p>

<p>Генератор ID не работает, пожалуйста введите <br>  уникальный id номер для этой задачи: <br> 
<input type="text" name="id" /></p>

<input type="submit" value="Добавить">

</form>


     <table border='1'>
    <?php
    while($row_rs = mysqli_fetch_assoc($result)) // массив с данными
    {
    ?>
        <tr>
    <?php
        foreach($row_rs as $val) //перебор массива в цикле
        {
 
            echo "<td>".$val."</td>"; //вывод данных
               
        }
    ?>
        </tr>
 
    <?php }?>
 
</table>

</body>
</html>