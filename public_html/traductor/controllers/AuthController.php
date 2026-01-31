<?php

    require_once __DIR__ . '/../models/UserModel.php';

    class AuthController {

        //Registra a un nuevo usuario con sus respectivos mensajes de error
        public function register() {

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header("Location: /traductor/views/auth/register.php");
                exit;
            }

            $nombre = trim($_POST['nombre'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['password_confirm'] ?? '';

            if (empty($nombre) || empty($email) || empty($password) || empty($confirm)) {
                die("Todos los campos son obligatorios");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("Correo electrónico no válido");
            }

            if ($password !== $confirm) {
                die("Las contraseñas no coinciden");
            }

            $userModel = new UserModel();

            if ($userModel->emailExists($email)) {
                die("El correo ya está registrado");
            }

            $success = $userModel->register($nombre, $email, $password);

            if ($success) {
                header("Location: /traductor/views/auth/login.php");
                exit;
            } else {
                die("Error al registrar usuario");
            }
        }

        //Obtiene un usuario por email con sus respectivos mensajes de error
        public function login() {

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                require_once __DIR__ . '/../views/auth/login.php';
                return;
            }

            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (!$email || !$password) {
                die("Todos los campos son obligatorios");
            }

            $userModel = new UserModel();
            $user = $userModel->login($email);

            if (!$user || !password_verify($password, $user['password'])) {
                die("Correo o contraseña incorrectos");
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['rol'] = $user['rol'];

            if ($user['rol'] === 'ADMIN') {
                header("Location: /traductor/index.php?controller=admin&action=dashboard");
            } else {
                header("Location: /traductor/index.php?controller=user&action=dashboard");
            }
            exit;
        }


    }

?>
