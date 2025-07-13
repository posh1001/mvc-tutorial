<?php

trait Database
{
    private function dbConnect()
    {
        $string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        try {
            $con = new PDO($string, DBUSER, DBPASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Optional: good for debugging
            return $con;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($query, $data = [])
    {
        try {
            $con = $this->dbConnect();
            $stm = $con->prepare($query);
            $stm->execute($data);
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return (!empty($result)) ? $result : false;
        } catch (PDOException $e) {
            // Log or display a meaningful message in dev mode
            die("Query Error: " . $e->getMessage());
        }
    }

    public function execute($query, $data = [])
    {
        try {
            $con = $this->dbConnect();
            $stm = $con->prepare($query);
            return $stm->execute($data);
        } catch (PDOException $e) {
            die("Execution Error: " . $e->getMessage());
        }
    }
}
