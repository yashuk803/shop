<?php
if($_GET['id']){
	$count = $_SESSION['cart'][$_GET['id']]['qty'];
	$_SESSION['counter'] = $_SESSION['counter'] - $count;
	unset($_SESSION['cart'][$_GET['id']]);  
}
$goods_id = abs((int)$_POST['goods_id']);
if($goods_id) {
	addtocart($goods_id);
	header("Location: https://floating-sierra-58793.herokuapp.com/index.php?action=shop");
}

function addtocart($goods_id, $qty = 1){
    if(isset($_SESSION['cart'][$goods_id])){
    	$_SESSION['cart'][$goods_id]['id'] = $goods_id;
        $_SESSION['cart'][$goods_id]['qty'] += $qty;
        $count+=1;
        $_SESSION['counter']+=$count;
    }else{
    	$_SESSION['cart'][$goods_id]['id'] = $goods_id;
        $_SESSION['cart'][$goods_id]['qty'] = $qty;
        $count+=1;
        $_SESSION['counter']+=$count; 
    }
     return $_SESSION['cart'];
}
 $page = './views/bascet.php';
        $title = 'bascet';