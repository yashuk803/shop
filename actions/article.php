<?php
require_once('./library/fileAdd.php');
require_once('./library/db.php');
if(isset($_POST["add"])){
    if (!empty($_POST)) {
        $errors = [];
        if (empty($_POST['title'])) {
            $errors['title'] = 'Поле не может быть пустым';
        }
        if (empty($_POST['text'])) {
            $errors['text'] = 'Поле не может быть пустым';
        }
        if (strlen($_POST['title']) > 255) {
            $errors['title'] = 'Имя содержит 255 символов';
        }
        if (empty($errors) && empty($_POST['id'])) {
            $title = $_POST['title'];
            $text = $_POST['text'];
            $article = upload(uniqid());
            addarticle($title, $text, $article);
          
                header("Location: http://product/index.php?action=news");
            }
        
    }
}
$page = './views/add.php';
$title = 'add';
