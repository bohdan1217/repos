<link rel="stylesheet" type="text/css" href="css.css">
<ul id="navbar">
    <li><a href="/">Головна</a></li>
</ul>
<?if(isset($text)):?>

    <div style="margin-left: 20px">
        <h2><?=$text['name']?></h2>   <p style="color: cornflowerblue;">
        <?=$text['date']?>
    </p>

        <p>
            <?=$text['text']?>
        </p>
    </div>

<? endif;?>
<h6></h6>