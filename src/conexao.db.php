<?php

    class Conexao
    {
        private $HOST = 'localhost';
        private $DBNAME = 'todolist';
        private $USER = 'root';
        private $PASS = '';

        public function conectar() {
            try {

                $CONEXAO = new PDO(
                    "mysql:host=$this->HOST; dbname=$this->DBNAME",
                    "$this->USER",
                    "$this->PASS"
                );

                return $CONEXAO;

            } catch(PDOException $erro) {
                echo '<p>'.$erro->getMessage().'<p>';
            }
        }
    }

?>