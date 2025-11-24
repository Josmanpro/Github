npm install firebase

// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyAJS4j-yNthEhkAr_iTc7-pXqwz2Aut8VY",
  authDomain: "formulario-2f1fb.firebaseapp.com",
  projectId: "formulario-2f1fb",
  storageBucket: "formulario-2f1fb.firebasestorage.app",
  messagingSenderId: "786842042154",
  appId: "1:786842042154:web:14165c00a1fdeab253e853"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
