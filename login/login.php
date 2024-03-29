<?php
session_start();
require './database/database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if ($results && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: ../welcome/productos/index2.php");
        exit; 
    } else {
        $message = 'Usuario o contraseña incorrectos. Por favor intente de nuevo.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PointOfSell Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <script  type="module" src="/config/firebaseconect.js"></script>
    <script type="module" src="/login/js/login.js"></script>
    <script type="module" src="/login/js/google.js"></script>
</head>
<body class="bg-gray-10" style="background-color: #9E0044;">
    <div class="flex justify-center h-screen w-screen items-center">
        <div class="w-full md:w-1/2 flex flex-col items-center ">
            
            <h1 class="text-center text-2xl font-bold text-white mb-6">LOGIN</h1>

            <!-- Formulario del login -->
            <form id="formulario-sesion" class="w-3/4" method="POST">
                
                <div class="mb-6">
                    <input type="email" name="email" id="email" class="w-full py-4 px-8 placeholder:font-semibold rounded border border-white hover:ring-1 outline-blue-500" placeholder="Email" style="background-color: #9E0044;">
                </div>
                <div class="mb-6">
                    <input type="password" name="password" id="password" class="w-full py-4 px-8 placeholder:font-semibold rounded border border-white hover:ring-1 outline-blue-500 " placeholder="Password" style="background-color: #9E0044;">
                </div>
                <div class="mb-6">
                    <button type="submit" id="login-button" class="w-full px-8 py-3 flex items-center justify-center border border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow-lg transition duration-150 bg-white">
                        Login
                    </button>
                </div>
            </form>

            <?php if (!empty($message)): ?>
                <div class="error-message"><?php echo $message; ?></div>
            <?php endif; ?>

            <div>
                <a href="signup.html" class="text-sm text-white hover:text-blue-500">No tienes cuenta, únete</a>
            </div>

            <div class="my-5">
                <button id="google-login-button" class="w-full px-8 py-3 flex items-center justify-center border border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow-lg transition duration-150 bg-white">
                    <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-6 h-6" alt="">
                    <span class="ml-2">Continuar con Google</span>
                </button>
            </div>
        </div>
    </div>

    <script type="module" src="/login/js/google.js"></script>
</body>
</html>
