import { auth, db, doc, setDoc, createUserWithEmailAndPassword  } from "../main.js";

// link to the register button
document.getElementById('registerBtn').addEventListener('click', registerUser); 


function registerUser() {
    // Get the element for the email and password to be stored into database
    var email = document.getElementById("registerEmail").value;
    var password = document.getElementById("registerPassword").value;

    // Using the inbuilt 
    createUserWithEmailAndPassword(auth, email, password) // Stored seperatly from the collection
        .then((userCredential) => {
            // Signed in
            const user = userCredential.user; // Store into the authentication when successful.
            console.log("Register Pass")
            createUserData(user.uid, email); // Uses the function below to create the user data
        })
        // If account creation fails
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            console.log(errorCode + errorMessage)
        });
}

async function createUserData(userId, email) {
    // Add in the user's data into the firestore.
    await setDoc(doc(db, "UserData", userId), { 
        "First Name": document.getElementById("firstName").value,
        "Last Name" : document.getElementById("lastName").value,
        "Email": email,
        "Contact": document.getElementById("registerContact").value,
        "Home Address": document.getElementById("registerHomeAddress").value
    });
    window.location.replace("https://mesha-delicacies.web.app/Login.html"); //Redirect page to login.html
  }



