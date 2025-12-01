import { app } from "./firebase-config.js";

import { 
    getAuth, 
    createUserWithEmailAndPassword 
} from "https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js";

import { 
    getFirestore,
    setDoc,
    doc 
} from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

// Inicializar
const auth = getAuth(app);
const db = getFirestore(app);

// Obtener UI
const form = document.getElementById("registerForm");
const errorMsg = document.getElementById("errorMsg");

// Mensaje de éxito
let successMsg = document.createElement("p");
successMsg.style.color = "green";
successMsg.style.fontWeight = "bold";
successMsg.style.marginTop = "15px";
form.appendChild(successMsg);

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    errorMsg.textContent = "";
    successMsg.textContent = "";

    const nombre = document.getElementById("nombre").value;
    const email  = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {

        // 1️⃣ Crear usuario en Firebase Auth
        const userCredential = await createUserWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;

        // 2️⃣ Guardar datos en Firestore
        await setDoc(doc(db, "usuarios", user.uid), {
            nombre: nombre,
            email: email,
            fechaRegistro: new Date().toISOString()
        });

        // 3️⃣ Mostrar mensaje de éxito
        successMsg.textContent = "✔ Cuenta creada exitosamente";

        // 4️⃣ Redirigir después de 1.5 segundos
        setTimeout(() => {
            window.location.href = "login.html";
        }, 1500);

    } catch (error) {
        console.error(error);

        if (error.code === "auth/email-already-in-use") {
            errorMsg.textContent = "❌ El correo ya está registrado";
        } 
        else if (error.code === "auth/weak-password") {
            errorMsg.textContent = "❌ La contraseña debe tener mínimo 6 caracteres";
        }
        else {
            errorMsg.textContent = "❌ Error al registrar";
        }
    }
});
