<?php

    require_once __DIR__ . '/../config/DataBase.php';

    class UserModel {

        private $db;

        public function __construct() {
            $database = new DataBase();
            $this->db = $database->connect();
        }

        //Verifica si el email ya esta registrado
        public function emailExists($email) {

            $sql = "SELECT id FROM usuarios WHERE email = :email LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetch() ? true : false;
        }

        //Registra un nuevo usuario
        public function register($nombre, $email, $password) {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nombre, email, password, rol, estado)
                    VALUES (:nombre, :email, :password, 'USUARIO', 'ACTIVO')";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            return $stmt->execute();
        }

        //Obtiene un usuario por email
        public function login($email) {

            $sql = "SELECT * FROM usuarios 
                    WHERE email = :email 
                    AND estado = 'ACTIVO'
                    LIMIT 1";
                    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetch();
        }

    }

?>
