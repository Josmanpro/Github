// Importar las funciones necesarias de Firebase
import { app } from "./firebase-config.js";
import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js";
import { getFirestore, setDoc, doc } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

// Inicializar los servicios de Firebase
const auth = getAuth(app);
const db = getFirestore(app);

// Obtener referencias a los elementos del DOM
const form = document.getElementById("registerForm");
const errorMsg = document.getElementById("errorMsg");
const successMsg = document.getElementById("successMsg");

/**
 * Traduce los códigos de error de Firebase a mensajes amigables para el usuario.
 * @param {object} error - El objeto de error devuelto por Firebase.
 * @returns {string} Un mensaje de error en español.
 */
function traducirError(error) {
    switch (error.code) {
        case 'auth/email-already-in-use':
            return 'Este correo electrónico ya está en uso. Prueba con otro.';
        case 'auth/invalid-email':
            return 'El formato del correo electrónico no es válido.';
        case 'auth/weak-password':
            return 'La contraseña es muy débil. Debe tener al menos 6 caracteres.';
        default:
            return 'Ocurrió un error inesperado. Por favor, inténtalo de nuevo.';
    }
}

// Escuchar el evento de envío del formulario
form.addEventListener("submit", async (e) => {
    e.preventDefault(); // Prevenir el comportamiento por defecto del formulario

    // Limpiar mensajes anteriores
    errorMsg.textContent = "";
    errorMsg.style.display = 'none';
    successMsg.textContent = "";
    successMsg.style.display = 'none';

    // Obtener los valores de los campos del formulario
    const nombre = document.getElementById("nombre").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    // --- 1️⃣ VALIDACIÓN EN EL LADO DEL CLIENTE (antes de llamar a Firebase) ---
    if (password !== confirmPassword) {
        errorMsg.textContent = "❌ Las contraseñas no coinciden.";
        errorMsg.style.display = 'block';
        return; // Detener la ejecución si las contraseñas no coinciden
    }

    try {
        // --- 2️⃣ CREAR USUARIO EN FIREBASE AUTHENTICATION ---
        const userCredential = await createUserWithEmailAndPassword(auth, email, password);
        const user = userCredential.user;

        // --- 3️⃣ GUARDAR DATOS ADICIONALES EN FIRESTORE ---
        // Usamos el UID del usuario como ID del documento para una relación única.
        await setDoc(doc(db, "usuarios", user.uid), {
            nombre: nombre,
            email: email,
            fechaRegistro: new Date().toISOString() // Guardar la fecha actual en formato ISO
        });

        // --- 4️⃣ MOSTRAR MENSAJE DE ÉXITO Y REDIRIGIR ---
        successMsg.textContent = "✔ ¡Cuenta creada exitosamente! Redirigiendo...";
        successMsg.style.display = 'block';

        // Redirigir al usuario a la página de login después de 2 segundos
        setTimeout(() => {
            window.location.href = "login.html";
        }, 2000);

    } catch (error) {
        // --- 5️⃣ MANEJO DE ERRORES ---
        console.error("Error durante el registro:", error);
        errorMsg.textContent = traducirError(error);
        errorMsg.style.display = 'block';
    }
});
