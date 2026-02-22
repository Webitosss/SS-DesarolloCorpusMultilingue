<?php

require_once __DIR__ . '/../models/FrasesModel.php';

class UserController {

    public function dashboard() {

        // Acceso público, no requiere autenticación

        $texto = $_GET['q'] ?? '';
        $idioma = $_GET['idioma'] ?? 'mayo';

        $model = new FrasesModel();

        $frases = $model->buscarFrases($texto, $idioma);

        $total = count($frases);

        require_once __DIR__ . '/../views/user/dashboard.php';
        
    }
}
