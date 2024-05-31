<?php
@include ("view/header.php");
?>
<h1>Entradas</h1>
<?php
if (gettype($entrades) === "string") {
    echo $entrades;
} else {
    echo "<div class='entradas'>";
    foreach ($entrades as $entrada): ?>
        <div class="entrada">
        <h3><a class="entrada-titol" href="index.php?controller=entrada&action=getEntradaById&id=<?php echo $entrada->getId(); ?>"><?php echo $entrada->getTitol(); ?></a></h3>
        <?php
        $descripcio = $entrada->getDescripcio();
        if ($descripcio !== null) {
            echo "<p>" . substr($descripcio, 0, 100) . "... <a class='entrada-leer-mas' href='index.php?controller=entrada&action=getEntradaById&id=".$entrada->getId()."'>Leer más</a></p>";
        }
        ?>
        </div>
    <?php endforeach;
    echo "</div>";
}
?>

<style>
        .entradas {
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 15px;
        }

        .entrada {
            padding: 10px 15px;
            background-color: #f2f2f2;
            border: 1px solid #d5d5d5;
            border-radius: 10px;
        }

        .entrada-titol {
            font-size: 1.3rem;
            text-decoration: none;
            color: #333333;
            text-decoration: underline;
        }

        .entrada-leer-mas {
            color: #385d00;
            font-size: .9rem;
        }


        h1:nth-child(2) {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        h1:nth-child(2) {
            font-size: 5rem;
            font-weight: bold;
        }
</style>