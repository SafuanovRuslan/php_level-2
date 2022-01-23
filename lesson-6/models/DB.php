<?php

class DB {
    private static $instance;
    private $db;

    public static function connect() {
        if (self::$instance == null) {
            self::$instance = new DB;
        }

        return self::$instance;
    }

    private function __construct() {
        setlocale(LC_ALL, 'ru_RU.UTF8');
        $this->db = new PDO(DB_MOD . ":host=" . SERVER . ";dbname=" . DB_NAME, DB_LOGIN, DB_PASSWORD);
        $this->db->exec('SET NAMES UTF 8');
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }


    // SELECT
    // "SELECT * FROm goods WHERE id>3"
    public function select($query) {
        $queryPrepared = $this->db->prepare($query);
        $queryPrepared->execute();

        if ($queryPrepared->errorCode() != PDO::ERR_NONE) {
            $info = $queryPrepared->errorInfo();
            die($info[2]);
        }

        return $queryPrepared->fetchAll();
    }


    // INSERT
    // insert("goods",['title'=>'Товар 1','price'=>100])
    public function insert($table, $data) {  
        foreach ($data as $key => $value) {
            $fields[] = $key;
            $masks[] = ":$key";
            
            if ($value === null) {
                $data[$key] = 'NULL';
            }
        }
        
        $fields = implode(',', $fields);//"'title','price'"
        $masks = implode(',', $masks);//"':title',':price'"
        
        $query = "INSERT INTO $table ($fields) VALUES ($masks)";
        
        $queryPrepared = $this->db->prepare($query);
        $queryPrepared->execute($data);
        
        if ($queryPrepared->errorCode() != PDO::ERR_NONE) {
            $info = $queryPrepared->errorInfo();
            die($info[2]);
        }
        
        return $this->db->lastInsertId();
    }


    // UPDATE
    // update("goods",['title'=>'iWatch','price'=>699])
    public function update($table, $data, $id) {
        foreach ($data as $key => $value) {
            $fields[] = "$key=:$key";
            
            if ($value === null) {
                $data[$key] = 'NULL';
            }
        }

        $fields = implode(',', $fields);

        $query = "UPDATE $table SET $fields WHERE id = $id";
        $queryPrepared = $this->db->prepare($query);
        $queryPrepared->execute($data);

        if ($queryPrepared->errorCode() != PDO::ERR_NONE) {
            $info = $queryPrepared->errorInfo();
            die($info[2]);
        }

        return $queryPrepared->rowCount();
    }


    // DELETE
    // delete("goods", 2)
    public function delete($table, $id) {
        $query = "DELETE FROM $table WHERE id = $id";

        $queryPrepared = $this->db->prepare($query);
        $queryPrepared->execute();

        if ($queryPrepared->errorCode() != PDO::ERR_NONE) {
            $info = $queryPrepared->errorInfo();
            die($info[2]);
        }

        return $queryPrepared->rowCount();
    }
}

// $db = DB::connect();
// echo "<pre>";
// print_r($db->select('SELECT * From goods WHERE id>3'));
// echo "</pre>";