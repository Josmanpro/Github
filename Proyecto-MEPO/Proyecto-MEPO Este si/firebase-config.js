import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js";
import { getFirestore } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-firestore.js";

const firebaseConfig = {
    apiKey: "AIzaSyAz2Q_aSChTJV_wKU2kbsC8sp5dKfHnJ0Q",
    authDomain: "mercando-con-proposito-mepo.firebaseapp.com",
    projectId: "mercando-con-proposito-mepo",
    storageBucket: "mercando-con-proposito-mepo.firebasestorage.app",
    messagingSenderId: "489940212008",
    appId: "1:489940212008:web:20a90e2656f2a54be7d81d"
};

export const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);
export const db = getFirestore(app);