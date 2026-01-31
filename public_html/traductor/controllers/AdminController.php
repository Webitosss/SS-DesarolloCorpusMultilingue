<?php

    require_once __DIR__ . '/../models/FrasesModel.php';

    class AdminController {

        public function dashboard() {

            if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'ADMIN') {
                header("Location: /traductor/index.php?controller=auth&action=login");
                exit;
            }

            $frasesModel = new FrasesModel();
            $frases = $frasesModel->obtenerFrases();
            $total = $frasesModel->contarFrases();

            require_once __DIR__ . '/../views/admin/dashboard.php';
        }
    }
