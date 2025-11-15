npm install firebase



// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDqSIFW_5x65yZNGyphr1Ld860DoHZQpxg",
  authDomain: "registro-portatiles-sena.firebaseapp.com",
  projectId: "registro-portatiles-sena",
  storageBucket: "registro-portatiles-sena.firebasestorage.app",
  messagingSenderId: "140602261232",
  appId: "1:140602261232:web:e0360347eb1e56273c8c35"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);