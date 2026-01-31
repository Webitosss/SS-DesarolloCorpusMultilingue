<?php

    require_once __DIR__ . '/../models/FrasesModel.php';

    class FrasesController {

        private $model;

        public function __construct() {
            $this->model = new FrasesModel();
        }

        //Muestra dashboard de admin
        public function dashboard() {
            $frases = $this->model->obtenerFrases();
            $total = $this->model->contarFrases();
            require_once __DIR__ . '/../views/admin/dashboard.php';
        }

        //Registra una frase
        public function registrar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $frase_espanol = trim($_POST['frase_espanol'] ?? '');
                $frase_mayo = trim($_POST['frase_mayo_yoreme'] ?? '');

                if ($frase_espanol && $frase_mayo) {
                    $this->model->insertarFrase($frase_espanol, $frase_mayo);
                }

                header("Location: /traductor/index.php?controller=admin&action=dashboard");
                exit;
            }
        }

        // Elimina frase
        public function eliminar() {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $id = $_POST['id'] ?? null;

                if ($id) {
                    $this->model->eliminarFrase($id);
                }

                header('Location: /traductor/index.php?controller=frases&action=dashboard');
                exit;
            }
        }


    }
    
?>
