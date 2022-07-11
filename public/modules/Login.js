// Importing features 
import { auth, signInWithEmailAndPassword, browserLocalPersistence, browserSessionPersistence } from "../main.js"; 

// Get button ID
document.getElementById('loginBtn').addEventListener('click', login);

function login() {
    var email = document.getElementById("LoginEmail").value;
    var password = document.getElementById("LoginPassword").value;


    //Firebase's inbuilt persistence/staying logged in isn't working
    if (document.getElementById('rememberMe').checked) {
        auth.setPersistence(auth, browserLocalPersistence);
    } else { auth.setPersistence(auth, browserSessionPersistence) }

    signInWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in
            const user = userCredential.user;
            localStorage.setItem('CurrentUser', user); //This is storing object/object
            console.log("Signed In!")
            window.location.replace("https://mesha-delicacies.web.app/home.html"); //Redirect
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            console.log(errorCode + errorMessage)
        });
}
