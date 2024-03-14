import { initializeApp } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-analytics.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, signOut, onAuthStateChanged, updateProfile, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-auth.js";
import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-firestore.js";


const firebaseConfig = {
    apiKey: "AIzaSyAGUVWLrbOVpbi9-XqkOqCmYY4M_8L5qs4",
    authDomain: "pos-123-f6813.firebaseapp.com",
    projectId: "pos-123-f6813",
    storageBucket: "pos-123-f6813.appspot.com",
    messagingSenderId: "893992385038",
    appId: "1:893992385038:web:4c6fec5700efcd91339a5f",
    measurementId: "G-1RMNRM7P77"
  };


// Inicializo firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const auth = getAuth();
var db = getFirestore(app);

export class ManageAccount {
  register(email, password, displayName) {
    createUserWithEmailAndPassword(auth, email, password)
      .then((userCredential) => {
        return updateProfile(userCredential.user, {
          displayName: displayName
        });
      })
      .then((_) => {
        window.location.href = "login.html";
        
        alert("Registro exitoso. Serás redirigido a la página de inicio de sesión.");
      })
      .catch((error) => {
        console.error(error.message);
      
        alert("Error al registrar: " + error.message);
      });
  }

  authenticate(email, password) {
    signInWithEmailAndPassword(auth, email, password)
      .then((_) => {
        window.location.href = "../welcome/index.html";
        alert("Has iniciado sesión correctamente. Serás redirigido a la página principal.");
      })
      .catch((error) => {
        console.error(error.message);
                alert("Error al iniciar sesión: " + error.message);
      });
  }

    signOut() {
    signOut(auth)
      .then((_) => {
        window.location.href = "/login/index.html";
      })
      .catch((error) => {
        console.error(error.message);
      });
  }

  loginWithGoogle() {
    const provider = new GoogleAuthProvider();
    signInWithPopup(auth, provider)
        .then((result) => {
            window.location.href = "../welcome/index.html";
            console.log("Inicio de sesión con Google exitoso:", result.user.displayName);
        })
        .catch((error) => {
            alert("Error al iniciar sesión: " + error.message);
            console.error("Error al iniciar sesión con Google:", error);
        });
    }
  

}
