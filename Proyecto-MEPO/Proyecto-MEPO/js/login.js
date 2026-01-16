// login.js

import { auth, db } from "./firebase-config.js";

import { 
    signInWithEmailAndPassword 
} from "https://www.gstatic.com/firebasejs/12.6.0/firebase-auth.js";

import { 
    setDoc, doc 
} from "https://www.gstatic.com/firebasejs/12.6.0/firebase-firestore.js";

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("loginForm");
    const errorMsg = document.getElementById("errorMsg");

    let successMsg = document.createElement("p");
    successMsg.style.color = "green";
    successMsg.style.textAlign = "center";
    successMsg.style.marginTop = "15px";
    successMsg.style.fontWeight = "bold";
    successMsg.style.display = "none";
    successMsg.textContent = "✔ Inicio de sesión exitoso";
    form.appendChild(successMsg);

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        errorMsg.textContent = "";
        successMsg.style.display = "none";

        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value;

        try {
            // INICIAR SESIÓN
            const userCred = await signInWithEmailAndPassword(auth, email, password);
            const user = userCred.user;

            // GUARDAR LOGIN EN FIRESTORE
            await setDoc(doc(db, "usuariosLogin", user.uid), {
                email: user.email,
                fechaLogin: new Date().toISOString()
            });

            successMsg.style.display = "block";

            setTimeout(() => {
                window.location.href = "pagina.html";
            }, 1200);

        } catch (err) {
            console.error("Error login:", err);

            if (err.code === "auth/user-not-found") {
                errorMsg.textContent = "❌ Usuario no existe.";
            } else if (err.code === "auth/wrong-password") {
                errorMsg.textContent = "❌ Contraseña incorrecta.";
            } else if (err.code === "auth/invalid-email") {
                errorMsg.textContent = "❌ Correo inválido.";
            } else {
                errorMsg.textContent = "❌ Error al iniciar sesión.";
            }
        }
    });
});