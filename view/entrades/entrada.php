<?php
    @include ("view/header.php");

    // Verificamos si la entrada existe
    if ($entrada->getId()) {
        // Si la entrada existe, la mostramos
        echo "<h1>" . $entrada->getTitol() . "</h1>";
        echo "<p>" . $entrada->getDescripcio() . "</p>";

        // Formulario agregar comentario si está registrado
        if (isset($_SESSION['usuari'])) {
            // Mostrar formulario de comentario
            echo "<h2>Agregar Comentario:</h2>";
            echo "<form method='POST' action='index.php?controller=entrada&action=agregarComentari'>";
            echo "<input type='hidden' name='entrada_id' value='" . $entrada->getId() . "'>";
            echo "<input type='hidden' name='usuari' value='" . $_SESSION['usuari'] . "'>";
            echo "<textarea name='descripcio' placeholder='Escribe tu comentario aquí'></textarea>";
            echo "<button type='submit'>Agregar Comentario</button>";
            echo "</form>";
        } else {
            echo "<p>Inicia sesión para agregar un comentario.</p>";
        }

        // Mostramos los comentarios si tiene
        if (!empty($comentaris)) {
            echo "<h2>Comentarios:</h2>";
            foreach ($comentaris as $comentari) {
                echo "<div class='comentario'>";
                    echo "<p><strong>Usuario:</strong> " . $comentari->getUsuari() . "</p>";
                    echo "<p>" . $comentari->getDescripcio() . "</p>";

                    // Si el comentario es del usuario actual, mostrar el formulario de eliminación
                    if (isset($_SESSION['usuari']) && $_SESSION['usuari'] == $comentari->getUsuari()) {
                        echo "<form method='POST' action='index.php?controller=entrada&action=borrarComentari'>";
                        echo "<input type='hidden' name='idcomentari' value='" . $comentari->getIdcomentari() . "'>";
                        echo "<input type='hidden' name='entrada_id' value='" . $entrada->getId() . "'>";
/*                        echo "<input type='hidden' name='usuari' value='" . $_SESSION['usuari'] . "'>";*/
                        echo "<button type='submit'>Borrar</button>";
                        echo "</form>";
                    }

                echo "</div>";
            }
        } else {
            echo "<p>No hay comentarios para esta entrada.</p>";
        }
    } else {
        echo "<p>La entrada no exite, o no es pública. Regrese al <a href='index.php'>inicio</a></p>";
    }
?>
