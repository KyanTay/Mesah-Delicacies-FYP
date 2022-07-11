// Importing features from firebase
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-app.js";
import { getFirestore, collection, doc, getDocs, addDoc, setDoc } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-firestore.js"
import { getAuth, signInWithEmailAndPassword, createUserWithEmailAndPassword, browserLocalPersistence, browserSessionPersistence } from "https://www.gstatic.com/firebasejs/9.8.4/firebase-auth.js"

// Firebase required infomation
// IMPORTANT DO NOT TOUCH ANYTHING IN FIREBASECONFIG
const firebaseConfig = {
  apiKey: "AIzaSyD328i_7KXj07q2iVxQaW02U1MUozJv6I8",
  authDomain: "mesha-delicacies.firebaseapp.com",
  projectId: "mesha-delicacies",
  storageBucket: "mesha-delicacies.appspot.com",
  messagingSenderId: "411623961498",
  appId: "1:411623961498:web:7a59e85774eb544c0b4023",
  measurementId: "G-T720139XK0"
};

// Initialize Firebase and setting some global variables
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);
const auth = getAuth();

// Export is to use features that other scripts will require. 
export { app }; //App
export { db, collection, doc, getDocs, addDoc, setDoc }; //Firestore Related
export { auth, signInWithEmailAndPassword, createUserWithEmailAndPassword, browserLocalPersistence, browserSessionPersistence }; //Register & Login Related


var user = auth.currentUser;

//This isn't working properly
var storedUser = localStorage.getItem('CurrentUser');
if (typeof storedUser !== 'undefined' && storedUser !== null) {
  var user = storedUser;
  console.log(user.uid);
}
