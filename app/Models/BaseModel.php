<?php
class BaseModel extends Database
{
    private $connect;

    public function __construct()
    {
        $this->connect = $this->connect();
    }

    public function all($table, $select = ['*'])
    {
        $cols = implode(',', $select);
        $sql = "Select ${cols} from ${table}";
        return $data = $this->query_all($sql);
    }

    public function one($table, $id)
    {
        $sql = "select * from ${table} where id = ${id}";
        return $data = $this->query_one($sql);
    }

    public function create($table, $data = [])
    {
        $cols = implode(',', array_keys($data));

        $values = implode(',', array_map(function ($value) {
            return "'$value'";
        }, array_values($data)));

        $sql = "insert into ${table} (${cols}) values(${values})";

        return $this->execute($sql);
    }

    public function update($table, $data, $id)
    {
        $newData = [];

        foreach ($data as $key => $value) {
            array_push($newData, "${key} = '${value}'");
        }

        $newDataString = implode(',', $newData);

        $sql = "update ${table} set ${newDataString} where id = ${id}";
        return $this->execute($sql);
    }

    public function delete($table, $id)
    {
        if (gettype($id) == "array") {
            $ids = implode(',', $id);
            $sql = "DELETE from ${table} where id in (${ids})";
        } else {
            $sql = "DELETE from ${table} where id = ${id}";
        }
        return $this->execute($sql);
    }

    public function resetId($table)
    {
        $sql = "SET  @num := 0;
            UPDATE $table SET id = @num := (@num+1);
            ALTER TABLE $table AUTO_INCREMENT =1;";
        return $this->execute($sql);
    }

    public function getNewListByNum($table, $num, $option = 'DESC', $select = ['*'], $depenent = 'id')
    {
        $cols = implode(',', $select);
        $sql = "Select ${cols} from ${table} ORDER BY ${depenent} ${option} LIMIT ${num}";
        return $data = $this->query_all($sql);
    }
}