<?php

namespace App;

class Connection {
    
    public static function getDb() {   //método responsável por criar a conexão com o banco de dados;
        try {
            $conn = new \PDO(
                "mysql:dbname=entender_mvc;host=localhost;charset=utf8",
                "root",
                ""
            );

            return $conn;

        } catch(\PDOException $e) {
            //..tratar o erro de alguma forma..//
        }
    }
}

?>