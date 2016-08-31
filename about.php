<?php
include 'bd.php';
include 'menu.php';

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = '$id'";
$rs = $db->query($sql);


while($data = $rs->fetch( PDO::FETCH_ASSOC )){
    $All[] = $data;
}


?>
<br/>
<table border="1">
    <tr>
        <th>Фото</th>
        <th>Ім"я</th>
        <th>Прізвище</th>
        <th>Дата</th>
        <th>Місто</th>
        <th>Email</th>
        <th>Індекс</th>

    </tr>
    <?foreach($All as $all):?>
        <tr>
            <td><img src="<?=$all['filephoto']?>" height="180" width="180"/></td>
            <td width="80px" style="text-align: center"><?=$all['name']?></td>
            <td width="80px" style="text-align: center"><?=$all['lastname']?></td>
            <td width="80px" style="text-align: center"><?=$all['date']?></td>
            <td width="80px" style="text-align: center"><?=$all['city']?></td>
            <td width="80px" style="text-align: center"><?=$all['email']?></td>
            <td width="80px" style="text-align: center"><?=$all['index']?></td>

        </tr>
    <?endforeach?>
</table>



