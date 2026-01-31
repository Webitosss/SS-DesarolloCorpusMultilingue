<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f10dc94bac.js" crossorigin="anonymous"></script> 

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background: #eef2ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #ffffff;
            width: 420px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .card h2 {
            text-align: center;
            color: #3f51ff;
            margin-bottom: 25px;
        }

        .icon {
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #3f51ff;
        }

        button {
            width: 100%;
            background: #0f172a;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 15px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #020617;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #3f51ff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
    //aqui pondre el header
?>

<div class="card">
    <h2>Registrar usuario</h2>

    <div class="icon"><i class="fa-solid fa-user-plus"></i></div>

    <form action="/traductor/index.php?controller=auth&action=register" method="POST">

        <div class="form-group">
            <label>Nombre completo</label>
            <input type="text" name="nombre" placeholder="Ingresa tu nombre completo" required>
        </div>

        <div class="form-group">
            <label>Correo electrónico</label>
            <input type="email" name="email" placeholder="ejemplo@gmail.com" required>
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Confirmar contraseña</label>
            <input type="password" name="password_confirm" required>
        </div>

        <button type="submit">Registrarse</button>
    </form>

    <div class="login-link">
        ¿Ya tienes cuenta?
        <a href="/traductor/views/auth/login.php">
            Inicia sesión
        </a>
    </div>
</div>

<?php
    //aqui pondre el footer
?>

</body>
</html>
