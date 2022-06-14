// import { getAuth, sendSignInLinkToEmail } from "firebase/auth";

// const auth = getAuth();
// sendSignInLinkToEmail(auth, email, actionCodeSettings)
//   .then(() => {
//     // The link was successfully sent. Inform the user.
//     // Save the email locally so you don't need to ask the user for it again
//     // if they open the link on the same device.
//     window.localStorage.setItem('emailForSignIn', email);
//     // ...
//   })
//   .catch((error) => {
//     const errorCode = error.code;
//     const errorMessage = error.message;
//     // ...
//   });
import { getAuth, signInWithEmailAndPassword } from "firebase/auth";

const auth = getAuth();

function login() {
    var email = document.getElementById("LoginEmail").value;
    var password = document.getElementById("LoginPassword").value;
    signInWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in 
            const user = userCredential.user;
            // ...
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
        });
}
