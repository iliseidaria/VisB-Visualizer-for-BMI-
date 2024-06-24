<?php
class Database {
    protected $connection = null;

    public function __construct() {//constructorul clasei 
        try {
            $this->connection = new mysqli('localhost', 'root', '', 'eurostat_data'); //creeaza o noua conexiune cu BD
            if (mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($query = "", $params = []) {//executarea interogare SQL
        try {
            //pregatirea interogarii
            $stmt = $this->connection->prepare($query);
            if ($stmt === false) {
                throw new Exception("Unable to prepare statement: " . $query);
            }
            
            //legarea parametrilor de query
            if (!empty($params)) {//verifica daca exista parametrii de legat
                $types = str_repeat('s', count($params)); //creeaza un string care contine tipurile parametrilor; creeaza un s(string) de lungime egala cu nr parametrilor
                $stmt->bind_param($types, ...$params);//leaga parametri la interogarea SQL, folosind tipurile specificate
            }

            $stmt->execute();//executare interogare SQL
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);//obtinerea rezultatelor sub forma de array asociativ
            //PHP Associative Arrays are arrays that use named keys that you assign info to them.
            $stmt->close();
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }
    public function insert($sql, $params) {
        $stmt = $this->connection->prepare($sql);
        $this->bindParams($stmt, $params);
        $stmt->execute();
        $stmt->close();
    }

    public function update($sql, $params) {
        $stmt = $this->connection->prepare($sql);
        $this->bindParams($stmt, $params);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($sql, $params) {
        $stmt = $this->connection->prepare($sql);
        $this->bindParams($stmt, $params);
        $stmt->execute();
        $stmt->close();
    }

    private function bindParams($stmt, $params) {
        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }
    }
}
?>
