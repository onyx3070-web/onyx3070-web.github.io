// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyB2eYSH4KLI8yJWgdsNMk6S6QSauhAh2gk",
  authDomain: "concerteclipsearena.firebaseapp.com",
  databaseURL: "https://concerteclipsearena-default-rtdb.europe-west1.firebasedatabase.app",
  projectId: "concerteclipsearena",
  storageBucket: "concerteclipsearena.firebasestorage.app",
  messagingSenderId: "27710772868",
  appId: "1:27710772868:web:dcac87ec20b61daa2a14d1",
  measurementId: "G-NGE6X8J0QG"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);