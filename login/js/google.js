import { ManageAccount } from '/config/firebaseconect.js';

const account = new ManageAccount();

document.getElementById("google-login-button").addEventListener("click", () => {
    account.loginWithGoogle();
});
