<section id="biografias" class="mt-5">
    <h2>Biografías</h2>
    <div class="row">
        <?php
        // Suponiendo que tienes un parámetro 'autor_id' que pasa al hacer clic en "Ver Biografía"
        if (isset($_GET['autor_id'])) {
            $autor_id = $_GET['autor_id'];

            // Consultar la biografía del autor
            $consulta = "SELECT * FROM biografias WHERE autor_id = '$autor_id'";
            $resultado = $conexion->query($consulta);

            if ($biografia = $resultado->fetch_assoc()) {
                echo '<div class="col-md-12">';
                echo '<h3>' . $biografia['nombre_autor'] . '</h3>';
                echo '<p>' . $biografia['biografia'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Seleccione un autor para ver su biografía.</p>';
        }
        ?>
    </div>
</section>
