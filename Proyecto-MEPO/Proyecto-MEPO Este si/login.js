import { app } from "./firebase-config.js";
import { 
    getAuth, 
    signInWithEmailAndPassword 
} from "https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js";

import { 
    getFirestore,
    setDoc,
    doc 
} from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

// Inicializar servicios
const auth = getAuth(app);
const db = getFirestore(app);

// Capturar formulario y mensajes
const form = document.getElementById("loginForm");
const errorMsg = document.getElementById("errorMsg");

// Crear contenedor de éxito (lo agregamos dinámicamente)
let successMsg = document.createElement("p");
successMsg.style.color = "green";
successMsg.style.fontWeight = "bold";
successMsg.style.marginTop = "15px";
form.appendChild(successMsg);

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    // Limpiar mensajes previos
    errorMsg.textContent = "";
    successMsg.textContent = "";

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
        // 1️⃣ Iniciar sesión
        const userCredential = await signInWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;

        // 2️⃣ Guardar datos en Firestore
        await setDoc(doc(db, "usuariosLogin", user.uid), {
            email: user.email,
            fechaLogin: new Date().toISOString()
        });

        // 3️⃣ Mostrar mensaje de éxito
        successMsg.textContent = "✔ Información guardada exitosamente";

        // 4️⃣ Esperar 1 segundo y redirigir
        setTimeout(() => {
            window.location.href = "pagina.html";
        }, 1500);

    } catch (error) {
        errorMsg.textContent = "❌ Correo o contraseña incorrectos";
        console.error(error);
    }
});
