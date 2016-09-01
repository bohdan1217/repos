<link rel="stylesheet" media="screen" type="text/css" href="css.css">
<ul id="navbar">
    <li><a href="/">Головна</a></li>
</ul>

<?if(isset($text)):?>

    <?foreach ($text as $item) :?>

        <div style="margin-left: 20px">
        <h2><a href="index.php?id=<?=$item['id'];?>"><?=$item['name']?></a></h2>

       <p style="color: cornflowerblue;">
           <?=$item['date']?>
       </p>

        <p>
            <?=$item['text_little']?>
        </p>
        </div>

        <hr style="margin-top: 20px;margin-bottom: 30px">

    <? endforeach;?>
<? endif;?>

<?php
        $name = "";
        $text_little = "";
        $text = "";

        $error = "";


        if(isset($_POST['submit-form'])) {

        $name = $_POST['name'];
        $text_little = $_POST['text_little'];
        $text = $_POST['text'];
        $date = date("Y-m-d H:i:s");

         $success = true;

        if ($_POST['norobot'] != '83tsU') {
            $error .= "Неправильно введена captcha.<br/> \n\r";
            $success = false;
        }

        if($success)
        {
            $data['name'] = $name;
            $data['text_little'] = $text_little;
            $data['text'] = $text;
            $data['date']=$date;

            $newNews = new AddNews($data);
            $newNews->save();

            header("Location: index.php");

        }

}

?>
<html>
<head>
    <title>Новини</title>
</head>
<body>


<h2><?php echo ($error != "") ? $error : ""; ?></h2>

<form action="index.php" method="post" class="contact_form">

<ul>
    <li>
        <h2>Добавлення новини</h2>
        <span class="required_notification">* Обов'язкове поле</span>
    </li>

        <li>
            <label for="name">Назва новини:</label>
            <input type="text" name="name" placeholder="| Name of news" required/><br/>
        </li>



        <li>
            <label for="text_little">Короткий опис:</label>
            <input type="text" name="text_little" placeholder="| Text " required/><br/>
        </li>


        <li>
            <label for="text">Повний текст новини:</label>
            <textarea name="text" cols="40" rows="10" placeholder="| Full Text " required></textarea><br>
        </li>


        <li style="height: 80px">
            <label for="text"><img src="captcha.png" style="width: 140px"/></label>
            <input class="input" type="text" name="norobot" required/></br>
        </li>

    <li>
        <button class="submit" type="submit" name="submit-form" />Добавити новину</button>

    </li>

    </ul>
</form>

</body>
</html>