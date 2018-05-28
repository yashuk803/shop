<?php
 require_once('./library/driver.php');
$action = empty($_GET['action']) ? 'main' : $_GET['action'];
$page = null;
$title = null;

switch ($action){
    case 'main':
        require_once "./actions/main.php";
        break;
    case 'about':
      require_once "./actions/about.php";
        break;
    case 'news':
  require_once "./actions/news.php";
        break;
    case 'shop':
       require_once "./actions/shop.php";
        break;
    case 'contact':
     require_once "./actions/contact.php";
        break;
    case 'bascet':
        require_once "./actions/bascet.php";
        break;
    case 'add':
    require_once "./actions/article.php";
        break;
    case 'edit':
        require_once "./actions/edit.php";
        break;
    case 'addproducts':
        require_once "./actions/addproducts.php";
        break;
    default:
       require_once "./actions/404.php";
        break;
}