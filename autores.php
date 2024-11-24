<section id="autores" class="mt-5">
    <h2>Autores</h2>
    <div class="row">
        <?php
        // Conexión a la base de datos (ajustar con tus datos)
        $conexion = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Consultar los autores
        $consulta = "SELECT * FROM autores";
        $resultado = $conexion->query($consulta);

        // Mostrar los autores
        while ($autor = $resultado->fetch_assoc()) {
            echo '<div class="col-md-4">';
            echo '<div class="card mb-4">';
            echo '<img src="' . $autor['imagen'] . '" class="card-img-top" alt="' . $autor['nombre'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $autor['nombre'] . '</h5>';
            echo '<p class="card-text">' . $autor['descripcion'] . '</p>';
            echo '<a href="#biografias" class="btn btn-info">Ver Biografía</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</section>
