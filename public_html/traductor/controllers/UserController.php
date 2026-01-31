<?php

    class UserController {

        public function dashboard() {
            if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'USUARIO') {
                header("Location: /traductor/index.php?controller=auth&action=login");
                exit;
            }

            require_once __DIR__ . '/../views/user/dashboard.php';
        }
    }
