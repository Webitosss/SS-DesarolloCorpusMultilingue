<?php

    class DataBase {

        private $host = 'localhost';
        private $db = 'mayoyoreme';
        private $user = 'mayoyoreme';
        private $password = '!@$%#yaX';


        public function __construct(){

        }

        public function connect(){

            try {
                
                $PDO = new PDO("mysql:host=".$this->host. ";dbname=".$this->db, $this->user, $this->password);
                return $PDO;

            } catch (PDOException $e) {

                return $e->getMessage();

            }
        
        }

    }

?>