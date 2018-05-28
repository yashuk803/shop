<?php
require_once('./library/fileAdd.php');
require_once('./library/db.php');
$brandAll = get("brand");
$categorysAll = get("categories");
if($_POST['brand']){
	if(empty($_POST['name']) || empty($_POST['description']) ){
		printf("Пустое поле"); 
		exit();
	} 
	addBrandCat($_POST['name'], $_POST['description'],  $_POST['publish'], 'brand');
}
if($_POST['category']){
	if(empty($_POST['name']) || empty($_POST['description']) ){
		printf("Пустое поле"); 
		exit();
	} 
	addBrandCat($_POST['name'], $_POST['description'],  $_POST['publish'], 'categories');
}
if($_POST['add']){

	if(empty($_POST['name']) || empty($_POST['text']) || empty($_POST['articul']) || empty($_POST['price']) ){
		printf("Пустое поле"); 
		exit();
	}
	$img = upload(uniqid()); 
	if($_POST['publish'] == NULL) $_POST['publish'] = 0;
	addproduct($_POST['name'], $_POST['articul'], $_POST['brandId'],  $img, $_POST['text'], $_POST['price'], $_POST['categoryId'],  $_POST['publish']);
}


$page = './views/addproducts.php';
$title = 'addProducts';