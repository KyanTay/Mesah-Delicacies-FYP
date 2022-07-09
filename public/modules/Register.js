import { auth, db, doc, setDoc, createUserWithEmailAndPassword  } from "../main.js";

document.getElementById('registerBtn').addEventListener('click', registerUser);


function registerUser() {
    var email = document.getElementById("registerEmail").value;
    var password = document.getElementById("registerPassword").value;

    createUserWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in
            const user = userCredential.user;
            console.log("Register Pass")
            createUserData(user.uid, email);
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            console.log(errorCode + errorMessage)
        });
}

async function createUserData(userId, email) {
    //Check if there is already user data
    await setDoc(doc(db, "UserData", userId), {
        "First Name": document.getElementById("firstName").value,
        "Last Name" : document.getElementById("lastName").value,
        "Email": email,
        "Contact": document.getElementById("registerContact").value,
        "Home Address": document.getElementById("registerHomeAddress").value
    });
    window.location.replace("https://mesha-delicacies.web.app/Login.html"); //Redirect
  }



