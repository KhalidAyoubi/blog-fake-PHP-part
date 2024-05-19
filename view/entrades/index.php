<h1>Mi blog - probando entradas</h1>
<?php
if (gettype($entrades) === "string") {
    echo $entrades;
} else {
    foreach ($entrades as $entrada): ?>
        <h1><?php echo $entrada->getTitol(); ?></h1>
        <h3><a href="index.php?controller=post&action=show&id=<?php echo $entrada->getId(); ?>"><?php echo $entrada->getTitol(); ?></a></h3>
        <?php
        $descripcio = $entrada->getDescripcio();
        if ($descripcio !== null) {
            echo "<p>" . substr($descripcio, 0, 100) . "...</p>";
        }
        ?>
    <?php endforeach;
}
?>
