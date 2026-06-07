<?php
class ConnectDB{
    private static $host = 'localhost';
    private static $db_name = '68PM34';
    private static $username = 'root';
    private static $password = 'root';
    public static $conn;

    public static function Connect(){
        $conn = null;
        try{
            $conn = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$db_name, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $conn;
    }
}
?>