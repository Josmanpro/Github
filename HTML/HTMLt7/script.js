$(document).ready(function(){

  // Agregar contenido
  $("#btnAgregar").click(function(){
    let texto = prompt("Ingrese el contenido que desea agregar:");
    if (texto) {
    $(".contenedor").append(`<div class="caja nueva"><p>${texto}</p></div>`);
    }
  });

  // Eliminar contenido
  $("#btnEliminar").click(function(){
    let num = prompt("Ingrese el número del recuadro que desea eliminar (1-4):");
    let id = "#caja" + num;
    if($(id).length){
    $(id).remove();
    alert("Recuadro eliminado correctamente.");
  } else {
      alert("No existe ese recuadro.");
    }
  });

  // Reemplazar contenido
  $("#btnReemplazar").click(function(){
    let num = prompt("Ingrese el número del recuadro a reemplazar (1-4):");
    let nuevo = prompt("Ingrese el nuevo texto:");
    let id = "#caja" + num;
    if($(id).length && nuevo){
      $(id).find("h3").text(nuevo);
      alert("Contenido reemplazado con éxito.");
  } else {
      alert("Recuadro no válido o sin texto.");
    }
  });

  // Cambiar atributos (color, tamaño, borde)
  $("#btnCambiar").click(function(){
    let num = prompt("Ingrese el número del recuadro a cambiar (1-4):");
    let id = "#caja" + num;
    if($(id).length){
      $(id).css({
      "background": "#ffeaa7",
      "border": "3px solid #d63031",
      "color": "#2d3436"
  });
  alert("Atributos cambiados correctamente.");
  } else {
    alert("No existe ese recuadro.");
    }
  });

});