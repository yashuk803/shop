<div class="banerPage"></div>
<section class="pages">
    <h1>ADDProduct</h1>
</section>

<div class="addbrand">
    <form action="http://product/index.php?action=addproducts" method="post" enctype = "multipart/form-data">
        <div class="field">
            <label for="name">Name Brand</label>
            <input type="text" name="name">
            <span class="erro"></span>
        </div>
        <div class="field">
            <label for="name">Description Brand</label>
            <input type="text" name="description">
            <span class="erro"></span>
        </div>
        <div class="field">
           <input type="checkbox" id="publishBrand" name="publish" value=1>
            <label for="publishBrand">Publish Brand?</label>
     
        </div>
        <input type="submit" name="brand">
    </form>
</div>

<div class="addcategory">
    <form action="http://product/index.php?action=addproducts" method="post" enctype = "multipart/form-data">
        <div class="field">
            <label for="name">Name category</label>
            <input type="text" name="name">
            <span class="erro"></span>
        </div>
        <div class="field">
            <label for="name">Description category</label>
            <input type="text" name="description">
            <span class="erro"></span>
        </div>
        <div class="field">
           <input type="checkbox" id="publishCategory" name="publish" value=1>
            <label for="publishCategory">Publish Category?</label>
     
        </div>
        <input type="submit" name="category">
    </form>
</div>

<div class="addProducts">
    <form action="http://product/index.php?action=addproducts" method="post" enctype = "multipart/form-data">
        <input type="hidden" name = "id" value="<?=($mas) ? $mas['id'] : $_POST['id']?>" >
        <div class="name product">
            <label>Add product name</label>
            <input type="text" name = "name" value = "">
            <span class="error"><?php if (!empty($errors['name'])) echo $errors['name'];?></span>
        </div>
        <div class="descr product">
            <label>Add description product</label>
            <textarea  name = "text"></textarea>
            <span class="error"><?php if (!empty($errors['text'])) echo $errors['text'];?></span>
        </div>
        <div class="descr product">
            <label>Add articul product</label>
             <input type="text" name = "articul" value = "">
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
          <div class="field">
           <input type="checkbox" id="publishProduct" name="publish" value=1>
            <label for="publishProduct">Publish Product?</label>
     
        </div>
         <div class="number product">
            <label>Price</label>
            <input type="number" name = "price" value = ""  min="0">
            <span class="error"></span>
        </div>
        <div class="filed">
        <select name="brandId">
            <option disabled>Выберите brand</option>
            <?php if(!empty($brandAll)):?>
                <?php foreach ($brandAll as $brand ):?>
            <option value="<?= $brand['id']?>"><?= $brand['name']?></option>
        <?php endforeach;?>
          <?php endif;?>  
        </select>
        </div>
         <div class="filed">
         <select name="categoryId">
            <option disabled>Выберите category</option>
            <?php if(!empty($categorysAll)):?>
                <?php foreach ($categorysAll as $cat ):?>
            <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
        <?php endforeach;?>
          <?php endif;?>  
        </select>
        </div>
        <input type="submit" name="add" value="Add">
        
    </form>
</div>
	