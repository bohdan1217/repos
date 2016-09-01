<?php
include 'config.php';
include 'classes/News.php';
include 'classes/DataBase.php';
include 'classes/AddNews.php';


$page = new News();
if(isset($_GET['id'])) {
    $id=(int)$_GET['id'];
    if ($id !=0) {
        $text = $page->getOne($id);
        echo $page->getBody($text,'view');
    }
    else {
        exit('wrong');
    }


}
else {
    $text = $page->getAll();
   echo $page->getBody($text,'main');
}



