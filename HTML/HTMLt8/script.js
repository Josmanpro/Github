function validarFormulario(e) {
  e.preventDefault();
  const pass1 = document.getElementById("pass1").value;
  const pass2 = document.getElementById("pass2").value;

  if (pass1 !== pass2) {
    alert("Las contraseñas no coinciden.");
    return false;
  }
  
  return true;
}
document.addEventListener("DOMContentLoaded", function() {
  const pass1 = document.getElementById("pass1");
  const pass2 = document.getElementById("pass2");
  const mensaje = document.createElement("p");

  mensaje.id = "mensajePass";
  mensaje.style.fontWeight = "bold";
  mensaje.style.marginTop = "5px";
  pass2.insertAdjacentElement("afterend", mensaje);

  function verificarContraseñas() {
    if (pass2.value.length === 0) {
      mensaje.textContent = "";
      return;
    }

    if (pass1.value === pass2.value) {
      mensaje.textContent = "💕 Las contraseñas coinciden";
      mensaje.style.color = "green";
    } else {
      mensaje.textContent = "💔 Las contraseñas no coinciden";
      mensaje.style.color = "red";
    }
  }

  pass1.addEventListener("input", verificarContraseñas);
  pass2.addEventListener("input", verificarContraseñas);
});

document.addEventListener("mousemove", function(e) {
  const trail = document.createElement("div");
  trail.classList.add("laser-trail");
  document.body.appendChild(trail);
  trail.style.left = e.pageX + "px";
  trail.style.top = e.pageY + "px";

  setTimeout(() => trail.remove(), 500);
});
function soloNumeros(input) {
  input.value = input.value.replace(/[^0-9]/g, ''); 
}
function soloLetras(input) {
  input.value = input.value.replace(/[^a-zA-Z\s]/g, ''); 
}
const db = window.db;

import { collection, addDoc } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

import { collection, addDoc } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

document.getElementById("miFormulario").addEventListener("submit", async (e) => {
  e.preventDefault();
  try {
    await addDoc(collection(db, "formularios"), {
      mayorEdad: document.getElementById("mayorEdad").checked,
      sexo: document.querySelector('input[name="sexo"]:checked').value,
      nombre: e.target.nombre.value,
      apellido: e.target.apellido.value,
      pass: e.target.pass1.value,
      tipoDoc: e.target.tipoDoc.value,
      numDoc: e.target.numDoc.value,
      ciudad: e.target.ciudad.value,
      telefono: e.target.telefono.value,
      direccion: e.target.direccion.value,
      tipoAccion: document.querySelector('input[name="accion"]:checked')?.value,
      mensaje: e.target.mensaje.value,
      fecha: new Date()
    });

    alert("Formulario enviado y guardado en Firebase ✔");
    e.target.reset();

  } catch (error) {
    console.error("Error al guardar:", error);
    alert("Hubo un error al guardar ❌");
  }
});
