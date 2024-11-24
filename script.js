// Función para cargar contenido dinámico usando AJAX
document.addEventListener("DOMContentLoaded", function () {
  // Cuando el usuario hace clic en una sección
  document
    .getElementById("cargar-libros")
    .addEventListener("click", function () {
      cargarContenido("libros");
    });

  document
    .getElementById("cargar-autores")
    .addEventListener("click", function () {
      cargarContenido("autores");
    });

  document
    .getElementById("cargar-biografias")
    .addEventListener("click", function () {
      cargarContenido("biografias");
    });

  // Función para cargar contenido
  function cargarContenido(accion) {
    // Crear solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "contenido.php?accion=" + accion, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Colocar el contenido dinámico dentro de la sección
        document.getElementById("contenido-dinamico").innerHTML =
          xhr.responseText;
      }
    };
    xhr.send();
  }
});
