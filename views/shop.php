
<div class="banerPage"></div>
<section class="pages">

    <h1>Shop</h1>
</section>
<form action="http://product/index.php?action=shop" method="post">
    <input type="search" id="mySearch" name="q">
    <input type="submit" value="search">
</form>
<div class="boxProduct">
<div class="content product">
     <?php if(!empty($allProduct)):?>
            <?php foreach ($allProduct as $product):?>
    <div class="boxItem">
        <form action="http://product/index.php?action=bascet" method="post">
           



        <input type="hidden" name = "goods_id" value="<?= $product['id']?>">
        <img src="../upload/<?= $product['image_path']?>">
        <div class="description"><?= $product['articul']?></div>
        <span class="nameItem"><?= $product['name']?></span>
        <span class="priseItem">$ <?= $product['price']?></span>

        <input type="submit" value="" class="addCart">

</form>

    </div>
 
    <?php endforeach;?>
<?php endif;?>
   
</div>
</div>