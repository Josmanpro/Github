const auth = firebase.auth();

document.getElementById("recoverForm").addEventListener("submit", e => {
    e.preventDefault();
    const email = document.getElementById("recoverEmail").value;
    const msg = document.getElementById("msg");

    auth.sendPasswordResetEmail(email)
        .then(() => {
            msg.textContent = "Correo enviado. Revisa tu bandeja.";
        })
        .catch(err => {
            msg.textContent = err.message;
        });
});
