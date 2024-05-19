<?php
// Verificamos si la entrada existe
if ($entrada->getId()) {
    // Si la entrada existe, mostramos la
    echo "<h1>" . $entrada->getTitol() . "</h1>";
    echo "<p>" . $entrada->getDescripcio() . "</p>";
} else {
    echo "<p>La entrada no exite, o no es pública. Regrese al <a href='index.php'>inicio</a></p>";
}
?>
