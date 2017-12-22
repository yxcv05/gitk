<?php
class DB{

    static private $user = "root";
    static private $pass = "";

    public static function connect(){
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=rkandreev', self::$user, self::$pass);
            $statement = $dbh->prepare('SET NAMES UTF8');
            $statement->execute();
            return $dbh;
        } catch (PDOException $e) {
            echo false;
        }
    }
}