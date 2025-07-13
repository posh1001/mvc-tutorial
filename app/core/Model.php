<?php

class Model
{

    use Database;
    protected $table = 'users';
    protected $limit = 10;
    protected $offset = 0;

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        $query = rtrim($query, " AND ");
        $query .= " LIMIT $this->limit OFFSET $this->offset";

        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);
        if ($result)
            return $result[0];

        return false;
    }

    
    public function first($data) {}
    public function insert($data) {}
    public function update($id, $data, $id_column = 'id') {}
    public function delete($id, $id_column = 'id') {}
}
