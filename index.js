// Import the functions you need from the SDKs you need
// import { initializeApp } from "firebase/app";
// import { getAnalytics } from "firebase/analytics";

import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-app.js";
import { getFirestore } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-firestore.js"
import { collection, getDocs, addDoc, Timestamp } from 'https://www.gstatic.com/firebasejs/9.8.4/firebase-firestore.js'
import { query, orderBy, limit, where, onSnapshot } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-firestore.js"
// https://www.gstatic.com/firebasejs/9.8.3/firebase-auth.js
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyD328i_7KXj07q2iVxQaW02U1MUozJv6I8",
  authDomain: "mesha-delicacies.firebaseapp.com",
  projectId: "mesha-delicacies",
  storageBucket: "mesha-delicacies.appspot.com",
  messagingSenderId: "411623961498",
  appId: "1:411623961498:web:7a59e85774eb544c0b4023",
  measurementId: "G-T720139XK0"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);
const analytics = getAnalytics(app);