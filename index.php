<?php
include 'menu.php';
include 'bd.php';
$sql = "SELECT * FROM users";
$rs = $db->query($sql);

while($row = $rs->fetch(PDO::FETCH_ASSOC)){
    $All[] = $row;
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

    </tr>
    <?foreach($All as $all):?>
    <tr>
        <td ><img src="<?=$all['filephoto']?>" height="180" width="180"/></td>
        <td width="80px" style="text-align: center"><?=$all['name']?></td>
        <td width="80px" style="text-align: center"><?=$all['lastname']?></td>
        <td width="80px" style="text-align: center"><?=$all['date']?></td>
        <td width="80px" style="text-align: center"><?=$all['city']?></td>
        <td><a href="/about.php?id=<?=$all['id']?>">Детальна інформація</a></td>
    </tr>
    <?endforeach?>
</table>
