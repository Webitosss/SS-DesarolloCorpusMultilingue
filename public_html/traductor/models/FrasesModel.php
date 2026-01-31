<?php
    
    require_once __DIR__ . '/../config/DataBase.php';

    class FrasesModel {

        private $db;
        private $conexion;

        public function __construct() {
            $this->db = new DataBase();
            $this->conexion = $this->db->connect();
        }

        //Registra una nueva frase
        public function insertarFrase($frase_espanol, $frase_mayo_yoreme) {

            $sql = "INSERT INTO frases (frase_espanol, frase_mayo_yoreme)
                    VALUES (:espanol, :mayo)";

            $stmt = $this->conexion->prepare($sql);

            return $stmt->execute([
                ':espanol' => $frase_espanol,
                ':mayo' => $frase_mayo_yoreme
            ]);
        }

        //Elimina una frase por ID
        public function eliminarFrase($id) {

            $sql = "DELETE FROM frases WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);

            return $stmt->execute([
                ':id' => $id
            ]);

        }

        //Obtiene todas las frases
        public function obtenerFrases() {

            $sql = "SELECT * FROM frases ORDER BY fecha_creacion DESC";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //Cuenta frases registradas
        public function contarFrases() {

            $sql = "SELECT COUNT(*) as total FROM frases";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'];
        }


    }

?>