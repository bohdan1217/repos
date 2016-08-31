<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="css.css">
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>
<?php
include 'bd.php';
include 'menu.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $date = $_POST['date'];
    $index = $_POST['index'];
    $email = $_POST['email'];
    $filephoto = $_POST['filephoto'];

    $uploaddir = '';
    $uploadfile = $uploaddir.basename($_FILES['filephoto']['name']);

    copy($_FILES['filephoto']['tmp_name'], $uploadfile);



    $statement = $db->prepare("INSERT INTO users VALUES('','$name','$lastname','$city','$email','$index','$date','$uploadfile')");
    $statement->execute();
        }

        $sql = "SELECT name FROM city";
        $rs = $db->query($sql);

        while($row = $rs->fetch(PDO::FETCH_ASSOC)){
            $cityAll[] = $row;
        }



?>
<br/>
<form method="post" action="registration.php" enctype=multipart/form-data class="form">
    <div>
    Ім'я : <input type="text" name="name" id="name" pattern="[A-Za-zА-Яа-я-0-9_-]{3,32}" placeholder="| Name" required/><br/>
    </div>
    <div>
    Прізвище : <input type="text" name="lastname" id="lastname" pattern="[A-Za-zА-Яа-я-0-9_-]{3,32}" placeholder="| Last Name" required/><br/>
    </div>
    <div>
    Поштовий індекс : </b><input type="text" name="index" pattern="[0-9_-]{5,32}" placeholder="| Index" required/><br/>
    </div>
    <div>
    Дата народження </b><input type="text" name="date" id="datepicker" placeholder="| Date" required/><br/>
    </div>
    <div>
    Місто :
    <select name="city">
        <?foreach($cityAll as $city):?>
        <option> <?=$city['name']?></option>
        <?endforeach?>
    </select>
    <br/>

    </div>
    <div>
    Email : <input type="email" name="email" placeholder="| Email" required/><br/>
    </div>
    <div>
    Загрузка фото :<input type="file" name="filephoto" multiple accept="image/*,image/jpeg"><br>
    </div>
    <br>
    <input type="submit" name="submit" value="Реєстрація" style="color: red">
</form>