import { auth, db } from "./firebase-config.js";
import { signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js";
import { setDoc, doc } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

window.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");
  const errorMsg = document.getElementById("errorMsg");

  // Mensaje de éxito
  let successMsg = document.createElement("div");
  successMsg.style.background = "#c8ffc8";
  successMsg.style.border = "1px solid #00a000";
  successMsg.style.padding = "10px";
  successMsg.style.marginTop = "15px";
  successMsg.style.textAlign = "center";
  successMsg.style.borderRadius = "6px";
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
      const userCredential = await signInWithEmailAndPassword(auth, email, password);
      const user = userCredential.user;

      // Guardar registro de login
      await setDoc(doc(db, "usuariosLogin", user.uid), {
        email: user.email,
        fechaLogin: new Date().toISOString()
      });

      // Mostrar éxito
      successMsg.style.display = "block";

      setTimeout(() => {
        window.location.href = "pagina.html";
      }, 1200);

    } catch (err) {
      console.error(err);

      if (err.code === "auth/user-not-found") {
        errorMsg.textContent = "❌ Usuario no registrado.";
      } else if (err.code === "auth/wrong-password") {
        errorMsg.textContent = "❌ Contraseña incorrecta.";
      } else {
        errorMsg.textContent = "❌ Error al iniciar sesión.";
      }
    }
  });
});
