import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

const firebaseConfig = {
  apiKey: "AIzaSyAJS4j-yNthEhkAr_iTc7-pXqwz2Aut8VY",
  authDomain: "formulario-2f1fb.firebaseapp.com",
  projectId: "formulario-2f1fb",
  storageBucket: "formulario-2f1fb.firebasestorage.app",
  messagingSenderId: "786842042154",
  appId: "1:786842042154:web:14165c00a1fdeab253e853"
};

// Inicializar Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// --- VERIFICADOR DE CONTRASEÑAS ---
document.addEventListener("DOMContentLoaded", () => {
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

// --- GUARDAR FIRESTORE ---
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
