<?php

namespace Learn\Crud;

require_once(CONFIG . 'Config.php');

class DB
{
    protected $db;
    protected $modelName;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->connect();
    }

    protected function connect()
    {
        $this->db = new \PDO(
            DB_DRIVER . ':host=' . HOST . ';dbname=' . DBNAME,
            USER,
            PASS,
            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
        );
    }

    public function getData($filter = null, $columns = '*')
    {
        if (is_array($columns)) {
            $columns = implode(', ', $columns);
        }

        $query = "SELECT {$columns} FROM {$this->modelName}";

        if ($filter) {
            $query .= " WHERE {$filter[0]} {$filter[1]}";
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function setData($keys, $data)
    {
        $values = '';
        for ($i = 0; $i < count($keys); $i++) {
            $values .= '?, ';
        }

        $query = 'INSERT INTO ' . $this->modelName . ' (' . implode(', ', $keys) . ') VALUES(' . rtrim($values, ', ') . ')';

        $stmt = $this->db->prepare($query);

        for ($i = 1; $i <= count($values = array_values($data)); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
        }
        return $stmt->execute();
    }

    public function updateData($attributes, $id, $data)
    {
        $query = 'UPDATE ' . $this->modelName . ' SET ';

        foreach ($attributes as $key) {
            $query .= "{$key} = ?, ";
        }

        $query = rtrim($query, ', ') . ' WHERE ID = ?';

        $stmt = $this->db->prepare($query);

        for ($i = 1; $i <= count($values = array_values($data)); $i++) {
            $stmt->bindValue($i, $values[$i - 1]);
            if ($i == count($values)) {
                $stmt->bindValue($i + 1, $id);
            }
        }
        return $stmt->execute();
    }

    public function deleteData($id)
    {
        $query = 'DELETE FROM ' . $this->modelName . ' WHERE ID = ?';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }
}
