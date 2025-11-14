// script para llamar limpiar resultados
function limpiarResultados(){
  const divs = document.querySelectorAll(`.divs div`);
  divs.forEach(div => div.innerHTML = "");
} 

// a) Mostrar etiquetas H3
function mostrarH3() {
  limpiarResultados();
  const h3Elements = document.getElementsByTagName("h3");
  let resultado = "<h4>Títulos H3 encontrados:</h4><ul>";
  for (let i = 0; i < h3Elements.length; i++) {
    resultado += "<li>" + h3Elements[i].textContent + "</li>";
  }
  resultado += "</ul>";
  document.getElementById("resultadosH3").innerHTML = resultado;
}

// b) Mostrar etiquetas con ID "Cursos"
function mostrarPorID() {
  limpiarResultados();
  const elemento = document.getElementById("cursos"); // nombre exacto del id
  const destino = document.getElementById("resultadosID");
  if (!destino) {
    console.warn("No existe el elemento con id 'resultadosID' en el HTML.");
    return;
  }
  if (!elemento) {
    destino.innerText = "No se encontró el elemento con id 'cursos'.";
    return;
  }
  destino.innerHTML = "<h4>Cursos encontrados:</h4><p>" + elemento.textContent + "</p>";
}
// c) Mostrar etiquetas con URLs
function mostrarURLs() {
  limpiarResultados();
  const enlaces = document.getElementsByTagName("a");
  let resultado = "<h4>Enlaces encontrados:</h4><ul>";
  for (let i = 0; i < enlaces.length; i++) {
    resultado += "<li>" + enlaces[i].href + "</li>";
  }
  resultado += "</ul>";
  document.getElementById("resultadosURLs").innerHTML = resultado;
}
// d) Mostrar etiquetas P
function mostrarParrafos() {
  limpiarResultados();
  const parrafos = document.getElementsByTagName("p");
  let resultado = "<h4>Parrafos encontrados:</h4><ul>";
  for (let i = 0; i < parrafos.length; i++) {
    resultado += "<li>" + parrafos[i].textContent + "</li>";
  }
  resultado += "</ul>";
  document.getElementById("resultadosParrafos").innerHTML = resultado;
}
// e) Mostrar clase menu
function mostrarClaseMenu() {
  limpiarResultados();
  const clasemenu = document.getElementsByClassName("menu");
  let resultado = "<h4>Menus encontrados:</h4><ul>";
  for (let i = 0; i < clasemenu.length; i++) {
    resultado += "<li>" + clasemenu[i].textContent + "</li>";
  }
  resultado += "</ul>";
  document.getElementById("resultadosClaseMenu").innerHTML = resultado;
}
// f) Mostrar etiquetas H4
function mostrarH4() {
  limpiarResultados();
  const h4Elements = document.getElementsByTagName("h4");
  let resultado = "<h4>Títulos H4 encontrados:</h4><ul>";
  for (let i = 0; i < h4Elements.length; i++) {
    resultado += "<li>" + h4Elements[i].textContent + "</li>";
  }
  resultado += "</ul>";
  document.getElementById("resultadosH4").innerHTML = resultado;
}
// g) Mostrar todas las listas ul, ol y li
function mostrarListas() {
  limpiarResultados();
  const elementos = document.querySelectorAll("ul, ol, li");
  let resultado = "<h4>Listas encontradas:</h4><ul>";

  elementos.forEach((el) => {
    resultado += `<li>${el.textContent.trim()}</li>`;
  });

  resultado += "</ul>";

  document.getElementById("resultadosListas").innerHTML = resultado;
}
