// Importar Firebase
import { auth, db } from "./firebase-config.js";

import { 
    createUserWithEmailAndPassword 
} from "https://www.gstatic.com/firebasejs/12.6.0/firebase-auth.js";

import { 
    setDoc, doc 
} from "https://www.gstatic.com/firebasejs/12.6.0/firebase-firestore.js";

// Elementos del formulario
const form = document.getElementById("miFormulario");
const errorMsg = document.getElementById("errorMsg");
const successMsg = document.getElementById("successMsg");

// Traducción de errores
function traducirError(error) {
    switch (error.code) {
        case "auth/email-already-in-use":
            return "Este correo ya está registrado.";
        case "auth/invalid-email":
            return "El correo no es válido.";
        case "auth/weak-password":
            return "La contraseña es muy débil (mínimo 6 caracteres).";
        default:
            return "Error inesperado. Intenta nuevamente.";
    }
}

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    errorMsg.style.display = "none";
    successMsg.style.display = "none";

    const nombre = document.getElementById("nombre").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("pass1").value;
    const confirmPassword = document.getElementById("pass2").value;

    if (password !== confirmPassword) {
        errorMsg.textContent = "❌ Las contraseñas no coinciden.";
        errorMsg.style.display = "block";
        return;
    }

    try {
        // Crear usuario en Auth
        const userCredential = await createUserWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;

        // Guardar usuario en Firestore
        await setDoc(doc(db, "usuarios", user.uid), {
            nombre,
            email,
            uid: user.uid,
            fechaRegistro: new Date(),
            rol: "cliente"
        });

        successMsg.textContent = "✔ Cuenta creada y guardada exitosamente!";
        successMsg.style.display = "block";

        setTimeout(() => {
            window.location.href = "login.html";
        }, 2000);

    } catch (error) {
        console.error(error);
        errorMsg.textContent = traducirError(error);
        errorMsg.style.display = "block";
    }
});


// --- VALIDACIÓN DE CONTRASEÑAS EN TIEMPO REAL ---
document.addEventListener("DOMContentLoaded", function () {
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
