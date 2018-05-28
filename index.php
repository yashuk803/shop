<?php 
session_start();
require_once "library/controller.php";?>
<!DOCTYPE html>
<html lang="en">

<?php require_once("include/header.php") ?>
<body>
<div class="wrapper">
    <header>
    
        <?php require_once("include/menu.php") ?>
    </header>

    <main role="main" class="container">
        <div class="containerMain">
            <?php require_once $page; ?>
        </div>
    </main>
    <?php require_once("include/footer.php") ?>
</div>
</body>
</html>

