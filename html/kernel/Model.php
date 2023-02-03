<?php

namespace Kernel;

class Model
{
    public $conn;

    public $columns;

    public $id;

    public $table;

    public function __construct(string $table = null)
    {
        $this->table = $table;
        $this->conn = Db::getInstance();
    }

    private function executeSql(string $sql, array $binding = null)
    {
        $sth = $this->conn->prepare($sql);
        $sth->execute($binding);
        return $sth;
    }

    public function load(array $data)
    {
        foreach ($this->columns as $key => $field) {
            if (isset($data[$key])) {
                $this->$field = $data[$key];
            }
        }
    }

    public function selectAll(): array
    {
        $sql = 'SELECT * FROM ' . $this->table;

        $sth = $this->executeSql($sql);

        return $sth->fetchAll(\PDO::FETCH_OBJ);
    }

    public function selectById(string $id)
    {
        $sql =  'SELECT * FROM ' . $this->table . ' WHERE ' . $this->id . ' = :' . $this->id;

        $binding = [':' . $this->id => $id];

        $sth = $this->executeSql($sql, $binding);

        return $sth->fetch(\PDO::FETCH_OBJ);
    }

    public function selectOne(string $column, string $value)
    {
        if (isset($this->columns[$column])) {
            $sql =  'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :' . $column;

            $binding = [':' . $column => $value];

            $sth = $this->executeSql($sql, $binding);

            return $sth->fetch(\PDO::FETCH_OBJ);
        }
    }

    public function insert()
    {
        $sql = 'INSERT INTO ' . $this->table . ' (';
        $fields = [];
        $binding = [];

        foreach ($this->columns as $field) {
            if ($this->$field) {
                $fields[] = $field;

                $binding[':' . $field] = $this->$field;
            }
        }

        $sql .= implode(',', $fields) . ') values(:' . implode(',:', $fields) . ')';

        $this->executeSql($sql, $binding);
    }

    public function updateById(string $id)
    {
        $sql = 'UPDATE ' . $this->table . ' SET ';

        $fields = [];
        $binding = [':' . $this->id => $id];

        foreach ($this->columns as $field) {
            if ($this->$field) {
                $fields[] = $field;

                $binding[':' . $field] = $this->$field;
            }
        }

        foreach ($fields as $field) {
            $sql .= $field . ' = :' . $field . ', ';
        }

        $sql = substr($sql, 0, -2) . ' WHERE ' . $this->id . ' = :' . $this->id;

        $this->executeSql($sql, $binding);
    }

    public function deleteById(string $id)
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->id . ' = :' . $this->id;

        $binding = [':' . $this->id => $id];

        $this->executeSql($sql, $binding);
    }
}
