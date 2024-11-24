<?php
// Incluir la conexión a la base de datos
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página de Libros</title>
    <!-- Vincular Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fondo gris claro para la página */
        body {
            background-color: #f7f7f7;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        section {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <!-- Barra de navegación fija -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Libros</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#libros">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#autores">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#biografias">Biografías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5 pt-5">

        <!-- Sección Libros -->
        <section id="libros" class="mt-5">
            <h2>Libros</h2>
            <div class="row">
                <?php
                // Consulta para obtener todos los libros
                $consulta_libros = "SELECT * FROM libros";
                $resultado_libros = $conexion->query($consulta_libros);

                // Mostrar los libros
                if ($resultado_libros->num_rows > 0) {
                    while ($libro = $resultado_libros->fetch_assoc()) {
                        echo '<div class="col-md-4 mb-4">';
                        echo '<div class="card">';
                        echo '<img src="' . $libro['imagen'] . '" class="card-img-top" alt="Libro">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $libro['titulo'] . '</h5>';
                        echo '<p class="card-text">' . $libro['descripcion'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay libros disponibles.</p>';
                }
                ?>
            </div>
        </section>

        <!-- Sección Autores -->
        <section id="autores" class="mt-5">
            <h2>Autores</h2>
            <div class="row">
                <?php
                // Consulta para obtener todos los autores
                $consulta_autores = "SELECT * FROM autores";
                $resultado_autores = $conexion->query($consulta_autores);

                // Mostrar los autores
                if ($resultado_autores->num_rows > 0) {
                    while ($autor = $resultado_autores->fetch_assoc()) {
                        echo '<div class="col-md-4 mb-4">';
                        echo '<div class="card">';
                        echo '<img src="' . $autor['imagen'] . '" class="card-img-top" alt="Autor">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $autor['nombre'] . '</h5>';
                        echo '<p class="card-text">' . $autor['descripcion'] . '</p>';
                        echo '<a href="#biografias" class="btn btn-info">Ver Biografía</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay autores disponibles.</p>';
                }
                ?>
            </div>
        </section>

        <!-- Sección Biografías -->
        <section id="biografias" class="mt-5">
            <h2>Biografías</h2>
            <div class="row">
                <?php
                // Consulta para obtener las biografías
                $consulta_biografias = "SELECT * FROM biografias";
                $resultado_biografias = $conexion->query($consulta_biografias);

                // Mostrar las biografías
                if ($resultado_biografias->num_rows > 0) {
                    while ($biografia = $resultado_biografias->fetch_assoc()) {
                        echo '<div class="col-md-12 mb-4">';
                        echo '<h5>' . $biografia['nombre_autor'] . '</h5>';
                        echo '<p>' . $biografia['biografia'] . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay biografías disponibles.</p>';
                }
                ?>
            </div>
        </section>

        <!-- Sección Contacto -->
        <section id="contacto" class="mt-5">
            <h2>Contacto</h2>
            <form action="procesar_formulario.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </section>

    </div>

    <!-- Vincular JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

