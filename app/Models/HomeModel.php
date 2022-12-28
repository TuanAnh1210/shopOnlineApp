<?php

class HomeModel extends BaseModel
{
    const TABLE = 'products';

    public function getAll()
    {
        return $this->all(self::TABLE);
    }

    public function getProduct($num, $option = 'DESC', $select = ['*'], $depenent = 'id')
    {
        return $this->getNewListByNum(self::TABLE, $num, $option, $select, $depenent);
    }

    public function getById($id)
    {
        return $this->one(self::TABLE, $id);
    }
}