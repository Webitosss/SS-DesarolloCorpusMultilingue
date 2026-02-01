<?php

require_once __DIR__ . '/../models/FrasesModel.php';

class UserController {

    public function dashboard() {

        if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'USUARIO') {
            header("Location: /traductor/index.php?controller=auth&action=login");
            exit;
        }

        $texto = $_GET['q'] ?? '';
        $idioma = $_GET['idioma'] ?? 'mayo';

        $model = new FrasesModel();

        $frases = $model->buscarFrases($texto, $idioma);

        $total = count($frases);

        require_once __DIR__ . '/../views/user/dashboard.php';
        
    }
}
