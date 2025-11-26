import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

const firebaseConfig = {
  apiKey: "AIzaSyAJS4j-yNthEhkAr_iTc7-pXqwz2Aut8VY",
  authDomain: "formulario-2f1fb.firebaseapp.com",
  projectId: "formulario-2f1fb",
  storageBucket: "formulario-2f1fb.appspot.com",
  messagingSenderId: "786842042154",
  appId: "1:786842042154:web:14165c00a1fdeab253e853"
};

// Inicializar Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// Esperar a que cargue el DOM
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("miFormulario");
  const pass1 = document.getElementById("pass1");
  const pass2 = document.getElementById("pass2");
  const mensaje = document.getElementById("mensajePass");

  // ✔ Verificador de contraseñas
  const verificarContraseñas = () => {
    if (!pass2.value) {
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
  };

  pass1.addEventListener("input", verificarContraseñas);
  pass2.addEventListener("input", verificarContraseñas);

  // ✔ Envío del formulario
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    if (pass1.value !== pass2.value) {
      alert("Las contraseñas no coinciden.");
      return;
    }

    const sexoChecked = document.querySelector('input[name="sexo"]:checked');
    if (!sexoChecked) {
      alert("Seleccione un sexo.");
      return;
    }

    const accionChecked = document.querySelector('input[name="accion"]:checked');
    if (!accionChecked) {
      alert("Seleccione una acción.");
      return;
    }

    const data = {
      mayorEdad: document.getElementById("mayorEdad").checked,
      sexo: sexoChecked.value,
      nombre: e.target.nombre.value,
      apellido: e.target.apellido.value,
      pass: e.target.pass1.value,
      tipoDoc: e.target.tipoDoc.value,
      numDoc: e.target.numDoc.value,
      ciudad: e.target.ciudad.value,
      telefono: e.target.telefono.value,
      direccion: e.target.direccion.value,
      tipoAccion: accionChecked.value,
      mensaje: e.target.mensaje.value,
      fecha: new Date()
    };

    try {
      const docRef = await addDoc(collection(db, "formularios"), data);
      alert("Formulario enviado. ID: " + docRef.id);

      form.reset();
      mensaje.textContent = "";
    } catch (error) {
      console.error(error);
      alert("Error al enviar: " + error.message);
    }
  });
});