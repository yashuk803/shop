<nav class="panelTop">
    <ul>
        <li><a href="#">My account</a> </li>
        <li><a  class="bascet" href="/index.php?action=bascet">
                <span class="countItem">
                    <?=  ($_SESSION['counter']) ?  $_SESSION['counter'] :  "0";?></span>
            </a> </li>
    </ul>

</nav>
<nav class="mainMenu">
    <a class="logo" href="/index.php?action=main">
        <img src="asset/img/logo.png">
    </a>
    <div class="burger"></div>
    <ul>
        <li><a href="/index.php?action=shop">Shop </a></li>
        <li><a href="/index.php?action=about">About</a> </li>
        <li><a href="/index.php?action=news">News $ Blog</a> </li>
        <li><a href="/index.php?action=contact">Contact</a> </li>
        <li><a href="/index.php?action=add">Add</a> </li>
        <li><a href="/index.php?action=addproducts">Add Products</a> </li>
    </ul>
</nav>
