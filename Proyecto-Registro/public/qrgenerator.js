// ======================================================
// qrgenerator.js
// Genera códigos QR y guarda los datos en Firestore
// ======================================================

// Cargar librería QRCode.js desde CDN
const script = document.createElement("script");
script.src = "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js";
document.body.appendChild(script);

script.onload = () => {
    console.log("Librería QRCode.js cargada correctamente");
};

// Función principal
async function generarQR() {

    const documento = document.getElementById("documento").value.trim();
    const nombre = document.getElementById("nombre").value.trim();
    const contenedor = document.getElementById("qr-result");

    if (documento === "" || nombre === "") {
        alert("Por favor completa todos los campos antes de generar el QR.");
        return;
    }

    // Limpiar QR anterior
    contenedor.innerHTML = "";

    // Datos que irán dentro del QR
    const datosQR = {
        documento: documento,
        nombre: nombre,
        fecha_registro: new Date().toISOString()
    };

    // Generar QR visual
    new QRCode(contenedor, {
        text: JSON.stringify(datosQR),
        width: 220,
        height: 220
    });

    // ================= FIRESTORE ======================
    // Guardar en la colección "preregistros"
    try {
        const { db } = window;

        const { collection, addDoc } = await import(
            "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js"
        );

        await addDoc(collection(db, "preregistros"), {
            documento: documento,
            nombre: nombre,
            formacion: document.getElementById("formacion").value.trim(),
            fecha_registro: new Date(),
            tipo: "generacion_qr"
        });

        alert("QR generado y guardado en Firestore.");
    } 
    catch (error) {
        console.error("Error al guardar en Firestore:", error);
        alert("Error al guardar en Firestore. Revisa la consola para detalles.");
    }
}
