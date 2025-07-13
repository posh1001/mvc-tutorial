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

    public function first($data, $data_not = [])
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

    public function insert($data)
    {
        $keys = array_keys($data);
        $query = "insert into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";

        $this->query($query, $data);

        return false;
    }

    public function update($id, $data, $id_column = 'id')
    {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $query .= "$key = :$key, ";
        }

        // Remove the last comma and space
        $query = rtrim($query, ", ");

        $query .= " WHERE $id_column = :$id_column";

        // Bind the ID to the data array
        $data[$id_column] = $id;

        // Execute query and return result
        return $this->query($query, $data);
    }

    public function delete($id, $id_column = 'id')
    {

        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column";

        $this->query($query, $data);

        return false;
    }
}
