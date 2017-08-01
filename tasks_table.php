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