// recuperar.js

import { auth } from "./firebase-config.js";

import { 
    sendPasswordResetEmail 
} from "https://www.gstatic.com/firebasejs/12.6.0/firebase-auth.js";

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("recoverForm");
    const msg = document.getElementById("msg");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        msg.textContent = "";

        const email = document.getElementById("recoverEmail").value.trim();

        try {
            await sendPasswordResetEmail(auth, email);

            msg.style.color = "green";
            msg.textContent = "✔ Se envió un enlace de recuperación a tu correo.";

        } catch (error) {
            console.error(error);

            msg.style.color = "red";

            switch (error.code) {
                case "auth/user-not-found":
                    msg.textContent = "❌ No existe una cuenta con este correo.";
                    break;

                case "auth/invalid-email":
                    msg.textContent = "❌ El correo no es válido.";
                    break;

                default:
                    msg.textContent = "❌ Ocurrió un error. Inténtalo nuevamente.";
                    break;
            }
        }
    });
});
