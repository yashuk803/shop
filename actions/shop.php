<?php 
require_once('./library/db.php');
 $page = './views/shop.php';
        $title = 'shop';
        $allProduct = get('products');
        $s_text = $_POST['q']; // текст для поиска
$s_text = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $s_text); // убираем лишние символы
$s_text = preg_replace("/\s(\S{1,3})\s/", "  ", $s_text); // убираем слова длинной менее трех символов
$s_text = preg_replace("/\s+/", " ", $s_text);
if($s_text){
	var_dump(search($s_text));
}
