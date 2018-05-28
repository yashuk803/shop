<div class="banerPage"></div>
<section class="pages">
    <h1>Bascet</h1>
</section>

<div class="miniCart">
    <form id="minicart" action="" method="post">
        <ul class="cartList">
<?php if(!empty($_SESSION['cart'])):?>
            <?php foreach($_SESSION['cart'] as $item):?>
            <li>
                <div class="cartContent">
                    <div class="itemImg">
                        <img src="asset/img/item1.png">
                    </div>
                    <div class="itemInfo">
                        <a href="#" class="itemName">Cnife</a>
                        <span>Code:<?= $item['id']?></span>
                    </div>
                    <div class="itemQty">
                        <div class="itemNumber">
                            <button class="removeItem">-</button>
                            <input type="number" autocomplete="off" readonly="readonly" value="<?= $item['qty']?>" min="0">
                            <button class="addItem">+</button>
                        </div>
                    </div>
                    <div class="price">
                        <span class="value">200</span>
                        <span class="curency">$</span>
                    </div>
                    <a href="/index.php?action=bascet&id=<?=$item['id']?>" class="itemRemove">Удалить</a>
                </div>
            </li>
        <?php endforeach?>
    <?php endif?>
        </ul>

    </form>
</div>