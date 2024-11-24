<section id="libros" class="mt-5">
    <h2>Libros</h2>
    <div class="row">
        <?php
        // Conexión a la base de datos (ajustar con tus datos)
        $conexion = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Consultar los libros
        $consulta = "SELECT * FROM libros";
        $resultado = $conexion->query($consulta);

        // Mostrar los libros
        while ($libro = $resultado->fetch_assoc()) {
            echo '<div class="col-md-4">';
            echo '<div class="card mb-4">';
            echo '<img src="' . $libro['imagen'] . '" class="card-img-top" alt="' . $libro['titulo'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $libro['titulo'] . '</h5>';
            echo '<p class="card-text">' . $libro['descripcion'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</section>