<div class="banerPage"></div>
<section class="pages">

    <h1>News $ Blog</h1>
</section>
<div class="content news">
    <?php if (!empty($content)):?>
<?php foreach( $content as $contents) :?>
    <div class="newsBox">
        <div class="imgNews">
            <img src="/upload/<?=$contents['pathImage']?>">
        </div>
        <div class="text">
            <h2><a href="/index.php?action=edit&id=<?=$contents['id']?>"><?=$contents['title']?></a>
         </h2>
<p><?=$contents['text']?></p>
        </div>
    </div>
<?php endforeach;?>
<?php endif;?>
</div>