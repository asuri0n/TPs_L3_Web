<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->title ?></title>
</head>
<body>
    <nav class="menu">
        <ul>
            <?php
            foreach ($this->menu as $key => $item){
                echo "<li><a href=".$key.">$item</a></li>";
            }
            ?>
        </ul>
    </nav>

</header>
    <?= $this->feedback ?>
    <?= $this->content ?>
</body>
</html>