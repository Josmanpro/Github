// usuarios.js

import { db } from "./firebase-config.js";

import { 
    collection, getDocs 
} from "https://www.gstatic.com/firebasejs/12.6.0/firebase-firestore.js";

document.addEventListener("DOMContentLoaded", async () => {
    const tabla = document.getElementById("usuariosTabla");

    try {
        const querySnapshot = await getDocs(collection(db, "usuarios"));

        tabla.innerHTML = ""; // limpiar contenido

        querySnapshot.forEach((doc) => {
            const data = doc.data();

            const fila = `
                <tr>
                    <td>${data.nombre}</td>
                    <td>${data.email}</td>
                    <td>${data.uid}</td>
                    <td>${data.fechaRegistro ? new Date(data.fechaRegistro.seconds * 1000).toLocaleString() : "N/D"}</td>
                    <td>${data.rol || "N/A"}</td>
                </tr>
            `;

            tabla.insertAdjacentHTML("beforeend", fila);
        });

        if (querySnapshot.empty) {
            tabla.innerHTML = `<tr><td colspan="5">No hay usuarios registrados.</td></tr>`;
        }

    } catch (error) {
        console.error("Error al obtener usuarios:", error);
        tabla.innerHTML = `<tr><td colspan="5">Error al cargar usuarios.</td></tr>`;
    }
});
