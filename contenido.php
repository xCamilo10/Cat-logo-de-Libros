<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Verifica qué sección se solicita
$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

// Acción para cargar los libros
if ($accion == 'libros') {
    // Consulta para obtener los títulos de los libros
    $consulta_libros = "SELECT * FROM titulos";
    $resultado_libros = $conexion->query($consulta_libros);

    // Mostrar los libros
    if ($resultado_libros->num_rows > 0) {
        while ($libro = $resultado_libros->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $libro['titulo'] . '</h5>';
            echo '<p class="card-text">Descripción: ' . $libro['descripcion'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No hay libros disponibles.</p>';
    }

// Acción para cargar los autores
} elseif ($accion == 'autores') {
    // Consulta para obtener los autores
    $consulta_autores = "SELECT * FROM autores";
    $resultado_autores = $conexion->query($consulta_autores);

    // Mostrar los autores
    if ($resultado_autores->num_rows > 0) {
        while ($autor = $resultado_autores->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $autor['nombre'] . '</h5>';
            echo '<p class="card-text">Descripción: ' . $autor['descripcion'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No hay autores disponibles.</p>';
    }

// Acción para cargar las biografías
} elseif ($accion == 'biografias') {
    // Consulta para obtener las biografías de los autores
    $consulta_biografias = "SELECT biografias.*, autores.nombre AS autor_nombre
                            FROM biografias
                            JOIN autores ON biografias.autor_id = autores.id";
    $resultado_biografias = $conexion->query($consulta_biografias);

    // Mostrar las biografías
    if ($resultado_biografias->num_rows > 0) {
        while ($biografia = $resultado_biografias->fetch_assoc()) {
            echo '<div class="col-md-12 mb-4">';
            echo '<h5>' . $biografia['autor_nombre'] . '</h5>';
            echo '<p>' . $biografia['biografia'] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>No hay biografías disponibles.</p>';
    }

// Si no se especificó una acción válida
} else {
    echo '<p>No se especificó una acción válida.</p>';
}
?>


