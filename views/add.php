<div class="banerPage"></div>
<section class="pages">
    <h1>ADD</h1>
</section>
<div class="addNews">
    <form action="http://product/index.php?<?= (!empty($_POST['id']) || !empty($_GET['id']) ) ? 'action=edit' : 'action=add'?>" method="post" enctype = "multipart/form-data">
        <input type="hidden" name = "id" value="<?=($mas) ? $mas['id'] : $_POST['id']?>" >
        <div class="name article">
            <label>Add title artcile</label>
            <input type="text" name = "title" value = "<?= ($mas) ? $title : $_POST['title']?>">
            <span class="error"><?php if (!empty($errors['name'])) echo $errors['name'];?></span>
        </div>
        <div class="descr article">
            <label>Add text article</label>
            <textarea  name = "text"><?= ($mas) ? $text : $_POST['text']?></textarea>
            <span class="error"><?php if (!empty($errors['text'])) echo $errors['text'];?></span>
        </div>
        <div class="name file">
            <label for="file">Choose file to upload</label>
            <input type="file" id="file" name="file" multiple>
            <input type="hidden" name="files" value="<?=$imag?>">
            <?php if ($_GET['id']) {
                echo "<img src ='upload/".$imag."'id = addImages>";
            } else if($_POST['id']){
                echo "<img src ='upload/".$_POST['files']."'id = addImages>";
            }else{
                echo "<img id = addImages>";
            }
           ?>
        </div>
        <input type="submit" name="add" value="<?= (!empty($_POST['id']) || !empty($mas)) ? 'Save' : 'Add';?>">
        <?php if(!empty($mas['id']) || !empty($_POST['id'])):?><input type="submit" value="Delet" name ="del" id="delNew">
        <?php endif?>
    </form>
</div>
	