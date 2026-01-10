import {
    getAuth,
    signInWithEmailAndPassword
} from "https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js";

const auth = getAuth();

document.getElementById("loginForm").addEventListener("submit", (e) => {
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const msg = document.getElementById("errorMsg");

    signInWithEmailAndPassword(auth, email, password)
        .then(() => {
            window.location = "pagina.html";
        })
        .catch(error => {
            msg.textContent = error.message;
        });
});
