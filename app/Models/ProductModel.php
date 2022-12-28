<?php
class ProductModel extends BaseModel
{
    const TABLE = 'category';

    public function getAll()
    {
        return $this->all(self::TABLE);
    }
}